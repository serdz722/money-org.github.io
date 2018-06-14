<?PHP

# Автоподгрузка классов
function __autoload($name){ include("classes/_class.".$name.".php");}

# Класс конфига 
$config = new config;

# Функции
$func = new func;

# Гараж данных
$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);





if (isset($_POST["m_operation_id"]) && isset($_POST["m_sign"]))
{
	$m_key = $config->secretW;
	$arHash = array($_POST['m_operation_id'],
			$_POST['m_operation_ps'],
			$_POST['m_operation_date'],
			$_POST['m_operation_pay_date'],
			$_POST['m_shop'],
			$_POST['m_orderid'],
			$_POST['m_amount'],
			$_POST['m_curr'],
			$_POST['m_desc'],
			$_POST['m_status'],
			$m_key);
	
	$sign_hash = strtoupper(hash('sha256', implode(":", $arHash)));
	if ($_POST["m_sign"] == $sign_hash && $_POST['m_status'] == "success")
	{
		
	$db->Query("SELECT * FROM db_payeer_insert WHERE id = '".intval($_POST['m_orderid'])."'");
	if($db->NumRows() == 0){ echo htmlspecialchars($_POST['m_orderid'])."|error"; exit;}
	
	$payeer_row = $db->FetchArray();
	if($payeer_row["status"] > 0){ echo htmlspecialchars($_POST['m_orderid'])."|success"; exit;}
	
	$db->Query("UPDATE db_payeer_insert SET status = '1' WHERE id = '".intval($_POST['m_orderid'])."'");
	
	$ik_payment_amount = $payeer_row["sum"];
	$user_id = $payeer_row["user_id"];
   
	# Настройки
	$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
	$sonfig_site = $db->FetchArray();
   
   $db->Query("SELECT user, referer_id FROM db_users_a WHERE id = '{$user_id}' LIMIT 1");
   $user_ardata = $db->FetchArray();
   $user_name = $user_ardata["user"];
   $refid = $user_ardata["referer_id"];
   # Проверяем баланс
	if(isset($_GET['balance'])){
		$payeer = new rfs_payeer($config->AccountNumber, $config->apiId, $config->apiKey);
		if($payeer->isAuth()){
			$arBalance = $payeer->getBalance();
			if($arBalance["auth_error"] == 0){
				$balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];
				echo "$balance";
			} else {
				echo 'error auth';
			}
		}
	}


   # Зачисляем баланс
   $serebro = sprintf("%.4f", floatval($sonfig_site["ser_per_wmr"] * $ik_payment_amount) );
   
   $db->Query("SELECT insert_sum FROM db_users_b WHERE id = '{$user_id}' LIMIT 1");
   $ins_sum = $db->FetchRow();
   
   $serebro = intval($ins_sum <= 0.01) ? ($serebro + ($serebro * 0.5) ) : $serebro;
   $serebro = intval($ins_sum >= 0.01) ? ($serebro + ($serebro * 0.5) ) : $serebro;
   $add_tree = ( $ik_payment_amount >= 499000000.99) ? 0 : 0;
     $points = ( $ik_payment_amount >= 0.01) ? ($serebro * 0.0007) : 0;
   $lsb = time();
   $to_referer = ($serebro * 0.10);
   
   			//Начисляем билеты 
		   if($ik_payment_amount >= 50 and $ik_payment_amount <= 99) {
		   $bil = $ik_payment_amount / 50;
		   $bill = intval($bil);

		   } elseif ($ik_payment_amount >= 100 and $ik_payment_amount <= 249) {
		   $bil = $ik_payment_amount / 100;
		   $bill = intval($bil) + 2; // если сумма больше 100 и меньше 249 руб. то                          бонус 4 билета

                   } elseif ($ik_payment_amount >= 250 and $ik_payment_amount <= 499) {
		   $bil = $ik_payment_amount / 250;
		   $bill = intval($bil) + 7; // если сумма больше 250 и меньше 499 руб. то                        бонус 7 билетов

                   } elseif ($ik_payment_amount >= 500 and $ik_payment_amount <= 999) {
		   $bil = $ik_payment_amount / 500;
		   $bill = intval($bil) + 11; // если сумма больше 500 и меньше 999 руб. то                        бонус 10 билетов

                   } elseif ($ik_payment_amount >= 1000 and $ik_payment_amount <= 2499) {
		   $bil = $ik_payment_amount / 1000;
		   $bill = intval($bil) + 16; // если сумма больше 1000 и меньше 2499 руб. то                        бонус 14 билетов

                   } elseif ($ik_payment_amount >= 2500 and $ik_payment_amount <= 4999) {
		   $bil = $ik_payment_amount / 2500;
		   $bill = intval($bil) + 23; // если сумма больше 2500 и меньше 4999 руб. то                      бонус 19 билетов

		   }elseif ($ik_payment_amount >= 5000) {
		   $bil = $ik_payment_amount / 5000;
	           $bill = intval($bil) + 34; // если сумма больше 5000 руб. то бонус 28                           билетов
		   }else{
			$bill = 0;
		   }
   
   $db->Query("UPDATE db_users_b SET money_b = money_b + '$serebro', e_t = e_t + '$add_tree', pay_points = pay_points + '$points', to_referer = to_referer + '$to_referer', last_sbor = '$lsb', insert_sum = insert_sum + '$ik_payment_amount', billet = billet + '$bill' WHERE id = '{$user_id}'");
   
   # Зачисляем средства рефереру и дерево
   $add_tree_referer = ($ins_sum <= 0.01) ? ", a_t = a_t + 1" : "";
   $db->Query("UPDATE db_users_b SET money_b = money_b + $to_referer, from_referals = from_referals + '$to_referer' {$add_tree_referer} WHERE id = '$refid'");
   
   # Статистика пополнений
   $da = time();
   $dd = $da + 60*60*24*15;
   $db->Query("INSERT INTO db_insert_money (user, user_id, money, serebro, date_add, date_del) 
   VALUES ('$user_name','$user_id','$ik_payment_amount','$serebro','$da','$dd')");
   $db->Query("SELECT * FROM db_invcompetition_users WHERE user_id = '{$user_id}'");
$in = $db->FetchArray();

		
$a=$in["user_id"];
if($a > 0)
{
$usname = $user_name;
}
else
{
$usname = $user_name;
$db->Query("INSERT INTO db_invcompetition_users (user, user_id, points) VALUES ('$usname','$user_id','0')");
}

$db->Query("SELECT * FROM db_invcompetition WHERE status = '0' LIMIT 1");
$invcomp = $db->FetchArray();

$db->Query("SELECT COUNT(*) FROM db_invcompetition_users WHERE user_id = '{$user_id}'");
$rett = $db->FetchArray();

if ($invcomp["date_add"] >= 0 AND $invcomp["date_end"] > $da)
{
$db->Query("UPDATE db_invcompetition_users SET points = points + '$ik_payment_amount' WHERE user_id = '$user_id'");
}
else
{
$db->Query("UPDATE db_invcompetition_users SET points = points + '0' WHERE user_id = '$user_id'");
}
        # Конкурс
         $competition = new competition($db);
         $competition->UpdatePoints($user_id, $ik_payment_amount);
        #--------
   
         $wmset = new wmset();
         $marray = $wmset->GetSet($ik_payment_amount);
   
         $a_t = intval($marray["t_a"]);
         $b_t = intval($marray["t_b"]);
         $c_t = intval($marray["t_c"]);
         $d_t = intval($marray["t_d"]);
         $e_t = intval($marray["t_e"]);
         $f_t = intval($marray["t_f"]);
   
        $db->Query("UPDATE db_users_b SET a_t = a_t + '$a_t', b_t = b_t + '$b_t', c_t = c_t + '$c_t', d_t = d_t + '$d_t', e_t = e_t + '$e_t', f_t = f_t + '$f_t', 
        last_sbor = '$lsb' WHERE id = '{$user_id}'");

		# Конкурс
$competition = new competition($db);
$competition->UpdatePoints($user_id, $ik_payment_amount);

# Платежные баллы
$pp = new pay_points($db);
$pp ->UpdatePayPoints($ik_payment_amount,$user_id);

	# Обновление статистики сайта
	$db->Query("UPDATE db_stats SET all_insert = all_insert + '$ik_payment_amount' WHERE id = '1'");

	
	echo htmlspecialchars($_POST['m_orderid'])."|success";
	exit;

	}
	echo htmlspecialchars($_POST['m_orderid'])."|error";
}
?>
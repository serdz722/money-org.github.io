
<?PHP
# Определение платежей по акции 'Накопительный банк'
$c_date = date("Ymd",time());
$c_date_begin = strtotime($c_date." 00:00:00");
$c_date_end = strtotime($c_date." 23:59:59");
$y_date = date("Ymd",time()-24*60*60);
$y_date_begin = strtotime($y_date." 00:00:00");
$y_date_end = strtotime($y_date." 23:59:59");

$db->Query("SELECT * FROM db_back WHERE date_add >='".$c_date_begin."' AND  date_add <='".$c_date_end."' ORDER BY id DESC LIMIT 1");
if($db->NumRows() == 0) {
	$db->Query("SELECT sum(serebro) as serebro, user_id FROM db_insert_money WHERE date_add >='".$y_date_begin."' AND  date_add <='".$y_date_end."' GROUP BY user_id");
	$num_nb = $db->NumRows();
	$sum_nb = 0;
	$user_nb = '';
	
	if($num_nb != 0) {
		if($num_nb == 1) {
			$data_nb = $db->FetchArray();
			$sum_nb = $sum_nb + $data_nb['serebro'];
			$user_nb = $user_nb.$data_nb['user_id']." ";
		} else {
			while($data_nb = $db->FetchArray()) {
				$sum_nb = $sum_nb + $data_nb['serebro'];
				$user_nb = $user_nb.$data_nb['user_id']." ";
			}
		}
		
		$ar_user_nb = explode(" ", $user_nb);
		$pos_nb = rand(0, $num_nb-1);

		$db->Query("SELECT percent_back FROM db_config WHERE id = '1'");
		$percent_back = $db->FetchRow();
		$db->FreeMemory();
		
		$sum_nb1 = round($sum_nb * $percent_back / 100,0);
		
		# Зачилсяем юзверю
		$db->Query("UPDATE db_users_b SET money_b = money_b + '".$sum_nb1."' WHERE id = '".$ar_user_nb[$pos_nb]."'");		
		
		# Пишем в табл
		$db->Query("INSERT INTO db_back (`id`,`user_id`,`bank`,`sum`,`date_add`) VALUES(NULL,'".$ar_user_nb[$pos_nb]."','".$sum_nb."','".$sum_nb1."','".time()."')");		

		# echo $sum_nb." ".$num_nb." ".$pos_nb."-".$ar_user_nb[$pos_nb];
	}
}
	if(isset($_POST["log_email"])){
	
	$lmail = $func->IsMail($_POST["log_email"]);
	
		if($lmail !== false){
		
			$db->Query("SELECT id, user, pass, referer_id, banned FROM db_users_a WHERE email = '$lmail'");
			if($db->NumRows() == 1){
			
			$log_data = $db->FetchArray();
			
				if(strtolower($log_data["pass"]) == strtolower($_POST["pass"])){
				
					if($log_data["banned"] == 0){
						
						# Считаем рефералов
						$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id = '".$log_data["id"]."'");
						$refs = $db->FetchRow();
						
						$db->Query("UPDATE db_users_a SET referals = '$refs', date_login = '".time()."', ip = INET_ATON('".$func->UserIP."') WHERE id = '".$log_data["id"]."'");
						
						$_SESSION["user_id"] = $log_data["id"];
						$_SESSION["user"] = $log_data["user"];
						$_SESSION["referer_id"] = $log_data["referer_id"];
						Header("Location: /account");
						
					}else echo "<center><font color = 'red'><b>Аккаунт заблокирован</b></font></center><BR />";
				
				}else echo "<center><font color = 'red'><b>Email и/или Пароль указан неверно</b></font></center><BR />";
			
			}else echo "<center><font color = 'red'><b>Указанный Email не зарегистрирован в системе</b></font></center><BR />";
			
		}else echo "<center><font color = 'red'><b>Email указан неверно</b></font></center><BR />";
	
	}

?>

<div class="col-md-4">
<center>
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'ru', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="../translate.google.com/translate_a/element.js@cb=googleTranslateElementInit"></script>
</center><br />

	<form action="" method="post">
	<div class="box_login">
		<div class="login">
			<input name="log_email" type="text" size="23" maxlength="35" placeholder="Ваш email" class="inpt" />
		</div>
		
		<div class="password">
			<input name="pass" type="password" size="23" maxlength="35" placeholder="Пароль" class="inpt" />
		</div>
		

		<center><a href="signup">Регистрация</a> | <a href="recovery">Забыли пароль?</a></center>
		<br class="clr" />


		<center><button type="submit" class="btn_login">Войти</button></center>
	</form>

	</div>
</center>







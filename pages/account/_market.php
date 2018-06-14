
<div class="col-md-8"> <div class="s-bk-lf">
<div class="title">АРТЕФАКТЫ</div>
</div>
<div class="silver-bk">



<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Торговая лавка";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

?>

<font color = white>
 <center>
<div class="silver-bk">Здесь производится продажа накатанных в км/ч на золото. Вырученное золото распределяется между двумя счетами (счет для покупок и счет 
для вывода) в пропорциях: <?=100-$sonfig_site["percent_sell"]; ?>% на счет для покупок и <?=$sonfig_site["percent_sell"]; ?>% на вывод.<br /><br />
Курс продажи Артефактов: <font color="#FFFFFF"><?=$sonfig_site["items_per_coin"]; ?> км/ч = 1 Золота.</font>
<div class="clr"></div><BR /></center></font>
<?PHP
# Продажа
if(isset($_POST["sell"])){

$all_items = $user_data["a_b"] + $user_data["b_b"] + $user_data["c_b"] + $user_data["d_b"] + $user_data["e_b"] + $user_data["f_b"] + $user_data["i_b"] + $user_data["k_b"] + $user_data["l_b"] + $user_data["m_b"];

if($all_items > 0){

$money_add = $func->SellItems($all_items, $sonfig_site["items_per_coin"]);

$tomat_b = $user_data["a_b"];
$straw_b = $user_data["b_b"];
$pump_b = $user_data["c_b"];
$pean_b = $user_data["d_b"];
$peas_b = $user_data["e_b"];
$snow_b = $user_data["f_b"];        
$arbuz_b = $user_data["i_b"]; 
$dinya_b = $user_data["k_b"];     
 $kliks_b = $user_data["l_b"];           
$mixit_b = $user_data["m_b"];

$money_b = ( (100 - $sonfig_site["percent_sell"]) / 100) * $money_add;
$money_p = ( ($sonfig_site["percent_sell"]) / 100) * $money_add;

# Обновляем юзверя
$db->Query("UPDATE db_users_b SET money_b = money_b + '$money_b', money_p = money_p + '$money_p', a_b = 0, b_b = 0, c_b = 0, d_b = 0, e_b = 0, f_b = 0, i_b = 0, k_b = 0, l_b = 0, m_b = 0 WHERE id = '$usid'");

$da = time();
$dd = $da + 60*60*24*15;

# Вставляем запись в статистику
$db->Query("INSERT INTO db_sell_items (user, user_id, a_s, b_s, c_s, d_s, e_s, f_s, i_s, k_s, l_s, m_s, amount, all_sell, date_add, date_del) VALUES 
('$usname','$usid','$tomat_b','$straw_b','$pump_b','$pean_b','$peas_b','$snow_b','$arbuz_b','$dinya_b','$kliks_b','$mixit_b','$money_add','$all_items','$da','$dd')");

echo "<center><font color = 'green'><b>Вы продали {$all_items} Артефактов, на сумму {$money_add} ЗОЛОТА</b></font></center><BR />";

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

}else echo "<center><font color = 'white'><b>Вам нечего продавать :(</b></font></center><BR />";

}
?>        
<form action="" method="post">
<table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="center" valign="middle">&nbsp;</td>
    <td height="30" align="center" valign="middle"><strong><font color = white>У вас в наличии</font></strong></td>
    <td height="30" align="center" valign="middle"><strong><font color = white>На сумму (Золота)</font></strong></td>
  </tr><font color = white>
  <tr>
    <td width="30" height="30" align="center" valign="middle"><div class="sm-line-nt"><img src="/img/birds/greenegg1.jpg"></div></td>
    <td align="center" valign="middle"><?=$user_data["a_b"]; ?>  Mater</td>
    <td align="center" valign="middle"><?=$func->SellItems($user_data["a_b"], $sonfig_site["items_per_coin"]); ?></td>
  </tr>
  <tr>
    <td width="30" height="30" align="center" valign="middle"><div class="sm-line-nt"><img src="/img/birds/yellowegg1.jpg"></div></td>
    <td align="center" valign="middle"><?=$user_data["b_b"]; ?>  Fillmore</td>
    <td align="center" valign="middle"><?=$func->SellItems($user_data["b_b"], $sonfig_site["items_per_coin"]); ?></td>
  </tr>
  <tr>
    <td width="30" height="30" align="center" valign="middle"><div class="sm-line-nt"><img src="/img/birds/brownegg1.jpg"></div></td>
    <td align="center" valign="middle"><?=$user_data["c_b"]; ?>  Doc Hudson</td>
    <td align="center" valign="middle"><?=$func->SellItems($user_data["c_b"], $sonfig_site["items_per_coin"]); ?></td>
  </tr>
  <tr>
    <td width="30" height="30" align="center" valign="middle"><div class="sm-line-nt"><img src="/img/birds/blueegg1.jpg"></td>
    <td align="center" valign="middle"><?=$user_data["d_b"]; ?>  Sally</td>
    <td align="center" valign="middle"><?=$func->SellItems($user_data["d_b"], $sonfig_site["items_per_coin"]); ?></td>
  </tr>
  <tr>
    <td width="30" height="30" align="center" valign="middle"><div class="sm-line-nt"><img src="/img/birds/redegg1.jpg"></div></td>
    <td align="center" valign="middle"><?=$user_data["e_b"]; ?>  McQueen</td>
    <td align="center" valign="middle"><?=$func->SellItems($user_data["e_b"], $sonfig_site["items_per_coin"]); ?></td>
  </tr>  

   </font>
  <tr>
    <td align="center" valign="middle" colspan="3">
<BR />
<input type="submit" name="sell" value="Продать все" class="button_0" style="height: 30px;"></td>
  </tr>
  
</table>
</form>

</div>

<div class="clr"></div>
<script type="text/javascript" src="/js/jquery.js"></script>

<div class="col-md-8">								<div class="s-bk-lf">
									<div class="title">ПОПОЛНЕНИЕ СЧЕТА</div>
								</div>
								<div class="silver-bk"><br><br>
<?PHP
$_OPTIMIZATION["title"] = "Пополнение c помощью WebMoney";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

$db->Query("SELECT id FROM `db_payeer_insert`order by id desc limit 1");
if ($db->NumRows()!=0)
{ 
	$res =  $db->FetchArray();
	$last_id = $res['id'];
} else $last_id='0';
$last_id++;

?>

<div class="silver-bk">
<font color = 'black'>
<BR />

<font color = white>
<p><center><img src="/img/wm.png" /></center></p>
<p>Курс игровой валюты: 1 рубль (<?=$config->VAL; ?>) = <?=$sonfig_site["ser_per_wmr"]; ?> Золота.</p>
<p>Оплата и зачисление Золота на баланс производится в ручном режиме.</p> 
<p>
При пополнении от 1 до 2499р -  <b>50%</b> от суммы В ПОДАРОК!<br>

При пополнении от 2500р. -  <b>100%</b> от суммы В ПОДАРОК!<br>

При пополнении от 5000р -  <b>200%</b> от суммы В ПОДАРОК!<br>

<BR />
<p>Для пополнения
<ul>
<li>Зайдите в свой WM кошелек (кипер)</li>
<li>Переведите сумму от 1 рубля на кошелек <strong>R2(Не работает!!!)</strong></li>
<li>В примечании к платежу укажите <strong>""Ваш ник в игре"</strong></li>
<li>После перевода в течении 5-120 минут (обычно гораздо раньше) Вам будут начислено Золото</li>
<li>Если вы ошиблись с примечанием к платежу отправьте ваш ник и кошелек с которого отправляли деньги на почту <strong>см. раздел контакты</strong></li>
</p>
<BR />

</center>
<BR /><BR /></font>

<div class="clr"></div>		
</div></div>


<script type="text/javascript" src="/js/jquery.js"></script>

<div class="col-md-8">								<div class="s-bk-lf">
									<div class="title">ПОПОЛНЕНИЕ СЧЕТА</div>
								</div>
								<div class="silver-bk">

<br><br>

<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Пополнение баланса";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

/*
if($_SESSION["user_id"] != 1){
echo "<center><b><font color = red>Технические работы</font></b></center>";
return;
}
*/
?>


<center>
<div class="silver-bk"><font color = white>
<center><h3> При  пополнении баланса +50% в подарок.</h3> </center> 
Курс игровой валюты: 1 рубль (<?=$config->VAL; ?>) = <?=$sonfig_site["ser_per_wmr"]; ?> Поинтов.
<p>Ввод средств позволяет автоматически приобрести игровые ПОИНТЫ с помощью различных платежных 
систем: Yandex Деньги, банковских карт, SMS, терминалов, денежных переводов и т.д.</p>
<p>Оплата и зачисление Поинтов на баланс производится в автоматическом режиме.</p> 
<p>Введите сумму в РУБЛЯХ, которую вы хотите пополнить на баланс. <BR />
После пополнения вам будет зачислено Поинтов.<br /></p>
<p>
При пополнении от 1 до 2499р -  <b>50%</b> от суммы В ПОДАРОК!<br>

При пополнении от 2500р. -  <b>75%</b> от суммы В ПОДАРОК!<br>

При пополнении от 5000р -  <b>125%</b> от суммы В ПОДАРОК!<br>
</font>
<BR />
<BR /><center><div class="title">Пополнение через Payeer</div></center>
 <BR /><font color = white>Способы оплаты : QIWI WALLET,  PAYEER,  W1,  YANDEX.MONEY,  EGOPAY,  OKPAY, PAYEER <br /></font></p>
<?
/// db_payeer_insert
if(isset($_POST["sum"])){

$sum = round(floatval($_POST["sum"]),2);


# Заносим в БД
$db->Query("INSERT INTO db_payeer_insert (user_id, user, sum, date_add) VALUES ('".$_SESSION["user_id"]."','".$_SESSION["user"]."','$sum','".time()."')");

$desc = base64_encode($_SERVER["HTTP_HOST"]." - USER ".$_SESSION["user"]);
$m_shop = $config->shopID;
$m_orderid = $db->LastInsert();
$m_amount = number_format($sum, 2, ".", "");
$m_curr = "RUB";
$m_desc = $desc;
$m_key = $config->secretW;

$arHash = array(
 $m_shop,
 $m_orderid,
 $m_amount,
 $m_curr,
 $m_desc,
 $m_key
);
$sign = strtoupper(hash('sha256', implode(":", $arHash)));

?>
<center>
<form method="GET" action="//payeer.com/api/merchant/m.php">
	<input type="hidden" name="m_shop" value="<?=$config->shopID; ?>">
	<input type="hidden" name="m_orderid" value="<?=$m_orderid; ?>">
	<input type="hidden" name="m_amount" value="<?=number_format($sum, 2, ".", "")?>">
	<input type="hidden" name="m_curr" value="RUB">
	<input type="hidden" name="m_desc" value="<?=$desc; ?>">
	<input type="hidden" name="m_sign" value="<?=$sign; ?>">
	<input type="submit" name="m_process" value="Оплатить и получить ПОИНТЫ" />
</form>
</center>
<div class="clr"></div>		
</div>
<?PHP

return;
}
?>
<script type="text/javascript">
var min = 0.01;
var ser_pr = 100;
function calculate(st_q) {
    
	var sum_insert = parseFloat(st_q);
    var sum_a1 = sum_insert * ser_pr;
    var sum_b1;
	if (sum_insert>=1 && sum_insert<2499) {
	   sum_b1 = sum_a1 * 0.5;
       $('#res_sum').html( (sum_a1.toFixed(0) + ' + ' + sum_b1.toFixed(0)) );
	}
    if (sum_insert>=2500 && sum_insert<5000) {
	   sum_b1 = sum_a1 * 0.75;
       $('#res_sum').html( (sum_a1.toFixed(0) + ' + ' + sum_b1.toFixed(0)) );
	}
	if (sum_insert>=5000 && sum_insert<20000) {
	   sum_b1 = sum_a1 * 1.25;
       $('#res_sum').html( (sum_a1.toFixed(0) + ' + ' + sum_b1.toFixed(0)) );
	}
	
}
	
</script>
<div class="alert alert-success" role="alert">
<div id="error3"></div>
<form method="POST" action="">
			<p>Перед покупкой Поинтов соберите все Кубки</p> 
    <input type="hidden" name="m" value="<?=$fk_merchant_id?>">
Введите сумму [<?=$config->VAL; ?>]:  
<input type="text" value="100" name="sum" size="7" id="psevdo" onchange="calculate(this.value)" onkeyup="calculate(this.value)" onfocusout="calculate(this.value)" onactivate="calculate(this.value)" ondeactivate="calculate(this.value)"> 

    Вы получите <span id="res_sum">10000</span> Поинтов
	<BR /><BR />

    <input type="submit" id="submit" value="Пополнить баланс" >

</form>
<script type="text/javascript">
calculate(100);
</script></center>




<BR /><BR />



<center><div class="title">Оплата через Яндекс деньги</div></center><center>
<font color = white><p>Моментальный перевод пополнения счета  <b>1 рубль = 200 Поинтов</b> </p> </font>
<p><center>




<iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/embed/shop.xml?account=410012962522589&quickpay=shop&payment-type-choice=on&writer=seller&targets=%D0%9E%D0%BF%D0%BB%D0%B0%D1%82%D0%B0+%D1%81%D1%87%D0%B5%D1%82%D0%B0&targets-hint=&default-sum=100&button-text=01&comment=on&hint=%D0%92%D0%B0%D1%88+%D0%BB%D0%BE%D0%B3%D0%B8%D0%BD&mail=on&successURL=http%3A%2F%2Fpolice-money.ru%2F" width="450" height="268"></iframe>







</center></p>

</p>
<BR />

</center>
<BR /><BR />

<center><div class="title">Оплата через WebMoney</div></center><center>

<p><center><img src="/img/wm.png" /></center></p>
<a href="/account/insertf" >Перейти на страницу оплаты через WebMoney</a>
</p>
<BR />

</center>


<div class="clr"></div>		
</div>


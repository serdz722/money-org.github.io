<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - SET Бонусы";
$_OPTIMIZATION["description"] = "Бонусы за пополнение баланса";
?>
<div class="col-md-8">
<div class="s-bk-lf">
<div class="title">Heroes-Money SET</div>
</div>
<br>



<div class="alert alert-success" role="alert"><center>
<b>Heroes-Money SET</b> - это комбинация Шахт и Героев, которые даются пользователю при пополнении баланса. 
Бонусный SET начисляется в автоматическом режиме после каждого пополнения баланса. Максимум можно получить только 1 SET за 1 пополнение.</br>
<BR />
<b><font color = "red">Внимание:</font> <BR />Шахты и Герои даются как бонус! У вас не забирается пополняемая сумма.</b> 
<div class="clr"></div>		

<BR />

<div class="silver-bk">
<b><center>Показать получаемый бонус</center></b><BR />
<form action="" method="post">
	
	<center>Пополняемая сумма: <input type="text" name="sum" value="<?=(isset($_POST["sum"])) ? intval($_POST["sum"]) : 50;?>" />
	<BR /><BR />
	<input type="submit" value="Расчитать бонус"style="padding:10px;" />
	</center>
	</div>
</form>
<div class="clr"></div>		
</div>

<?PHP
$wmset = new wmset();

if(isset($_POST["sum"])){

$insum = (intval($_POST["sum"]) > 0 AND intval($_POST["sum"]) <= 1000000) ? intval($_POST["sum"]) : 0;


$marray = $wmset->GetSet($insum);

?>

<BR /><BR />



<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>При пополнении на сумму <?=$insum; ?> рублей вы получаете Шахт:</H4>
    <table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"]);?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"]);?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"]);?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"]);?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"]);?> шт.</div></td>


    



</table>
</a>

</div>
<BR />



<div class="clr"></div>		
</div>

<?PHP
return;

}
	
?>

<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>При пополнении от 50 до 99 рублей вы получаете Шахт:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+1 ;?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"]);?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"]);?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"]);?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"]);?> шт.</div></td>


    </center>
</table>

</a>

</div>



<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>При пополнении от 100 до 249 рублей вы получаете Шахт:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+2 ;?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"])+1 ;?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"]);?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"]);?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"]);?> шт.</div></td>


    </center>
	
</table>
</a>
</div>



<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>При пополнении от 250 до 499 рублей вы получаете Шахт:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+3 ;?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"])+2 ;?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"]);?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"]);?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"]);?> шт.</div></td>

    </center>
</table>
</a>
</div>







<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>При пополнении от 500 до 999 рублей вы получаете Шахт:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+5 ;?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"])+1 ;?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"])+1 ;?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"]);?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"]);?> шт.</div></td>


    </center>
</table>
</a>
</div>







<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>При пополнении от 1000 до 2499 рублей вы получаете Шахт:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+7 ;?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"])+3 ;?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"])+2 ;?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"]);?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"]);?> шт.</div></td>


    </center>
</table>
</a>
</div>






<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>При пополнении от 2500 до 4999 рублей вы получаете Шахт:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+11 ;?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"])+3 ;?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"])+3 ;?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"])+1 ;?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"]);?> шт.</div></td>


    </center>
</table>
</a>
</div>






<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>При пополнении от 5000 до 9999 рублей вы получаете Шахт:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+18 ;?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"])+5 ;?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"])+1 ;?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"])+2 ;?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"])+1;?> шт.</div></td>


    </center>
</table>
</a>
</div>



<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>При пополнении от 10000 рублей вы получаете Шахт:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+22 ;?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"])+4 ;?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"])+4 ;?> шт.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"])+3 ;?> шт.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"])+2 ;?> шт.</div></td>


    </center>
</table>
</a>
</div>
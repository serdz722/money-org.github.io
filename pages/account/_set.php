<?PHP
$_OPTIMIZATION["title"] = "������� - SET ������";
$_OPTIMIZATION["description"] = "������ �� ���������� �������";
?>
<div class="col-md-8">
<div class="s-bk-lf">
<div class="title">Heroes-Money SET</div>
</div>
<br>



<div class="alert alert-success" role="alert"><center>
<b>Heroes-Money SET</b> - ��� ���������� ���� � ������, ������� ������ ������������ ��� ���������� �������. 
�������� SET ����������� � �������������� ������ ����� ������� ���������� �������. �������� ����� �������� ������ 1 SET �� 1 ����������.</br>
<BR />
<b><font color = "red">��������:</font> <BR />����� � ����� ������ ��� �����! � ��� �� ���������� ����������� �����.</b> 
<div class="clr"></div>		

<BR />

<div class="silver-bk">
<b><center>�������� ���������� �����</center></b><BR />
<form action="" method="post">
	
	<center>����������� �����: <input type="text" name="sum" value="<?=(isset($_POST["sum"])) ? intval($_POST["sum"]) : 50;?>" />
	<BR /><BR />
	<input type="submit" value="��������� �����"style="padding:10px;" />
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

	<a class="btn_acc" <H4>��� ���������� �� ����� <?=$insum; ?> ������ �� ��������� ����:</H4>
    <table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"]);?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"]);?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"]);?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"]);?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"]);?> ��.</div></td>


    



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

	<a class="btn_acc" <H4>��� ���������� �� 50 �� 99 ������ �� ��������� ����:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+1 ;?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"]);?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"]);?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"]);?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"]);?> ��.</div></td>


    </center>
</table>

</a>

</div>



<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>��� ���������� �� 100 �� 249 ������ �� ��������� ����:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+2 ;?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"])+1 ;?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"]);?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"]);?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"]);?> ��.</div></td>


    </center>
	
</table>
</a>
</div>



<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>��� ���������� �� 250 �� 499 ������ �� ��������� ����:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+3 ;?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"])+2 ;?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"]);?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"]);?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"]);?> ��.</div></td>

    </center>
</table>
</a>
</div>







<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>��� ���������� �� 500 �� 999 ������ �� ��������� ����:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+5 ;?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"])+1 ;?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"])+1 ;?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"]);?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"]);?> ��.</div></td>


    </center>
</table>
</a>
</div>







<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>��� ���������� �� 1000 �� 2499 ������ �� ��������� ����:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+7 ;?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"])+3 ;?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"])+2 ;?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"]);?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"]);?> ��.</div></td>


    </center>
</table>
</a>
</div>






<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>��� ���������� �� 2500 �� 4999 ������ �� ��������� ����:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+11 ;?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"])+3 ;?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"])+3 ;?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"])+1 ;?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"]);?> ��.</div></td>


    </center>
</table>
</a>
</div>






<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>��� ���������� �� 5000 �� 9999 ������ �� ��������� ����:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+18 ;?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"])+5 ;?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"])+1 ;?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"])+2 ;?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"])+1;?> ��.</div></td>


    </center>
</table>
</a>
</div>



<div class="alert alert-success" role="alert"><center>
<b>

	<a class="btn_acc" <H4>��� ���������� �� 10000 ������ �� ��������� ����:</H4>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">


<center>	 					
							

    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/green1.png" /> +<?=intval($marray["t_a"])+22 ;?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/yellow1.png" /> +<?=intval($marray["t_b"])+4 ;?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/brown1.png" /> +<?=intval($marray["t_c"])+4 ;?> ��.</div></td>
	<td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/blue1.png" /> +<?=intval($marray["t_d"])+3 ;?> ��.</div></td>
    <td align="center" width="15%"><div class="sm-line-nt"><img src="/img/birds/black1.png" /> +<?=intval($marray["t_e"])+2 ;?> ��.</div></td>


    </center>
</table>
</a>
</div>
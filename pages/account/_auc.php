<div class="col-md-8">								<div class="s-bk-lf">
									<div class="title">�������</div>
								</div>
								<div class="silver-bk">
<br><br>

<?
error_reporting(E_ALL ^ E_NOTICE);
$_OPTIMIZATION["title"] = "�������";
$usid = $_SESSION["user_id"];
$refid = $_SESSION["referer_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();


////* � ��� �� ��������� ����� � ������ ���������� ������!
$db->Query("SELECT * FROM tb_aukcion_game ORDER BY id DESC LIMIT 1");

if($db->NumRows() > 0)
{
$winer = $db->FetchArray();

$time=date(time());

$wintime = date($winer["timers"]);

if($time > $wintime)
{

///* ������� ����� ���������� ����� ��������� � ��������!


$db->Query("SELECT sum(among) FROM tb_aukcion_game");
$dengi= $db->FetchRow();


$amongs = $dengi*1;





///* ���������� ���������� � ����������! 1. ���������� 2.������� �������� ��������!

$db->Query("INSERT INTO tb_aukcion_game_stats (user,among,date) VALUES ('".$winer["user"]."','$amongs','".time()."')");

///* � ��� �� ������� ������������-����������!!!!
$db->Query("UPDATE db_users_b SET money_b = money_b + '$amongs' WHERE user = '".$winer["user"]."'") or die(mysql_error());

///* �������� ������� �������!
$db->Query("TRUNCATE TABLE tb_aukcion_game");

}

}
?>

<?

////* �������� ������!
if(isset($_POST["sum"]))
{
$sum_insert = round(floatval($_POST["sum"]),2);

///* ���������� ���� ������ � 0.01 ����� ,���� ������ - ����� � ������
if($sum_insert >= 5.00)
{

////* ��� �� ��������� ������ ������ ��� ������ ��������
$db->Query("SELECT * FROM tb_aukcion_game ORDER BY id DESC LIMIT 1");
$kkk = $db->FetchArray();
$sum_sop = $kkk["among"];


///* ��� �� ��������� 5 ����� � ������ �������!!!!

//////////* ��� �� ��������� ������ ��� ������ ��� ���!

if(($zzz) >= 0) { $timers = $kkk["timers"] +(6*6); }

if(($zzz) <= 0) { $timers = time() +(6*6*9); }

///////////* ��������� ��������� ������ ������!!!

if($sum_sop <= $sum_insert)
{

$user_balance = $user_data["money_b"];

///* ���������� ������ � ����������!
if(floatval($user_balance) >= $sum_insert)
{

$insert_user = $_SESSION["user"];

$db->Query("INSERT INTO tb_aukcion_game (user, among, date , timers) VALUES ('$insert_user','$sum_insert','".time()."' , '$timers')");

///* ����� �������� ������ , ��������� ���� ������������ !!!!
if($db)
{

$db->Query("UPDATE db_users_b SET money_b = money_b - $sum_insert WHERE user = '".$_SESSION["user"]."'");

echo "<center><font color = 'green'>���� ������ �������</font></center><BR />";

?>
<script type="text/javascript">
				location.replace("/account/auc");
				</script>
				<noscript>
				<meta http-equiv="refresh" content="0; url=/account/auc">
				</noscript>
<?

}

else echo "<center><font color = 'red'>������������ ������� �� ������� ��� ������ � {$sum_insert}.</font></center><BR />";


?>
<script type="text/javascript">
				location.replace("/account/auc");
				</script>
				<noscript>
				<meta http-equiv="refresh" content="0; url=/account/auc">
				</noscript>
<?

}

else echo "<center><font color = 'red'>����������� ����� ������ 5</font></center><BR />";


?>
<script type="text/javascript">
				location.replace("/account/auc");
				</script>
				<noscript>
				<meta http-equiv="refresh" content="0; url=/account/auc">
				</noscript>
<?

}


else echo "<center><font color = 'red'>�� �� ������ ������� ������ ������ ��� ������ ��������!</font></center><BR />";


?>
<script type="text/javascript">
				location.replace("/account/auc");
				</script>
				<noscript>
				<meta http-equiv="refresh" content="0; url=/account/auc">
				</noscript>
<?

}

}

////* ������� ������!

?>
<div class="s-bk-lf">
<div class="acc-title"></div>
</div>
<div class="silver-bk"><div class="clr"></div>

<center>
<form action="" method="post" style="margin:0; padding:0;">
<table width="350" align="center" border="0" cellpadding="0" cellspacing="0" >

<?

$db->Query("SELECT * FROM tb_aukcion_game ORDER BY id DESC LIMIT 1");

  	if($db->NumRows() > 0)
	{
	$lidermen = $db->FetchArray();


$db->Query("SELECT sum(among) FROM tb_aukcion_game");
$dengi= $db->FetchRow();


$crok1 = date(time());
$crok2 = date($lidermen["timers"] + (0));
$cr=date("H:i",$crok2);
$os = $crok2 - $crok1 - (3);
$ost= date("H:i:s",$os);


?>

<tr >
<td class="m-tb" align="center" colspan="2" style="padding:1px;">

<b><font size="+1" color="red">����� �������� <font color="blue"><?=$lidermen["user"];?></font></b></font>
<br>
<b>
<b><font size="+1" color="red">������ ����������� ������ 20 ������!<font color="blue"><?=$lidermen["user"];?></font></b></font>

<br>


�������� �� ������ - <span style="color:red;"><?=$ost;?></span>

<br>
����� �������� <font style="color:black;"><?=$dengi*0.90;?></font>
<br>
������ ������ � <font style="color:#000000;"><?=$lidermen["among"];?></font>
</b>
</td>
</tr>
<br />

<?
}
?>

<tr bgcolor="#1C60A7">
    <td align="center" colspan="2" style="padding:1px;"><b>�������� ������</b></td>
  </tr>
  <tr>
    <td class="m-tb" style="padding:1px;"><b>&nbsp;&nbsp;&nbsp;����� ������:</b></td>
    <td class="m-tb" align="center" style="padding:1px;">
	<input type="text" name="sum" value="     <?=$lidermen["among"]+5;?>" size="10" style="border:2px solid #d0f0c0;"/></td>
  </tr>
  <tr>
    <td align="center" colspan="2" style="padding:1px;border-bottom:3px solid #f7f7f7;">
	<input type="submit" class="btn_in" value="������� ������"  size="10"/></td>
  </tr>
</table>
</form>
</center>
<center><a href="javascript:window.location.reload()">�������� ��������</a></center> 

<meta http-equiv="refresh" content="20" /> 



<br>
<hr>
<br>

<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="80%">
  <tr>
    <td colspan="5" align="center"><h4>��������� ������</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">������������</td>
    <td align="center" class="m-tb">�����</td>
	<td align="center" class="m-tb">���� ������</td>
  </tr>
<?
//////*��� �� ���� ��� �������� ���������� ������!

  $db->Query("SELECT * FROM tb_aukcion_game ORDER BY id DESC LIMIT 10");

 if($db->NumRows() > 0)
	{
	$games = $db->FetchArray();
do{

echo"
<tr class='htt'>
    		<td align='center'>  ".$games["user"]."  </td>
    		<td align='center'>   ".$games["among"]."  </td>
			<td align='center'>  ".date( "d-m-Y � H:i:s" ,$games["date"])."  </td>
 </tr>";

}while($games = $db->FetchArray());
}else{
?>

<tr class='htt'>
<td align='center'><b>������ ��� ���</b></td>
</tr>
<?
}
?>
</table>
<br>
<table class="table" align="center" border="0" cellpadding="3" cellspacing="0" width="99%">
 <tr>
    <td colspan="5" align="center"><h4>��������� 10 ���</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">������������</td>
    <td align="center" class="m-tb">����� ��������</td>
	<td align="center" class="m-tb">����</td>
  </tr>
<?
//////*��� �� ���� ��� �������� ���������� ������!

 $db->Query("SELECT * FROM tb_aukcion_game_stats ORDER BY id DESC LIMIT 10");
  	if($db->NumRows() > 0)
	{
	$games2 = $db->FetchArray();
do{
echo"
<tr class='htt'>
    		<td align='center'>  ".$games2["user"]."  </td>
    		<td align='center'>   ".$games2["among"]."  </td>
			<td align='center'>  ".date( "d-m-Y � H:i:s" ,$games2["date"])." </td>
 </tr>";

}while($games2 = $db->FetchArray());

}else{
?>

<tr class='htt'>
<td align='center'><b>�� �������� ����� ���.</b></td>
</tr>
<?
}
?>
</table>
</div>
<div class="clr"></div></div>
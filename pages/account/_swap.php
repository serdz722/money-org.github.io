
<?PHP
$_OPTIMIZATION["title"] = "������� - ��������";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();
?> 







<div class="col-md-8">								<div class="s-bk-lf">
									<div class="title">�������� ������</div>
								</div>
								<div class="silver-bk">





<div class="silver-bk"><center>


</center>
<center><div class="title">����� �������� ������ � ���� �������:</div></center>



<font color = white>
 <center>
<div class="silver-bk">� �������� ������ �� ������ �������� ������ ��� ������ �� ������ ��� �������.<br> 
��� ������ ������ �� ��������� +<?=$sonfig_site["percent_swap"]; ?>% �� ���� ��� �������.<br /><br />
<center><font color="white">����� �������� ������ � ���� �������</font></p></center></font>
</div></div>

<?PHP

if(isset($_POST["sum"])){

$sum = intval($_POST["sum"]);

	if($sum >= 100){
	
		if($user_data["money_p"] >= $sum){
		
		$add_sum = ($sonfig_site["percent_swap"] > 0) ? ( ($sonfig_site["percent_swap"] / 100) * $sum) + $sum : $sum;
		
		$ta = time();
		$td = $ta + 60*60*24*15;
		
		$db->Query("UPDATE db_users_b SET money_b = money_b + $add_sum, money_p = money_p - $sum WHERE id = '$usid'");
		$db->Query("INSERT INTO db_swap_ser (user_id, user, amount_b, amount_p, date_add, date_del) VALUES ('$usid','$usname','$add_sum','$sum','$ta','$td')");
		
		echo "<center><font color = 'white'><b>����� ����������</b></font></center><BR />";
		
		}else echo "<center><font color = 'white'><b>������������ ������ ��� ������</b></font></center><BR />";
	
	}else echo "<center><font color = 'white'><b>����������� ����� ��� ������ 100 ������</b></font></center><BR />";

}

?>
<form action="" method="post">
<div class="alert alert-info" role="alert">
<table width="400" border="0" align="center">
  <tr>
    <td><font color="#000;">������� ������ ��� ������</font> [���. 100]: </td>
    <td align="center"><input type="text" class="lg" name="sum" id="sum" value="100" onkeyup="GetSumPer();" style="margin:0px; width:60px;"/></td>
  </tr>
  <tr>
    <td><font color="#000;">��������� ������ ��� �������</font> [+<?=$sonfig_site["percent_swap"]; ?>%]: </td>
    <td align="center"><span id="res_sum" name="res">0.00</span>
		<input type="hidden" name="per" id="percent" value="<?=$sonfig_site["percent_swap"]; ?>" disabled="disabled"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><BR /><input type="submit" name="swap" value="��������" class="button_0" style="height: 30px; margin-top:10px;" /></td>
  </tr>
</table>
<BR />
</div>		</div>						
<div class="clr"></div>	
</form>
</center>

<script language="javascript">GetSumPer();</script>


<div class="col-md-8">								<div class="s-bk-lf">
									<div class="title">�������</div>
								</div>
								<div class="silver-bk">
<BR />
<?PHP
$_OPTIMIZATION["title"] = "������� - ����� �������";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

$status_array = array( 0 => "�����������", 1 => "�������������", 2 => "��������", 3 => "���������");

# ��������� ��������!
$minPay = 150; 

?>
<b>������� �������������� � �������������� ������ � ������ �� ��������� ������� PAYEER! ������� ��� ������ ���������� 0%</b> <BR /><BR />
<b>�� ��������� ������� Payeer �� ������ ������� ���� �������� � �������������� ������ �� ��� ��������� ��������� ������� � ������������� �����.</b><BR /><BR />
<b>������ �� ������� ���������:</b><BR />
 - <a href="http://payeeer.ru/create" target="_blank">�������� ����� � Payeer</a> <BR />
 - <a href="http://payeeer.ru/outpay" target="_blank">����� ������� �� payeer</a> <BR /><BR />

<center><b>����� �������:</b></center><BR />

<?PHP
	
function ViewPurse($purse){

if( substr($purse,0,1) != "P" ) return false;
if( !preg_match("/^[0-9]{7,8}$/", substr($purse,1)) ) return false; 
return $purse;
}
	
	# ������� �������
	if(isset($_POST["purse"])){
	$_POST["purse"] = $db->RealEscape($_POST['purse']);
	
		$purse = ViewPurse($_POST["purse"]);
		$purse = $db->RealEscape($_POST['purse']);
		$sum = intval($_POST["sum"]);
		$sum = $db->RealEscape($_POST['sum']);
		$val = "RUB";
		
		if($purse !== false){
			
				if($sum >= $minPay){
				
					if($sum <= $user_data["money_p"]){
						
						# ��������� �� ������������ ������
						$db->Query("SELECT COUNT(*) FROM db_payment WHERE user_id = '$usid' AND (status = '0' OR status = '1')");
						if($db->FetchRow() == 0){
								
								
							### ������ ������� ###	
							$payeer = new rfs_payeer($config->AccountNumber, $config->apiId, $config->apiKey);
							if ($payeer->isAuth())
							{
								
								$arBalance = $payeer->getBalance();
								if($arBalance["auth_error"] == 0)
								{
									
									$sum_pay = round( ($sum / $sonfig_site["ser_per_wmr"]), 2);
									
									$balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];
									if( ($balance) >= ($sum_pay)){
									
									
									
									$arTransfer = $payeer->transfer(array(
									'curIn' => 'RUB', // ���� ��������
									'sum' => $sum_pay, // ����� ���������
									'curOut' => 'RUB', // ������ ���������
									'to' => $purse, // ���������� (email)
									//'to' => '+71112223344',  // ���������� (�������)
									//'to' => 'P1000000',  // ���������� (����� �����)
									'comment' => iconv('windows-1251', 'utf-8', "������� ������������ {$usname} � ������� WM-Farm")
									//'anonim' => 'Y', // ��������� �������
									//'protect' => 'Y', // ��������� ������
									//'protectPeriod' => '3', // ������ ��������� (�� 1 �� 30 ����)
									//'protectCode' => '12345', // ��� ���������
									));
									
										if (!empty($arTransfer["historyId"]))
										{	
										
										
											# ������� � ������������
											$db->Query("UPDATE db_users_b SET money_p = money_p - '$sum' WHERE id = '$usid'");
											
											# ��������� ������ � �������
											$da = time();
											$dd = $da + 60*60*24*15;
											
											$ppid = $arTransfer["historyId"];
											
											$db->Query("INSERT INTO db_payment (user, user_id, purse, sum, valuta, serebro, payment_id, date_add, status) 
											VALUES ('$usname','$usid','$purse','$sum_pay','RUB', '$sum','$ppid','".time()."', '3')");
											
											$db->Query("UPDATE db_users_b SET payment_sum = payment_sum + '$sum_pay' WHERE id = '$usid'");
											$db->Query("UPDATE db_stats SET all_payments = all_payments + '$sum_pay' WHERE id = '1'");
											
											echo "<center><font color = 'green'><b>���������!</b></font></center><BR />";
											
										}
										else
										{
										
											echo "<center><font color = 'red'><b>��������� ������ - �������� � ��� ��������������!</b></font></center><BR />";	
										
										}
									
									
									}else echo "<center><font color = 'red'><b>��������� ������ - �������� � ��� ��������������!</b></font></center><BR />";
									
								}else echo "<center><font color = 'red'><b>�� ������� ���������! ���������� ����� �1</b></font></center><BR />";
								
							}else echo "<center><font color = 'red'><b>�� ������� ���������! ���������� ����� �2</b></font></center><BR />";
							
								
						}else echo "<center><font color = 'red'><b>� ��� ������� �������������� ������. ��������� �� ����������.</b></font></center><BR />";
							
						
					}else echo "<center><font color = 'red'><b>�� ������� ������, ��� ������� �� ����� �����</b></font></center><BR />";
				
				}else echo "<center><b><font color = 'red'>����������� ����� ��� ������� ���������� {$minPay} �������!</font></b></center><BR />";
		
		}else echo "<center><b><font color = 'red'>������� Payeer ������ �������! �������� �������!</font></b></center><BR />";
		
	}
?>

<form action="" method="post">
<table width="99%" border="0" align="center">
  <tr>
    <td><font color="#000;">������� ������� Payeer [������: P1112457]</font>: </td>
	<td><input type="text" name="purse" size="15"/></td>
  </tr>
  <tr>
    <td><font color="#000;">������� ������� ��� ������</font> [���. <?=$minPay ?>]<font color="#000;">:</font> </td>
	<td><input type="text" name="sum" id="sum" value="<?=round($user_data["money_p"]); ?>" size="15" onkeyup="PaymentSum();" /></td>
  </tr>
  <tr>
    <td><font color="#000;">��������� <span id="res_val"></span></font><font color="#000;">:</font> </td>
	<td>
	<input type="text" name="res" id="res_sum" value="0" size="15" disabled="disabled"/>
	<input type="hidden" name="per" id="RUB" value="<?=$sonfig_site["ser_per_wmr"]; ?>" disabled="disabled"/>
	<input type="hidden" name="per" id="min_sum_RUB" value="0.5" disabled="disabled"/>
	<input type="hidden" name="val_type" id="val_type" value="RUB" />
	</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="swap" value="�������� �������" style="height: 30px; margin-top:10px;" /></td>
  </tr>
</table>
</form>
<script language="javascript">PaymentSum(); SetVal();</script>



<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr>
    <td colspan="5" align="center"><h4>��������� 10 ������</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">�������</td>
    <td align="center" class="m-tb">���������</td>
	<td align="center" class="m-tb">�������</td>
	<td align="center" class="m-tb">����</td>
	<td align="center" class="m-tb">������</td>
  </tr>
  <?PHP
  
  $db->Query("SELECT * FROM db_payment WHERE user_id = '$usid' ORDER BY id DESC LIMIT 20");
  
	if($db->NumRows() > 0){
  
  		while($ref = $db->FetchArray()){
		
		?>
		<tr class="htt">
    		<td align="center"><?=$ref["serebro"]; ?></td>
    		<td align="center"><?=sprintf("%.2f",$ref["sum"] - $ref["comission"]); ?> <?=$ref["valuta"]; ?></td>
    		<td align="center"><?=$ref["purse"]; ?></td>
			<td align="center"><?=date("d.m.Y",$ref["date_add"]); ?></td>
    		<td align="center"><?=$status_array[$ref["status"]]; ?></td>
  		</tr>
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="5">��� �������</td></tr>'
  
  ?>

  
</table><div class="clr"></div>		
</div>
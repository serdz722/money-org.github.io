

<div class="col-md-8">								<div class="s-bk-lf">
									<div class="title">������ ������</div>
								</div>
								<div class="silver-bk"><br>
<BR />
<?PHP


# ���������
if(isset($_POST["payment"])){

$ret_id = intval($_POST["payment"]);
$db->Query("SELECT * FROM db_payment WHERE status = '0' AND id = '{$ret_id}'");

	if($db->NumRows() == 1){
	
	$ret_data = $db->FetchArray();
	
	$user_id = $ret_data["user_id"];
	$sum = $ret_data["sum"];
	$serebro = $ret_data["serebro"];
		
		$db->Query("UPDATE db_users_b SET payment_sum = payment_sum + '$sum' WHERE id = '$user_id'");
		$db->Query("UPDATE db_payment SET status = '1' WHERE id = '$ret_id'");
		$db->Query("UPDATE db_stats SET all_payments = all_payments + '$sum' WHERE id = '1'");
		
		
		echo "<center><b>���������, ���������� ���������</b></center><BR />";
		
	}else echo "<center><b>������ �� ������� :(</b></center><BR />";

}

# �������
if(isset($_POST["return"])){

$ret_id = intval($_POST["return"]);
$db->Query("SELECT * FROM db_payment WHERE status = '0' AND id = '{$ret_id}'");

	if($db->NumRows() == 1){
	
	$ret_data = $db->FetchArray();
	
	$user_id = $ret_data["user_id"];
	$sum = $ret_data["sum"];
	$serebro = $ret_data["serebro"];
		
		$db->Query("UPDATE db_users_b SET money_p = money_p + '$serebro' WHERE id = '$user_id'");
		$db->Query("UPDATE db_payment SET status = '2' WHERE id = '$ret_id'");
		
		echo "<center><b>������ ��������, �������� ����������</b></center><BR />";
		
	}else echo "<center><b>������ �� ������� :(</b></center><BR />";

}




$db->Query("SELECT * FROM db_payment WHERE status = '0'");
$ast = $db->NumRows();
if($ast > 0){

?>
<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr bgcolor="#efefef">
	<td align="center" class="m-tb">��������</td>
    <td align="center" class="m-tb">������������</td>
    <td align="center" width="75" class="m-tb">�����</td>
	<td align="center" width="100" class="m-tb">�������</td>
	<td align="center" width="50" class="m-tb">�������</td>
	<td align="center" width="50" class="m-tb">���������</td>
  </tr>

<?PHP

	while($data = $db->FetchArray()){
	
	?>
	<tr class="htt">
    <td align="center"><?=$data["pay_sys"]; ?></td>
	<td align="center"><?=$data["user"]; ?></td>
	<td align="center"><?=sprintf("%.2f", $data["sum"]); ?> <?=$config->VAL; ?></td>
	<td align="center"><input type="text" value="<?=$data["purse"]; ?>" /></td>
  	<td align="center">
	
		<form action="" method="post">
			<input type="hidden" name="return" value="<?=$data["id"]; ?>" />
			<input type="submit" value="�������" />
		</form>
	
	</td>
	<td align="center">
	
		<form action="" method="post">
			<input type="hidden" name="payment" value="<?=$data["id"]; ?>" />
			<input type="submit" value="���������" />
		</form>
	
	</td>
	</tr>
	<?PHP
	
	}

?>

</table>
<?PHP

}else echo "<center><b>��� ������ ��� �������</b></center><BR />";

?>
</div>
<div class="clr"></div>

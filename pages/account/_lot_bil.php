<?PHP
$_OPTIMIZATION["title"] = "������� - �������";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];

# ��������� �������
$amount_lottery = 100; // ��������� ����������� ������
$num_bil = 5; // ���������� �������
$com_sys = 10; // �������� �������

?>
<div class="s-bk-lf">
	<div class="acc-title">�������</div>
</div>
<div class="silver-bk">

<b>�������</b> - ��� ����� ���� :) ����� ������� <?=$num_bil; ?> �������, <?=$num_bil-1;?> �� ������� �� ����� ��������, � <?=$num_bil-1;?>-� �������� ������ ��������� 
����� ���� ������� �� ������� �������� ������� <?=$com_sys; ?>%
����� �� �����, ����� �� ����� ����� �� ��������.
<BR />
����� ������� ������ ��� ����� ����� �������� ���������.
<BR />
<u>��������� ������ = <?=$amount_lottery; ?> ������</u>.
<BR /><BR />


<?PHP


	if(isset($_POST["set_lottery"])){
	
		$db->Query("SELECT money_b FROM db_users_b WHERE id = '{$usid}' LIMIT 1");
		if($db->FetchRow() >= $amount_lottery){
		
			$db->Query("UPDATE db_users_b SET money_b = money_b - '$amount_lottery' WHERE id = '{$usid}'");
			$db->Query("INSERT INTO db_lottery (user_id, user, all_bil, win_bil, date_add) VALUE ('$usid','$uname','$num_bil','$num_bil','".time()."')");
			$lid = $db->LastInsert();
			
			if( ($lid % $num_bil) == 0){
			
				$add_m = round( ($amount_lottery * $num_bil) - ( ($amount_lottery * $num_bil) * ($com_sys / 100) ),2);
				
				$db->Query("UPDATE db_users_b SET money_b = money_b + '{$add_m}' WHERE id = '{$usid}'");
				$db->Query("UPDATE db_lottery SET win = '1', sum = '$add_m' WHERE id = '$lid'");
				
				echo "<center><b><font color='green'>��� ����� ����������. ��� ��������� {$add_m} ������.</font></b></center><BR />";
				
			}else echo "<center><b><font color='red'>� ���� ��� ��� �� ������� :(</font></b></center><BR />";
			
		}else echo "<center><b><font color='red'>������������ ������� ��� ������� ������</font></b></center><BR />";
		
	}

?>


<center>
<form action="" method="post">
<input type="submit" name="set_lottery" value="������ �����" style="padding:7px;" />
</form>
</center>


<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr>
    <td colspan="5" align="center"><h4>��������� 10 �����������</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">������������</td>
    <td align="center" class="m-tb">����� ��������</td>
	<td align="center" class="m-tb">����</td>
  </tr>
  <?PHP
  
  $db->Query("SELECT * FROM db_lottery WHERE win = '1' ORDER BY id DESC");
  
	if($db->NumRows() > 0){
  
  		while($ref = $db->FetchArray()){
		
		?>
		<tr class="htt">
    		<td align="center"><?=$ref["user"]; ?></td>
    		<td align="center"><?=sprintf("%.2f",$ref["sum"]); ?></td>
			<td align="center"><?=date("d.m.Y",$ref["date_add"]); ?></td>
  		</tr>
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="3">��� �������</td></tr>'
  ?>

  
</table><div class="clr"></div>	


</div>
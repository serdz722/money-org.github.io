<?PHP
$_OPTIMIZATION["title"] = "������� - ���������� �����";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];

# ��������� �������
$bonus_min = 10;
$bonus_max = 100;

?>




<div class="col-md-8">								<div class="s-bk-lf">
									<div class="title">���������� �����</div>
								</div>
								<div class="silver-bk">


<br>
<img src="/img/silver.png" style="padding-right: 10px; width: 120px; float:left; margin-top:-20px;">
<font color = white>
����� �������� 1 ��� � 24 ����. <BR />
����� �������� ������� �� ���� ��� �������. <BR />
����� ������ ������������ �������� �� <b><?=$bonus_min;?></b> �� <b><?=$bonus_max;?></b> ������.
<BR /><BR />

</font>

<?PHP
$ddel = time() + 60*60*24;
$dadd = time();
$db->Query("SELECT COUNT(*) FROM db_bonus_list WHERE user_id = '$usid' AND date_del > '$dadd'");

$hide_form = false;

	if($db->FetchRow() == 0){
	
		# ������ ������
		if(isset($_POST["bonus"])){
		
			$sum = rand($bonus_min, rand($bonus_min, $bonus_max) );
			
			# ��������� ������
			$db->Query("UPDATE db_users_b SET money_b = money_b + '$sum' WHERE id = '$usid'");
			
			# ������ ������ � ������ �������
			
			
			$db->Query("INSERT INTO db_bonus_list (user, user_id, sum, date_add, date_del) VALUES ('$uname','$usid','$sum','$dadd','$ddel')");
			
			# ��������� ������� ���������� �������
			$db->Query("DELETE FROM db_bonus_list WHERE date_del < '$dadd'");
			
			echo "<center><font color = 'white'><b>�� ��� ���� ��� ������� �������� ����� � ������� {$sum} ������</b></font></center><BR />";
			
			$hide_form = true;
			
		}
			
			# ���������� ��� ��� �����
			if(!$hide_form){
?>

<br>
<br>
<form action="" method="post">
<table width="330" border="0" align="center">
  <tbody><tr>
    <td align="center"></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="bonus" value="�������� �����" style="height: 30px; margin-top:10px;"></td>
  </tr>
</tbody></table>
</form>









<?PHP 

			}

	}else echo "<center><font color = 'white'><b>�� ��� �������� ����� �� ��������� 24 ����</b></font></center><BR />"; ?>



<table class="table" align="center" border="0" cellpadding="3" cellspacing="0" width="99%">

  <tr>
    <td colspan="5" align="center"><h4><font color = white>��������� 50 �������</font></h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">ID</td>
    <td align="center" class="m-tb">������������</td>
	<td align="center" class="m-tb">�����</td>
	<td align="center" class="m-tb">����</td>
  </tr>
  <?PHP
  
  $db->Query("SELECT * FROM db_bonus_list ORDER BY id DESC LIMIT 50");
  
	if($db->NumRows() > 0){
  
  		while($bon = $db->FetchArray()){
		
		?>
		<tr class="htt">
    		<td align="center"><?=$bon["id"]; ?></td>
    		<td align="center"><?=$bon["user"]; ?></td>
    		<td align="center"><?=$bon["sum"]; ?></td>
			<td align="center"><?=date("d.m.Y",$bon["date_add"]); ?></td>
  		</tr>
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="5">��� �������</td></tr>'
  ?>

  
</table>
<br><br>
<div class="clr"></div>		
</div>





<?PHP
$_OPTIMIZATION["title"] = "������� - ������������� ����";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];

$um = 11;

$db->Query("SELECT * FROM db_config WHERE id = '1'");
$data_c = $db->FetchArray();
$db->FreeMemory();

# ����������� �������� �� ����� '������������� ����'
$c_date = date("Ymd",time());
$c_date_begin = strtotime($c_date." 00:00:00");
$c_date_end = strtotime($c_date." 23:59:59");

$db->Query("SELECT sum(serebro) FROM db_insert_money WHERE date_add >='".$c_date_begin."' AND  date_add <='".$c_date_end."'");
if($db->NumRows() == 0) $sum_c = 0;
else $sum_c = $db->FetchRow();

if($sum_c == '') $sum_c = 0;
?>



<div class="col-md-8">								<div class="s-bk-lf">
									<div class="title">������������� ����</div>
								</div>
								<div class="silver-bk">


<p align=center><b><font color = white>������ ���� !!!</font></b></p>
<p align=center><b>����� �������� ����� <font color = white><?=$sum_c?></font> �������.</b></p>
<p align=center>
����������� ��� ����������� �� ������ � ������� ��� � ������ ��������, �� ���, <br>��� ����� ���� � ���� ����, ����������� <?=$data_c['percent_back']?>% �� ����� �������� �����.
</p>
<table class="table" align="center" border="0" cellpadding="3" cellspacing="0" width="99%">

  <tr>
    <td colspan="5" align="center"><h4>����������</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb"><b>ID</b></td>
    <td align="center" class="m-tb"><b>����</b></td>	
    <td align="center" class="m-tb"><b>������������</b></td>
	<td align="center" class="m-tb"><b>����</b></td>
	<td align="center" class="m-tb"><b>����</b></td>
  </tr>

<?PHP
$db->Query("SELECT a.id as id, a.sum as sum, a.bank as bank, a.date_add as date_add, b.user as user FROM db_back a LEFT OUTER JOIN db_users_a b ON b.id = a.user_id ORDER BY a.id DESC LIMIT 20");


if($db->NumRows() > 0) {
	$count = 0;
	
	while($bon = $db->FetchArray()) {
		if($count%2 == 0) {
?>
		<tr class="htt">
    		<td align="center"><?=$bon["id"]; ?></td>
    		<td align="center"><?=date("d.m.Y",$bon["date_add"]); ?></td>			
    		<td align="center"><?=$bon["user"]; ?></td>
    		<td align="center"><?=$bon["bank"]; ?></td>
			<td align="center"><?=$bon["sum"]; ?></td>
  		</tr>

<?PHP
		} else {
?>

		<tr class="htt">
    		<td align="center"><?=$bon["id"]; ?></td>
    		<td align="center"><?=date("d.m.Y",$bon["date_add"]); ?></td>			
    		<td align="center"><?=$bon["user"]; ?></td>
    		<td align="center"><?=$bon["bank"]; ?></td>
			<td align="center"><?=$bon["sum"]; ?></td>
  		</tr>

<?PHP
		}
		
		$count ++;
	}
} else echo '<tr><td align="center" colspan=5>��� �������</td></tr>'
?>

</table>
<div class="clr"></div>		
</div>

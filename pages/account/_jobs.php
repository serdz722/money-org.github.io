<div class="section_w500">
<div class="s-bk-lf">
	<div class="acc-title1">����</div>
</div>
<div class="silver-bk0"><div class="clr"></div>
<table cellpadding='0' cellspacing='0' border='0' align='center' width="99%">
<tr>
<?php
	$db->Query("SELECT COUNT(*) FROM `db_jobs` ");
	$alljobs = $db->FetchRow();
	$db->Query("SELECT COUNT(*) FROM `db_jobs` WHERE `done`='1' ");
	$alldone = $db->FetchRow();
	$db->Query("SELECT COUNT(*) FROM `db_jobs` WHERE `accept`='3' ");
	$allcanc = $db->FetchRow();
	$db->Query("SELECT COUNT(*) FROM `db_jobs` WHERE `accept`='0' ");
	$allproc = $db->FetchRow();
?>
<td>�������������:<br/><a href="/account/jobs/info/" class="stn" style="font-weight: normal;">�������� ����������</a><br/><a href="/account/jobs/add/" class="stn" style="font-weight: normal;">�������� �������</a><br/><a href="/account/jobs/my/" class="stn" style="font-weight: normal;">���� �������</a><br/><br/>������������:<br/><a href="/account/jobs/list/" class="stn" style="font-weight: normal;">������ �������</a><br/><a href="/account/jobs/stat/" class="stn" style="font-weight: normal;">����������</a></td>
<td>����������:<br/>����� �������: <?=$alljobs; ?><br/>��������� �������: <?=$alldone; ?><br/>��������� ����������: <?=$allcanc; ?><br/>������� �������������: <?=$allproc; ?></td>
</tr>
</table>
</div>
</div>
<br/>
<?php
$uname = $_SESSION["user"];
$usid = $_SESSION["user_id"];
if(isset($_GET['alljobs'])) {
?>
<div class="section_w500">
<div class="s-bk-lf">
	<div class="acc-title1">������ �������</div>
</div>
<div class="silver-bk0"><div class="clr"></div>
<?php
$db->Query("SELECT * FROM `db_jobs_category` ");
while($data = $db->FetchArray()) {
	$names[$data['id']]=$data['name'];
}

$db->Query("SELECT * FROM `db_jobs` WHERE `done` = '0' AND `accept`='1' ORDER BY `id` DESC LIMIT 30 ");
if($db->NumRows() == 0) {
	echo '������� ����������';
}
while($data = $db->FetchArray()) {
	echo '#'.$data['id'].'. <b>'.$data['name'].'</b> (������ '.$data['pay'].' �������)<br/>';
	echo '<b>��������:</b> ';
	if(strlen($data['about']) > 100) {
		echo substr($data['about'], 0, 100).'...';
	} else echo $data['about'];
	
	echo '<br/><b>���������:</b> '.$names[$data['category']].'<br/>';
	echo '<a href="/account/jobs/show/'.$data['id'].'" class="stn">�������� &gt;&gt;</a>';
	echo '<hr/>';
}
?>
</div>
</div>
<?php
}
else
if(isset($_GET['add'])) {
?>
<div class="section_w500">
<div class="s-bk-lf">
	<div class="acc-title1">�������� �������</div>
</div>
<div class="silver-bk0"><div class="clr"></div>
<?php
$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();
$money = $user_data['money_b'];
if(isset($_GET['save'])) {
	if(preg_match('/^[�-�a-zA-Z�-�0-9.!,\s]{4,180}$/s', $_POST['name'])) {
		$db->Query("SELECT * FROM `db_jobs_category` WHERE `id` = '".intval($_POST['category'])."' ");
		if($db->NumRows() > 0) {
				if(strlen($_POST['about']) > 4 && strlen($_POST['about']) <= 1024) {
				if(strlen($_POST['info']) > 4 && strlen($_POST['info']) <= 1024) {
					if(intval($_POST['period']) >= 0 && intval($_POST['period']) <= 1) {
						if(intval($_POST['pay']) > 0 && $_POST['pay'] < $money) {
							$db->Query("SELECT `time` FROM `db_jobs` WHERE `user` = '$uname' ORDER BY `id` DESC LIMIT 1 ");
							if($db->FetchRow() < time() - 180 || $db->NumRows() == 0) {
								# ���������
								$name = $_POST['name'];
								$period = $_POST['period'];
								$pay = $_POST['pay'];
								$category = $_POST['category'];
								$about = $db->RealEscape(htmlspecialchars($_POST['about']));
								$url = $db->RealEscape(htmlspecialchars($_POST['url']));
								$info = $db->RealEscape(htmlspecialchars($_POST['info']));
								echo "<center><font color = 'grey'><b>���� ������� ������� ���������!</b></font></center><BR />";
								$db->Query("INSERT INTO `db_jobs`(`user`,`name`,`url`,`about`,`info`,`category`,`period`,`pay`,`time`) VALUES('$uname','$name','$url','$about','$info','".mysql_real_escape_string($category)."','$period','$pay','".time()."')");
							} else echo "<center><font color = 'red'><b>������� ����� ��������� ��� � 3 ������!</b></font></center><BR />";
						} else echo "<center><font color = 'red'><b>������ �� ���������� ������� �������!</b></font></center><BR />";
					} else echo "<center><font color = 'red'><b>������������� ������� �������!</b></font></center><BR />";
					} else echo "<center><font color = 'red'><b>���������� ��� ���������� ������� �������!</b></font></center><BR />";
				} else echo "<center><font color = 'red'><b>�������� ������� �������!</b></font></center><BR />";
		} else echo "<center><font color = 'red'><b>��������� ������� �������!</b></font></center><BR />";
	} else echo "<center><font color = 'red'><b>��������� ������ �������!</b></font></center><BR />";
}
?>
<form action="/account/jobs/save/" method="post">
<table width="99%" border="0" align="center">
  <tr>
    <td><font color="#000;">���������</font></td>
	<td><input type="text" name="name" style="width: 100%;"/></td>
  </tr>
  <tr>
    <td><font color="#000;">���������</font></td>
	<td><select name="category">
	<?php
	$db->Query("SELECT * FROM `db_jobs_category` ");
	while($job = $db->FetchArray()) {
		echo '<option value="'.$job['id'].'">'.$job['name'].'</option>';
	}
	?>
	</select></td>
  </tr>
  <tr>
    <td><font color="#000;">URL ����������</font></td>
	<td><input type="text" name="url" value="http://" style="width: 100%;"/></td>
  </tr>
  <tr>
    <td><font color="#000;">��������</font></td>
	<td><textarea name="about" style="width: 100%; height: 100px;"/></textarea></td>
  </tr>
  <tr>
    <td><font color="#000;">���������� ��� ����������</font></td>
	<td><textarea name="info" style="width: 100%; height: 100px;"/></textarea></td>
  </tr>
  <tr>
    <td><font color="#000;">�������������</font></td>
	<td><select name="period">
		<option value="0">����������</option>
		<option value="1">�����������</option>
	</select></td>
  </tr>
  <tr>
    <td><font color="#000;">������ �� ����������</font></td>
	<td><input type="text" name="pay" value="0" style="width: 100%;"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="swap" value="��������" style="height: 30px; margin-top:10px;" /></td>
  </tr>
</table>
</form>
</div>
</div>
<?php
}
else
if(isset($_GET['statuse'])) {
?>
<div class="section_w500">
<div class="s-bk-lf">
	<div class="acc-title1">���������� ����������</div>
</div>
<div class="silver-bk0"><div class="clr"></div>
<?php
$db->Query("SELECT COUNT(*) FROM `db_jobs_use` WHERE `user`='$uname' ");
$count = $db->FetchRow();
if($count == 0) {
	echo '�� �� ��������� �������';
}
else
{
	$db->Query("SELECT COUNT(*) FROM `db_jobs_use` WHERE `user`='$uname' AND `pay`='0' ");
	$proc = $db->FetchRow();
	$done = $count - $proc;
	echo '����� �������� �������: '.$count.'<br/>����� ���������� �������: '.$done.'<br/>������� � ���������: '.$proc;
}
?>
</div>
</div>
<?php
}
else
if(isset($_GET['show'])) {
?>
<div class="section_w500">
<div class="s-bk-lf">
	<div class="acc-title1">������ �������</div>
</div>
<div class="silver-bk0"><div class="clr"></div>
<?php
$db->Query("SELECT * FROM `db_jobs` WHERE `id`='".intval($_GET['show'])."' AND `accept`='1' AND `done`='0' ");
$job = intval($_GET['show']);
if($db->NumRows() == 0) {
	echo '������ ������� �� ����������!';
}
else
{
	$arr = $db->FetchArray();
	if(isset($_POST['done'])) {
		$db->Query("SELECT COUNT(*) FROM `db_jobs_use` WHERE `user`='$uname' AND `pay` = '0' ");
		if($arr['user'] != $uname) {
		if($db->FetchRow() == 0) {
		$db->Query("SELECT COUNT(*) FROM `db_jobs_use` WHERE `id_job`='$job' ");
		$dones = $db->FetchRow();
		$db->Query("SELECT `period` FROM `db_jobs` WHERE `id`='$job' ");
		$type = $db->FetchRow();
		if(($dones == 0 && $type == 0) || ($type == 1)) {
		if(strlen($_POST['done']) > 4 && strlen($_POST['done']) <= 1024) {
			$done = $db->RealEscape(htmlspecialchars($_POST['done']));
			echo "<center><font color = 'grey'><b>���� ������ ������� ����������!</b></font></center><BR />";
			$db->Query("INSERT INTO `db_jobs_use`(`id_job`,`user`,`message`,`pay`) VALUES('$job','$uname','$done','0')");
		} else echo "<center><font color = 'red'><b>����� ������������� ���������� ������ �������!</b></font></center><BR />";
		} else echo "<center><font color = 'red'><b>������ ������� ��� ���� ���������!</b></font></center><BR />";
		} else echo "<center><font color = 'red'><b>�� ��� �������� ������ �� ����������! ��������� �� ������������.</b></font></center><BR />";
		} else echo "<center><font color = 'red'><b>��� ���� ������!</b></font></center><BR />";
	}
	$db->Query("SELECT `name` FROM `db_jobs_category` WHERE `id`='$arr[category]' ");
	$category = $db->FetchRow();
	?>
	<table width="99%" border="0" align="center">
	<?php
	echo '<tr><td colspan="2" align="center"><span style="color: rgb(96, 145, 67);">#'.$arr['id'].'. '.$arr['name'].'</span></td></tr><tr><td><br/></td></tr><tr><td align="right" width="50%"><font color="#000">�����: </td><td>'.$arr['user'].'</td></tr><tr><td align="right" width="50%">������:</td><td>'.$arr['pay'].'</td></tr><tr><td align="right" width="50%">���������:</td><td width="50%">'.$category.'</font></td></tr><tr><td><br/></td></tr><tr><td colspan="2" align="center"><span style="color: rgb(96, 145, 67);"><b>��������:</b></span></td></tr><tr><td colspan="2" align="left"><span style="color: rgb(96, 145, 67);">'.$arr['about'].'</span></td></tr><tr><td></td></tr><tr><td colspan="2" align="center"><span style="color: rgb(96, 145, 67);"><b>���������� ��� ����������:</b></span></td></tr><tr><td colspan="2" align="left"><span style="color: rgb(96, 145, 67);">'.$arr['info'].'</span></td></tr><tr><td><br/></td></tr><tr><td colspan="2" align="center"><span style="color: rgb(96, 145, 67);"><b>����������:</b></span></td></tr><tr><td colspan="2" align="center" style="cursor: pointer;" onclick="window.open(\''.$arr['url'].'\',\'\');">���������� � ����������</td></tr><tr><td></td></tr><form action="" method="post"><tr><td colspan="2" align="center"><textarea name="done" style="width: 100%; height: 100px;"></textarea></td></tr><tr><td colspan="2" align="center"><input type="submit" value="����������� ����������"/></td></tr></form>';
}
?>
</table>
</div>
</div>
<?php
}
else
if(isset($_GET['info'])) {
?>
<div class="section_w500">
<div class="s-bk-lf">
	<div class="acc-title1">�������� ����������</div>
</div>
<div class="silver-bk0"><div class="clr"></div>
<?php
$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();
$money = $user_data['money_b'];
if(isset($_POST['pay_here']) && is_numeric($_POST['pay_here'])) {
	$payed = intval($_POST['pay_here']);
	$db->Query("SELECT `id_job` FROM `db_jobs_use` WHERE `pay` = '0' AND `id` = '$payed' ");
	if($db->NumRows() > 0) {
		$payed2 = $db->FetchRow();
		$db->Query("SELECT `pay` FROM `db_jobs` WHERE `id` = '$payed2' AND `user` = '$uname' AND `accept`='1' LIMIT 1 ");
		$sum = $db->FetchRow();
		if($sum < $money) {
		$db->Query("SELECT `id_job` FROM `db_jobs_use` WHERE `pay` = '0' AND `id` = '$payed' ");
		if($db->NumRows() > 0) {
			$db->Query("SELECT `user` FROM `db_jobs_use` WHERE `pay` = '0' AND `id_job` = '$payed' LIMIT 1 ");
			$to = $db->FetchRow();
			$db->Query("SELECT `period` FROM `db_jobs` WHERE `pay` = '0' AND `id` = '$payed2' LIMIT 1 ");
			$per = $db->FetchRow();
			$db->Query("UPDATE db_users_b SET money_b = money_b - '$sum' WHERE user = '$uname' ");
			$db->Query("UPDATE db_users_b SET money_b = money_b + '$sum' WHERE user = '$to' ");
			$db->Query("UPDATE `db_jobs_use` SET `pay`='1' WHERE `id` = '$payed' ");
			if($per == 0) {
				$db->Query("UPDATE `db_jobs` SET `done` = '1' WHERE `id`='$payed2' ");
			}
			echo "<center><font color = 'grey'><b>������ ������� �������!</b></font></center><BR />";
		}
		} else echo "<center><font color = 'red'><b>� ��� ������������ �������!</b></font></center><BR />";	
	}
}
else
if(isset($_POST['del_here']) && is_numeric($_POST['del_here'])) {
	$payed = intval($_POST['del_here']);
	$db->Query("SELECT `id_job` FROM `db_jobs_use` WHERE `pay` = '0' AND `id` = '$payed' ");
	if($db->NumRows() > 0) {
		$payed2 = $db->FetchRow();
		$db->Query("SELECT `pay` FROM `db_jobs` WHERE `id` = '$payed' AND `user` = '$uname' AND `accept`='1' LIMIT 1 ");
		if($db->NumRows() > 0) {
			$sum = $db->FetchRow();
			$db->Query("UPDATE `db_jobs_use` SET `pay`='2' WHERE `id` = '$payed' ");
			echo "<center><font color = 'grey'><b>������ ������� ��������!</b></font></center><BR />";
		}
	}
}
$db->Query("SELECT * FROM `db_jobs_category` ");
while($data = $db->FetchArray()) {
	$names[$data['id']]=$data['name'];
}
$db->Query("SELECT * FROM `db_jobs` WHERE `user` = '$uname' ");
if($db->NumRows() == 0) {
	echo '������� ����������';
}
while($sdata = $db->FetchArray()) {
	$sdatas[] = $sdata;
}
for($i=0;$i<count($sdatas);$i++) {
	$wname = $sdatas[$i]['id'];
	$db->Query("SELECT * FROM `db_jobs_use` WHERE `pay` = '0' AND `id_job` = '$wname' LIMIT 30 ");
	while($data = $db->FetchArray()) {
	
	echo '#'.$sdatas[$i]['id'].'. <b>'.$sdatas[$i]['name'].'</b> (������ '.$sdatas[$i]['pay'].' �������)<br/>';
	echo '<b>���������:</b> '.$data['message'];
	echo '<br/><b>���������:</b> '.$names[$sdatas[$i]['category']];
	?>
	<form action="" method="post">
	<input type="hidden" name="pay_here" value="<?=$data["id"]; ?>" />
	<input type="submit" value="��������" /><br/>
	</form>
	<form action="" method="post">
	<input type="hidden" name="del_here" value="<?=$data["id"]; ?>" />
	<input type="submit" value="��������" />
	</form>
	<?php
	echo '<hr/>';
}
}
?>
</div>
</div>
<?php
}
else
if(isset($_GET['mylist'])) {
?>
<div class="section_w500">
<div class="s-bk-lf">
	<div class="acc-title1">���� �������</div>
</div>
<div class="silver-bk0"><div class="clr"></div>
<?php
$db->Query("SELECT * FROM `db_jobs_category` ");
while($data = $db->FetchArray()) {
	$names[$data['id']]=$data['name'];
}
$db->Query("SELECT * FROM `db_jobs` WHERE `user` = '$uname' AND `accept`='1' ORDER BY `id` DESC LIMIT 30 ");
if($db->NumRows() == 0) {
	echo '������� ����������';
}
if(isset($_POST['del_here']) && is_numeric($_POST['del_here'])) {
	$payed = intval($_POST['del_here']);
	$db->Query("SELECT COUNT(*) FROM `db_jobs` WHERE `user` = '$uname' AND `id` = '$payed' AND `accept`='1' ");
	if($db->FetchRow() > 0) {
		$db->Query("DELETE FROM `db_jobs` WHERE `id` = '$payed' ");
		$db->Query("DELETE FROM `db_jobs_use` WHERE `id_job` = '$payed' ");
		echo "<center><font color = 'grey'><b>������ ������� ��������!</b></font></center><BR />";
	}
}

if(isset($_POST['save_here']) && is_numeric($_POST['save_here'])) {
	$payed = intval($_POST['save_here']);
	$db->Query("SELECT COUNT(*) FROM `db_jobs` WHERE `user` = '$uname' AND `id` = '$payed' AND `accept`='1' ");
	if($db->FetchRow() > 0) {
		$db->Query("UPDATE `db_jobs` SET `done`='1' WHERE `id` = '$payed' ");
		echo "<center><font color = 'grey'><b>������ ������� ���������!</b></font></center><BR />";
	}
}
$db->Query("SELECT * FROM `db_jobs` WHERE `user` = '$uname' AND `accept`='1' ORDER BY `id` DESC LIMIT 30 ");
while($data = $db->FetchArray()) {
	echo '#'.$data['id'].'. <b>'.$data['name'].'</b> (������ '.$data['pay'].' �������)<br/>';
	echo '<b>��������:</b> ';
	if(strlen($data['about']) > 100) {
		echo substr($data['about'], 0, 100).'...';
	} else echo $data['about'];
	
	echo '<br/><b>���������:</b> '.$names[$data['category']].'<br/>';
	if($data['done'] == 0 && $data['period'] == 0) {
	?>
	<form action="" method="post">
	<input type="hidden" name="del_here" value="<?=$data["id"]; ?>" />
	<input type="submit" value="��������" />
	</form>
	<?php
	}
	else if($data['done'] == 0 && $data['period'] == 1) {
	?>
	<form action="" method="post">
	<input type="hidden" name="save_here" value="<?=$data["id"]; ?>" />
	<input type="submit" value="���������" />
	</form>
	<?php
	}
	else
	{
		echo '<font color="grey">���������!</font>';
	}
	echo '<hr/>';
}
?>
</div>
</div>
<?php
}
?>
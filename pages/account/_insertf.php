<script type="text/javascript" src="/js/jquery.js"></script>

<div class="col-md-8">								<div class="s-bk-lf">
									<div class="title">���������� �����</div>
								</div>
								<div class="silver-bk"><br><br>
<?PHP
$_OPTIMIZATION["title"] = "���������� c ������� WebMoney";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

$db->Query("SELECT id FROM `db_payeer_insert`order by id desc limit 1");
if ($db->NumRows()!=0)
{ 
	$res =  $db->FetchArray();
	$last_id = $res['id'];
} else $last_id='0';
$last_id++;

?>

<div class="silver-bk">
<font color = 'black'>
<BR />

<font color = white>
<p><center><img src="/img/wm.png" /></center></p>
<p>���� ������� ������: 1 ����� (<?=$config->VAL; ?>) = <?=$sonfig_site["ser_per_wmr"]; ?> ������.</p>
<p>������ � ���������� ������ �� ������ ������������ � ������ ������.</p> 
<p>
��� ���������� �� 1 �� 2499� -  <b>50%</b> �� ����� � �������!<br>

��� ���������� �� 2500�. -  <b>100%</b> �� ����� � �������!<br>

��� ���������� �� 5000� -  <b>200%</b> �� ����� � �������!<br>

<BR />
<p>��� ����������
<ul>
<li>������� � ���� WM ������� (�����)</li>
<li>���������� ����� �� 1 ����� �� ������� <strong>R2(�� ��������!!!)</strong></li>
<li>� ���������� � ������� ������� <strong>""��� ��� � ����"</strong></li>
<li>����� �������� � ������� 5-120 ����� (������ ������� ������) ��� ����� ��������� ������</li>
<li>���� �� �������� � ����������� � ������� ��������� ��� ��� � ������� � �������� ���������� ������ �� ����� <strong>��. ������ ��������</strong></li>
</p>
<BR />

</center>
<BR /><BR /></font>

<div class="clr"></div>		
</div></div>


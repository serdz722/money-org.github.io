<?PHP
$_OPTIMIZATION["title"] = "�����������";
$_OPTIMIZATION["description"] = "����������� ������������ � �������";
$_OPTIMIZATION["keywords"] = "����������� ������ ��������� � �������";

if(isset($_SESSION["user_id"])){ Header("Location: /account"); return; }
?>
	



<div class="kurwa">
									<font color="#FFFFF"><div class="title">����������� � ����</div>
								
								<div class="silver-bk">








<?PHP
	
	# �����������

	if(isset($_POST["login"])){
	
	if(isset($_SESSION["captcha"]) AND strtolower($_SESSION["captcha"]) == strtolower($_POST["captcha"])){
	unset($_SESSION["captcha"]);

	$login = $func->IsLogin($_POST["login"]);
	$pass = $func->IsPassword($_POST["pass"]);
	$rules = isset($_POST["rules"]) ? true : false;
	$time = time();
	$ip = $func->UserIP;
	$ipregs = $db->Query("SELECT * FROM `db_users_a` WHERE INET_NTOA(db_users_a.ip) = '$ip' ");
	$ipregs = $db->NumRows();

	$email = $func->IsMail($_POST["email"]);
	$referer_id = (isset($_COOKIE["i"]) AND intval($_COOKIE["i"]) > 0 AND intval($_COOKIE["i"]) < 1000000) ? intval($_COOKIE["i"]) : 1;
	$referer_name = "";
	if($referer_id != 1){
		$db->Query("SELECT user FROM db_users_a WHERE id = '$referer_id' LIMIT 1");
		if($db->NumRows() > 0){$referer_name = $db->FetchRow();}
		else{ $referer_id = 1; $referer_name = "test"; }
	}else{ $referer_id = 1; $referer_name = "test"; }
	
		if($rules){
			if($ipregs >= 0) {

			if($email !== false){
		
			if($login !== false){
			
				if($pass !== false){
			
					if($pass == $_POST["repass"]){
						
						$db->Query("SELECT COUNT(*) FROM db_users_a WHERE user = '$login'");
						if($db->FetchRow() == 0){
						
						# ������ ������������
						$db->Query("INSERT INTO db_users_a (user, email, pass, referer, referer_id, date_reg, ip) 
						VALUES ('$login','{$email}','$pass','$referer_name','$referer_id','$time',INET_ATON('$ip'))");
						
						$lid = $db->LastInsert();
						
						$db->Query("INSERT INTO db_users_b (id, user, a_t, money_b, last_sbor) VALUES ('$lid','$login','1','50', '".time()."')");
						
						# ��������� ����������
						$db->Query("UPDATE db_stats SET all_users = all_users +1 WHERE id = '1'");
						$db->Query("UPDATE db_users_b SET money_b = money_b+10 WHERE id = '$referer_id'");
						
						echo "<center><b><font color = 'green'>�� ������� ������������������. ����������� ����� ����� ��� ����� � �������</font></b></center><BR />";
						?></div>
						<div class="clr"></div>	
						<?PHP
						return;
						}else echo "<center><b><font color = 'red'>��������� ����� ��� ������������</font></b></center><BR />";
						
					}else echo "<center><b><font color = 'red'>������ � ������ ������ �� ���������</font></b></center><BR />";
			
				}else echo "<center><b><font color = 'red'>������ �������� �������</font></b></center><BR />";
			
			}else echo "<center><b><font color = 'red'>����� �������� �������</font></b></center><BR />";

		}else echo "<center><font color = 'red'><b>Email ����� �������� ������</b></font></center>";
		
		}else echo "<center><font color = 'red'><b>����������� � ����� IP ��� �������������</b></font></center>";

		}else echo "<center><b><font color = 'red'>�� �� ����������� �������</font></b></center><BR />";
	
		}else echo "<center><font color = 'red'><b>������� � �������� ������� �������</b></font></center>";

	}
	
	
?>


<BR />
<form action="" method="post">
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" style="padding:3px;">��� ���������: <font color="#FF0000">*</font></td>
    <td align="left" style="padding:3px;"><input name="login" type="text" size="25" maxlength="10" value="<?=(isset($_POST["login"])) ? htmlspecialchars($_POST["login"]) : false; ?>"/></td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="padding:3px;">���� ��������� ������ ����� �� 4 �� 10 �������� (������ ����. �������).</td>
    </tr>
<tr>
    <td align="left" style="padding:3px;">Email: <font color="#FF0000">*</font></td>
    <td align="left" style="padding:3px;"><input name="email" type="text" size="25" maxlength="50" value="<?=(isset($_POST["email"])) ? htmlspecialchars($_POST["email"]) : false; ?>"/></td>
  </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
    </tr>
  <tr>
    <td align="left" style="padding:3px;">������: <font color="#FF0000">*</font></td>
    <td align="left" style="padding:3px;"><input name="pass" type="password" size="25" maxlength="20" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="padding:3px;">���� ������ ������ ����� �� 6 �� 20 �������� (������ ����. �������).</td>
    </tr>
  <tr>
    <td align="left" style="padding:3px;">������ ��� ���: <font color="#FF0000">*</font></td>
    <td align="left" style="padding:3px;"><input name="repass" type="password" size="25" maxlength="20" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="padding:3px;">������ ������ ���������.</td>
    </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="padding:3px;">
	� <a href="/rules" target="_blank" class="stn">���������</a> ������� ����������(�) � ��������: <input name="rules" type="checkbox" /></td>
  </tr>
<tr>
    <td align="left" style="padding:3px;">
	<a href="#" onclick="ResetCaptcha(this);"><img src="/captcha.php?rnd=<?=rand(1,10000); ?>"  border="0" style="margin:0;"/></a>
	</td>
    <td align="left" style="padding:3px;">������� ������� � ��������<input name="captcha" type="text" size="25" maxlength="50" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="padding:3px;"><input name="registr" type="submit" value="������������������" style="height: 30px;"></td>
  </tr>
</table>
</form>

</div></font>
<div class="clr"></div>	</div>
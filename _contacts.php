<?PHP
######################################
# ���������� ������������� ���
# �����:  www.seocola.ru
# ICQ: 614-936
# �����: SEOCOLA@YANDEX.RU   �����: SEOCOLA
######################################
$_OPTIMIZATION["title"] = "��������";
$_OPTIMIZATION["description"] = "����� � ��������������";
$_OPTIMIZATION["keywords"] = "����� � �������������� �������";
?>





	


<div class="col-md-8">								
<div class="s-bk-lf">




									
<div class="title">���� ��������</div>
								</div>



<br>
<br>
<font color = white>
<p><H4>���� <��������> ������ � ���� ��������� �������������� � ������� ����� ����� ���������� � �������������� �������. ��������� ��������� �� ������, ����� �� ������ <��������> � ����� �������� ������ ��������.</H4></font>
</br>
								<div class="silver-bk">






<?PHP

$db->Query("SELECT contacts FROM db_conabrul WHERE id = '1'");
$xt = $db->FetchRow();
echo $xt;
?>
</div>
<div class="clr"></div>	
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
        <title>�������� �����</title>

        <style type="text/css">
            @import url('assets/css/contact.css');
            @import url('assets/css/lay.css');
        .style1 {color: #FFFFFF}
        </style>

        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/js/js.js"></script>

    </head>
    <body>
        <div id="contact">
            <div id="top">
                <h1>�������� ���</h1>
            </div>
            <div id="center">
        <div id="contact_form">
            <form method="post" action="assets/php/send.php" id="contactForm">
                <div class="error" id="error">��������� ������, ��������� �� ����� ���� ����������!</div>
                <div class="success" id="success">��������� ������� ����������!<br />�������.</div>

                    <span class="input">
<label for="name"><b>���� ���:</b> </label>
<input  type="text" id="name" name="name" />
<div class="warning" id="nameError">��� ���� ����������� ��� ����������</div>
</span>

<span class="input">
<label for="email"><b>��� Email:</b> </label>
<input  type="text" id="email" name="email" />
<div class="warning" id="emailError">������� ���������� email!</div>
</span>

<span class="input">
<label for="sales"><b>����:</b> </label>
<select id="sales" name="sales">
<option value="Support">���������� � ���������</option>
<option value="Sales">�������</option>
<option value="input means">���� �������</option>
<option value="withdraw funds">����� �������</option>
<option value="Other">������</option>
</select>
</span>

<span class="input">
<label for="message"><b>���� ���������:</b> </label>
<textarea id="message" name="message">������������,
</textarea>
<div class="warning" id="messageError">��� ���� ����������� ��� ����������</div>
</span>

<span class="input">
<label for="security_code"><b>�����:</b> </label>
<input class="noicon" type="text" id="security_code" name="security_code" style="width:100px" />
<img src="assets/php/security/1/sec.php" style="vertical-align:middle;" />
<div class="warning" id="security_codeError">����� ������� �������!</div>
</span>
                    <span id="submit" class="input">
                    <label for="submit"></label>
                    <p id="ajax_loader" style="text-align:center;"><img src="assets/img/contact/ajax-loader.gif" /></p>
                    <input id="send" type="submit" value="��������� ������!" />
                    </span>

                </form>
                </div>
            </div>
            <div id="bot"><!--bottom--></div>
  
        </div>
        <div align="center"><br>
          </div>
</body>
</html>



<br/>
<font color = yellow><center><H3>�� �������� ���������� ����� ������� � ���!</H3></center></font>
<center><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script><div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir"></div> </center>
 
<br/>
<br/>

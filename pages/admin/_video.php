<div class="s-bk-lf">
	<div class="acc-title">Видео конкурс</div>
</div>
<div class="silver-bk">
<font color = "black">
<?php





if(isset($_SESSION['user_id'])){
if(isset($_POST['ans_go'])){
$id_m = htmlspecialchars($_POST['id_mes'], ENT_QUOTES, 'windows-1251');
$date = time();
$ans = htmlspecialchars($_POST['ans'], ENT_QUOTES, 'windows-1251');
$db->Query("INSERT INTO `adm` (`id_mes`,`user`,`text`,`date`)VALUES('$id_m','$_SESSION[user]','$ans','$date')") or die(mysql_error());
echo "<span id='erorr'  class='msgbox-error'>Видео успешно принято в обработку.</span>";

$db->Query("UPDATE video SET status='0' WHERE id='$id_m'");

}




if(isset($_POST['submit_rit'])){
$tima = htmlspecialchars($_POST['title_g'], ENT_QUOTES, 'windows-1251');



$sod = htmlspecialchars($_POST['post_g'], ENT_QUOTES, 'windows-1251');
if($tima==""){$err[] = '<font color = "red">Заполните поле "Название вашего видео"</font>';}
elseif($sod==""){$err[] = '<font color = "red">Заполните поле ссылки на видео</font>';}
$date = time();
if(empty($err)){
$db->Query("INSERT INTO `video` (`user`,`title`,`text`,`date`,`status`)VALUES('$_SESSION[user]','$tima','$sod','$date','0')") or die(mysql_error());
echo "<span id='erorr'  class='msgbox-error'>Видео успешно принято в обработку.</span>";
$from = $_SESSION[user];
$mail = "support@golden-bird.pro";
$sub = "Новое видео";
$mes = "Новое видео от пользователя $from \nТема : $tima \nСодержание : $sod";
mail ($mail,$sub,$mes,"Content-type:text/plain;\r\nFrom:$from");
}else{
foreach($err AS $error)
echo "<span id='erorr'  class='msgbox-error'>".$error."</span>";

}
}
?>
		
					<script type="text/javascript" language="JavaScript">
            $(document).ready(function(){
                $("#addreply").click(function(){
                    $("#replyblock").fadeIn("slow");
                    document.getElementById('replybtn').innerHTML = "<span class='button-gray'>Ответить</span>";
                });
            })
            function appendtag(text1, text2)
            {
                if ((document.selection))
                {
                    document.surforder.ask_desc.focus();
                    document.surforder.document.selection.createRange().text = text1+document.surforder.document.selection.createRange().text+text2;
                } else if(document.surforder.ask_desc.selectionStart != undefined) {
                    var element    = document.surforder.ask_desc;
                    var str     = element.value;
                    var start    = element.selectionStart;
                    var length    = element.selectionEnd - element.selectionStart;
                    element.value = str.substr(0, start) + text1 + str.substr(start, length) + text2 + str.substr(start + length);
                } else document.surforder.ask_desc.value += text1+text2;
            }
            function showclose()
            {
                $('#basic-modal-content').modal();
                return false;
            }            
        </script>
<script type='text/javascript' src='/js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='/js/guibasic.js'></script>
<script type="text/javascript" language="JavaScript">
            function ClearForm()
            {
                document.forms['mailform'].scount.value = 'Осталось 1500 символов';
            }
            function descchange(elem)
            {
                if (elem.value.length > 1500) {
                    elem.value = elem.value.substr(0,1500);
                }
                document.forms['mailform'].scount.value = 'Осталось '+(1500-elem.value.length)+' символов';
            }

        </script>

		
     
              
                         
		  
			
	
		
<?if(empty($_GET['type']) and empty($_GET['tiketid'])){?>

<font color = "black">


<br>
<form>
</form>

              <div class="tab-pane active" id="create-ticket">
              <div class="row-fluid" style="">
                <div class="span12">
				<tr>
<p>&nbsp;<span style="white-space: pre;"> </span><a class="irc_mil" href="http://golden-bird.pro/?menu=video"><img class="irc_mi" src="http://ibpromotion.com.ua/blog/wp-content/uploads/2014/07/youtube.png" alt="" width="256" height="256"></a></p>
<h3>Условия конкурса очень просты:</h3>
<p>Ваша задача снять ролик, которой каким-либо образом связан с нашим проектом.</p>
<p>Это может быть:<br>- видео-обзор сайта с отзывом,&nbsp;<br>- ваша рецензия проекта<br>- вы можете рассказать в нем о ваших достижениях либо использовать свою фантазию, например снять смешной ролик.</p>
<p><strong>Подробнее о конкурсе</strong>&nbsp;читайте в новостях.</p></td>
<p><strong>Для участия в конкурсе</strong>&nbsp;Заполните форму ниже.</p></td>
</tr>
                  <center><label class="control-label" for="title">Название вашего видео:</label></center>
				  
                </div>
              </div>
              <div class="row-fluid" style="">
                <div class="span12">
<form name="mailform" id="mailform" method="POST" action="">
<center><input size='40' type="text" name="title_g" value=''></center>
                </div>
              </div>
              
              <div class="row-fluid">
                <div class="span12">

<br><h3>Вы получите <font color="red"><b>10000 САХАРА </b></font> на баланс за добавленное видео!</h3></center>
<br>
<center>(<font color="blue">Пользователи, которые отправляют чужие видео, видео не связанные с проектом и просто всякий мусор,  будут забанены на проекте.</a>)</center></font></label>
 <center>(<font color="blue">Важно! Под видео обязательно оставить ссылку на проект (можете вашу реферальную).</a>)</center></font></label>

 <label class="control-label" for="inputMessage"><center>Вставьте URL(ссылку) на ваше видео и нажмите отправить.
                </div>
              </div>
              <div class="row-fluid">
                <div class="span12">
                  <center><textarea class="input-block-level" name="post_g" rows="2" cols='25' onkeyup="descchange(this);"  placeholder=""></textarea></center>
                </div>
              </div>

              <div class="row-fluid">
                <div class="span12">
 <br>
<center><input class="btn btn-large btn-block" type='submit' name='submit_rit' value='Отправить' style="margin-top: 10px;" /> </center>
</form>
			
				  
				  </div>
                </div>
              </div>
<?}if(isset($_GET['type'])and empty($_GET['tiketid'])){?>
<div class="silver-bk">
<table cellpadding='3' cellspacing='0' border='0'  align='center' width="550" BGCOLOR="#FCF6C2" >
<thead>
	<tr style='background:#804040; '>
		
		<td style='border-radius:0px;color:#fff; text-align:center;'>
			Тема
		</td>
		
		<td style='border-radius:0px;color:#fff; text-align:center;'>
			Дата
		</td>
	<td style='border-radius:0px;color:#fff; text-align:center;'>
			Статус
		</td>	

	</tr>
</thead>
<tbody>
</div>
<?
		$sup = $db->Query("SELECT id,title,date,status FROM video WHERE user='$_SESSION[user]'  ORDER BY id DESC")or die(mysql_error());
while($_sup=$db->FetchArray($sup)){
if($_sup['status']=='0'){$ot = 'В очереди';}else{$ot = 'Прочитано';}
?>

	<tr><td style='text-align:center;'><a href="/?menu=video&tiketid=<?=$_sup['id']?>"><?=$_sup['title']?></a></td>
	<td style='text-align:center;'><?=date('M-d-Y h:i',$_sup['date'])?></td><td style='text-align:center;'><?=$ot?></td><td></td>
	
	</tr>

<?}?>
</tbody>	
</table>


<?}
if(!empty($_GET['tiketid'])) {
$tid = htmlspecialchars($_GET['tiketid'], ENT_QUOTES, 'windows-1251');

?>
<div class="silver-bk">
<font color = "black">

<?
$md = $db->Query("SELECT id,user,text,date FROM  video WHERE id='$tid'")or die(mysql_error());
$remd= $db->FetchArray($md);
$idd  = $remd['id'];
$user = $remd['user'];
$textd  = $remd['text'];
$dat  = $remd['date'];

if ($_SESSION['user'] == $user) {

	
?>
<center>
<div style='border:1px solid #660066;border-radius:5px; padding:3px; background:#fff;'>
<div><b><?=$_SESSION['user']?></b>&nbsp;&nbsp;(<?=date('M-d-Y h:i',$dat)?>)</div>
<hr>
<div style='min-height:40px;'><?=$textd?></div>
</div><br>
<?$md2 = $db->Query("SELECT user,text,date FROM adm WHERE id_mes='$idd' ORDER BY id ASC")or die(mysql_error());
if (1) {
while($remd2= $db->FetchArray($md2)){
$idd2  = $remd2['id'];
$textd2  = $remd2['text'];
$dat2  = $remd2['date'];			
?>
<div style='border:1px solid #660066;border-radius:5px; padding:3px; background:#fff;'>
<div><b><?=$remd2['user']?></b>&nbsp;&nbsp;(<?=date('M-d-Y h:i',$dat2)?>)</div>
<hr>
<div style='min-height:40px;'><?=$textd2?></div>
</div><br>

<?
}
} else {?>

<p style="color: red;">Результат отсутствует...</p>

<?php
}
?>

</center>
<br>
<center>
<form method="post" action="">
Ответить<br>
<textarea name="ans" rows="6" cols="50"></textarea><br><br>
<input type="hidden" name="id_mes" value='<?=$idd?>'>
<input type="submit" name='ans_go' value="Отправить" onclick="">
</form>
</center>
<?
} else {
?>
<p style="color: red;">Просмотр запрещен..</p>
<?php
}
}
?>



              </div>



<br><br>
<?php
// Ниже видео
?>


   <div id="push"></div>
    </div>

<?
}else{
?>

<div class="cl-right">


<script type="text/javascript">


function isNotMax(oTextArea) {
  return oTextArea.value.length <= oTextArea.getAttribute('maxlength');
}


function isNotMax(e){
  e = e || window.event;
  var target = e.target || e.srcElement;
  var code=e.keyCode?e.keyCode:(e.which?e.which:e.charCode)

  switch (code){
    case 13:
    case 8:
    case 9:
    case 46:
    case 37:
    case 38:
    case 39:
    case 40:
      return true;
  }
  return target.value.length <= target.getAttribute('maxlength');
}


</script>



<font color = "blue">Войдите в свой аккаунт!</font>
</div>
<div class="clr"></div>
<!--<script id="_wauglh">var _wau = _wau || [];
_wau.push(["tab", "3q5r7800udvb", "glh", "right-middle"]);
(function() {var s=document.createElement("script"); s.async=true;
s.src="http://widgets.amung.us/tab.js";
document.getElementsByTagName("head")[0].appendChild(s);
})();</script>-->

</font>
</font>
</font>
<tr>


							<div class="clr"></div>
							</div>
							











<?


/*echo 'Помощь доступна только авторизированным участникам.';*/
}	
?>
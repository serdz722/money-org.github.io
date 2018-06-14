<?PHP
######################################
# РАЗРАБОТКА ЭКОНОМИЧЕСКИХ ИГР
# АВТОР:  www.seocola.ru
# ICQ: 614-936
# ПОЧТА: SEOCOLA@YANDEX.RU   СКАЙП: SEOCOLA
######################################
$_OPTIMIZATION["title"] = "Новости";
$_OPTIMIZATION["description"] = "Новости проекта";
$_OPTIMIZATION["keywords"] = "Новости нашего проекта";
?>









	




<?PHP

$db->Query("SELECT * FROM db_news ORDER BY id DESC");

if($db->NumRows() > 0){

	while($news = $db->FetchArray()){
	
	?>




<div class="col-md-8" style="padding:0px">
	<div class="title"></div>
	
	<div class="bg_blue clearfix">
		<div class="point">&nbsp;</div>
		<div class="text">




		<td align="left"><h4><?=$news["title"]; ?></h4></td>
		</div>
		<div class="one_point">


<tr>
    <td colspan="2"><?=$news["news"]; ?></td>
  </tr>

</div>
	

</div>

            
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left"><h4><?=$news["title"]; ?></h4></td>
    <td align="right"><strong><?=date("d.m.Y",$news["date_add"]); ?></strong></td>
  </tr>

  <tr>
    <td colspan="2"><?=$news["news"]; ?></td>
  </tr>
</table> 
<BR />
	<?PHP
	
	}

}else echo "<center>Новостей нет :(</center>";

?>
</div>
<div class="clr"></div>	


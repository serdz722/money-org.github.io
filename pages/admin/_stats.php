<font color = white>

<div class="col-md-8">								<div class="s-bk-lf">
									<div class="title">Статистика проекта</div>
								</div>
								<div class="silver-bk"><br><br>
<?PHP

$db->Query("SELECT 
	COUNT(id) all_users, 
	SUM(money_b) money_b, 
	SUM(money_p) money_p, 
	
	SUM(a_t) a_t, 
	SUM(b_t) b_t, 
	SUM(c_t) c_t, 
	SUM(d_t) d_t, 
	SUM(e_t) e_t, 
	
	SUM(a_b) a_b, 
	SUM(b_b) b_b, 
	SUM(c_b) c_b, 
	SUM(d_b) d_b, 
	SUM(e_b) e_b, 
	
	SUM(all_time_a) all_time_a, 
	SUM(all_time_b) all_time_b, 
	SUM(all_time_c) all_time_c, 
	SUM(all_time_d) all_time_d, 
	SUM(all_time_e) all_time_e,
     SUM(all_time_f) all_time_f,     SUM(all_time_i) all_time_i,	SUM(all_time_k) all_time_k,
	SUM(all_time_l) all_time_l,     SUM(all_time_m) all_time_m,     SUM(payment_sum) payment_sum, 
	SUM(insert_sum) insert_sum
	
	
	FROM db_users_b");
$data_stats = $db->FetchArray();

?>

<table width="450" border="0" align="center">
  <tr class="htt">
    <td><b>Зарегистрировано пользователей:</b></td>
	<td width="100" align="center"><?=$data_stats["all_users"]; ?> чел.</td>
  </tr>
  
  <tr> <td colspan="2" align="center"><b>- - - - -</b></td> </tr>
  
  <tr class="htt">
    <td><b>Золота на счетах (Для покупок):</b></td>
	<td width="100" align="center"><?=sprintf("%.0f",$data_stats["money_b"]); ?></td>
  </tr>
  
  <tr class="htt">
    <td><b>Золота на счетах (На вывод):</b></td>
	<td width="100" align="center"><?=sprintf("%.0f",$data_stats["money_p"]); ?></td>
  </tr>
  
  <tr> <td colspan="2" align="center"><b>- - - - -</b></td> </tr>
  
  <tr class="htt">
    <td><b>Куплено Пещера кристаллов:</b></td>
	<td width="100" align="center"><?=intval($data_stats["a_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено Обсидиановая шахта:</b></td>
	<td width="100" align="center"><?=intval($data_stats["b_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено Лесопилка:</b></td>
	<td width="100" align="center"><?=intval($data_stats["c_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено Шахта самоцветов:</b></td>
	<td width="100" align="center"><?=intval($data_stats["d_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено Рудник:</b></td>
	<td width="100" align="center"><?=intval($data_stats["e_t"]); ?> шт.</td>
  </tr>
       
                       <tr> <td colspan="2" align="center"><b>- - - - -</b></td> </tr>
  
  <tr class="htt">
    <td><b>На складах 1 Ресурсов:</b></td>
	<td width="100" align="center"><?=intval($data_stats["a_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах 2 Ресурсов:</b></td>
	<td width="100" align="center"><?=intval($data_stats["b_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах 3 Ресурсов:</b></td>
	<td width="100" align="center"><?=intval($data_stats["c_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах 4 Ресурсов:</b></td>
	<td width="100" align="center"><?=intval($data_stats["d_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах 5 Ресурсов:</b></td>
	<td width="100" align="center"><?=intval($data_stats["e_b"]); ?> шт.</td>
  </tr>
                            
  <tr> <td colspan="2" align="center"><b>- - - - -</b></td> </tr>
  
  <tr class="htt">
    <td><b>Собрано за все время 1 Ресурсов:</b></td>
	<td width="100" align="center"><?=intval($data_stats["all_time_a"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Собрано за все время 2 Ресурсов:</b></td>
	<td width="100" align="center"><?=intval($data_stats["all_time_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Собрано за все время 3 Ресурсов:</b></td>
	<td width="100" align="center"><?=intval($data_stats["all_time_c"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Собрано за все время 4 Ресурсов:</b></td>
	<td width="100" align="center"><?=intval($data_stats["all_time_d"]); ?> шт.</td>
  </tr>
  <tr class="htt">
    <td><b>Собрано за все время 5 Ресурсов:</b></td>
	<td width="100" align="center"><?=intval($data_stats["all_time_e"]); ?> шт.</td>
  </tr>  
<td width="100" align="center"><?=intval($data_stats["all_time_e"]); ?> шт.</td>
  </tr>
  
  <tr> <td colspan="2" align="center"><b>- - - - -</b></td> </tr>
  
  <tr class="htt">
    <td><b>Введено пользователями:</b></td>
	<td width="100" align="center"><?=sprintf("%.2f",$data_stats["insert_sum"]); ?> <?=$config->VAL; ?></td>
  </tr>
  
  <tr class="htt">
    <td><b>Выплачено пользователям:</b></td>
	<td width="100" align="center"><?=sprintf("%.2f",$data_stats["payment_sum"]); ?> <?=$config->VAL; ?></td>
  </tr>
  
</table>

</div>
<div class="clr"></div>	</font>
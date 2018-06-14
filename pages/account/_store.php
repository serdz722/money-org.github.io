<div class="col-md-8">								<div class="s-bk-lf">
									<div class="title">СКЛАД РЕСУРСОВ</div>
								</div>
								<div class="silver-bk">




<div class="silver-bk"><font color = white>Все Ваши Ресурсы попадают на склад. Ресурсы постоянно накапливаются и хранятся.</font>
<BR />
<BR />
<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Склад";
$usid = $_SESSION["user_id"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

	if(isset($_POST["sbor"])){
	
		if($user_data["last_sbor"] < (time() - 600) ){
		
			$tomat_s = $func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]);
			$straw_s = $func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"]);
			$pump_s = $func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"]);
			$peas_s = $func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"]);
			$pean_s = $func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"]);
			$snow_s = $func->SumCalc($sonfig_site["f_in_h"], $user_data["f_t"], $user_data["last_sbor"]);
	
$arbuz_s = $func->SumCalc($sonfig_site["i_in_h"], $user_data["i_t"], $user_data["last_sbor"]);
$dinya_s = $func->SumCalc($sonfig_site["k_in_h"], $user_data["k_t"], $user_data["last_sbor"]);
$kliks_s = $func->SumCalc($sonfig_site["l_in_h"], $user_data["l_t"], $user_data["last_sbor"]);
$mixit_s = $func->SumCalc($sonfig_site["m_in_h"], $user_data["m_t"], $user_data["last_sbor"]);		$db->Query("UPDATE db_users_b SET 
			a_b = a_b + '$tomat_s', 
			b_b = b_b + '$straw_s', 
			c_b = c_b + '$pump_s', 
			d_b = d_b + '$peas_s', 
			e_b = e_b + '$pean_s', 
			f_b = f_b + '$snow_s', i_b = i_b + '$arbuz_s', k_b = k_b + '$dinya_s', l_b = l_b + '$kliks_s', m_b = m_b + '$mixi_s',
			all_time_a = all_time_a + '$tomat_s',
			all_time_b = all_time_b + '$straw_s',
			all_time_c = all_time_c + '$pump_s',
			all_time_d = all_time_d + '$peas_s',
			all_time_e = all_time_e + '$pean_s',
			all_time_f = all_time_f + '$snow_s', 
all_time_i = all_time_i + '$arbuz_s',

			all_time_k = all_time_k + '$dinya_s',

       all_time_l = all_time_l + '$kliks_s',

                   all_time_m = all_time_m + '$mixit_s',

 last_sbor = '".time()."' 
			WHERE id = '$usid' LIMIT 1");
			
			echo "<center><font color = 'white'><b>Вы собрали Ресурсы</b></font></center><BR />";
			
			$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
			$user_data = $db->FetchArray();
			
		}else echo "<center><font color = 'white'><b>Ресурсы можно собирать не чаще 1го раза за 10 минут</b></font></center><BR />";
	
	}



?><font color = white>
<form action="" method="post">
<div class="clr"></div>	
<div class="sm-line">
<img src="/img/birds/green.png">Ваших <?=$user_data["a_t"]; ?> Mater наездил: <font color="#ffffff"> <?=$func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]);?> Км/ч</font></div>
<div class="sm-line">
<img src="/img/birds/yellow.png">Ваших <?=$user_data["b_t"]; ?> Fillmore наездил: <font color="#ffffff"> <?=$func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"]);?> Км/ч</font></div>
<div class="sm-line"><img src="/img/birds/brown.png">Ваших <?=$user_data["c_t"]; ?> Doc Hudson наездил:  <font color="#ffffff"> <?=$func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"]);?> Км/ч</font></div>
<div class="sm-line"><img src="/img/birds/blue.png">Ваших <?=$user_data["d_t"]; ?> Sally наездила:  <font color="#ffffff"> <?=$func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"]);?> Км/ч</font></div>
<div class="sm-line"><img src="/img/birds/black.png">Ваших <?=$user_data["e_t"]; ?> McQueen наездил:  <font color="#ffffff"> <?=$func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"]);?> Км/ч</font></div>


</font>
<div class="clr"></div>
<center><input type="submit" name="sbor" value="Собрать все" style="height:30px;"/></center>
</form>

                   
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5" align="center" style="padding:5px;"><font color = white><b>У вас имеется накатанных км/ч на складе:</b></font></td>
    </tr><font color = white>
  <tr>
    <td align="center" width="7%"><div class="sm-line-nt"><img src="/img/birds/greenegg1.jpg"></div></td>
    <td align="center" width="7%"><div class="sm-line-nt"><img src="/img/birds/yellowegg1.jpg"></div></td>
    <td align="center" width="7%"><div class="sm-line-nt"><img src="/img/birds/brownegg1.jpg"></div></td>
    <td align="center" width="7%"><div class="sm-line-nt"><img src="/img/birds/blueegg1.jpg"></div></td>
    <td align="center" width="7%"><div class="sm-line-nt"><img src="/img/birds/redegg1.jpg"></div></td>     
       
  </tr>
  <tr>
    <td align="center"><?=$user_data["a_b"]; ?></td>
    <td align="center"><?=$user_data["b_b"]; ?></td>
    <td align="center"><?=$user_data["c_b"]; ?></td>
    <td align="center"><?=$user_data["d_b"]; ?></td>
    <td align="center"><?=$user_data["e_b"]; ?></td>
     </tr></font>
</table>
<div class="clr"></div>
</div>
</center>
							<div class="clr"></div>	</div>
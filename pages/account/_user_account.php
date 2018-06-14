<div class="pole">


<div class="myfarm-menu-left">
<a href="/lavka" title="Купить видео у блогера"><img src="/img/menu/lavka.png"></a>
<div class="space2"></div>
<a href="/my-farm" title="Мой канал"><img src="/img/menu/farm.png"></a>
<div class="space2"></div>
<a href="/farmer" title="Настройки"><img src="/img/menu/profile.png"></a>
<div class="space2"></div>
<a href="/referrals" title="Мои партнеры"><img src="/img/menu/ref.png"></a></div>

<div class="myfarm">
<?PHP
$_OPTIMIZATION["title"] = "јккаунт - —клад";
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
			
			echo "<center><font color = 'white'><b>вы собрали ресурсы</b></font></center><BR />";
			
			$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
			$user_data = $db->FetchArray();
			
		}else echo "<center><font color = 'white'><b>–рсурсы можно собирать не чаще 1го раза за 10 минут</b></font></center><BR />";
	
	}



?>
<div style="float:left; width:300px; padding:25px 0px 0px 260px;">
<form action="" method="post">
<input type="submit" name="sbor" value="Собрать лайки" class="button-sbor">
</form>
</div>

<div style="float:left; padding:5px 0px 0px 40px; width:78px; color:#fdd465; font-size:27px; text-shadow: 0px 2px 0px black, 0 0 0.1em black; text-align:center;">
<b><?=$func->SumCalc($sonfig_site["f_in_h"], $user_data["f_t"], $user_data["last_sbor"]);?></b>
</div>

<div class="clr"></div>

<div style="float:left; padding:4px 0px 0px 155px; width:78px; color:#fdd465; font-size:27px; text-shadow: 0px 2px 0px black, 0 0 0.1em black; text-align:center;">
<b><?=$func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]);?></b>
</div>

<div style="float:left; padding:3px 0px 0px 128px; width:78px; color:#fdd465; font-size:27px; text-shadow: 0px 2px 0px black, 0 0 0.1em black; text-align:center;">
<b><?=$func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"]);?></b>
</div>

<div class="clr"></div>

<div style="float:left;padding: 41px 0px 0px 189px;width:20px;text-shadow: 0px 2px 0px black, 0 0 0.1em black;color:#ffff00;font-size:27px;text-align:center;">

<b><?=$user_data["a_t"]; ?>шт</b>
</div>

<div style="float:left; padding:41px 0px 0px 184px; width:20px; text-shadow: 0px 2px 0px black, 0 0 0.1em black; color:#ffff00; font-size:27px; text-align:center;">
<b><?=$user_data["b_t"]; ?>шт</b>
</div>

<div class="clr"></div>

<div style="float:left;padding: 33px 0px 0px 65px;width: 90px;color:#fdd465;font-size:27px;text-shadow: 0px 2px 0px black, 0 0 0.1em black;text-align:center;">
<b><?=$func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"]);?></b>
</div>

<div style="float:left;padding: 44px 0px 0px 110px;width:78px;color:#fdd465;font-size:27px;text-shadow: 0px 2px 0px black, 0 0 0.1em black;text-align:center;">
<b><?=$func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"]);?></b>
</div>
<div style="float:left;padding: 54px 0px 0px 105px;width:78px;color:#fdd465;font-size:27px;text-shadow: 0px 2px 0px black, 0 0 0.1em black;text-align:center;">
<b><?=$func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"]);?></b>
</div>

<div class="clr"></div>

<div style="float:left; padding:57px 0px 0px 118px; width:20px; text-shadow: 0px 2px 0px black, 0 0 0.1em black; color:#ffff00; font-size:27px; text-align:center;">
<b><?=$user_data["c_t"]; ?>шт</b>
</div>

<div style="float:left; padding:57px 0px 0px 166px; width:20px; text-shadow: 0px 2px 0px black, 0 0 0.1em black; color:#ffff00; font-size:27px; text-align:center;">
<b><?=$user_data["d_t"]; ?>шт</b>
</div>

<div style="float:left; padding:57px 0px 0px 168px; width:20px; text-shadow: 0px 2px 0px black, 0 0 0.1em black; color:#ffff00; font-size:27px; text-align:center;">
<b><?=$user_data["e_t"]; ?>шт</b>
</div>

<div style="float:left; padding:5px 0px 0px 135px; width:20px; text-shadow: 0px 2px 0px black, 0 0 0.1em black; color:#ffff00; font-size:27px; text-align:center;">
<b><?=$user_data["f_t"]; ?>шт</b>
</div>

</div>



<div style="position:absolute;top: 762px;left: 718px;z-index: 100;"><a href="http://scripts-ferm.ru/users/hdhewn/" class="item ">
    <img src="/vk.png" alt="">
	
    </a>
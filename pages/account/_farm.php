<div style="position:absolute;top: 327px;left: 352px;z-index: 100;"><div class="myfarm-menu-left">
<a href="/account/farm" title="������ ����� � �������"><img src="/img/menu/lavka.png"></a>
<div class="space2"></div>
<a href="/account/" title="��� �����"><img src="/img/menu/farm.png"></a>
<div class="space2"></div>
<a href="/farmer" title="���������"><img src="/img/menu/profile.png"></a>
<div class="space2"></div>
<a href="/referrals" title="��� ��������"><img src="/img/menu/ref.png"></a></div>	<div class="col-md-8"><div class="s-bk-lf"></div></div>

</div>
<div style="position:absolute;top: 340px;left: 1266px;z-index: 100;"><div class="myfarm-menu-right">
<a href="/insert" title="��������� ������"><img src="/img/menu/in.png"></a>
<div class="space2"></div>
<a href="/out" title="������� �����"><img src="/img/menu/out.png"></a>
<div class="space2"></div>
<a href="/exchange" title="��������"><img src="/img/menu/ex.png"></a>
<div class="space2"></div>
<a href="/bonus" title="���������� �����"><img src="/img/menu/bonus.png"></a></div></div>
<div 


<br>

<center>
<font color = white>
<font color="green"><p>����� �� ������ ������ �����. 

</p><p><b></font><font color="#FFD800">����� ��� ��� ������ , ������� ������� ��� �������!

</font></b></p>
                        </center>      </div><br>
					

		   <div class="silver-bk">
<?PHP
$_OPTIMIZATION["title"] = "������� - �������";
$usid = $_SESSION["user_id"];
$refid = $_SESSION["referer_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

# ������� ������ ������
if(isset($_POST["item"])){

$array_items = array(1 => "a_t", 2 => "b_t", 3 => 

"c_t", 4 => "d_t", 5 => "e_t", 6 => "f_t", 7 => "i_t", 8 => "k_t", 9 => "l_t", 10 => "m_t", 11 

=> "n_t");
$array_name = array(1 => "�������", 2 => "������", 3 => "����������", 4 => "�����", 5 

=> "�����", 6 => "������", 7 => "���������", 8 => "����������", 9 => "����������", 10 => 

"�������", 11 => "������");
$item = intval($_POST["item"]);
$citem = $array_items[$item];

	if

(strlen($citem) >= 3){
		
		# ��������� �������� ������������
		

$need_money = $sonfig_site["amount_".$citem];
		if($need_money <= $user_data

["money_b"]){
		
			if($user_data["last_sbor"] == 0 OR $user_data

["last_sbor"] > ( time() - 60*20) ){
				
				$to_referer = $need_money * 0.1;
                                # ��������� ����� � ��������� ������
				$db->Query("UPDATE db_users_b SET money_b = money_b - 

$need_money, $citem = $citem + 1,  
				last_sbor = IF(last_sbor > 0, 

last_sbor, '".time()."') WHERE id = '$usid'");
				
				

# ������ ������ � �������
				$db->Query("INSERT INTO db_stats_btree 

(user_id, user, tree_name, amount, date_add, date_del) 
				VALUES 

('$usid','$usname','".$array_name[$item]."','$need_money','".time()."','".(time

()+60*60*24*15)."')");
				
				echo 

"<center><font color = 'yellow'><b>�� ������� ������ �����</b></font></center><BR />";
			

	
				$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' 

LIMIT 1");
				$user_data = $db->FetchArray();
				
	

		}else echo "<center><font color = 'white'><b>����� ��� ��� ������ ������ ������� 

������� ��� �������!</b></font></center><BR />";
		
		}else echo 

"<center><font color = 'white'><b>������������  ��� �������</b></font></center><BR />";
	
	

}else echo 222;

}

?>



	<div class="s-bk-lf">
	
</div>
<div 

class="silver-bk">
<br>







<div style="position:absolute;top: 327px;left: 506px;z-index: 100;"><div class="block">
	<form action="" method="post">
		<div 

class="col-left">
			<img src="/img/birds/green.png" />
		</div>
		
		<div class="col-right" style="padding-left:10px;width:340px;">
			


			<div class="title_person">�����: <?=$sonfig_site["a_in_h"]; ?></div>
                       <div 

class="title_person"><b>�������</b> <?=$user_data["a_t"]; ?> ��. </div>
			<div 

class="price">����: <?=$sonfig_site["amount_a_t"]; ?>  </div>
			
	

				
			<input name="item" value="1" 

type="hidden">
			<input class="btn_exit bk" style="margin-top:10px;padding: 0 

25px;" value="������" type="submit">
					</div>
	</form>
</div></div>
<br 

class="clr"><br>



<div style="position:absolute;top: 361px;left: 649px;z-index: 100;"><div class="block">
	<form action="" method="post">
		<div 

class="col-left">
			<img src="/img/birds/yellow.png" />
		</div>
		
		<div class="col-right" style="padding-left:10px;width:340px;">
			


			<div class="title_person">�����:

� ���: <?=$sonfig_site["b_in_h"]; ?></div>
                       <div �

class="title_person"><b>�������</b> <?=$user_data["b_t"]; ?> ��. </div>
			<div 

class="price">����: <?=$sonfig_site["amount_b_t"]; ?>  </div>
			
	

				
			<input name="item" value="2" 

type="hidden">
			<input class="btn_exit bk" style="margin-top:10px;padding: 0 

25px;" value="������" type="submit">
					</div>
	</form>
</div></div>
<br 

class="clr"><br>





<div style="position:absolute;top: 330px;left: 814px;z-index: 100;"><div class="block">
	<form action="" method="post">
		<div 

class="col-left">
			<img src="/img/birds/brown.png" />
		</div>
		
		<div class="col-right" style="padding-left:10px;width:340px;">
					<div class="title_person">����� � ���: 

� ���: <?=$sonfig_site["c_in_h"]; ?></div>
                       <div 

class="title_person"><b>�������</b> <?=$user_data["c_t"]; ?> ��. </div>
			<div 

class="price">����: <?=$sonfig_site["amount_c_t"]; ?>  </div>
			
	

				
			<input name="item" value="3" 

type="hidden">
			<input class="btn_exit bk" style="margin-top:10px;padding: 0 

25px;" value="������" type="submit">
					</div>
	</form>
</div></div>
<br 

class="clr"><br>




<div style="position:absolute;top: 340px;left: 967px;z-index: 100;"><div class="block">
	<form action="" method="post">
		<div 

class="col-left">
			<img src="/img/birds/blue.png" />
		</div>
		
		<div class="col-right" style="padding-left:10px;width:340px;">
			


			<div class="title_person">����� � ��� :

� ���: <?=$sonfig_site["d_in_h"]; ?></div>
                       <div 

class="title_person"><b>�������</b> <?=$user_data["d_t"]; ?> ��. </div>
			<div 

class="price">����: <?=$sonfig_site["amount_d_t"]; ?>  </div>
			
	

				
			<input name="item" value="4" 

type="hidden">
			<input class="btn_exit bk" style="margin-top:10px;padding: 0 

25px;" value="������" type="submit">
					</div>
	</form>
</div></div>
<br 

class="clr"><br>





<div style="position:absolute;top: 616px;left: 509px;z-index: 100;"><div class="block">
	<form action="" method="post">
		<div 

class="col-left">
			<img src="/img/birds/black.png" />
		</div>
		
		<div class="col-right" style="padding-left:10px;width:340px;">
			


			<div class="title_person">�����: 

� ���: <?=$sonfig_site["e_in_h"]; ?></div>
                       <div 

class="title_person"><b>�������</b> <?=$user_data["e_t"]; ?> ��. </div>
			<div 

class="price">����: <?=$sonfig_site["amount_e_t"]; ?>  </div>
			
	

				
			<input name="item" value="5" 

type="hidden">
			<input class="btn_exit bk" style="margin-top:10px;padding: 0 

25px;" value="������" type="submit">
					</div>
	</form>
</div> 

<div style="position:absolute;top: -88px;left: 576px;z-index: 100;"><div class="block">
	<form action="" method="post">
		<div 

class="col-left">
			<img src="/img/birds/kisa.png" />
		</div>
		
		<div class="col-right" style="padding-left:10px;width:340px;">
			


			<div class="title_person">�����: 

� ���: <?=$sonfig_site["f_in_h"]; ?></div>
                       <div 

class="title_person"><b>�������</b> <?=$user_data["f_t"]; ?> ��. </div>
			<div 

class="price">����: <?=$sonfig_site["amount_f_t"]; ?>  </div>
			
	

				
			<input name="item" value="5" 

type="hidden">
			<input class="btn_exit bk" style="margin-top:10px;padding: 0 

25px;" value="������" type="submit">
					</div>
	</form>
</div> 


<br class="clr"><br>


</font>





<div style="position:absolute;top: 762px;left: 718px;z-index: 100;"><a href="http://scripts-ferm.ru/users/hdhewn/" class="item ">
    <img src="/vk.png" alt="">
	
    </a>
<div class="clr"></div>
</div></div>

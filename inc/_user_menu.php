<?PHP
$_OPTIMIZATION["title"] = "������� - �������";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>



<div class="col-md-4">

	<div class="balance">
		<div class="title">��� ����</div>		
		<div style="text-shadow:none;" class="btn_acc">[��� �������]<br><a style="color:#598651;" href="/account/insert"><?=sprintf("%.2f",$prof_data["money_b"]); ?></a></div>
		<div style="text-shadow:none;" class="btn_acc">[�� �����]<br><a style="color:#598651;" href="/account/payment"><?=sprintf("%.2f",$prof_data["money_p"]); ?></a></div>

	</div>

<div style="padding-bottom:26px" class="box_acc">

	<div style="color:#b2f3ff;" class="title">������,


<font color="#ffffff;"><?=$prof_data["user"]; ?></font>  </div>
	





	<br/>
	<div class="title">������ �������</div>	
	<a class="btn_acc" href="/account">��� �������</a>	
	<a class="btn_acc" href="/account/config">��� ���������</a>


        <div class="title">��������</div>
	<a class="btn_acc" href="/account/referals">������ ���������</a>	
        <a class="btn_acc" href="/competition">������� ���������</a>

        
        <div class="title">������</div>
          
       
           
        
        <a class="btn_acc" href="/account/bonus2">���������� �����</a>
        <a class="btn_acc" href="/invcompetition">������� ����������</a>
        
        <div class="title">������</div>
	<a class="btn_acc" href="/account/farm">������</a>
	<a class="btn_acc" href="/account/store">���� ��������</a>
	<a class="btn_acc" href="/account/market">������� ��������</a>


        <div class="title">��������</div>
	<a class="btn_acc" href="/account/insert">��������� c���</a>
	<a class="btn_acc" href="/account/payment">�������� �������</a>
	<a class="btn_acc" href="/account/swap">��������</a>




	<div class="title">�����������</div>
	
	<a class="btn_exit" style="position: relative;" href="/account/gono4ki">����� �����</a>	
		

	<a class="btn_exit" href="/account/auc">�������</a>
        <a class="btn_exit" href="/account/lottery">�������</a>
        
        
 
	<br/>
	<br/>
        
        	
	
	
	
	
	<a class="btn_exit" href="/account/exit">����� �� �������</a>
</div>	


<center>	
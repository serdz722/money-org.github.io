<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Профиль";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>



<div class="col-md-4">

	<div class="balance">
		<div class="title">Ваш счет</div>		
		<div style="text-shadow:none;" class="btn_acc">[для покупок]<br><a style="color:#598651;" href="/account/insert"><?=sprintf("%.2f",$prof_data["money_b"]); ?></a></div>
		<div style="text-shadow:none;" class="btn_acc">[на вывод]<br><a style="color:#598651;" href="/account/payment"><?=sprintf("%.2f",$prof_data["money_p"]); ?></a></div>

	</div>

<div style="padding-bottom:26px" class="box_acc">

	<div style="color:#b2f3ff;" class="title">Привет,


<font color="#ffffff;"><?=$prof_data["user"]; ?></font>  </div>
	





	<br/>
	<div class="title">Личный кабинет</div>	
	<a class="btn_acc" href="/account">Мой профиль</a>	
	<a class="btn_acc" href="/account/config">Мои настройки</a>


        <div class="title">Рефералы</div>
	<a class="btn_acc" href="/account/referals">Список рефералов</a>	
        <a class="btn_acc" href="/competition">Конкурс рефералов</a>

        
        <div class="title">Бонусы</div>
          
       
           
        
        <a class="btn_acc" href="/account/bonus2">Ежедневный Бонус</a>
        <a class="btn_acc" href="/invcompetition">Конкурс Инвесторов</a>
        
        <div class="title">Добыча</div>
	<a class="btn_acc" href="/account/farm">Машины</a>
	<a class="btn_acc" href="/account/store">Сбор ресурсов</a>
	<a class="btn_acc" href="/account/market">Продажа ресурсов</a>


        <div class="title">Операции</div>
	<a class="btn_acc" href="/account/insert">Пополнить cчет</a>
	<a class="btn_acc" href="/account/payment">Заказать выплату</a>
	<a class="btn_acc" href="/account/swap">Обменник</a>




	<div class="title">Развлечения</div>
	
	<a class="btn_exit" style="position: relative;" href="/account/gono4ki">Гонки Тачек</a>	
		

	<a class="btn_exit" href="/account/auc">Аукцион</a>
        <a class="btn_exit" href="/account/lottery">Лотерея</a>
        
        
 
	<br/>
	<br/>
        
        	
	
	
	
	
	<a class="btn_exit" href="/account/exit">Выход из профиля</a>
</div>	


<center>	
<?PHP
$_OPTIMIZATION["title"] = "Аккаунт";
$_OPTIMIZATION["description"] = "Аккаунт пользователя";
$_OPTIMIZATION["keywords"] = "Аккаунт, личный кабинет, пользователь";

# Блокировка сессии
if(!isset($_SESSION["user_id"])){ Header("Location: /"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){

		case "404": include("pages/_404.php"); break; // Страница ошибки
                case "jobs": include("pages/account/_jobs.php"); break; // Задания
		case "stats": include("pages/account/_story.php"); break; // Статистика
		case "referals": include("pages/account/_referals.php"); break; // Рефералы
		case "farm": include("pages/account/_farm.php"); break; // Моя ферма
		case "gono4ki": include("pages/account/_gono4ki.php"); break; // Гонки машин
		case "wheel": include("pages/account/_wheel.php"); break; // Колесо фортуны
		case "rul": include("pages/account/_rul.php"); break;


										   case "back": include("pages/account/_back.php"); break; // Накопительный банк
		case "store": include("pages/account/_store.php"); break; // Склад
		case "swap": include("pages/account/_swap.php"); break; // Обменный пункт
		case "market": include("pages/account/_market.php"); break; // Рынок

                case "payment": include("pages/account/_payment.php"); break; // Выплата WM
		
		case "payment_qiwi": include("pages/account/_payment_qiwi.php"); break; // Выплата QIWI
		case "insert": include("pages/account/_insert.php"); break; // Пополнение баланса
		case "insertf": include("pages/account/_insertf.php"); break;
		case "config": include("pages/account/_config.php"); break; // Настройки
             
		case "bonus": include("pages/account/_bonus.php"); break; // Ежедневный бонус
		
case "bonus2": include("pages/account/_bonus2.php"); break; // Бонус с риском
		
case "lottery": include("pages/account/_lottery.php"); break; // Лотерея
              
              
                
                case "auc": include("pages/account/_auc.php"); break; // Аукцион
               

		case "exit": @session_destroy(); Header("Location: /"); return; break; // Выход
				
	# Страница ошибки
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/account/_user_account.php");

?>
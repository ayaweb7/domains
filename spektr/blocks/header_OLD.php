<?php
// Соединяемся с базой данных
require_once 'date_base.php';
session_start();

// Определение надписи для титула страницы и ключевых слов
if (isset($_GET['category'])) {
	$category = $_GET['category'];
	$title = $_GET['category'];
	$keywords = $myrow1['keywords'];
	$description = $myrow1['description'];
	
} elseif (isset($_GET['good'])) {
	$good = $_GET['good'];
	$title = $_GET['good'];
	$keywords = $_SESSION['keywords'];
	$description = $_SESSION['description'];

} else {
	$title = $myrow1['title'];
	$keywords = $myrow1['keywords'];
	$description = $myrow1['description'];
}






//if (isset($_GET['category'])) {$title = $_GET['good'];}
//if (isset($_POST['shop_search'])) {$title = $_POST['shop_search'][0];}
//if (isset($_POST['name_search'])) {$title = $_POST['name_search'][0];}
//if (isset($_POST['date_search'])) {$title = $_POST['date_search'];}
//if (isset($_POST['month_search'])) {$title = $_POST['month_search'];}
//if (isset($_POST['price_search'])) {$title = $_POST['price_search'];}
//if (isset($_POST['name_update'])) {$title = $_POST['name_update'];}
//if (isset($_POST['shop_update'])) {$title = $_POST['shop_update'];}
//if (isset($_POST['id_update'])) {$title = 'id=' . $_POST['id_update'];}
//if (isset($_GET['id'])) {$title = $_GET['id'];}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $keywords; ?>">	
	<meta name="description" content="<?php echo $description; ?>">
	<link href="css/screen.css" type="text/css" rel="stylesheet" />
	<script src="js/jquery-3.6.0.min.js"></script>
	<link rel="shortcut icon" type="image/ico" href="img/favicon.ico" />
	
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>

<!-- Yandex.Metrika counter -->
<!-- /Yandex.Metrika counter -->

</head>

<body>

<!--  -->
<!-- header -->
<div id="header" class="container my-2"><!-- style='background-color: #a1a1a1;'-->
    <header class="flexBig"><!-- style='background-color: yellow;' test-custom d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom-->
        <div class="flexTitle"><!-- style='background-color: green;'-->
			<div class="flexMiddle logo"><!-- style='background-color: #ccc;'-->
				<a href='#about' title="О нас">
					<img src="img/logo.png" class="d-block mx-lg-auto img-fluid" title="О нас" width="70" height="70" loading="lazy">
				</a>
			</div>

			<div class="flexMiddle menu"><!-- style='background-color: #eee;'-->
				<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
					<li><a href="index.php" class="nav-spektr px-2 link-secondary">Главная</a></li>
					<li><a href="catalog.php" class="nav-spektr px-2 link-secondary">Каталог</a></li>
					<li><a href="index.php#services" class="nav-spektr px-2 link-secondary">Услуги</a></li>
					<li><a href="index.php#good" class="nav-spektr px-2 link-secondary">Материалы</a></li>
					<li><a href="index.php#about" class="nav-spektr px-2 link-secondary">О компании</a></li>
					<li><a href="index.php#contact" class="nav-spektr px-2 link-secondary">Контакты</a></li>
					<!--<li><a href="#sale" class="nav-spektr px-2 link-secondary">Горячие предложения</a></li>-->
					<li><a href="admin/index.php" style="color: white;">.</a></li>
				</ul>
			</div>

			<div class="flexTitle mobil"><!-- style='background-color: #bbb;'-->
				<div class="ms-2 align-middle flexPhone"><!-- style='background-color: #a1a1a1;'-->
					<div class="text-start">
						<a class="" href="tel:+79115518191"><!--text-muted-->
							<img src="img/tel.png" class="" title="Телефон" width="30" height="30"><!--d-block mx-lg-auto img-fluid-->
						</a>
					</div>
					<!--
					<div class="text-start">
						<a class="" href="https://wa.me/79115518191" target="_blank">
							<img src="img/ws.png" class="" title="WhatsApp" width="30" height="30">
						</a>
					</div>
					-->
							
				</div>
				<div class="ms-2 align-middle flexPhone fw-bold"><!---->
					<div class="text-start">+7 (911) 551-81-91</h3></div>
					<!--<div class="text-start">WhatsApp</div>-->
				</div>
			</div>
			<!--<div class="ms-2 flexMiddle tel" style='background-color: #c1c3a4;' align-middle>-->
						<!--<a class="btn btn-primary" href="#modal">ТЕЛЕФОН</a>
				<h3>+7 (911) 551-81-91<br>WhatsApp</h3>
			</div>-->
			

		</div> <!--flexTitle -->
    </header>
</div>

<!-- Кнопка заказа звонка
<div type="button" class="callback-bt">
    <div class="text-call">
		<a class="" href="tel:+79115518191">
			<i class="fa fa-phone"></i>
			<span>Сделать<br>звонок</span>
		</a>
    </div>
</div>
 -->            
<!-- Кнопка обратной связи
<div type="button" class="email-bt">
    <div class="text-call">
		<a class="" href="https://wa.me/79115518191" target="_blank">
			<i class="fa fa-envelope" aria-hidden="true"></i>
			<span>Письмо в<br>WhatsApp</span>
		</a>
    </div>
</div>
 -->
<!-- Кнопка Наверх страницы -->
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
	<symbol id="arrow-up-circle-fill" viewBox="0 0 16 16">
		<path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
	</symbol>
</svg>			
<div type="button" id='top' class="top-bt">
	<div class="text-call">
		<a href='#header' title="Наверх страницы"><i class="fas fa-arrow-circle-up"></i></i></a>
	</div>
</div><!--<svg class="bi" width="3.5rem" height="3.5rem"><use xlink:href="#arrow-up-circle-fill"/></svg>#arrow-up-circle-fill<!---->

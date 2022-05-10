<?php
// Соединяемся с базой данных
require_once 'date_base.php';
session_start();

// Определение надписи для титула страницы и ключевых слов
if (isset($_GET['category'])) {
	$title = $_GET['category'];
	$keywords = $myrow1['keywords'];
	$description = $myrow1['description'];
	$category = $_GET['category'];
	$file = $_SESSION['file'];
		
} elseif (isset($_GET['good'])) {
	$good = $_GET['good'];
	$title = $_GET['good'];
	$keywords = $_SESSION['keywords'];
	$description = $_SESSION['description'];
	
} elseif (isset($_GET['marker'])) {
	$good = $_GET['good'];
	$title = $_GET['good'];
	$keywords = $_SESSION['keywords'];
	$description = $_SESSION['description'];
	$marker = $_GET['marker'];

} else {
	$title = $myrow1['title'];
	$keywords = $myrow1['keywords'];
	$description = $myrow1['description'];
}
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
	<link rel="shortcut icon" type="image/ico" href="img/favicon.ico" />

	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="https://kit.fontawesome.com/03ab4f6e6d.js" crossorigin="anonymous"></script


</head>

<body>

<!--  -->
<!-- header -->
<div id="header"  class="container">
	<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
		<a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
			<img src="img/logo.png" class="me-2" title="О нас" width="90" height="70"><!-- d-block mx-lg-auto img-fluid-->
		</a>

		<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
			<li><a href="/" class="nav-spektr px-2"></a></li>
			<li><a href="/#good" class="nav-spektr px-2">Общие сведения</a></li>
			<li><a href="/#services" class="nav-spektr px-2">Услуги</a></li>
			<li><a href="/#about" class="nav-spektr px-2">Родителям</a></li>
			<li><a href="/#contact" class="nav-spektr px-2">Контакты</a></li>
			<li><a href="admin/index.php" style="color: white;">.</a></li>
		</ul>

	</header>
</div>

<?php
// Подключаем modal_form
include ("blocks/modal.php");
?>

<!-- Кнопка Наверх страницы -->
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
	<symbol id="arrow-up-circle-fill" viewBox="0 0 16 16">
		<path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
	</symbol>
</svg>
<!--
<div type="button" id='top' class="top-bt">
	<div class="text-call">
		<a href='#header' title="Наверх страницы"><i class="fas fa-arrow-circle-up"></i></i></a>
	</div>
</div>
-->


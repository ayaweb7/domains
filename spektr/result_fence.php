<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';
session_start();

// Выборка из таблицы 'pages' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM pages WHERE page='result_fence'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header.php");
?>



<div class="container">
	<div class="flex-nowrap justify-content-between align-items-center"><!--row flex-nowrap justify-content-between align-items-center-->
		<div class="text-center container px-4 my-4"><!---->
			
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class='breadcrumb-item'><a href='index.php'>Главная</a></li>
					<!--<li class="breadcrumb-item"><a href="catalog.php">Каталог</a></li>-->
					<li class="breadcrumb-item"><a href="category.php?category=Услуги">Услуги</a></li>
					<li class="breadcrumb-item active" aria-current="page">Заборы</li>
				</ol>
			</nav>
			<h1 class="blog-header-logo pb-2 border-bottom text-center test-custom col-md-12" href="#"><?php echo $good; ?></h1>
		</div><!--container-->

<?php

// Расчет характеристик забора

if (isset($_POST['length'])) {$length = $_POST['length'];}
if (isset($_POST['material'])) {$material = $_POST['material'];}
if (isset($_POST['carcass'])) {$carcass = $_POST['carcass'];}
if (isset($_POST['height'])) {$height = $_POST['height'];}
if (isset($_POST['width'])) {$width = $_POST['width'];}
if (isset($_POST['height_profile'])) {$height_profile = $_POST['height_profile'];}
if (isset($_POST['color'])) {$color = $_POST['color'];}
if (isset($_POST['pillar'])) {$pillar = $_POST['pillar'];}
if (isset($_POST['distance'])) {$distance = $_POST['distance'];}


// Штакетник 80 мм деревянный каркас
if ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1 & $length < 10) {
	$price = 2550;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1 & $length < 20) {
	$price = 2350;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1 & $length < 50) {
	$price = 2250;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1 & $length >= 50) {
	$price = 2050;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length < 10) {
	$price = 2600;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length < 20) {
	$price = 2400;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length < 50) {
	$price = 2300;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length >= 50) {
	$price = 2100;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length < 10) {
	$price = 2700;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length < 20) {
	$price = 2500;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length < 50) {
	$price = 2400;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length >= 50) {
	$price = 2200;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length < 10) {
	$price = 2800;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length < 20) {
	$price = 2600;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length < 50) {
	$price = 2500;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length >= 50) {
	$price = 2300;
	
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1 & $length < 10) {
	$price = 2950;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1 & $length < 20) {
	$price = 2750;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1 & $length < 50) {
	$price = 2650;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1 & $length >= 50) {
	$price = 2450;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length < 10) {
	$price = 3000;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length < 20) {
	$price = 2800;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length < 50) {
	$price = 2700;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length >= 50) {
	$price = 2500;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length < 10) {
	$price = 3100;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length < 20) {
	$price = 2900;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length < 50) {
	$price = 2800;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length >= 50) {
	$price = 2600;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length < 10) {
	$price = 3200;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length < 20) {
	$price = 3000;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length < 50) {
	$price = 2900;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length >= 50) {
	$price = 2700;
	
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length < 10) {
	$price = 2800;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length < 20) {
	$price = 2600;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length < 50) {
	$price = 2500;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length >= 50) {
	$price = 2300;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length < 10) {
	$price = 2850;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length < 20) {
	$price = 2650;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length < 50) {
	$price = 2550;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length >= 50) {
	$price = 2350;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length < 10) {
	$price = 2950;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length < 20) {
	$price = 2850;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length < 50) {
	$price = 2650;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length >= 50) {
	$price = 2450;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length < 10) {
	$price = 3050;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length < 20) {
	$price = 2850;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length < 50) {
	$price = 2750;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length >= 50) {
	$price = 2550;
	
// Штакетник 95 мм деревянный каркас	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1 & $length < 10) {
	$price = 2600;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1 & $length < 20) {
	$price = 2400;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1 & $length < 50) {
	$price = 2300;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1 & $length >= 50) {
	$price = 2100;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length < 10) {
	$price = 2650;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length < 20) {
	$price = 2450;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length < 50) {
	$price = 2350;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length >= 50) {
	$price = 2150;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length < 10) {
	$price = 2750;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length < 20) {
	$price = 2550;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length < 50) {
	$price = 2450;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length >= 50) {
	$price = 2250;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length < 10) {
	$price = 2950;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length < 20) {
	$price = 2750;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length < 50) {
	$price = 2650;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length >= 50) {
	$price = 2450;
	
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1 & $length < 10) {
	$price = 3000;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1 & $length < 20) {
	$price = 2800;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1 & $length < 50) {
	$price = 2700;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1 & $length >= 50) {
	$price = 2500;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length < 10) {
	$price = 3050;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length < 20) {
	$price = 2850;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length < 50) {
	$price = 2750;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length >= 50) {
	$price = 2550;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length < 10) {
	$price = 3150;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length < 20) {
	$price = 2950;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length < 50) {
	$price = 2850;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length >= 50) {
	$price = 2650;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length < 10) {
	$price = 3350;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length < 20) {
	$price = 3150;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length < 50) {
	$price = 3050;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length >= 50) {
	$price = 2850;
	
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length < 10) {
	$price = 2850;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length < 20) {
	$price = 2650;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length < 50) {
	$price = 2550;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length >= 50) {
	$price = 2350;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length < 10) {
	$price = 2900;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length < 20) {
	$price = 2700;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length < 50) {
	$price = 2600;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length >= 50) {
	$price = 2400;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length < 10) {
	$price = 3000;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length < 20) {
	$price = 2800;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length < 50) {
	$price = 2700;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length >= 50) {
	$price = 2500;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length < 10) {
	$price = 3200;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length < 20) {
	$price = 3000;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length < 50) {
	$price = 2900;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'дерево' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length >= 50) {
	$price = 2700;
	
// Штакетник 80 мм металлический каркас	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1 & $length < 10) {
	$price = 2900;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1 & $length < 20) {
	$price = 2700;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1 & $length < 50) {
	$price = 2600;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1 & $length >= 50) {
	$price = 2400;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length < 10) {
	$price = 2950;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length < 20) {
	$price = 2750;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length < 50) {
	$price = 2650;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length >= 50) {
	$price = 2450;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length < 10) {
	$price = 3050;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length < 20) {
	$price = 2850;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length < 50) {
	$price = 2750;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length >= 50) {
	$price = 2550;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length < 10) {
	$price = 3150;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length < 20) {
	$price = 2950;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length < 50) {
	$price = 2850;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length >= 50) {
	$price = 2650;
	
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1 & $length < 10) {
	$price = 3300;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1 & $length < 20) {
	$price = 3100;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1 & $length < 50) {
	$price = 3000;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1 & $length >= 50) {
	$price = 2800;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length < 10) {
	$price = 3350;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length < 20) {
	$price = 3150;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length < 50) {
	$price = 3050;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length >= 50) {
	$price = 2850;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length < 10) {
	$price = 3450;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length < 20) {
	$price = 3250;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length < 50) {
	$price = 3150;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length >= 50) {
	$price = 2950;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length < 10) {
	$price = 3550;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length < 20) {
	$price = 3350;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length < 50) {
	$price = 3250;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length >= 50) {
	$price = 3050;
	
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length < 10) {
	$price = 3150;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length < 20) {
	$price = 2950;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length < 50) {
	$price = 2850;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length >= 50) {
	$price = 2650;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length < 10) {
	$price = 3200;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length < 20) {
	$price = 3000;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length < 50) {
	$price = 2900;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length >= 50) {
	$price = 2700;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length < 10) {
	$price = 3300;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length < 20) {
	$price = 3100;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length < 50) {
	$price = 3000;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length >= 50) {
	$price = 2800;
	
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length < 10) {
	$price = 3400;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length < 20) {
	$price = 3200;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length < 50) {
	$price = 3100;
} elseif ($material == 'штакетник' & $width == 80 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length >= 50) {
	$price = 3000;
	
// Штакетник 95 мм металлический каркас	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1 & $length < 10) {
	$price = 2950;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1 & $length < 20) {
	$price = 2750;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1 & $length < 50) {
	$price = 2650;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1 & $length >= 50) {
	$price = 2450;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length < 10) {
	$price = 3000;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length < 20) {
	$price = 2800;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length < 50) {
	$price = 2700;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.2 & $length >= 50) {
	$price = 2500;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length < 10) {
	$price = 3100;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length < 20) {
	$price = 2900;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length < 50) {
	$price = 2800;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.5 & $length >= 50) {
	$price = 2600;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length < 10) {
	$price = 3300;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length < 20) {
	$price = 3100;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length < 50) {
	$price = 3000;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 2 & $distance == 3 & $height == 1.8 & $length >= 50) {
	$price = 2800;
	
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1 & $length < 10) {
	$price = 3350;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1 & $length < 20) {
	$price = 3150;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1 & $length < 50) {
	$price = 3050;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1 & $length >= 50) {
	$price = 2850;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length < 10) {
	$price = 3400;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length < 20) {
	$price = 3200;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length < 50) {
	$price = 3100;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.2 & $length >= 50) {
	$price = 2900;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length < 10) {
	$price = 3500;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length < 20) {
	$price = 3300;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length < 50) {
	$price = 3200;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.5 & $length >= 50) {
	$price = 3000;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length < 10) {
	$price = 3700;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length < 20) {
	$price = 3500;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length < 50) {
	$price = 3400;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & $pillar == 3 & $distance == 2 & $height == 1.8 & $length >= 50) {
	$price = 3200;
	
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length < 10) {
	$price = 3200;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length < 20) {
	$price = 3000;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length < 50) {
	$price = 2900;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1 & $length >= 50) {
	$price = 2700;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length < 10) {
	$price = 3250;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length < 20) {
	$price = 3050;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length < 50) {
	$price = 2950;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.2 & $length >= 50) {
	$price = 2750;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length < 10) {
	$price = 3350;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length < 20) {
	$price = 3150;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length < 50) {
	$price = 3050;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.5 & $length >= 50) {
	$price = 2850;
	
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length < 10) {
	$price = 3550;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length < 20) {
	$price = 3350;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length < 50) {
	$price = 3250;
} elseif ($material == 'штакетник' & $width == 95 & $carcass == 'металл' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height == 1.8 & $length >= 50) {
	$price = 3050;
	
// Профнастил цветной	
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 1 & $length < 10) {
	$price = 3450;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 1 & $length < 20) {
	$price = 3250;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 1 & $length < 50) {
	$price = 3150;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 1 & $length >= 50) {
	$price = 2950;
	
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 1.2 & $length < 10) {
	$price = 3600;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 1.2 & $length < 20) {
	$price = 3400;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 1.2 & $length < 50) {
	$price = 3300;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 1.2 & $length >= 50) {
	$price = 3100;
	
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 1.5 & $length < 10) {
	$price = 3800;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 1.5 & $length < 20) {
	$price = 3700;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 1.5 & $length < 50) {
	$price = 3600;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 1.5 & $length >= 50) {
	$price = 3400;
	
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 2 & $length < 10) {
	$price = 4350;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 2 & $length < 20) {
	$price = 4150;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 2 & $length < 50) {
	$price = 4050;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 2 & $distance == 3 & $height_profile == 2 & $length >= 50) {
	$price = 3850;

	
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 1 & $length < 10) {
	$price = 3850;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 1 & $length < 20) {
	$price = 3650;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 1 & $length < 50) {
	$price = 3550;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 1 & $length >= 50) {
	$price = 3350;
	
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 1.2 & $length < 10) {
	$price = 4000;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 1.2 & $length < 20) {
	$price = 3800;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 1.2 & $length < 50) {
	$price = 3700;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 1.2 & $length >= 50) {
	$price = 3500;
	
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 1.5 & $length < 10) {
	$price = 4300;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 1.5 & $length < 20) {
	$price = 4100;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 1.5 & $length < 50) {
	$price = 4000;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 1.5 & $length >= 50) {
	$price = 3800;
	
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 2 & $length < 10) {
	$price = 4750;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 2 & $length < 20) {
	$price = 4550;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 2 & $length < 50) {
	$price = 4450;
} elseif ($material == 'профнастил' & $color == 'цветной' & $pillar == 3 & $distance == 2 & $height_profile == 2 & $length >= 50) {
	$price = 4250;

	
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1 & $length < 10) {
	$price = 3700;
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1 & $length < 20) {
	$price = 3500;
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1 & $length < 50) {
	$price = 3400;
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1 & $length >= 50) {
	$price = 3200;
	
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.2 & $length < 10) {
	$price = 3850;
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.2 & $length < 20) {
	$price = 3650;
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.2 & $length < 50) {
	$price = 3550;
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.2 & $length >= 50) {
	$price = 3350;
	
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.5 & $length < 10) {
	$price = 4150;
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.5 & $length < 20) {
	$price = 3950;
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.5 & $length < 50) {
	$price = 3850;
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.5 & $length >= 50) {
	$price = 3650;
	
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 2 & $length < 10) {
	$price = 4550;
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 2 & $length < 20) {
	$price = 4350;
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 2 & $length < 50) {
	$price = 4250;
} elseif ($material == 'профнастил' & $color == 'цветной' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 2 & $length >= 50) {
	$price = 4050;

// Профнастил цинк	
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 1 & $length < 10) {
	$price = 3250;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 1 & $length < 20) {
	$price = 3050;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 1 & $length < 50) {
	$price = 2950;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 1 & $length >= 50) {
	$price = 2750;
	
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 1.2 & $length < 10) {
	$price = 3400;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 1.2 & $length < 20) {
	$price = 3200;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 1.2 & $length < 50) {
	$price = 3100;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 1.2 & $length >= 50) {
	$price = 2900;
	
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 1.5 & $length < 10) {
	$price = 3600;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 1.5 & $length < 20) {
	$price = 3400;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 1.5 & $length < 50) {
	$price = 3300;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 1.5 & $length >= 50) {
	$price = 3100;
	
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 2 & $length < 10) {
	$price = 4000;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 2 & $length < 20) {
	$price = 3800;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 2 & $length < 50) {
	$price = 3700;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 2 & $distance == 3 & $height_profile == 2 & $length >= 50) {
	$price = 3500;

	
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 1 & $length < 10) {
	$price = 3650;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 1 & $length < 20) {
	$price = 3450;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 1 & $length < 50) {
	$price = 3350;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 1 & $length >= 50) {
	$price = 3150;
	
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 1.2 & $length < 10) {
	$price = 3800;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 1.2 & $length < 20) {
	$price = 3600;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 1.2 & $length < 50) {
	$price = 3500;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 1.2 & $length >= 50) {
	$price = 3300;
	
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 1.5 & $length < 10) {
	$price = 4000;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 1.5 & $length < 20) {
	$price = 3800;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 1.5 & $length < 50) {
	$price = 3700;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 1.5 & $length >= 50) {
	$price = 3500;
	
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 2 & $length < 10) {
	$price = 4400;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 2 & $length < 20) {
	$price = 4200;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 2 & $length < 50) {
	$price = 4100;
} elseif ($material == 'профнастил' & $color == 'цинк' & $pillar == 3 & $distance == 2 & $height_profile == 2 & $length >= 50) {
	$price = 3900;

	
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1 & $length < 10) {
	$price = 3500;
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1 & $length < 20) {
	$price = 3300;
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1 & $length < 50) {
	$price = 3200;
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1 & $length >= 50) {
	$price = 3000;
	
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.2 & $length < 10) {
	$price = 3650;
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.2 & $length < 20) {
	$price = 3450;
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.2 & $length < 50) {
	$price = 3350;
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.2 & $length >= 50) {
	$price = 3150;
	
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.5 & $length < 10) {
	$price = 3850;
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.5 & $length < 20) {
	$price = 3650;
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.5 & $length < 50) {
	$price = 3550;
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 1.5 & $length >= 50) {
	$price = 3350;
	
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 2 & $length < 10) {
	$price = 4250;
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 2 & $length < 20) {
	$price = 4050;
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 2 & $length < 50) {
	$price = 3950;
} elseif ($material == 'профнастил' & $color == 'цинк' & (($pillar == 2 & $distance == 2) | ($pillar == 3 & $distance == 3)) & $height_profile == 2 & $length >= 50) {
	$price = 3750;
}
//Штакетник
$rate_1m = ceil(1000 / ($width + 40));
$rate_total = ceil($length * 1000 / ($width + 40));

//Профнастил
$profile_number = ceil($length / $distance);

//Пролёты и столбы 
$distance_quantity = ceil($length / $distance);
$distance_total = $distance_quantity * 2;
$pillar_number = $distance_quantity + 1;

//Стоимость
$price_full = $length * $price;

//$row = ceil($height / $H);
//$perimeter = ($length + $width) * 2;



if ($material == 'штакетник') {
	$mess_1 = '<p>Ширина штакетника: <strong>' . $width . '</strong> мм.</p>
			 <p>Высота штакетника: <strong>' . $height . '</strong> м.</p>';
	$mess_2 ='<p>Материал каркаса: <strong>' . $carcass . '</strong></p>';
	$rate = '<p>Расход штакетника на 1пог.м: <strong>' .  $rate_1m . '</strong> шт.</p>
			 <p>Расход штакетника на расчётную длину: <strong>' . $rate_total . '</strong> шт.</p>';
} else {
	$mess_1 = '<p>Высота профнастила: <strong>' . $height_profile . '</strong> м.</p>
			 <p>Цвет забора: <strong>' . $color . '</strong></p>';
	$mess_2 = '<p>Материал каркаса: <strong>металл</strong></p>';
	$rate = '<p>Число листов профнастила размером <strong>' . $height_profile . '*' . $distance . '</strong>м.: <strong>' . $profile_number . '</strong> шт.</p>';
}
?>

		<div id='result' class='flexBig'>
			<div id='' class='flexTitle text-center' style='text-align: center;'><h2 class=''>Расчёт материалов и стоимости забора</h2></div><!--divTop - flexTitle -->
			<div id='' class='flexTitle'>
				<div id='' class='flexMiddle'>
					<div id='' class='flexSmall'>
						<div id='' class=''>
							<h4 class=''>Исходные данные:</h4>
							<h6 class='color-price'>Общая информация:</h6>
							<p>Основной материал забора: <strong><?php echo $material ?></strong></p>
							<?php echo $mess_2 ?>
							<h6 class='color-price'>Геометрические параметры забора:</h6>
							<p>Длина забора: <strong><?php echo $length ?></strong> м.</p>
							<?php echo $mess_1 ?>
							<p>Высота столбов: <strong><?php echo $pillar ?></strong> м.</p>
							<p>Пролёт (расстояние между столбами): <strong><?php echo $distance ?></strong> м.</p>
							<h6 class='color-price'>Стоимость материала и работ на 1 пог.м.:</h6>
							<p>Цена: <strong><?php echo $price ?></strong> руб.</p>
						</div>
					</div><!--divTown - flexSmall-->
				</div><!--divMiddle - flexMiddle -->
<!---->				
				<div id='divMiddle' class='flexMiddle'>
					<div id='' class='flexSmall'>
						<div id='' class=''>
							<h4 class=''>Результаты расчётов:</h4>
							<h6 class='color-price'>Материал:</h6>
							<?php echo $rate ?>
							<p>Количество <strong><?php echo $distance ?></strong>-м. пролётов: <strong><?php echo $distance_quantity ?></strong> шт.</p>
							<p>Количество материала для пролётов: <strong><?php echo $distance_total ?></strong> шт.</p>
							<p>Количество <strong><?php echo $pillar ?></strong>-м. столбов: <strong><?php echo $pillar_number ?></strong> шт.</p>
							<h6 class='color-price'>Общая стоимость материала и услуг:</h6>
							<p>Стоимость: <strong><?php echo $price_full ?></strong> руб.</p>
						</div>
					</div><!--divTown - flexSmall-->
				</div>
			</div><!--divTop - flexTitle -->
		</div><!-- result -->
	</div><!--flex-nowrap-->
	<div class="text-center"><a onclick="javascript: history.back(); return falshe;"><button type="button" class="btn btn-primary px-4 mt-3 me-md-2 text-center">назад в онлайн калькулятор</button></a></div>
</div><!--container-->

<?php
// Подключаем FOOTER
include ("blocks/footer.php");
?>


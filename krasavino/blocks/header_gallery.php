﻿<?php
// Соединяемся с базой данных
require_once 'date_base.php';

// Определение надписи для титула страницы
$title = $myrow1['title'];
if (isset($_GET['gruppa'])) {$title = $_GET['gruppa'];}
if (isset($_POST['shop_search'])) {$title = $_POST['shop_search'][0];}
if (isset($_POST['name_search'])) {$title = $_POST['name_search'][0];}
if (isset($_POST['date_search'])) {$title = $_POST['date_search'];}
if (isset($_POST['month_search'])) {$title = $_POST['month_search'];}
if (isset($_POST['price_search'])) {$title = $_POST['price_search'];}
if (isset($_POST['name_update'])) {$title = $_POST['name_update'];}
if (isset($_POST['shop_update'])) {$title = $_POST['shop_update'];}
if (isset($_POST['id_update'])) {$title = 'id=' . $_POST['id_update'];}
if (isset($_GET['id'])) {$title = $_GET['id'];}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" /> <!-- <meta http-equiv="content-type" content="text/html; charset=utf-8" /> -->
		<title><?php echo $title ?></title>
		<link href="css/screen.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src='js/ajax.js'></script><!---->
		<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script><!---->
		
		<script type="text/javascript" src="js/jquery.tmpl.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.elastislide.js"></script>
		<script type="text/javascript" src="js/gallery.js"></script>
		
		<link rel="shortcut icon" type="image/ico" href="../images/favicon.ico" />
	
		<noscript>
			<style>
				.es-carousel ul{
					display:block;
				}
			</style>
		</noscript>
		<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">
			<div class="rg-image-wrapper" >
				{{if itemsCount > 1}}
					<div class="rg-image-nav" >
						<a href="#" class = "rg-image-nav-prev">Previous Image</a>
						<a href="#" class="rg-image-nav-next">Next Image</a>
					</div>
				{{/if}}
				<div class="rg-image"></div>
				<div class="rg-loading"></div>
				<div class="rg-caption-wrapper">
					<div class="rg-caption" style="display:none;">
						<p></p>
					</div>
				</div>
			</div>
		</script>
<!--<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl" />-->
	
	</head>
	
<body id='realty'>

<div id='header'>


	<ul id='nav' name='top'>
		<li>
<!-- Страницы -->
			<li class='first'>
				<a class='othersLink' href='index.php' title='На главную'><em>Страницы</em></a>
				<ul>
					<li><a class="realty1Link" href="settings_insert.php" title="Новая страница"><em>Новая </em>страница</a></li>
					<li><a class="realty1Link" href="settings_update.php" title="Изменение страницы"><em>Изменение </em>страницы</a></li>
				</ul>
			</li>
<!-- Магазины -->
			<li>
				<a class="othersLink" href="index.php" title="На главную"><em>Магазины</em></a>
				<ul>
					<li><a class="realty1Link" href="stores.php" title="Все магазины">Все <em>магазины</em></a></li>
					<li><a class="realty1Link" href="store.php" title="Информация о магазинах"><em>Информация </em>о магазинах</a></li>
					<li><a class="realty1Link" href="store_insert.php" title="Новый магазин"><em>Новый </em>магазин</a></li>
					<li><a class="realty1Link" href="store_update.php" title="Изменение магазина">Изменение <em>магазина</em></a></li>
				</ul>
			</li>
<!-- Товары -->
			<li>
				<a class="othersLink" href="index.php" title="На главную"><em>Товары</em></a>
				<ul>
					<li><a class="realty1Link" href="shop_insert.php" title="Ввод новой покупки"><em>Новая </em>покупка</a></li>
					<li><a class="realty1Link" href="shop_update.php" title="Изменение покупки"><em>Изменение </em>покупки</a></li>
				</ul>
			</li>
<!-- Категории -->
			<li>
                <a class="othersLink" href="index.php" title="На главную"><em>Категории</em></a>
				<ul>
<?php
/**/
// Выборка в цикле всех существующих групп
$result2 = mysqli_query($db, "SELECT * FROM shops ORDER BY gruppa");
$myrow2 = mysqli_fetch_array($result2);
$gruppa_header='';

	do
	{
		if ($myrow2['gruppa'] != $gruppa_header)
		{
			printf ("<li><a class='realty1Link' href='category.php?gruppa=%s' title='%s'>%s</a></li>", $myrow2['gruppa'], $myrow2['gruppa'], $myrow2['gruppa']);

// Окончание цикла групп
		
			$gruppa_header = $myrow2['gruppa'];
		}
	}
	while ($myrow2 = mysqli_fetch_array($result2));
	
//Закрытие объектов с результатами и подключение к базе данных
$result2->close(); // Категории, отсортированные по алфавиту
?>

				</ul>
			</li>
<!-- Поиск -->			
			<li>
				<a class="othersLink" href="index.php" title="На главную"><em>Поиск</em></a>
				<ul>
					<li><a class="realty1Link" href="poisk.php" title="Быстрый поиск товаров"><em>Быстрый</em> поиск</a></li>
					<li><a class="realty1Link" href="search.php" title="Комбинация параметров поиска"><em>Сложный поиск</em></a></li>
				</ul>
			</li>
<!-- Фотографии -->
			<li>
				<a class='othersLink' href='index.php' title='На главную'><em>Фотографии</em></a>
				<ul>
					<li><a class="realty1Link" href="gallery_new_2.php" title="Галерея фотографий"><em>Галерея </em>gallery_new_2</a></li> <!-- gallery_new_2.php -->
					<li><a class="realty1Link" href="gallery.php" title="Галерея фотографий"><em>Галерея </em>gallery</a></li>
					<li><a class="realty1Link" href="gallery_new.php" title="Галерея фотографий"><em>Галерея </em>gallery_new</a></li>
					<li><a class="realty1Link" href="photo_insert.php" title="Новое фото"><em>Новое </em>фото</a></li>
					<li><a class="realty1Link" href="photo_update.php" title="Изменение фото"><em>Изменение </em>фото</a></li>
				</ul>
			</li>
		</li>
	</ul> <!-- nav -->

</div> <!-- header -->
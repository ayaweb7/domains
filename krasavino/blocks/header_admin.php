<?php
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
//if (isset($_POST['view'])) {$title = $_POST['view'];}
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
		<link rel="shortcut icon" type="image/ico" href="../images/favicon.ico" />
	</head>
	
<body id='realty'>

<div id='header'>


<ul id='nav' name='top'>
		<li>
<!-- Главная -->
			<li class='first'>
				<a class='othersLink' href='index.php' title='На главную'><em>Главная</em></a>
			</li>
<!-- Страницы -->
			<li class='first'>
				<a class='othersLink' href='#' title=''><em>Страницы</em></a>
				<ul>
					<li><a class="realty1Link" href="settings_insert.php" title="Новая страница"><em>Новая </em>страница</a></li>
					<li><a class="realty1Link" href="settings_update.php" title="Изменение страницы"><em>Изменение </em>страницы</a></li>
				</ul>
			</li>
<!-- Магазины -->
			<li>
				<a class='othersLink' href='#' title=''><em>Магазины</em></a>
				<ul>
					<li><a class="realty1Link" href="stores.php" title="Все магазины">Магазины <em>(таблица)</em></a></li>
					<li><a class="realty1Link" href="store.php" title="Информация о магазинах">Магазины <em>(выбор)</em></a></li>
					<li><a class="realty1Link" href="store_insert.php" title="Новый магазин"><em>Новый </em>магазин</a></li>
					<li><a class="realty1Link" href="store_update.php" title="Изменение магазина">Изменение <em>магазина</em></a></li>
				</ul>
			</li>
<!-- Товары -->
			<li>
				<a class='othersLink' href='#' title=''><em>Товары</em></a>
				<ul>
					<li><a class="realty1Link" href="shop_insert.php" title="Ввод новой покупки"><em>Новая </em>покупка</a></li>
					<li><a class="realty1Link" href="shop_update.php" title="Изменение покупки"><em>Изменение </em>покупки</a></li>
				</ul>
			</li>
<!-- Категории -->
			<li>
                <a class='othersLink' href='#' title=''><em>Категории</em></a>
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
				<a class='othersLink' href='#' title=''><em>Поиск</em></a>
				<ul>
					<li><a class="realty1Link" href="poisk.php" title="Быстрый поиск товаров"><em>Быстрый</em> поиск</a></li>
					<li><a class="realty1Link" href="search.php" title="Комбинация параметров поиска"><em>Сложный поиск</em></a></li>
				</ul>
			</li>
<!-- Фотографии -->
			<li>
				<a class='othersLink' href='#' title=''><em>Фотографии</em></a>
				<ul>
					<li><a class="realty1Link" href="gallery_new_2.php" title="Галерея фотографий"><em>Галерея </em>gallery_new_2</a></li> <!-- gallery_new_2.php -->
					<li><a class="realty1Link" href="gallery.php" title="Галерея фотографий"><em>Галерея </em>gallery</a></li>
					<li><a class="realty1Link" href="gallery_new.php" title="Галерея фотографий"><em>Галерея </em>gallery_new</a></li>
					<li><a class="realty1Link" href="photo_insert.php" title="Новое фото"><em>Новое </em>фото</a></li>
					<li><a class="realty1Link" href="photo_update.php" title="Изменение фото"><em>Изменение </em>фото</a></li>
					<li><a class="realty1Link" href="python_code.php" title="Python"><em>Python</em></a></li>
					<li><a class="realty1Link" href="testing.php" title="PHP" target="_blank"><em>PHP</em>-testing</a></li>
					<li><a class="realty1Link" href="jpgrath_code.php" title="JpGrath"><em>JpGrath</em></a></li>
					<li><a class="realty1Link" href="jpgrath_code_bar.php" title="JpGrath_Bar"><em>JpGrath_Bar</em></a></li>
					<li><a class="realty1Link" href="jpgrath_code_shops.php" title="JpGrath_Shops" target="_blank"><em>Группировка</em></a></li>
					<li><a class="realty1Link" href="jpgrath_code_shops1.php" title="JpGrath_Shops" target="_blank"><em>Отдельно</em></a></li>
					<li><a class="realty1Link" href="jpgrath_code_shops1_shablon.php" title="JpGrath_Shops" target="_blank"><em>Шаблон</em></a></li>
					<li><a class="realty1Link" href="jpgrath_query.php" title="Выбор диаграммы" target="_blank"><em>Выбор диаграммы</em></a></li>
					<li><a class="realty1Link" href="plot_search1.php" title="Выбор графика">Построй <em>свой</em> график</a></li>
					<li><a class="realty1Link" href="plot_python.php" title="Графики Python">Графики <em>Python</em></a></li>
				</ul>
			</li>
		</li>
	</ul> <!-- nav -->

<div id='head_galery'>
<?php
/**/


for ($i = 1 ; $i <= 4 ; ++$i)
{
	$k = mt_rand(111, 345);

// Выборка фотографий
$result6 = mysqli_query($db, "SELECT * FROM photos WHERE number=$k");
$myrow6 = mysqli_fetch_array($result6);
	
printf ("<div id='head_%s'>
			<a href='../images/house_or/house_%s.jpg' target='_blank'><img src='../images/house/house_%s.jpg' title='%s: %s(%s)'></a>
		</div>", $i, $k, $k, $myrow6['date_photo'], $myrow6['notes'], $k);
		
//printf ("<div id='head_%s'>
//			<a href='https://disk.yandex.ru/client/disk/Загрузки/house_origin?idApp=client&dialog=slider&idDialog=/disk/Загрузки/house_origin/house_%s.jpg' //target='_blank'><img src='../images/house_header/house_%s.jpg' title='%s: %s(%s)'></a>
//		</div>", $i, $k, $k, $myrow6['date_photo'], $myrow6['notes'], $k);
}
// style='background-image: url(../images/house/house_%s.jpeg);'
//
?>

    </div>          	 
</div> <!-- header -->



<div id='container'> <!-- #container -->
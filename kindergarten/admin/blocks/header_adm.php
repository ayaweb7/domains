<?php
// Соединяемся с базой данных
require_once 'date_base.php';

//Пароль в админскую часть
include ("lock.php");  /* */

// Определение надписи для титула страницы
if (isset($_GET['page'])) {$page = $_GET['page'];}
//if (isset($_GET['good'])) {$good = $_GET['good'];}

// Выборка из таблицы 'pages' для подписи титулов страниц и печати заголовков
$result = mysqli_query($db, "SELECT * FROM pages WHERE page='$page'");
$myrow = mysqli_fetch_array($result);

if (isset($myrow1['title'])) {$title = $myrow1['title'];}
if (isset($myrow['title'])) {$title = $myrow['title'];}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" /> <!--  -->
		<title><?php echo $title; ?></title>
		<link href="css/screen.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="js/admin.js"></script><!---->
		<link rel="shortcut icon" type="image/ico" href="../img/favicon.ico" />
	</head>
	
<body>

<div id='header'>
	
	<ul id="nav">
		<li class="first"><a href="/" title="На главную"><em>Главная</em></a></li>

		<li>
<!--				
                    <a href="#" title="Разные выборки">Разные <em>выборки</em></a>
                    <ul>
                        <li><a href="list.php" title="Свежие вверху">Общий <em>список</em></a></li>
						<li><a href="bid.php" title="Свежие вверху">По <em>хостингам</em></a></li>
						
						<li><a href="#" title="Свежие вверху"><em></em></a></li>
						<li><a href="#" title="Свежие вверху">По внесённым <em>изменениям</em></a></li>
                    </ul>
-->

<!-- GOODS -->
			<li>
				<a class="pageLink" href="index.php" title="Товары"><em>Товары и услуги</em></a>
				<ul>
<?php
/**/
// Выборка в цикле всех существующих ссылок на страницы
$result3 = mysqli_query($db, "SELECT * FROM pages WHERE marker='good' ORDER BY page");
$myrow3 = mysqli_fetch_array($result3);
$good_header='';

	do
	{
		if ($myrow3['page'] != $good_header)
		{
			printf ("<li><a class='realty1Link' href='page.php?page=%s' title='%s'>%s</a></li>", $myrow3['page'], $myrow3['title'], $myrow3['menu']);

// Окончание цикла групп
		
			$good_header = $myrow3['page'];
		}
	}
	while ($myrow3 = mysqli_fetch_array($result3));
	
//Закрытие объектов с результатами и подключение к базе данных
$result3->close(); // Категории, отсортированные по алфавиту
?>
				</ul>
			</li>


<!-- PAGES -->
			<li>
				<a class="pageLink" href="index.php" title="Страницы">Страницы <em>сайта</em></a>
				<ul>

<?php
/**/
// Выборка в цикле всех существующих ссылок на страницы
$result2 = mysqli_query($db, "SELECT * FROM pages WHERE marker='page' ORDER BY page");
$myrow2 = mysqli_fetch_array($result2);
$page_header='';

	do
	{
		if ($myrow2['page'] != $page_header)
		{
			printf ("<li><a class='realty1Link' href='page.php?page=%s' title='%s'>%s</a></li>", $myrow2['page'], $myrow2['title'], $myrow2['menu']);

// Окончание цикла групп
		
			$page_header = $myrow2['page'];
		}
	}
	while ($myrow2 = mysqli_fetch_array($result2));
	
//Закрытие объектов с результатами и подключение к базе данных
$result2->close(); // Категории, отсортированные по алфавиту
?>
				</ul>
			</li>
<!--
					<li>
						<a class="othersLink" href="#" title="Частные объявления">Частные <em>объявления</em></a>
						<ul>
							<li><a class="realty1Link" href="ads_insert.php" title="Добавление">Новое <em>объявление</em></a></li>
							<li><a class="realty1Link" href="ads_update.php" title="Редактирование">Изменение <em>объявления</em></a></li>
							<li><a class="realty1Link" href="ads_drop.php" title="Удаление">Удаление <em>объявления</em></a></li>
							<li><a class="realty1Link" href="files_insert.php" title="Добавить файл">Добавить <em>файл</em></a></li>
							<li><a class="realty1Link" href="files_update.php" title="Изменить документ">Редактировать <em>документ</em></a></li>
							<li><a class="realty1Link" href="files_drop.php" title="Удалить документ">Удалить <em>документ</em></a></li>
						</ul>
					</li>
-->                
		</li>
	</ul> <!-- nav -->
               	 
</div> <!-- header -->

<div id='container'> <!-- #container -->
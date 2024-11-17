<?php
// Соединяемся с базой данных
require_once 'date_base.php';

// Определение надписи для титула страницы
if (isset($_GET['page'])) {
	$url = $_GET['page'];
	// Выборка из таблицы 'menu_admin' для подписи титулов страниц и печати заголовков
	$result = mysqli_query($db, "SELECT * FROM menu_admin WHERE url='$url'");
} else {
	$url = 'admin';
	// Выборка из таблицы 'menu_admin' для подписи титулов страниц и печати заголовков
	$result = mysqli_query($db, "SELECT * FROM menu_admin WHERE url='/admin'");
}
//echo $url;
$myrow = mysqli_fetch_array($result);
$title = $myrow['title'];
//echo $title;
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <title><?= $title ?></title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" type="text/css" href="/admin/css/screen.css">
        <link rel="shortcut icon" type="image/ico" href="img/favicon.ico">
    </head>

    <body>
        <div id='wrapper'>
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
				<div id='header'>

					<ul id="nav">
						<li class="first"><a href="/" title="На главную"><em>Главная</em></a></li>

						<li>

					<!-- GOODS -->
							<li>
								<a class="pageLink" href="/admin/index.php" title="Товары"><em>Товары и услуги</em></a>
								<ul>
					<?php
					/**/
					// Выборка в цикле всех существующих ссылок на страницы
					$result3 = mysqli_query($db, "SELECT * FROM pages WHERE marker='admin' ORDER BY name");
					$myrow3 = mysqli_fetch_array($result3);
					$good_header='';

						do
						{
							if ($myrow3['url'] != $good_header)
							{
								printf ("<li><a class='realty1Link' href='/admin/pages/page.php?page=%s' title='%s'>%s</a></li>", $myrow3['url'], $myrow3['title'], $myrow3['menu']);

					// Окончание цикла групп
							
								$good_header = $myrow3['url'];
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
								<a class="pageLink" href="/admin/index.php" title="Страницы">Страницы <em>сайта</em></a>
								<ul>

					<?php
					/**/
					// Выборка в цикле всех существующих ссылок на страницы
					$result2 = mysqli_query($db, "SELECT * FROM pages WHERE marker='admin' ORDER BY name");
					$myrow2 = mysqli_fetch_array($result2);
					$page_header='';

						do
						{
							if ($myrow2['url'] != $page_header)
							{
								printf ("<li><a class='realty1Link' href='/admin/pages/page.php?page=%s' title='%s'>%s</a></li>", $myrow2['url'], $myrow2['title'], $myrow2['menu']);

					// Окончание цикла групп
							
								$page_header = $myrow2['url'];
							}
						}
						while ($myrow2 = mysqli_fetch_array($result2));
						
					//Закрытие объектов с результатами и подключение к базе данных
					$result2->close(); // Категории, отсортированные по алфавиту
					?>
								</ul>
							</li>

						</li>
					</ul> <!-- nav -->
					
				</div> <!--header-->
            </header>

			<main>
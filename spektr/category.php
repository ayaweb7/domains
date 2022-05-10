<?php 
// Соединяемся с базой данных
require_once 'blocks/date_base.php';
session_start();

// Выборка из таблицы 'pages' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM pages WHERE page='category'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header.php");

printf ("<div class='container px-4 my-4'>
    <nav style='--bs-breadcrumb-divider: &quot;>' aria-label='breadcrumb'>
		<ol class='breadcrumb'>
			<li class='breadcrumb-item'><a href='index.php'>Главная</a></li>
			<li class='breadcrumb-item active'>%s</a></li>
		</ol>
	</nav>
	<h1 class='pb-2 border-bottom text-center test-custom'>%s</h1>
	<div class='row g-5'>
		<div class='col-md-8'>
			<div class='row g-4 py-5 row-cols-1 row-cols-lg-3'>", $category, $category);




// Выборка в цикле всех существующих категорий услуг и товаров
$result2 = mysqli_query($db, "SELECT * FROM goods WHERE category='$category' ORDER BY good");
$myrow2 = mysqli_fetch_array($result2);

if ($category != 'Услуги') {
	$file = 'good';
} else {
	$file = 'service';
}

$good='';
do
{
	if ($myrow2['good'] != $good)
	{
	$good = $myrow2['good'];
	printf ("<div class=''><!--feature col-->
				<h4 class='lead_p'>%s</h4>
				<div>
					<a href='%s.php?good=%s' title='%s'>
						<img src='img/objects/%s.jpg' class='d-block mx-lg-auto img-fluid img-thumbnail' title='%s' width='264' height='191'>
					</a>
				</div>
<!--					<div class='mx-5 text-center fw-bolder color-dark'><p>%s</p></div>-->
			</div>", $myrow2['good'], $file, $myrow2['good'], $myrow2['good'], $myrow2['photo'], $myrow2['good'], $myrow2['good']);

	}
}
	
while ($myrow2 = mysqli_fetch_array($result2));

		printf ("</div><!--row-->");

// Подключаем кнопки обратной связи
include ("blocks/order_call_921.php");

	printf ("</div><!--col-md-8-->");

// Подключаем accordion
include ("blocks/accordion.php");

// !***************** Закрытие базы данных и объектов с результатами *********************!
$result2->close(); // Товары внутри категории, отсортированные по алфавиту
$result1->close(); // Поля страницы, в соответствии с запросом
$db->close(); // Закрываем базу данных

 
// Подключаем FOOTER
include ("blocks/footer.php");
?>

	</div><!--row-->
</div><!--container-->
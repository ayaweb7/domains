<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'pages' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM pages WHERE page='mysql_page_update'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_adm.php");
?>

<!-- Начало кода INDEX -->
<div id="info">
	<h1><?php echo $myrow1['h1'] ?></h1>
	<?php printf ("<h2>%s</h2>", $myrow1['h2']); ?>


<?php
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['marker'])) {$marker = $_POST['marker'];}
if (isset($_POST['category'])) {$category = $_POST['category'];}
if (isset($_POST['good'])) {$good = $_POST['good'];}
if (isset($_POST['photo'])) {$photo = $_POST['photo'];}
if (isset($_POST['description'])) {$description = $_POST['description'];}
if (isset($_POST['keywords'])) {$keywords = $_POST['keywords'];}
if (isset($_POST['p1'])) {$p1 = $_POST['p1'];}
if (isset($_POST['p2'])) {$p2 = $_POST['p2'];}
if (isset($_POST['p3'])) {$p3 = $_POST['p3'];}
if (isset($_POST['title_g1'])) {$title_g1 = $_POST['title_g1'];}
if (isset($_POST['title_g2'])) {$title_g2 = $_POST['title_g2'];}
if (isset($_POST['title_g3'])) {$title_g3 = $_POST['title_g3'];}
if (isset($_POST['title_price'])) {$title_price = $_POST['title_price'];}
if (isset($_POST['g1'])) {$g1 = $_POST['g1'];}
if (isset($_POST['g2'])) {$g2 = $_POST['g2'];}
if (isset($_POST['g3'])) {$g3 = $_POST['g3'];}
if (isset($_POST['price'])) {$price = $_POST['price'];}
if (isset($_POST['item'])) {$item = $_POST['item'];}
//$id = (int) $id;
	
	$query = "UPDATE goods SET date='$date', marker='$marker', photo='$photo', description='$description', keywords='$keywords',
	p1='$p1', p2='$p2', p3='$p3', title_g1='$title_g1', title_g2='$title_g2', title_g3='$title_g3', title_price='$title_price', g1='$g1', g2='$g2', g3='$g3', price='$price', item='$item' WHERE id='$id'";
	
	// Проверка на ошибки при вводе в базу
	if ($result = mysqli_query($db, $query)) {
		echo "<p>Характеристики товара (услуги) <em>$good</em> успешно изменены</p>";
	} else {
		  echo "<p>У нас проблемы ! ! ! --- НЕудачный ввод - <em>Error: " . $query . "<br>" . mysqli_error($db) . "</em></p>";
	}

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$db->close(); // Закрываем базу данных


// Конец кода INDEX
printf ("</div>");

// Подключаем FOOTER
include ("blocks/footer_adm.php");
?>

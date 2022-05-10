<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'pages' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM pages WHERE page='mysql_specif_update'");
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
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['depth'])) {$depth = $_POST['depth'];}
if (isset($_POST['width'])) {$width = $_POST['width'];}
if (isset($_POST['lenght_mat'])) {$lenght_mat = $_POST['lenght_mat'];}
if (isset($_POST['lenght'])) {$lenght = $_POST['lenght'];}
if (isset($_POST['carbonat'])) {$carbonat = $_POST['carbonat'];}
if (isset($_POST['fund_100'])) {$fund_100 = $_POST['fund_100'];}
if (isset($_POST['fund_150'])) {$fund_150 = $_POST['fund_150'];}
if (isset($_POST['sborka'])) {$sborka = $_POST['sborka'];}
if (isset($_POST['price'])) {$price = $_POST['price'];}
if (isset($_POST['material'])) {$material = $_POST['material'];}
if (isset($_POST['list'])) {$list = $_POST['list'];}
if (isset($_POST['item'])) {$item = $_POST['item'];}
//$id = (int) $id;
	
	$query = "UPDATE specif SET date='$date', depth='$depth', width='$width', lenght_mat='$lenght_mat', lenght='$lenght', carbonat='$carbonat', fund_100='$fund_100', fund_150='$fund_150', sborka='$sborka', price='$price', material='$material', list='$list', item='$item' WHERE id='$id'";
	
	// Проверка на ошибки при вводе в базу
	if ($result = mysqli_query($db, $query)) {
		echo "<p>Характеристики товара (услуги) <em>$good</em> успешно изменены</p><br>
<p>Название товара: <em>$name;</em><br> Толщина: <em>$depth.</em><br> Ширина: <em>$width.</em><br> Цена: <em>$price.</em><br> Материал: <em>$material.</em><p><br><br>";
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

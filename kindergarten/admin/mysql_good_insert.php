<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'pages' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM pages WHERE page='mysql_good_insert'");
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
$id = (int) $id;

// Проверка на ошибки средствами PHP
$fail = validate_good($good);
$fail .= validate_category($category);

// PHP-функции
function validate_good($field) {return ($field == "") ? "<p><em>! ! !</em> Не введено название товара - <em>GOOD</em>.</p><br>" : "";}
function validate_category($field) {return ($field == "") ? "<p><em>! ! !</em> Не введена категория товара - <em>CATEGORY</em>.</p><br>" : "";}

if ($fail == "") {
	echo "<p>Проверка формы прошла успешно:</p><br>
<p>Название товара: <em>$good;</em><br> Категория товара: <em>$category.</em><p><br><br>";



	$query = "INSERT INTO goods(id, date, marker, category, good, photo, description, keywords, p1, p2, p3, title_g1, title_g2, title_g3, title_price, g1, g2, g3, price, item) VALUES ('$id', '$date', '$marker', '$category', '$good', '$photo', '$description', '$keywords', '$p1', '$p2', '$p3', '$title_g1', '$title_g2', '$title_g3', '$title_price', '$g1', '$g2', '$g3', '$price', '$item')";

	// Проверка на ошибки при вводе в базу
	if ($result = mysqli_query($db, $query)) {
		echo "Новый товар в базе";
	} else {
		  echo "У нас проблемы ! ! ! --- НЕудачный ввод - Error: <em>" . $query . "<br></em>" . mysqli_error($db);
	}

} else {
	echo $fail . "<br>";
	echo "<p><em>! ! !</em> ВВЕДИТЕ НЕЗАПОЛНЕННЫЕ ОБЯЗАТЕЛЬНЫЕ ПОЛЯ <em>! ! !</em></p>";
}

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$db->close(); // Закрываем базу данных


// Конец кода INDEX
printf ("</div>");

// Подключаем FOOTER
include ("blocks/footer_adm.php");
?>

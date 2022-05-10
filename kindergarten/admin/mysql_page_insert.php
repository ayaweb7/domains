<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'pages' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM pages WHERE page='mysql_page_insert'");
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
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['menu'])) {$menu = $_POST['menu'];}
if (isset($_POST['page'])) {$page = $_POST['page'];}
if (isset($_POST['title'])) {$title = $_POST['title'];}
if (isset($_POST['offer'])) {$offer = $_POST['offer'];}
if (isset($_POST['extra'])) {$extra = $_POST['extra'];}
if (isset($_POST['h1'])) {$h1 = $_POST['h1'];}
if (isset($_POST['h2'])) {$h2 = $_POST['h2'];}
if (isset($_POST['keywords'])) {$keywords = $_POST['keywords'];}
if (isset($_POST['description'])) {$description = $_POST['description'];}
if (isset($_POST['word'])) {$word = $_POST['word'];}
if (isset($_POST['photo_alt'])) {$photo_alt = $_POST['photo_alt'];}
if (isset($_POST['photo_name'])) {$photo_name = $_POST['photo_name'];}
$id = (int) $id;

// Проверка на ошибки средствами PHP
$fail = validate_name($name);
$fail .= validate_page($page);
$fail .= validate_title($title);

// PHP-функции
function validate_name($field) {return ($field == "") ? "<p><em>! ! !</em> Не введено русское название страницы - <em>NAME</em>.</p><br>" : "";}
function validate_page($field) {return ($field == "") ? "<p><em>! ! !</em> Не введено имя файла - <em>PAGE</em>.</p><br>" : "";}
function validate_title($field) {return ($field == "") ? "<p><em>! ! !</em> Не введен заголовок страницы на ярлыке - <em>TITLE</em>.</p><br>" : "";}

if ($fail == "") {
	echo "<p>Проверка формы прошла успешно:</p><br>
<p>Название страницы - NAME: $name;<br> Имя файла - PAGE: $page;<br> Заголовок - TITLE: $title.<p><br><br>";



	$query = "INSERT INTO pages(id, date, marker, name, menu, page, title, offer, extra, h1, h2, keywords, description, word, photo_alt, photo_name) VALUES ('$id', '$date', '$marker', '$name', '$menu', '$page', '$title', '$offer', '$extra', '$h1', '$h2', '$keywords', '$description', '$word', '$photo_alt', '$photo_name')";

	// Проверка на ошибки при вводе в базу
	if ($result = mysqli_query($db, $query)) {
		echo "Введена новая страница";
	} else {
		  echo "У нас проблемы ! ! ! --- НЕудачный ввод - Error: " . $query . "<br>" . mysqli_error($db);
	}

} else {
	echo $fail . "<br>";
	echo "<p><em>! ! !</em> Введите незаполненные обязательные поля <em>! ! !</em></p>";
}

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$db->close(); // Закрываем базу данных


// Конец кода INDEX
printf ("</div>");

// Подключаем FOOTER
include ("blocks/footer_adm.php");
?>

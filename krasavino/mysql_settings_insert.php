<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='mysql_settings_insert'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");

// Вычислитель
$page = $title = $h1 = $h2 = "";

if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['page'])) {$page = $_POST['page'];}
if (isset($_POST['title'])) {$title = $_POST['title'];}
if (isset($_POST['h1'])) {$h1 = $_POST['h1'];}
if (isset($_POST['h2'])) {$h2 = $_POST['h2'];}

$id = (int) $id;

$query = "INSERT INTO settings (id, page, title, h1, h2)
VALUES ('$id', '$page', '$title', '$h1', '$h2')";

// Проверка на ошибки при вводе в базу
if ($result = mysqli_query($db, $query)) {
	echo "Удачный ввод";
} else {
      echo "НЕудачный ввод - Error: " . $query . "<br>" . mysqli_error($db);
}

// Сообщение о результате ввода в базу
if ($result == 'true') {
print <<<HERE
<h6  style='font: 2em bold Georgia, "Times New Roman", Times, serif; color: #19910f;' align="center">$myrow1[h1]</h6> <!---->
HERE;
}
else {
print <<<HERE
<h6  style='font: 3em bold Georgia, "Times New Roman", Times, serif; color: #e50000;' align="center">$myrow1[h2]</h6> <!---->
HERE;
}

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result1->close(); // Титулы, заголовки из таблицы 'settings'
$db->close(); // Закрываем базу данных

// Подключаем FOOTER_SEARCH
include ("blocks/footer_store.php");
?>
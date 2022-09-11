<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='mysql_settings_update'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");

// Вычислитель
$title = $h1 = $h2 = "";

if (isset($_GET['settings_id'])) {$settings_id = $_GET['settings_id'];}

if (isset($_POST['settings_id'])) {$settings_id = $_POST['settings_id'];}
//if (isset($_POST['page'])) {$page = $_POST['page'];}
if (isset($_POST['title'])) {$title = $_POST['title'];}
if (isset($_POST['h1'])) {$h1 = $_POST['h1'];}
if (isset($_POST['h2'])) {$h2 = $_POST['h2'];}

// Выборка из таблицы 'settings' для определения названия страницы
$result = mysqli_query($db, "SELECT * FROM settings WHERE settings_id='$settings_id'");
$myrow = mysqli_fetch_array($result);
$page=$myrow['page'];
// Проверка на ошибки средствами PHP

$fail .= validate_title($title);
$fail .= validate_h1($h1);

// PHP-функции
function validate_title($field) {return ($field == "") ? "Не введено название страницы.<br>" : "";}
function validate_h1($field) {return ($field == "") ? "Не введен заголовок H1.<br>" : "";}

if ($fail == "")
{
echo "Проверка формы прошла успешно:<br>
ID: $settings_id;<br> PAGE: $page;<br> TITLE: $title;<br> H1: $h1;<br> H2: $h2.<br><br>";
}
else {
	echo $fail;
}

$query = "UPDATE settings SET title='$title', h1='$h1', h2='$h2' WHERE settings_id='$settings_id'";

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
//$result->close(); // Ошибки
$result1->close(); // Титулы, заголовки из таблицы 'settings'
$db->close(); // Закрываем базу данных

// Подключаем FOOTER_SEARCH
include ("blocks/footer_store.php");

//UPDATE shops SET shop='Энергия' WHERE shop='Электрика для электрика' AND gruppa='Сантехника';
?>
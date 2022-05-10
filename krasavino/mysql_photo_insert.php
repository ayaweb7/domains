<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='mysql_photo_insert'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");

// Вычислитель
$number = $date_photo = $date = $notes = "";

if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['number'])) {$number = $_POST['number'];}
if (isset($_POST['date_photo'])) {$date_photo = $_POST['date_photo'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['notes'])) {$notes = $_POST['notes'];}
$id = (int) $id;

// Проверка на ошибки средствами PHP
$fail = validateNumber($number);
$fail .= validateDatePhoto($date_photo);
$fail .= validateDate($date);
$fail .= validateNotes($notes);

// PHP-функции
function validateNumber($field) {return ($field == "") ? "Не введен номер фотографии.<br>" : "";}
function validateDatePhoto($field) {return ($field == "") ? "Не введена дата фотографии.<br>" : "";}
function validateDate($field) {return ($field == "") ? "Не введена дата фотографии в формате даты.<br>" : "";}
function validateNotes ($field) {return ($field == "") ? "Не введено описание фотографии.<br>" : "";}

if ($fail == "")
{
echo "Проверка формы прошла успешно:<br>
Номер фото: $number;<br> Дата фотографии: $date_photo;<br> Дата фотографии в формате даты: $date;<br> Описание: $notes;<br>";
}

$query = "INSERT INTO photos (id, number, date_photo, date, notes) VALUES ('$id', '$number', '$date_photo', '$date', '$notes')";

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
$db->close(); // Закрываем базу данных

// Подключаем FOOTER_SEARCH
include ("blocks/footer_search.php");
?>
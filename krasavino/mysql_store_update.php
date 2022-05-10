<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='mysql_shop_update'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");

// Вычислитель
$shop = $street = $house = $phone = $date = "";

if (isset($_POST['id_store'])) {$id_store = $_POST['id_store'];}
if (isset($_POST['shop'])) {$shop = $_POST['shop'];}
if (isset($_POST['street'])) {$street = $_POST['street'];}
if (isset($_POST['house'])) {$house = $_POST['house'];}
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
if (isset($_POST['date_store'])) {$date_store = $_POST['date_store'];}

// Проверка на ошибки средствами PHP

$fail .= validate_shop($shop);
$fail .= validate_street($street);
$fail = validate_date($date_store);

// PHP-функции
function validate_shop($field) {return ($field == "") ? "Не введено название магазина.<br>" : "";}
function validate_street($field) {return ($field == "") ? "Не введена улица.<br>" : "";}
function validate_date($field) {return ($field == "") ? "Не введена дата ввода информации.<br>" : "";}

if ($fail == "")
{
echo "Проверка формы прошла успешно:<br>
ID_STORE: $id_store;<br> Дата: $date;<br> Город: $town;<br> Магазин: $shop;<br> Улица: $street;<br> Дом: $house;<br> Телефон: $phone.<br><br>";
}
else {
	echo "BAD";
}

$query = "UPDATE store SET date_store='$date_store', street='$street', house='$house', shop='$shop', phone='$phone' WHERE id_store='$id_store'";

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
include ("blocks/footer_store.php");

//UPDATE shops SET shop='Энергия' WHERE shop='Электрика для электрика' AND gruppa='Сантехника';
?>
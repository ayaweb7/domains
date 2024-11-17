<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='mysql_shop_insert'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");

// Вычислитель
$date = $shop = $gruppa = $name = $characteristic = $quantity = $price = $amount = "";

if (isset($_POST['shops_id'])) {$shops_id = $_POST['shops_id'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['shop'])) {$shop = $_POST['shop'];}
if (isset($_POST['gruppa'])) {$gruppa = $_POST['gruppa'];}
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['characteristic'])) {$characteristic = $_POST['characteristic'];}
if (isset($_POST['quantity'])) {$quantity = $_POST['quantity'];}
if (isset($_POST['item'])) {$item = $_POST['item'];}
if (isset($_POST['price'])) {$price = $_POST['price'];}
if (isset($_POST['amount'])) {$amount = $_POST['amount'];}
if (isset($_POST['store_id'])) {$store_id = $_POST['store_id'];}
$shops_id = (int) $shops_id;

// Проверка на ошибки средствами PHP
$fail = validate_date($date);
$fail .= validate_shop($shop);
$fail .= validate_gruppa($gruppa);
$fail .= validate_name($name);
$fail .= validate_characteristic($characteristic);
$fail .= validate_quantity($quantity);
$fail .= validate_price($price);
$fail .= validate_amount($amount);

// PHP-функции
function validate_date($field) {return ($field == "") ? "Не введена дата покупки.<br>" : "";}
function validate_shop($field) {return ($field == "") ? "Не введено название магазина.<br>" : "";}
function validate_gruppa($field) {return ($field == "") ? "Не введена категория товара.<br>" : "";}
function validate_name($field) {return ($field == "") ? "Не введено наименование товара.<br>" : "";}
function validate_characteristic($field) {return ($field == "") ? "Не введены характеристики товара.<br>" : "";}
function validate_quantity($field) {return ($field == "") ? "Не введено количество товара.<br>" : "";}
function validate_price($field) {return ($field == "") ? "Не введена цена товара.<br>" : "";}
function validate_amount($field) {return ($field == "") ? "Не введена стоимость товара.<br>" : "";}

if ($fail == "")
{
	echo "Проверка формы прошла успешно:<br>
Дата: $date;<br> Магазин: $shop;<br> Категория: $gruppa;<br> Наименование: $name;<br> Характеристики: $characteristic;<br>
Количество: $quantity $item;<br> Цена: $price руб.;<br> Стоимость: $amount руб.<br><br>";
} else {
	echo "BAD";
}

// Определение значения 'ID_STORE'
// Выборка из таблицы 'store' соответствия 'shop' & 'id_store'
$result2 = mysqli_query($db, "SELECT * FROM store WHERE shop='$shop'");
$myrow2 = mysqli_fetch_array($result2);
$store_id = $myrow2['store_id'];

$query = "INSERT INTO shops (shops_id, date, shop, gruppa, name, characteristic, quantity, item, price, amount, store_id)
VALUES ('$shops_id', '$date', '$shop', '$gruppa', '$name','$characteristic', '$quantity', '$item', '$price', '$amount', '$store_id')";

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
$result2->close(); // Различные данные из таблицы 'store'
$db->close(); // Закрываем базу данных

// Подключаем FOOTER_SEARCH
include ("blocks/footer_search.php");
?>
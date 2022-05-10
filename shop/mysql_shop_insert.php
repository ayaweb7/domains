<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='mysql_shop_insert'");
$myrow1 = mysqli_fetch_array($result1);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="css/screen.css" type="text/css" rel="stylesheet" />
<title><?php echo $myrow1['title'] ?></title>
</head>

<body>
<!-- Подключаем HEADER -->
		<?php include ("header_admin.php"); ?>

<?php
// Устанавливаем соединение
$db = mysqli_connect ("localhost","nikart","arteeva12","agency");
//mysqli_select_db ($db, "agency");

// Проверяем соединение
//if (!$db) {
//      die("Connection failed: " . mysqli_connect_error());
//}
//echo "Соединение УСПЕШНО!". "<br>";

if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['town'])) {$town = $_POST['town'];}
if (isset($_POST['adress'])) {$adress = $_POST['adress'];}
if (isset($_POST['shop'])) {$shop = $_POST['shop'];}
if (isset($_POST['gruppa'])) {$gruppa = $_POST['gruppa'];}
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['characteristic'])) {$characteristic = $_POST['characteristic'];}
if (isset($_POST['quantity'])) {$quantity = $_POST['quantity'];}
if (isset($_POST['item'])) {$item = $_POST['item'];}
if (isset($_POST['price'])) {$price = $_POST['price'];}
if (isset($_POST['amount'])) {$amount = $_POST['amount'];}
if (isset($_POST['id_store'])) {$id_store = $_POST['id_store'];}

$id = (int) $id;

//$db = mysqli_connect ("localhost","nikart","arteeva12");
//mysqli_select_db ($db, "agency");

$query = "INSERT INTO shops (id, date, town, adress, shop, gruppa, name,characteristic, quantity, item, price, amount, id_store) VALUES ('$id', '$date', '$town', '$adress', '$shop', '$gruppa', '$name','$characteristic', '$quantity', '$item', '$price', '$amount', '$id_store')";
//$result = mysqli_connect($db, $query))

// Проверяем создание новой записи
if ($result = mysqli_query($db, $query)) {
      echo "";
} else {
      echo "Error: " . $query . "<br>" . mysqli_error($db);
}
mysqli_close($db);


if ($result == 'true')
{
print <<<HERE
<h6  style='font: 2em bold Georgia, "Times New Roman", Times, serif; color: #19910f;' align="center">$myrow1[h1]</h6>
HERE;
}
else
{
print <<<HERE
<h6  style='font: 3em bold Georgia, "Times New Roman", Times, serif; color: #e50000;' align="center">$myrow1[h2]</h6>
HERE;
}

?>
<p align="center"><a onclick="javascript: history.back(); return falshe;"><img src="images/tovar.png" id="send"/></a></p>
</body>
</html>
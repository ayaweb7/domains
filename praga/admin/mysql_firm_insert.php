<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Недвижимость фирм г.Коряжмы в одну базу данных</title>
</head>

<body>
<?php
include ("lock.php"); /* Пароль в админскую часть */
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['firm'])) {$firm = $_POST['firm'];}
if (isset($_POST['area'])) {$area = $_POST['area'];}
if (isset($_POST['region'])) {$region = $_POST['region'];}
if (isset($_POST['town'])) {$town = $_POST['town'];}
if (isset($_POST['street'])) {$street = $_POST['street'];}
if (isset($_POST['house'])) {$house = $_POST['house'];}
if (isset($_POST['square'])) {$square = $_POST['square'];}
if (isset($_POST['rooms'])) {$rooms = $_POST['rooms'];}
if (isset($_POST['balcony'])) {$balcony = $_POST['balcony'];}
if (isset($_POST['wall'])) {$wall = $_POST['wall'];}
if (isset($_POST['improved'])) {$improved = $_POST['improved'];}
if (isset($_POST['floor'])) {$floor = $_POST['floor'];}
if (isset($_POST['trade'])) {$trade = $_POST['trade'];}
if (isset($_POST['price'])) {$price = $_POST['price'];}
if (isset($_POST['type'])) {$type = $_POST['type'];}
if (isset($_POST['category'])) {$category = $_POST['category'];}
if (isset($_POST['application'])) {$application = $_POST['application'];}
if (isset($_POST['note'])) {$note = $_POST['note'];}



$db = mysql_connect("localhost","nikart_realty","arteeva69");
mysql_select_db("nikart_realty",$db);


$result = mysql_query("INSERT INTO flats_firm (id,firm,area,region,town,street,house,square,rooms,balcony,wall,improved,floor,trade,price,type,category,application,note) VALUES ('$id','$firm','$area','$region','$town','$street','$house','$square','$rooms','$balcony','$wall','$improved','$floor','$trade','$price','$type','$category','$application','$note')");

if ($result == 'true')
{
echo "Новая недвижимость в базе данных";
}
else
{
echo "У нас проблемы ! ! !";
}

?>

<p><a href="index_adm.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>
<p><a href="firm_insert.html" title="Назад">Назад <em>на ввод данных</em></a></p>
</body>
</html>
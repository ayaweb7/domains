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
if (isset($_POST['street'])) {$street = $_POST['street'];}
if (isset($_POST['house'])) {$house = $_POST['house'];}
if (isset($_POST['street_dop'])) {$street_dop = $_POST['street_dop'];}
if (isset($_POST['house_dop'])) {$house_dop = $_POST['house_dop'];}
if (isset($_POST['type'])) {$type = $_POST['type'];}
if (isset($_POST['wall'])) {$wall = $_POST['wall'];}
if (isset($_POST['walls'])) {$walls = $_POST['walls'];}
if (isset($_POST['improved'])) {$improved = $_POST['improved'];}
if (isset($_POST['floors'])) {$floors = $_POST['floors'];}
if (isset($_POST['photo1'])) {$photo1 = $_POST['photo1'];}
if (isset($_POST['photo2'])) {$photo2 = $_POST['photo2'];}
if (isset($_POST['orientation'])) {$orientation = $_POST['orientation'];}

$db = mysql_connect("localhost","nikart_realty","arteeva69");
mysql_select_db("nikart_realty",$db);


$result = mysql_query("INSERT INTO houses (id,street,house,street_dop,house_dop,type,wall,walls,improved,floors,photo1,photo2,orientation) VALUES ('$id','$street','$house','$street_dop','$house_dop','$type','$wall','$walls','$improved','$floors','$photo1','$photo2','$orientation')");

if ($result == 'true')
{
echo "Дом занесен в базу";
}
else
{
echo "У НАС ПРОБЛЕМЫ ! ! !";
}

?>
<p><a href="house_insert.php" title="Назад">Назад <em>на ввод</em></a></p>

</body>
</html>
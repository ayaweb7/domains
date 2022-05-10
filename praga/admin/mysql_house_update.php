<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Редактирование домов</title>
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
mysql_select_db("praga",$db);


$result = mysql_query("UPDATE houses SET street='$street',house='$house',street_dop='$street_dop',house_dop='$house_dop',type='$type',wall='$wall',walls='$walls',improved='$improved',floors='$floors',photo1='$photo1',photo2='$photo2',orientation='$orientation' WHERE id='$id'");

if ($result == 'true')
{
echo "Информация по дому в базе обновлена";
}
else
{
echo "У НАС ПРОБЛЕМЫ ! ! !";
}

?>
<p><a href="house_update.php" title="Назад">Назад <em>в редактирование</em></a></p>

</body>
</html>
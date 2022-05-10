<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Удаление квартир</title>
</head>

<body>
<?php
include ("lock.php"); /* Пароль в админскую часть */
if (isset($_POST['id'])) {$id = $_POST['id'];}

$db = mysql_connect("localhost","nikart_realty","arteeva69");
mysql_select_db("praga",$db);


$result = mysql_query("DELETE FROM houses WHERE id='$id'");

if ($result == 'true')
{
echo "Этого дома больше нет";
}
else
{
echo "У нас проблемы ! ! !";
}

?>

<p><a href="house_drop.php" title="ID">Ввод <em>ID</em></a></p>
</body>
</html>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Редактирование страниц</title>
</head>

<body>
<?php
//include ("lock.php"); /* Пароль в админскую часть */
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['ads'])) {$ads = $_POST['ads'];}
if (isset($_POST['price'])) {$price = $_POST['price'];}
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
if (isset($_POST['paper'])) {$paper = $_POST['paper'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}


$db = mysql_connect("localhost","nikart_realty","arteeva69");
mysql_select_db("nikart_realty",$db);


$result = mysql_query("UPDATE ads SET ads='$ads',price='$price',name='$name',phone='$phone',paper='$paper',date='$date' WHERE id='$id'");

if ($result == 'true')
{
echo "Частное объявление успешно изменено!";
}
else
{
echo "У нас проблемы ! ! !";
}

?>
<p><a href="ads_update.php" title="Назад">Назад <em>на выбор объявления</em></a></p>

</body>
</html>
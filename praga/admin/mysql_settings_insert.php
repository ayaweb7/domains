<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Обработчик страниц</title>
</head>

<body>
<?php
include ("lock.php"); /* Пароль в админскую часть */
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['page'])) {$page = $_POST['page'];}
if (isset($_POST['title'])) {$title = $_POST['title'];}
if (isset($_POST['meta_d'])) {$meta_d = $_POST['meta_d'];}
if (isset($_POST['meta_k'])) {$meta_k = $_POST['meta_k'];}
if (isset($_POST['h1'])) {$h1 = $_POST['h1'];}
if (isset($_POST['h2'])) {$h2 = $_POST['h2'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['month'])) {$date = $_POST['month'];}
if (isset($_POST['text'])) {$date = $_POST['text'];}


$db = mysql_connect("localhost","nikart_realty","arteeva69");
mysql_select_db("nikart_realty",$db);


$result = mysql_query("INSERT INTO settings (id,page,title,meta_d,meta_k,h1,h2,date,month,text) VALUES ('$id','$page','$title','$meta_d','$meta_k','$h1','$h2','$date','$month','$text')");

if ($result == 'true')
{
echo "Введена новая страница";
}
else
{
echo "У нас проблемы ! ! !";
}

?>
<p><a href="index_adm.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>

</body>
</html>
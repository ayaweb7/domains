<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Редактирование страниц</title>
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
if (isset($_POST['month'])) {$month = $_POST['month'];}
if (isset($_POST['text'])) {$text = $_POST['text'];}


$db = mysql_connect("localhost","nikart_realty","arteeva69");
mysql_select_db("nikart_realty",$db);


$result = mysql_query("UPDATE settings SET page='$page',title='$title',meta_d='$meta_d',meta_k='$meta_k',h1='$h1',h2='$h2',date='$date',month='$month',text='$text' WHERE id='$id'");

if ($result == 'true')
{
echo "Обновление страниц завершилось успешно!";
}
else
{
echo "У нас проблемы ! ! !";
}

?>
<p><a href="settings_update.php" title="Назад">Назад <em>на ввод номера</em></a></p>

</body>
</html>
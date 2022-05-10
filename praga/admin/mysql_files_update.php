<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Изменение документа</title>
</head>

<body>
<?php
include ("lock.php"); /* Пароль в админскую часть */
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['type'])) {$type = $_POST['type'];}
if (isset($_POST['title'])) {$title = $_POST['title'];}
if (isset($_POST['link'])) {$link = $_POST['link'];}
if (isset($_POST['download'])) {$download = $_POST['download'];}
if (isset($_POST['summary'])) {$summary = $_POST['summary'];}
if (isset($_POST['text'])) {$text = $_POST['text'];}


$db = mysql_connect("localhost","nikart_realty","arteeva69");
mysql_select_db("nikart_realty",$db);


$result = mysql_query("UPDATE form SET type='$type',title='$title',link='$link',download='$download',summary='$summary',text='$text' WHERE id='$id'");

if ($result == 'true')
{
echo "Документ на сайте успешно изменён!";
}
else
{
echo "У нас проблемы ! ! !";
}

?>
<p><a href="files_update.php" title="Назад">Назад <em>на ввод номера</em></a></p>

</body>
</html>
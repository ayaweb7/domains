<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Редактирование агентств</title>
</head>

<body>
<?php
mysql_query('SET NAMES utf8');
include ("lock.php"); /* Пароль в админскую часть */
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['street'])) {$street = $_POST['street'];}
if (isset($_POST['house'])) {$house = $_POST['house'];}
if (isset($_POST['title'])) {$title = $_POST['title'];}
if (isset($_POST['full'])) {$full = $_POST['full'];}
if (isset($_POST['office'])) {$office = $_POST['office'];}
if (isset($_POST['add_office'])) {$add_office = $_POST['add_office'];}
if (isset($_POST['phone1'])) {$phone1 = $_POST['phone1'];}
if (isset($_POST['phone2'])) {$phone2 = $_POST['phone2'];}
if (isset($_POST['phone3'])) {$phone3 = $_POST['phone3'];}
if (isset($_POST['phone4'])) {$phone4 = $_POST['phone4'];}
if (isset($_POST['phone5'])) {$phone5 = $_POST['phone5'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['skype'])) {$skype = $_POST['skype'];}
if (isset($_POST['www'])) {$www = $_POST['www'];}
if (isset($_POST['photo'])) {$photo = $_POST['photo'];}
if (isset($_POST['chief'])) {$chief = $_POST['chief'];}
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['working'])) {$working = $_POST['working'];}
if (isset($_POST['services'])) {$services = $_POST['services'];}
if (isset($_POST['note'])) {$note = $_POST['note'];}

$db = mysql_connect("localhost","nikart_realty","arteeva69");
mysql_select_db("nikart_realty",$db);


$result = mysql_query("UPDATE agency SET street='$street',house='$house',title='$title',full='$full',office='$office',add_office='$add_office',phone1='$phone1',phone2='$phone2',phone3='$phone3',phone4='$phone4',phone5='$phone5',email='$email',skype='$skype',www='$www',photo='$photo',chief='$chief',name='$name',working='$working',services='$services',note='$note' WHERE id='$id'");

if ($result == 'true')
{
echo "У АГЕНТСТВА изменились данные";
}
else
{
echo "У НАС ПРОБЛЕМЫ ! ! !";
}

?>
<p><a href="agency_update.php" title="Назад">Назад <em>в редактирование</em></a></p>

</body>
</html>
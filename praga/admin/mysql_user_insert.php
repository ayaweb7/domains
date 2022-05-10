<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Список пользователей</title>
</head>

<body>
<?php
include ("lock.php"); /* Пароль в админскую часть */
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['login'])) {$login = $_POST['login'];}
if (isset($_POST['pass'])) {$pass = $_POST['pass'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['pay'])) {$pay = $_POST['pay'];}
if (isset($_POST['qt'])) {$qt = $_POST['qt'];}
if (isset($_POST['ip'])) {$ip = $_POST['ip'];}
if (isset($_POST['area'])) {$area = $_POST['area'];}
if (isset($_POST['data_reg'])) {$data_reg = $_POST['data_reg'];}
if (isset($_POST['data_pay'])) {$data_pay = $_POST['data_pay'];}
if (isset($_POST['data_last'])) {$data_last = $_POST['data_last'];}
if (isset($_POST['data_vizit'])) {$data_vizit = $_POST['data_vizit'];}



$db = mysql_connect("localhost","nikart_realty","arteeva69");
mysql_select_db("nikart_realty",$db);


$result = mysql_query("INSERT INTO user (id,login,pass,email,pay,qt,ip,area,data_reg,data_last,data_pay,data_vizit) VALUES ('$id','$login','$pass','$email','$pay','$qt','$ip','$area','$data_reg','$data_last','$data_pay','$data_vizit')");

if ($result == 'true')
{
echo "Регистрация нового пользователя";
}
else
{
echo "У нас проблемы ! ! !";
}

?>

<p><a href="index_admin.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>
<p><a href="user_insert.php" title="Назад">Назад <em>на ввод данных</em></a></p>
</body>
</html>
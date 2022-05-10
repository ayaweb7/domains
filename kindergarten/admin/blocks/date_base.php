<?php  // date_base.php
$hostname = 'localhost';
$database = 'kinder';
$username = 'nikart';
$password = 'arteeva12';

$db = mysqli_connect($hostname, $username, $password) or die("Нет связи с СЕРВЕРОМ"); // Can't connect to SERVER
mysqli_select_db($db, $database) or die("Не могу выбрать БД"); // Can't select DB
mysqli_set_charset($db, "utf8") or die("Не могу подключить arte0374_spektr"); // Can't set AGENCY

//$db = new mysqli($hostname, $username, $password, $database);
if ($db->connect_error) die($db->connect_error);
//echo "OK";
?>
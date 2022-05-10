<?php // login1.php
$db_hostname = 'localhost';
$db_database = 'meteo';
$db_username = 'nikart';
$db_password = 'arteeva12';

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

/*
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysqli_error());

mysqli_select_db($db_server, $db_database)
		or die("Невозможно выбрать базу данных: " . mysqli_error());
*/		
?>
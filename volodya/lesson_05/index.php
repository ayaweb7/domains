<?php

define('MYSITE', 1);

require_once('config.php');

// Единый класс для общения с различными типами элементов баз данных
try
{
	$dbh = new PDO("mysql: dbname={$dbName}; host={$dbHost}; port={$dbPort}", $dbUser, $dbPass);
}
catch(PDOException $e)
{
	echo'<p>Не получается подключиться к базе данных</p>';
	echo $e ->getMessage();
	die();
}

?>

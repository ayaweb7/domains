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

try
{
	$from = 2;
	$to = 5;
	
	$stmt = $dbh->prepare("SELECT * FROM `test` WHERE `id`>=:from AND `id`<=:to");
	
//	$stmt->bindParam(':from', $from);
	$stmt->bindValue(':from', $from);
	$stmt->bindValue(':to', $to);
	
	$from = 1;
	
	$stmt->execute();
	
	while($row = $stmt->fetch())
	{
		echo $row[0], ' ', $row[1], '<br/>';
	}
	
	$stmt = $dbh->query("SELECT * FROM test");
	/*
	while($row = $stmt->fetch())
	{
		echo $row['id'], ' ', $row['datum'], '<br/>';
	}
	*/
}
catch(PDOException $e)
{
	echo'<p>Ошибка</p>';
}
?>

<?php

define('MYSITE', 1);

require_once('config.php');

// Единый класс для общения с различными типами элементов баз данных
try
{
//	$dbh = new PDO("mysql: dbname={$dbName}; host={$dbHost}; port={$dbPort}", $dbUser, $dbPass);
	
	$dbh1 = mysqli_connect ("localhost","test","test","test");
	$result1 = mysqli_query($dbh1, "SELECT * FROM test");
	$dbh = mysqli_fetch_array($result1);
}
catch(PDOException $e)
{
	echo'<p>Не получается подключиться к базе данных</p>';
	echo $e ->getMessage();
	die();
}

echo $dbh[1]

try
{
	
	$stmt = $dbh->prepare("SELECT * FROM shops");
	$stmt->execute();
	
	while($row = $stmt->fetch())
	{
		echo $row[0], ' ', $row[1], '<br/>';
	}
	
	$stmt = $dbh->query("SELECT * FROM shops");
	
	while($row = $stmt->fetch())
	{
		echo $row[0], ' ', $row[1], '<br/>';
	}
	
	
}

catch(PDOException $e)
{
	echo'<p>Ошибка</p>';
}
?>

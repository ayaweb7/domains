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
	$stmt = $dbh->prepare("INSERT INTO `test` (`datum`) VALUES (:datum)");
	$stmt ->bindValue(':datum', filter_input(INPUT_GET, 'datum', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
	$res = $stmt ->execute();
	
	if($res)
	{
		header('Location: index.php');
	}
	else
	{
		echo 'Не получается добавить данные';
	}
}
catch(PDOException $e)
{
	echo '<p>Ошибка</p>';
}
?>

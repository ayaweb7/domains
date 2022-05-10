<?php
define('MYSITE', 1);
require_once('config.php');

session_start();

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
	$stmt = $dbh->prepare("SELECT * FROM `login1` WHERE `login_name`>=:login_name");
	
	$stmt->bindValue(':login_name', filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
	$stmt->execute();
	
	if(($row = $stmt -> fetch()) && password_verify($_POST['password'], $row['login_pass_hash']))
	{
		$_SESSION['login_name'] = $row['login_name'];
		$_SESSION['login_id'] = $row['id'];
		$_SESSION['email'] = $row['email'];
		
		header('Location: index.php');
	}
	else
	{
		echo'Не верные данные';
	}
}
catch(PDOException $e)
{
	echo'<p>Ошибка</p>';
}
?>

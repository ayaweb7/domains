<?php

// Соединяемся с базой данных
require_once 'date_base.php';


// Выборка из таблицы 'users' для подписи титулов страниц и печати заголовков
//$result = mysqli_query($db, "SELECT * FROM users");
//$myrow = mysqli_fetch_array($result);

	
if (!empty($_POST['pass']) and !empty($_POST['login'])) {
	$login = $_POST['login'];
	$password = $_POST['pass'];
	
	$query = "SELECT * FROM users WHERE login='$login' AND pass='$password'";
	$result = mysqli_query($db, $query);
	$user = mysqli_fetch_assoc($result);
	
	if (!empty($user)) {
//		session_start();
		$_SESSION['auth'] = true;
		$_SESSION['message'] = [
        'text' => 'Здравствуйте ' .$login. '! Вы успешно авторизованы!',
        'status' => 'success'
		];
		$_SESSION['login'] = $login;
		header('Location: ../'); die();
	} else {
		echo 'неверно ввел логин или пароль<br>';
		echo 'попробуй ещё разок!<br>';
		include '../forms/form_login.php';
	}
} else {
	include '../forms/form_login.php';
}

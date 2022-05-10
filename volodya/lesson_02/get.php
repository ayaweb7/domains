<?php
// Запускаем сессию
session_start();

// Делаем белый (пустой) список из всех возможных полей в формах
$whitelist = array(
	'name' => 'name',
	'computername' => 'computername',
	'fingercount' => 'fingercount'
);
// Получаем, используя белый список, только те ключи которые БЫЛИ переданы И находятся внутри белого списка
$incoming = array_keys(array_intersect_key($_GET, $whitelist));

// Проходим в цикле по КАЖДОМУ возможному полю формы и записываем значения в сессию
foreach($incoming as $key)
{
	$_SESSION[$key]=$_GET[$key];
}

// Перенаправляем данные и очищаем адресную строку
header('Location: show.php');
?>
<?php

// Определяет подключаемый файл (сайт)
define('MY_SITE', 1);

// Подключает файл конфигурации только 1 раз (в первый раз)
require_once('config.php');

if ($sayHello)
{
	echo 'Hellow World ! ! !';
}
?>

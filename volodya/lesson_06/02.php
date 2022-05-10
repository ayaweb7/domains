<?php
// Создаем класс

function __autoload($class_name) {
	require_once $class_name . '.class.php';
}

$a = new MyClass();

$a -> test();
?>

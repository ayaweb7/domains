<?php
session_start(); //Запускаем сессии
include_once "header.php"; //Подключаем header сайта

include_once "../class/Request.php"; //Подключаем класс для работы с Вложенные запросы MySQL

$request = new Request();
$category_arr = $request->getCategory();
foreach ($category_arr as $category) { //Обходим список категорий
    echo $category->name . " [" . $category->count . "] <br/>"; //Выводим категории на экран
}
?>
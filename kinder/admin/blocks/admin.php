<?php
session_start(); //Запускаем сессии
//include_once "header.php"; //Подключаем header сайта

include_once "../class/Admin.php"; //Подключаем класс для работы с Вложенные запросы MySQL

$admin = new Admin();
$menu_arr = $admin->getMenu();
foreach ($menu_arr as $menu) { //Обходим список категорий
    echo "Название: " .$menu->name . "; Title: " . $menu->title . ". <br/>"; //Выводим категории на экран
}
?>
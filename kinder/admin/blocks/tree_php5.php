<?php
session_start(); //Запускаем сессии
include_once "header.php"; //Подключаем header сайта

include_once "../class/NavAdmin.php"; //Подключаем класс для дерева (меню неограниченной вложености) 

// Worked code!
$tree = new NavAdmin(); 
$tree->outTree(0, 0); //Выводим дерево

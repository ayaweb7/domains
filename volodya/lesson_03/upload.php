<?php
/*
* (c) 2015 Володя Моженков
*
* Свободно распространяется по следующим лицензиям (по вашему желанию):
* - GPL 3.0
* - GFDL 1.3
*
*/

// http://php.net/manual/ru/features.file-upload.php

// ВНИМАНИЕ: ЭТО СУПЕР УПРОЩЁННЫЙ ПОДХОД. ОН ПРИВЕДЁТ К ВЗЛОМУ ВАШЕГО САЙТА. НИКОГДА НЕ ИСПОЛЬЗУЙТЕ ЕГО !!!!!
// Приводится ТОЛЬКО для демонстрации. Смотрите дальнейший код для реального подхода !!!!


$dirname = __DIR__ . '/files/';
$filename = $dirname . $_FILES['myfile']['name'];

move_uploaded_file($_FILES['myfile']['tmp_name'], $filename);

header('Location: show.php');
?>
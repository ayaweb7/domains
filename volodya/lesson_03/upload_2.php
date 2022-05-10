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

$allowedTypes = array (
	'image/png' => 'png', 'image/jpeg' => 'jpeg', 'image/jpg' => 'jpg'
);

if(is_array($_FILES) && is_array($_FILES['myfile']))
{
	if($_FILES['myfile']['size'] == 0)
	{
		echo 'Файл пустой';
		die();
	}
	else if($_FILES['myfile']['error'] != 0)
	{
		echo 'Произошла ошибка при загрузке файла!';
		echo '<pre>'; print_r(error_get_last());'</pre>';
		die();
	}
	else if(!array_key_exists($_FILES['myfile']['type'], $allowedTypes))
	{
		echo 'Данный тип файла запрещен!';
		die();
	}
	else
	{
		$dirname = __DIR__ . '/files/';
		$name = sha1_file($_FILES['myfile']['tmp_name']);
		$extension = $allowedTypes[$_FILES['myfile']['type']];
		$filename = $dirname . $name . '.' . $extension;
		
		$result = move_uploaded_file($_FILES['myfile']['tmp_name'], $filename);
		
		if(!$result)
		{
			echo 'Ошибка при перемещении файла!';
			echo '<pre>'; print_r(error_get_last());'</pre>';
			die();
		}
		
		header('Location: show.php');
	}
}
else
{
	echo'<p>Вообще ничего не загрузили</p>';
	echo'<a href="form.php">Назад</a>';
}





?>
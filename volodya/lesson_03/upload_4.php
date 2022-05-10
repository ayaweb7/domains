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
		echo '</br>';
		echo'<a href="form.php">Назад</a>';
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
		echo '</br>';
		echo'<a href="form.php">Назад</a>';
		die();
	}
	else
	{
		$filedirname = __DIR__ . '/files/';
		$thumbdirname = __DIR__ . '/thumbs/';
		$name = sha1_file($_FILES['myfile']['tmp_name']);
		$extension = $allowedTypes[$_FILES['myfile']['type']];
		$filepath = $filedirname . $name . '.' . $extension;
		$thumbpath = $thumbdirname . $name . '.' . $extension;
		
		$result = move_uploaded_file($_FILES['myfile']['tmp_name'], $filepath);
		
		if(!$result)
		{
			echo 'Ошибка при перемещении файла!';
			echo '<pre>'; print_r(error_get_last());'</pre>';
			die();
		}
		else
		{
// Создает в новой директории уиеньшенные версии картинок
			try
			{
				$image = new Imagick($filepath); // создает новый путь для сохранения
//				$image = setbackgroundcolor('rgb(255, 255, 255)'); // создает белый фон
//				$image = thumbnailImage(140, 140, true, true); // определяет размеры картинок и соотношения сторон
				$result = $image -> writeImage($thumbpath); // сохраняет картинки по заданному пути
				
				if($result != true)
				{
					echo 'Ошибка при создании уменьшенной версии картинки';
					echo '</br>';
					echo'<a href="form.php">Назад</a>';
					die();
				}
			}
			catch(Exception $e)
			{
				echo $e;
				die();
			}
		}
		header('Location: show_1.php');
	}
}
else
{
	echo'<p>Вообще ничего не загрузили</p>';
	echo'<a href="form.php">Назад</a>';
}





?>
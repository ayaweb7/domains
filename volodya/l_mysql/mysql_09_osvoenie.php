<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/screen.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

<title>Освоение MySQL</title>
</head>

	<body name="top">
<!-- !!!!!!!!!!!!!!!!!       шаблоны, заготовки для тэгов, комментарии !!!!!!!!!!!!!!! -->

<!-- Абзацы, заголовки, комментарии -->
<h4></h4>
<p></p>
<p>

</p>
<p></p>
<!-- Это комментарий HTML -->

<?php  ?>

<?php
/* 
Это область
многострочного комментария,
которая не будет
подвергаться интерпретации 
*/
?>

<!-- Шаблон для PHP кода с комментариями внутри кода -->
<h4></h4>
<p>

</br>
</p>
<p></p>
<?php
// 


// 

?>

<table id="inventory" class="realty">
	<tr><th></th><th></th><th></th></tr>
	<tr><td></td><td></td><td></td></tr>
	<tr><td></td><td></td><td></td></tr>
	<tr><td></td><td></td><td></td></tr>
	<tr><td></td><td></td><td></td></tr>
	<tr><td></td><td></td><td></td></tr>
	<tr><td></td><td></td><td></td></tr>
	<tr><td></td><td></td><td></td></tr>
</table>

<ul>
	<li>
		
	</li>
	<li>
		
	</li>
	<li>
		
	</li>
	<li>
		
	</li>
	<li>
		
	</li>
	<li>
		
	</li>
</ul>

<!-- !!!!!!!!!!!!!!!!!       шаблоны, заготовки для тэгов, комментарии !!!!!!!!!!!!!!! -->
<h4></h4>
<p></p>
<p>

</p>
<p></p>


<h4>Создание резервной копии отдельной таблицы</h4>
<p>сначала нужно из командной строки MySQL заблокировать таблицу, набрав следующую команду:</p>
<p>LOCK TABLES publications.classics READ;</p>
<p>Затем, не закрывая командную строку MySQL, используйте другое окно терминала, чтобы ввести из командной строки операционной системы следующую команду:</p>
<p>mysqldump -u пользователь -pпароль publications classics > classics.sql</p>
<p>Теперь можно снять блокировку таблицы</p>
<p>UNLOCK TABLES;</p>

<h4>Восстановление данных из файла резервной копии</h4>
<p>Для восстановления всей базы данных, выгруженной с помощью ключа --all-databases, используется команда</p>
<p>Пример 9.10. Восстановление полного набора баз данных</p>
<p>mysql -u пользователь -pпароль < all_databases.sql</p>
<p>Для восстановления одной базы данных применяется ключ –D, за которым следует имя базы данных.</p>
<p>Пример 9.11. Восстановление базы данных publications</p>
<p>mysql -u пользователь -pпароль -D publications < publications.sql</p>
<p>Для восстановления отдельной таблицы базы данных используется команда</p>
<p>Пример 9.12. Восстановление таблицы classics в базе данных publications</p>
<p>mysql -u пользователь -pпароль -D publications < classics.sql</p>

<h4></h4>
<p></p>
<p>

</p>
<p></p>


<h4></h4>
<p></p>
<p>

</p>
<p></p>


<h4></h4>
<p></p>
<p>

</p>
<p></p>


<h4></h4>
<p></p>
<p>

</p>
<p></p>


<h4></h4>
<p></p>
<p>

</p>
<p></p>


<h4></h4>
<p></p>
<p>

</p>
<p></p>


<h4></h4>
<p></p>
<p>

</p>
<p></p>


<h4></h4>
<p></p>
<p>

</p>
<p></p>


<h4></h4>
<p></p>
<p>

</p>
<p></p>


<h4></h4>
<p></p>
<p>

</p>
<p></p>


<h4></h4>
<p></p>
<p>

</p>
<p></p>


<h4></h4>
<p></p>
<p>

</p>
<p></p>





		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
	</body>
</html>
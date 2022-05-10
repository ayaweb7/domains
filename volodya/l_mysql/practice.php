<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/screen.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

<title>Практика-кошки</title>
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
<!--
require_once '../login.php';
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysqli_error());

mysqli_select_db($db_server, $db_database)
		or die("Невозможно выбрать базу данных: " . mysqli_error());
-->

<h2 style='color: red;'>Практическая работа с MySQL</h2>
<h3>Создание таблицы</h3>
<p>
Вам сказали, что в зоопарке девять представителей кошачьих: лев, тигр, ягуар, леопард, пума, гепард, рысь, каракал и домашний кот.
</p>
<p>Пример 10.9. Создание таблицы cats</p>
<p>
require_once '../login.php';<br>
$db_server = mysql_connect($db_hostname, $db_username, $db_password);<br>
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());<br>
mysql_select_db($db_database)<br>
or die("Невозможно выбрать базу данных: " . mysql_error());<br>
$query = "CREATE TABLE cats (<br>
id SMALLINT NOT NULL AUTO_INCREMENT,<br>
family VARCHAR(32) NOT NULL,<br>
name VARCHAR(32) NOT NULL,<br>
age TINYINT NOT NULL,<br>
PRIMARY KEY (id)<br>
)";<br>
$result = mysql_query($query);<br>
if (!$result) die ("Сбой при доступе к базе данных: " . mysql_error());
</p>
<p></p>
<?php
/*
	require_once '../login.php';
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
	if (!$db_server) die("Невозможно подключиться к MySQL: " . mysqli_error());

	mysqli_select_db($db_server, $db_database)
		or die("Невозможно выбрать базу данных: " . mysqli_error());
	$query = "CREATE TABLE cats (
		id INT NOT NULL AUTO_INCREMENT,
		family VARCHAR(32) NOT NULL,
		name VARCHAR(32) NOT NULL,
		age TINYINT NOT NULL,
		PRIMARY KEY (id))";

*/

//CREATE TABLE classics (
//author VARCHAR(128),
//title VARCHAR(128),
//type VARCHAR(16),
//year CHAR(4)) ENGINE MyISAM;


//	$result = mysqli_query($query);
//	if (!$result) die ("Сбой при доступе к базе данных: " . mysqli_error());
?>

<h4>Описание таблицы</h4>
<p>
проверить в браузере факт успешного создания таблицы<br>
Чтобы использовать код примера 10.10 с другими таблицами, нужно просто заменить в запросе имя cats именем новой таблицы.<br>
Пример 10.10. Описание таблицы cats
</p>
require_once 'login.php';<br>
$db_server = mysql_connect($db_hostname, $db_username, $db_password);<br>
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error();<br>
mysql_select_db($db_database)<br>
or die("Невозможно выбрать базу данных: " . mysql_error());<br>
$query = "DESCRIBE cats";<br>
$result = mysql_query($query);<br>
if (!$result) die ("Сбой при доступе к базе данных: " . mysql_error());<br>
$rows = mysql_num_rows($result);<br>
echo "<table><tr> <th>Column</th> <th>Type</th><br>
<th>Null</th> <th>Key</th> </tr>";<br>
for ($j = 0 ; $j < $rows ; ++$j)<br>
{<br>
$row = mysql_fetch_row($result);<br>
echo "<tr>";<br>
for ($k = 0 ; $k < 4 ; ++$k)<br>
echo "<td>$row[$k]</td>";<br>
echo "</tr>";<br>
}<br>
echo "</table>";
<p></p>
<h5 style='color: red;'>START CODE</h5>
<?php
require_once '../login.php';
/*
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysqli_error());

mysqli_select_db($db_server, $db_database)
		or die("Невозможно выбрать базу данных: " . mysqli_error());
*/
$query = "DESCRIBE cats";
$result = mysqli_query($db_server, $query);
	if (!$result) die ("Сбой при доступе к базе данных: " . mysqli_error());
$rows = mysqli_num_rows($result);
echo "<table><tr> <th>Column</th> <th>Type</th>
<th>Null</th> <th>Key</th> </tr>";
for ($j = 0 ; $j < $rows ; ++$j)
{
$row = mysqli_fetch_row($result);
echo "<tr>";
for ($k = 0 ; $k < 4 ; ++$k)
echo "<td>$row[$k]</td>";
echo "</tr>";
}
echo "</table>";
?>

<h4>Удаление таблицы</h4>
<p>Пример 10.11. Удаление таблицы cats</p>
<p>
require_once 'login.php';<br>
$db_server = mysql_connect($db_hostname, $db_username, $db_password);<br>
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());<br>
mysql_select_db($db_database)<br>
or die("Невозможно выбрать базу данных: " . mysql_error());<br>
$query = "DROP TABLE cats";<br>
$result = mysql_query($query);<br>
if (!$result) die ("Сбой при доступе к базе данных: " . mysql_error());
</p>
<?php
/*
require_once '../login.php';
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysqli_error());
mysqli_select_db($db_server, $db_database)
		or die("Невозможно выбрать базу данных: " . mysqli_error());
$query = "DROP TABLE cats";
$result = mysqli_query($db_server, $query);
if (!$result) die ("Сбой при доступе к базе данных: " . mysqli_error());
*/
?>

<h4>Добавление</h4>
<p>Пример 10.12. Добавление данных к таблице cats</p>
<p>
require_once '../login.php';<br>
$db_server = mysql_connect($db_hostname, $db_username, $db_password);<br>
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());<br>
mysql_select_db($db_database)<br>
or die("Невозможно выбрать базу данных: " . mysql_error());<br>
$query = "INSERT INTO cats VALUES(NULL, 'Lion', 'Leo', 4)";<br>
$result = mysql_query($query);<br>
if (!$result) die ("Сбой при доступе к базе данных: " . mysql_error());<br>
</p>

<?php

require_once '../login.php';

/*
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysqli_error());
mysqli_select_db($db_database)
or die("Невозможно выбрать базу данных: " . mysqli_error());

$query = "INSERT INTO cats VALUES(NULL, 'Cat', 'Kitty', 11)";
$result = mysqli_query($db_server, $query);
if (!$result) die ("Сбой при доступе к базе данных: " . mysqli_error());
*/
?>

<p></p>
<?php  ?>

<h4>Извлечение данных</h4>
<p>Пример 10.13. Извлечение строк из таблицы cats</p>
<p>
require_once 'login.php';<br>
$db_server = mysql_connect($db_hostname, $db_username, $db_password);<br>
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());<br>
mysql_select_db($db_database)<br>
or die("Невозможно выбрать базу данных: " . mysql_error());<br>
$query = "SELECT * FROM cats";<br>
$result = mysql_query($query);<br>
if (!$result) die ("Сбой при доступе к базе данных: " . mysql_error());<br>
$rows = mysql_num_rows($result);<br>
echo "<table><tr> <th>Id</th> <th>Family</th><br>
<th>Name</th><th>Age</th></tr>";<br>
for ($j = 0 ; $j < $rows ; ++$j)<br>
{<br>
$row = mysql_fetch_row($result);<br>
echo "<tr>";<br>
for ($k = 0 ; $k < 4 ; ++$k)<br>
echo "<td>$row[$k]</td>";<br>
echo "</tr>";<br>
}<br>
echo "</table>";
</p>


<?php 
require_once ('../login.php');
/*
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());
mysql_select_db($db_database)
or die("Невозможно выбрать базу данных: " . mysql_error());
*/
$query = "SELECT * FROM cats";
$result = mysqli_query($db_server, $query);
if (!$result) die ("Сбой при доступе к базе данных: " . mysqli_error());
$rows = mysqli_num_rows($result);
echo "<table><tr> <th>Id</th> <th>Family</th>
<th>Name</th><th>Age</th></tr>";
for ($j = 0 ; $j < $rows ; ++$j)
{
$row = mysqli_fetch_row($result);
echo "<tr>";
for ($k = 0 ; $k < 4 ; ++$k)
echo "<td>$row[$k]</td>";
echo "</tr>";
}
echo "</table>";
?>

<h4>Обновление данных</h4>
<p>Пример 10.14. Переименование гепарда Charly в Charlie</p>
<p>

</p>
<p></p>
<?php 
require_once '../login.php';
/*
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());
mysql_select_db($db_database)
or die("Невозможно выбрать базу данных: " . mysql_error());

$query = "UPDATE cats SET name='Charlie' WHERE name='Charly'";
$result = mysqli_query($db_server, $query);
if (!$result) die ("Сбой при доступе к базе данных: " . mysqli_error());
*/
?>

<h4>Удаление данных</h4>
<p>Пример 10.15. Удаление сведений о пуме Growler из таблицы cats</p>
<p>

</p>
<p></p>
<?php 
require_once '../login.php';
/*
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());
mysql_select_db($db_database)
or die("Невозможно выбрать базу данных: " . mysql_error());

$query = "DELETE FROM cats WHERE id=4";
$result = mysqli_query($db_server, $query);
if (!$result) die ("Сбой при доступе к базе данных: " . mysqli_error());
*/
?>


<h4 style='color: red;'>Свойство AUTO_INCREMENT</h4>
<p>
если нужно узнать об этом, можно позже обратиться к MySQL с помощью функции mysql_insert_id.<br>
Потребность в этом возникает довольно часто, например при обработке покупки можно вставить в таблицу Customers нового покупателя,
а затем сослаться на только что созданный CustId при вставке покупки в таблицу покупок.<br>
Пример 10.12 может быть переписан и превращен в пример 10.16, отображающий это значение после каждой вставки.
</p>
<p>Пример 10.16. Добавление данных к таблице cats и отчет о вставленном id</p>
<p>

</p>
<p></p>
<?php 
require_once '../login.php';
/*
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());
mysql_select_db($db_database)
or die("Невозможно выбрать базу данных: " . mysql_error());

$query = "INSERT INTO cats VALUES(NULL, 'Lynx', 'Stumpy', 5)";
$result = mysqli_query($db_server, $query);
echo "Значение вставленного ID равно " . mysqli_insert_id();
if (!$result) die ("Сбой при доступе к базе данных: " . mysqli_error());
*/
?>

<h4>Идентификаторы вставленных строк</h4>
<p>
Зачастую данные вставляются сразу в несколько таблиц: за книгой следует ее автор, за покупателем — его покупка и т. д.
При вставке данных в графы с автоприращением нужно будет запомнить вставленный ID, возвращенный для его сохранения в связанной таблице.<br>
Предположим, что для привлечения дополнительных средств над представителями кошачьих могут брать шефство какие-нибудь организации,
и когда животное сохраняется в таблице кошек, нам нужно создать ключ для привязки его к организации, взявшей над ним шефство.
Код для этого похож на код примера 10.16, за исключением того, что возвращенный ID, который был вставлен в таблицу, сохраняется в переменной $insertID,
а затем используется в качестве составной части следующего запроса:
</p>
<p></p>
<p>

</p>
<p></p>
<?php 
/*
$query = "INSERT INTO cats VALUES(NULL, 'Lynx', 'Stumpy', 5)";
$result = mysqli_query($db_server, $query);
$insertID = mysqli_insert_id();

$query = "INSERT INTO owners VALUES($insertID, 'Ann', 'Smith')";
$result = mysqli_query($query);
*/

?>

<h4></h4>
<p></p>
<p>

</p>
<p></p>
<?php  ?>

<h4></h4>
<p></p>
<p>

</p>
<p></p>
<?php  ?>

<h4></h4>
<p></p>
<p>

</p>
<p></p>
<?php  ?>

<h4></h4>
<p></p>
<p>

</p>
<p></p>
<?php  ?>

<h4></h4>
<p></p>
<p>

</p>
<p></p>
<?php  ?>




		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
	</body>
</html>
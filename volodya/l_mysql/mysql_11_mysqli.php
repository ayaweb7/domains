<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/screen.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

<title>Использование расширения mysqli</title>
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
<h1 style='color: red;'></h1>
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

<h2 style='color: red;'>Использование расширения mysqli</h2>
<h4>Подключение к MySQL</h4>
<p>Пример 11.2. Подключение к серверу MySQL с помощью mysqli</p>
<p>
require_once 'login.php';<br>
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);<br>
if ($connection->connect_error) die($connection->connect_error)
</p>
<p>
Обратите внимание на усовершенствованную проверку возникновения ошибок, достигаемую за счет ссылки на свойство $connection->connect_error.<br>
Если оно имеет значение TRUE, вызывается функция die и выводятся подробности, объясняющие характер ошибки.
</p>
<p>
Свойство connect_error объекта $connection содержит строку, детализирующую ошибку подключения.
</p>
<?php
require_once '../login1.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error)
?>

<h4>Построение и выполнение запроса</h4>
<p>Пример 11.3. Запрос к базе данных с помощью mysqli</p>
<p>
$query = "SELECT * FROM classics";<br>
$result = $connection->query($query);<br>
if (!$result) die($connection->error);
</p>
<p></p>
<?php
$query = "SELECT * FROM classics";
$result = $connection->query($query);
if (!$result) die($connection->error);
?>

<h4>Извлечение результата</h4>
<p>
Возвращенным $result объектом можно воспользоваться для поэлементного извлечения требуемых данных, применяя для этого метод объекта fetch_assoc.
</p>
<p>Пример 11.4. Поэлементное извлечение результатов с помощью mysqli</p>
<p>
require_once 'login.php';<br>
$connection =
new mysqli($db_hostname, $db_username, $db_password, $db_database);<br>
if ($connection->connect_error) die($connection->connect_error)<br>
$query = "SELECT * FROM classics";<br>
$result = $connection->query($query);<br>
if (!$result) die($connection->error);<br>
$rows = $result->num_rows;<br>
for ($j = 0 ; $j < $rows ; ++$j)<br>
{<br>
$result->data_seek($j);<br>
echo 'Author: ' . $result->fetch_assoc()['author'] . '<br>';<br>
$result->data_seek($j);<br>
echo 'Title: ' . $result->fetch_assoc()['title'] . '<br>';<br>
$result->data_seek($j);<br>
echo 'Category: ' . $result->fetch_assoc()['category'] . '<br>';<br>
$result->data_seek($j);<br>
echo 'Year: ' . $result->fetch_assoc()['year'] . '<br>';<br>
$result->data_seek($j);<br>
echo 'ISBN: ' . $result->fetch_assoc()['isbn'] . '<br><br>';<br>
}<br>
$result->close();<br>
$connection->close();
</p>

<p style='color: red;'>START CODE</p>

<?php
require_once '../login1.php';
/*
$connection =
new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

$query = "SELECT * FROM classics";
$result = $connection->query($query);
if (!$result) die($connection->error);
$rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j)
{
$result->data_seek($j);
echo 'Author: ' . $result->fetch_assoc()['author'] . '<br>';
$result->data_seek($j);
echo 'Title: ' . $result->fetch_assoc()['title'] . '<br>';
$result->data_seek($j);
echo 'Category: ' . $result->fetch_assoc()['category'] . '<br>';
$result->data_seek($j);
echo 'Year: ' . $result->fetch_assoc()['year'] . '<br>';
$result->data_seek($j);
echo 'ISBN: ' . $result->fetch_assoc()['isbn'] . '<br><br>';
}
$result->close();
$connection->close();
*/
?>
<p>
В этом коде перед извлечением каждого элемента данных для поиска нужной строки при очередном проходе цикла вызывается метод data_seek объекта $result.<br>
Затем для извлечения значения, сохраненного в каждой ячейке, вызывается метод fetch_assoc, а для вывода результата используются команды echo.
</p>

<h4>Извлечение строки</h4>
<p>
Для построчного извлечения данных нужно заменить цикл из примера 11.4 кодом, выделенным в примере 11.5 полужирным шрифтом,
и обнаружится, что будет получен точно такой же результат
</p>
<p>Пример 11.5. Построчное извлечение результатов с помощью mysqli</p>
<p>
require_once 'login.php';<br>
$connection =
new mysqli($db_hostname, $db_username, $db_password, $db_database);<br>
if ($connection->connect_error) die($connection->connect_error);<br>
$query = "SELECT * FROM classics";<br>
$result = $connection->query($query);<br>
if (!$result) die($connection->error);<br>
$rows = $result->num_rows;<br>
for ($j = 0 ; $j < $rows ; ++$j)<br>
{<br>
$result->data_seek($j);<br>
$row = $result->fetch_array(MYSQLI_ASSOC);<br>
echo 'Author: ' . $row['author'] . '<br>';<br>
echo 'Title: ' . $row['title'] . '<br>';<br>
echo 'Category: ' . $row['category'] . '<br>';<br>
echo 'Year: ' . $row['year'] . '<br>';<br>
echo 'ISBN: ' . $row['isbn'] . '<br><br>';<br>
}<br>
$result->close();<br>
$connection->close();
</p>
<p></p>

<p style='color: red;'>START CODE 2</p>
<?php
require_once '../login1.php';
/*
$connection =
new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

$query = "SELECT * FROM classics";
$result = $connection->query($query);

if (!$result) die($connection->error);
$rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j)
{
$result->data_seek($j);
$row = $result->fetch_array(MYSQLI_ASSOC);
echo 'Author: ' . $row['author'] . '<br>';
echo 'Title: ' . $row['title'] . '<br>';
echo 'Category: ' . $row['category'] . '<br>';
echo 'Year: ' . $row['year'] . '<br>';
echo 'ISBN: ' . $row['isbn'] . '<br><br>';
}

$result->close();
$connection->close();
*/
?>
<p>
В этом измененном коде к объекту $result делается только одна пятая часть обращений,
а при каждом проходе цикла в объекте осуществляется только один поиск, поскольку посредством метода fetch_array каждая строка извлекается целиком.<br>
В результате одна строка данных возвращается в виде массива, который затем присваивается массиву $row.
</p>


<h4 style='color: red;'>Практический пример</h4>
<p>Пример 11.6. Вставка и удаление с помощью mysqlitest.php</p>

<?php
if (isset($_POST['delete']) && isset($_POST['isbn']))
{
$isbn = get_post($connection, 'isbn');
$query = "DELETE FROM classics WHERE isbn='$isbn'";
$result = $connection->query($query);
if (!$result) echo "Сбой при удалении данных: $query<br>" .
$connection->error . "<br><br>";
}
if ( isset($_POST['author']) &&
isset($_POST['title']) &&
isset($_POST['category']) &&
isset($_POST['year']) &&
isset($_POST['isbn']))
{
$author = get_post($connection, 'author');
$title = get_post($connection, 'title');
$category = get_post($connection, 'category');
$year = get_post($connection, 'year');
$isbn = get_post($connection, 'isbn');
$query = "INSERT INTO classics VALUES" .
"('$author', '$title', '$category', '$year', '$isbn')";
$result = $connection->query($query);
if (!$result) echo "Сбой при вставке данных: $query<br>" .
$connection->error . "<br><br>";
}
echo <<<_END
<form action="mysql_11_mysqli.php" method="post"><pre>
Author <input type="text" name="author">
Title <input type="text" name="title">
Category <input type="text" name="category">
Year <input type="text" name="year">
ISBN <input type="text" name="isbn">
<input type="submit" value="ADD RECORD">
</pre></form>
_END;
$query = "SELECT * FROM classics";
$result = $connection->query($query);
if (!$result) die ("Сбой при доступе к базе данных: " . $connection->error);
$rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j)
{
$result->data_seek($j);
$row = $result->fetch_array(MYSQLI_NUM);
echo <<<_END
<pre>
Author $row[0]
Title $row[1]
Category $row[2]
Year $row[3]
ISBN $row[4]
</pre>
<form action="mysql_11_mysqli.php" method="post">
<input type="hidden" name="delete" value="yes">
<input type="hidden" name="isbn" value="$row[4]">
<input type="submit" value="DELETE RECORD"></form>
_END;
}
$result->close();
$connection->close();

function get_post($connection, $var)
{
return $connection->real_escape_string($_POST[$var]);
}
?>
<p>
отличие от кода примера 11.5, в котором возвращается ассоциативный массив, здесь методу fetch_array передается значение MYSQLI_NUM,
следовательно, возвращается числовой массив.
Соответственно, ссылки на ячейки имеют числовую основу (например, $row[0] для автора).<br>
Затем результат выводится на экран при каждом проходе цикла, а после этого объект с результатом и подключение закрываются.
</p>
<p>
Здесь также была изменена функция get_post, чтобы можно было использовать новый метод real_escape_string объекта подключения,
поэтому теперь ей передаются два значения (подключение и строковое значение).
</p>


<h4>Процедурное использование mysqli</h4>
<p>
Если хотите, можете для доступа к mysqli воспользоваться альтернативным набором функций в процедурном (а не в объектно-ориентированном) режиме.<br>
Вместо создания следующего объекта $connection:<br>
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
</p>
<p>
можно воспользоваться таким кодом:<br>
$link = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
</p>
<p>
Чтобы проверить успешность подключения и управлять им, можно воспользоваться следующим кодом:<br>
if (mysqli_connect_errno()) die(mysqli_connect_error());
</p>
<p>
А для выдачи MySQL-запроса воспользуйтесь таким кодом:<br>
$result = mysqli_query($link, "SELECT * FROM classics");
</p>
<p>
После возвращения управления данные будут содержаться в $result. Количество возвращенных строк можно определить с помощью следующего кода:<br>
$rows = mysqli_num_rows($result));
</p>
<p>
В $rows будет возвращено целочисленное значение.
Построчное извлечение фактических данных можно получить следующим способом, при котором возвращается числовой массив:<br>
$row = mysqli_fetch_array($result, MYSQLI_NUM);
</p>
<p>
При использовании mysqli в процедурном режиме обезвреживание содержимого строк производится с помощью следующего кода:<br>
$escaped = mysqli_real_escape_string($link, $val);
</p>

		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
	</body>
</html>
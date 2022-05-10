<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/screen.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

<title>Доступ к MySQL</title>
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
<h4>Запросы к базе данных MySQL с помощью PHP</h4>
<p>Процесс использования MySQL с помощью PHP</p>
<ol>
	<li>
		1. Подключение к MySQL.
	</li>
	<li>
		2. Выбор базы данных, которая будет использоваться.
	</li>
	<li>
		3. Создание строки запроса.
	</li>
	<li>
		4. Выполнение запроса.
	</li>
	<li>
		5. Извлечение результатов и вывод их на веб-страницу.
	</li>
	<li>
		6. Повторение шагов с 3-го по 5-й до тех пор, пока не будут извлечены все необходимые данные.
	</li>
	<li>
		7. Отключение от MySQL.
	</li>
</ol>

<!--
require_once '../login.php';
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysqli_error());

mysqli_select_db($db_server, $db_database)
		or die("Невозможно выбрать базу данных: " . mysqli_error());
-->

<h4>Создание файла регистрации</h4>
<p>Пример 10.1. Файл login.php</p>
<p>
$db_hostname = 'localhost';<br>
$db_database = 'meteo';<br>
$db_username = 'nikart';<br>
$db_password = 'arteeva12';
</p>
<?php // login.php
$db_hostname = 'localhost';
$db_database = 'meteo';
$db_username = 'nikart';
$db_password = 'arteeva12';
?>


<h4>Подключение к MySQL</h4>
<p>Выбор пал именно на эту инструкцию, а не на инструкцию include, поскольку, если файл не будет найден, он сгенерирует фатальную ошибку.</p>
<p>Использование require_once, а не require, означает, что файл будет считан только в том случае, если он не был включен до этого в какой-нибудь другой файл,
что исключит совершенно бесполезные повторные обращения к диску.</p>
<p>Пример 10.2. Подключение к базе данных MySQL</p>
<p>
require_once 'login.php';<br>
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);<br>
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysqli_error());
</p>
<?php
require_once '../login.php';
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysqli_error());
?>
<p>
более вразумительные сообщения об ошибках:<br>
В этом случае нужно будет не выходить из программы PHP в аварийном режиме, а составить сообщение,
которое будет отображено при нормальном выходе из программы, например:<br><br>
function mysql_fatal_error($msg)<br><br>
{<br>
$msg2 - mysql_error();<br>
echo <<< _END<br>
К сожалению, завершить запрашиваемую задачу не представилось возможным.<br>
Было получено следующее сообщение об ошибке:<br>
<p>$msg: $msg2</p><br>
Пожалуйста, нажмите кнопку возврата вашего браузера<br>
и повторите попытку. Если проблемы не прекратятся,<br>
пожалуйста, <a href="mailto:admin@server.com">сообщите о них<br>
нашему администратору </a>. Спасибо.<br>
_END;<br>
}
</p>

<h4>Выбор базы данных</h4>
<p>Пример 10.3. Выбор базы данных</p>
<p>
mysqli_select_db($db_database)<br>
or die("Невозможно выбрать базу данных: " . mysqli_error());
</p>
<?php
mysqli_select_db($db_server, $db_database)
or die("Невозможно выбрать базу данных: " . mysqli_error());
?>


<h4>Создание и выполнение запроса</h4>
<p>Пример 10.4. Отправка запроса к базе данных</p>
<p>
$query = "SELECT * FROM classics";<br>
$result = mysqli_query($db_server, $query);<br>
if (!$result) die ("Сбой при доступе к базе данных: " . mysqli_error());
</p>
<?php
$query = "SELECT * FROM classics";
$result = mysqli_query($db_server, $query);
	if (!$result) die ("Сбой при доступе к базе данных: " . mysqli_error());

?>


<h4 style='color: red;'>Извлечение результата</h4>
<p>Пример 10.5. Поячеечное извлечение результатов</p>
<p></p>
<p>// query.php<br>
require_once 'login.php';<br>
$db_server = mysql_connect($db_hostname, $db_username, $db_password);<br>
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());<br>
mysql_select_db($db_database)<br>
or die("Невозможно выбрать базу данных: " . mysql_error());<br>
$query = "SELECT * FROM classics";<br>
$result = mysql_query($query);<br>
if (!$result) die ("Сбой при доступе к базе данных: " . mysql_error());<br>
$rows = mysql_num_rows($result);<br>
for ($j = 0 ; $j < $rows ; ++$j)<br>
{<br>
echo 'Author: ' . mysql_result($result,$j,'author') . 'br';<br>
echo 'Title: ' . mysql_result($result,$j,'title') . 'br';<br>
echo 'Category: ' . mysql_result($result,$j,'category') . 'br';<br>
echo 'Year: ' . mysql_result($result,$j,'year') . 'br';<br>
echo 'ISBN: ' . mysql_result($result,$j,'isbn') . 'brbr';<br>
}
</p>


<h4>Отключение</h4>
<p>Пример 10.7. Отключение от базы данных MySQL</p>

<?php
mysqli_close($db_server);
?>
<p>
Здесь функции нужно передать тот идентификатор, который был возвращен функцией mysql_connect из примера 10.2 и сохранен в переменной $db_server.<br>
Все подключения к базам данных автоматически закрываются по выходе из PHP,
поэтому то, что подключение в примере 10.5 не было закрыто, не имеет никакого значения.<br>
Но в более длинных программах, где могут последовательно осуществляться подключения к базам данных и отключения от них,
настоятельно рекомендуется по завершении доступа закрывать каждое подключение к базе данных.
</p>
<p></p>
<?php  ?>

<h2 style='color: red;'>Практический пример</h2>
<p>Пример 10.8. Вставка и удаление данных с помощью программы sqltest.php</p>
<p>
// sqltest.php<br>
	require_once '../login.php';<br>
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password);<br><br>
	
	if (!$db_server) die("Невозможно подключиться к MySQL: " . mysqli_error());<br><br>
	
	mysqli_select_db($db_database, $db_server)<br>
		or die("Невозможно выбрать базу данных: " . mysqli_error());<br><br>
		
	if (isset($_POST['delete']) && isset($_POST['isbn']))<br><br>
	{
		$isbn = get_post('isbn');<br>
	$query = "DELETE FROM classics WHERE isbn='$isbn'";<br><br>
	
	if (!mysql_query($query, $db_server))<br>
		echo "Сбой при удалении данных: $query<br>" .<br>
		mysql_error() . "<br><br>";<br>
}<br>
if (isset($_POST['author']) &&<br>
	isset($_POST['title']) &&<br>
	isset($_POST['category']) &&<br>
	isset($_POST['year']) &&<br>
	isset($_POST['isbn']))<br>
{<br>
	$author = get_post('author');<br>
	$title = get_post('title');<br>
	$category = get_post('category');<br>
	$year = get_post('year');<br>
	$isbn = get_post('isbn');<br><br>
	
	$query = "INSERT INTO classics VALUES" .<br>
	"('$author', '$title', '$category', '$year', '$isbn')";<br><br>
	
	if (!mysql_query($query, $db_server))<br>
		echo "Сбой при вставке данных: $query<br>" .<br>
		mysql_error() . "<br><br>";<br>
}<br>
echo <<<_END<br>
<!--
<form action="sqltest.php" method="post"><pre>
	Author <input type="text" name="author">
	Title <input type="text" name="title">
	Category <input type="text" name="category">
	Year <input type="text" name="year">
	ISBN <input type="text" name="isbn">
		<input type="submit" value="ADD RECORD"> <!-- кнопка ДОБАВИТЬ ЗАПИСЬ -->
												
	</pre></form> -->
_END;<br><br>

$query = "SELECT * FROM classics";<br>
$result = mysqli_query($query);<br><br>

if (!$result) die ("Сбой при доступе к базе данных: " . mysqli_error());<br>
$rows = mysqli_num_rows($result);<br><br>

for ($j = 0 ; $j < $rows ; ++$j)<br>
{<br>
	$row = mysql_fetch_row($result);<br>
	echo <<<_END<br>
<pre><br>
	Author $row[0]<br>
	Title $row[1]<br>
	Category $row[2]<br>
	Year $row[3]<br>
	ISBN $row[4]<br>
</pre><br>
<!--
<form action="sqltest.php" method="post">
<input type="hidden" name="delete" value="yes">
<input type="hidden" name="isbn" value="$row[4]">
<input type="submit" value="DELETE RECORD"></form> // кнопка УДАЛИТЬ ЗАПИСЬ
													
-->
_END;<br>
}<br><br>

mysqli_close($db_server);<br>
function get_post($var)<br>
{<br>
return mysqli_real_escape_string($_POST[$var]);<br>
}<br>
</p>
<h5 style='color: red;'>START CODE</h5>

<?php // mysql_10_dostup.php
	require_once '../login.php';
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
	
	if (!$db_server) die("Невозможно подключиться к MySQL: " . mysqli_error());
	
	mysqli_select_db($db_server, $db_database)
		or die("Невозможно выбрать базу данных: " . mysqli_error());
		
	if (isset($_POST['delete']) && isset($_POST['isbn'])) // Если у переменной $_POST['delete'] есть значение,
	{ 													//  значит, пользователь нажал кнопку DELETE RECORD (Удалить запись).
		$isbn = get_post('isbn'); 						// В этом случае должно быть отправлено и значение $isbn.
//		$isbn = $_POST['isbn'];
		$query = "DELETE FROM classics WHERE isbn='$isbn'";
	
		if (!mysqli_query($db_server, $query))
			echo "Сбой при удалении данных: $query<br>" .
			mysqli_error() . "<br><br>";
	}

if (isset($_POST['author']) &&
	isset($_POST['title']) &&
	isset($_POST['category']) &&
	isset($_POST['year']) &&
	isset($_POST['isbn']))
{
	$author = get_post('author'); // На основании подтверждения 
	$title = get_post('title'); // каждая из строк,
	$category = get_post('category'); // находящихся внутри инструкции if,
	$year = get_post('year'); // вызывает функцию get_post, 
	$isbn = get_post('isbn'); // которая появляется в самом конце программы

	$query = "INSERT INTO classics (author, title, category, year, isbn) VALUES ('$author', '$title', '$category', '$year', '$isbn')";

//	$query = "INSERT INTO classics 
//	. "(author, title, category, year, isbn)"
//	. " VALUES "
//	. "('$author', '$title', '$category', '$year', '$isbn')";
	
	if (!mysqli_query($db_server, $query))
		echo "Сбой при вставке данных: $query<br>" .
		mysqli_error() . "<br><br>";
}
// Структура echo <<<_END, которая выводит на экран все, что находится между тегами _END
// теги <pre> и </pre>, позволяющие воспользоваться моноширинным шрифтом
// и выровнять по линейке все элементы ввода данных.
// Внутри тегов <pre> в выводимые данные попадают также символы возврата каретки, стоящие в конце каждой строки.
echo <<<_END
<form action="mysql_10_dostup.php" method="post"><pre>
	Author <input type="text" name="author">
	Title <input type="text" name="title">
	Category <input type="text" name="category">
	Year <input type="text" name="year">
	ISBN <input type="text" name="isbn">
		<input type="submit" value="ADD RECORD"> <!-- кнопка ДОБАВИТЬ ЗАПИСЬ -->
												 
	</pre></form> 
_END;

$query = "SELECT * FROM classics";
$result = mysqli_query($db_server, $query);

if (!$result) die ("Сбой при доступе к базе данных: " . mysqli_error());
$rows = mysqli_num_rows($result);

for ($j = 0 ; $j < $rows ; ++$j)
{
	$row = mysqli_fetch_row($result);
	echo <<<_END
<pre>
	Author $row[0]
	Title $row[1]
	Category $row[2]
	Year $row[3]
	ISBN $row[4]
</pre>
<form action="mysql_10_dostup.php" method="post">
<input type="hidden" name="delete" value="yes">
<input type="hidden" name="isbn" value="$row[4]">
<input type="submit" value="DELETE RECORD"></form>  <!-- кнопка УДАЛИТЬ ЗАПИСЬ -->
													
_END;
}
// Поле delete устанавливается в yes,
// а полю isbn присваивается значение, сохраненное в элементе массива $row[4], в котором содержится ISBN для этой записи.
//

mysqli_close($db_server);
function get_post($var) // функция извлекает введенные данные из браузера.
{ // пропускает каждый получаемый ею элемент через функцию mysql_real_escape_string,
return mysqli_real_escape_string($_POST[$var]); // чтобы удалить любые символы, которые злоумышленник может вставить,
} //  пытаясь взломать или изменить вашу базу данных.
?>

<p></p>
<?php  ?>




<h4 style='color: red;'>Выполнение дополнительных запросов</h4>
<p>Пример 10.17. Выполнение вторичного запроса</p>
<p>
В этой программе используется первичный запрос к таблице customers, чтобы найти всех покупателей.
Затем на основе номера ISBN книг, приобретенных каждым покупателем, делается новый запрос к таблице classics, чтобы найти название и автора каждой из книг.
</p>
<p></p>
<?php
/*
require_once '../login.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());
mysql_select_db($db_database)
or die("Невозможно выбрать базу данных: " . mysql_error());
$query = "SELECT * FROM customers";

$result = mysqli_query($db_server, $query);
if (!$result) die ("Сбой при доступе к базе данных: " . mysqli_error());
$rows = mysqli_num_rows($result);
for ($j = 0 ; $j < $rows ; ++$j)
{
$row = mysqli_fetch_row($result);
echo "$row[0] purchased ISBN $row[1]:<br>";
$subquery = "SELECT * FROM classics WHERE isbn='$row[1]'";
$subresult = mysqli_query($subquery);
if (!$subresult) die ("Сбой при доступе к базе данных: " . mysqli_error());
$subrow = mysqli_fetch_row($subresult);
echo " '$subrow[1]' by $subrow[0]<br>";
}
*/
?>

<h4>Предотвращение внедрения SQL-кода</h4>
<p>
В примере 10.18 показана функция, которую можно использовать, чтобы удалить любые «волшебные кавычки»,
добавленные во введенную пользователем строку, а затем соответствующим образом обезвредить все имеющиеся в ней опасные компоненты.
</p>
<p>Пример 10.18. Способ обезвреживания данных, введенных пользователем, приемлемый для MySQL</p>
<p>
function mysql_fix_string($string)<br>
{<br>
if (get_magic_quotes_gpc()) $string = stripslashes($string);<br>
return mysql_real_escape_string($string);<br>
}
</p>

<?php
/*
function mysql_fix_string($string)
{
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return mysql_real_escape_string($string);
}
*/
?>

<p>
Функция get_magic_quotes_gpc возвращает TRUE, если свойство «волшебных кавычек» находится в активном состоянии.<br>
Если это так, любые добавленные к строке слеши подлежат удалению, в противном случае функция mysql_real_eascape_string
может отключить некоторые символы дважды, сделав строки непригодными для дальнейшего использования.
</p>

<p>
В примере 10.19 показано, как можно вставить функцию mysql_fix_string в ваш код.
</p>
<p>Пример 10.19. Способ безопасного доступа к MySQL при использовании данных, введенных пользователем</p>
<p>
$user = mysql_fix_string($_POST['user']);<br>
$pass = mysql_fix_string($_POST['pass']);<br>
$query = "SELECT * FROM users WHERE user='$user' AND pass='$pass'";<br>
function mysql_fix_string($string)<br>
{<br>
if (get_magic_quotes_gpc()) $string = stripslashes($string);<br>
return mysql_real_escape_string($string);<br>
}
</p>
<p>
Следует запомнить, что функцию mysql_real_escape_string можно использовать только при активной базе данных MySQL, в противном случае произойдет ошибка.
</p>
<?php
/*
$user = mysql_fix_string($_POST['user']);
$pass = mysql_fix_string($_POST['pass']);
$query = "SELECT * FROM users WHERE user='$user' AND pass='$pass'";
function mysql_fix_string($string)
{
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return mysql_real_escape_string($string);
}
*/
?>


<h4>Указатели места заполнения</h4>
<p>
Его смысл — в предварительном определении запроса с использованием вопросительных знаков (?) в тех местах, где появятся данные.<br>
Затем вместо непосредственного вызова MySQL-запроса осуществляется вызов предварительно определенного запроса, которому передаются данные.<br>
В результате этого гарантируется, что каждый элемент введенных данных попадает непосредственно в базу данных
и не сможет интерпретироваться в качестве SQL-запроса. Иными словами, внедрение SQL-кода становится невозможным.
</p>
<p>Пример 10.20. Использование указателей места заполнения</p>

<p>
PREPARE statement FROM "INSERT INTO classics VALUES(?,?,?,?,?)";<br>
SET @author = "Emily Brontл",<br>
@title = "Wuthering Heights",<br>
@category = "Classic Fiction",<br>
@year = "1847",<br>
@isbn = "9780553212587";<br><br>

EXECUTE statement USING @author,@title,@category,@year,@isbn;<br>
DEALLOCATE PREPARE statement;
</p>
<?php
/*
PREPARE statement FROM "INSERT INTO classics VALUES(?,?,?,?,?)";
SET @author = "Emily Brontл",
@title = "Wuthering Heights",
@category = "Classic Fiction",
@year = "1847",
@isbn = "9780553212587";

EXECUTE statement USING @author,@title,@category,@year,@isbn;
DEALLOCATE PREPARE statement;
*/
?>

<p>Пример 10.21. Использование указателей места заполнения с PHP</p>
<p>
require 'login.php';<br>
$db_server = mysql_connect($db_hostname, $db_username, $db_password);<br>
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());<br>
mysql_select_db($db_database)<br>
or die("Невозможно выбрать базу данных: " . mysql_error());<br>
$query = 'PREPARE statement FROM "INSERT INTO classics<br>
VALUES(?,?,?,?,?)"';<br>
mysql_query($query);<br>
$query = 'SET @author = "Emily Brontл",' .<br>
'@title = "Wuthering Heights",' .<br>
'@category = "Classic Fiction",' .<br>
'@year = "1847",' .<br>
'@isbn = "9780553212587"';<br>
mysql_query($query);<br>
$query = 'EXECUTE statement USING @author,@title,@category,@year,@isbn';<br>
mysql_query($query);<br>
$query = 'DEALLOCATE PREPARE statement';<br>
mysql_query($query);
</p>
<p></p>
<?php
/*
require 'login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());
mysql_select_db($db_database)
or die("Невозможно выбрать базу данных: " . mysql_error());
$query = 'PREPARE statement FROM "INSERT INTO classics
VALUES(?,?,?,?,?)"';
mysql_query($query);
$query = 'SET @author = "Emily Brontл",' .
'@title = "Wuthering Heights",' .
'@category = "Classic Fiction",' .
'@year = "1847",' .
'@isbn = "9780553212587"';
mysql_query($query);
$query = 'EXECUTE statement USING @author,@title,@category,@year,@isbn';
mysql_query($query);
$query = 'DEALLOCATE PREPARE statement';
mysql_query($query);
?>
*/
?>

<h4 style='color: red;'>Предотвращение внедрения HTML-кода</h4>
<p>
Чаще всего злоумышленник пытается написать код, ворующий у пользователей вашего сайта cookie,
позволяющие ему узнать пары «имя пользователя — пароль» или другую информацию.<br>
Чтобы предотвратить это внедрение, нужно лишь вызвать функцию htmlentities, выявляющую все коды разметки HTML и заменяющую их формой,
которая отображает символы, но не позволяет браузеру действовать в соответствии с их предназначением.<br> Рассмотрим, к примеру, следующий код HTML:<br>
<!-- <script src='http://x.com/hack.js'><br>
</script><script>hack();</script>
-->
</p>
<p>
Этот код загружает программу на JavaScript, а затем выполняет вредоносные функции.<br>
Но если сначала этот код будет пропущен через функцию htmlentities, то он превратится в такую абсолютно безвредную строку:<br><br>
&lt;script src='http://x.com/hack.js'&gt;<br>
&lt;/script&gt;&lt;script&gt;hack();&lt;/script&gt;
</p>
<p>
Поэтому если вы когда-нибудь соберетесь отобразить какие-нибудь данные, введенные пользователем,
то нужно немедленно или сразу же после первого сохранения в базе данных обезвредить их с помощью функции htmlentities.<br>
Для этого я рекомендую вам создать новую функцию наподобие первой функции, показанной в примере 10.22,
которая способна обезвредить попытки как SQL-, так и XSS-внедрения.
</p>
<p>Пример 10.22. Функции для предотвращения атак внедрения SQL и XSS</p>
<p>
function mysql_entities_fix_string($string)<br>
{<br>
return htmlentities(mysql_fix_string($string));<br>
}<br>
function mysql_fix_string($string)<br>
{<br>
if (get_magic_quotes_gpc()) $string = stripslashes($string);<br>
return mysql_real_escape_string($string);<br>
}
</p>
<?php
/*
function mysql_entities_fix_string($string)
{
return htmlentities(mysql_fix_string($string));
}
function mysql_fix_string($string)
{
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return mysql_real_escape_string($string);
}
*/
?>


<p>
Функция mysql_entities_fix_string сначала вызывает функцию mysql_fix_string, а затем, прежде чем вернуть полностью обезвреженную строку,
пропускает результат через функцию htmlentities.<br>В примере 10.23 показана новая, «максимально защищенная» версия примера 10.19.
</p>
<p>Пример 10.23. Способ безопасного доступа к MySQL и предотвращения XSS-атак</p>
<p>
$user = mysql_entities_fix_string($_POST['user']);<br>
$pass = mysql_entities_fix_string($_POST['pass']);<br>
$query = "SELECT * FROM users WHERE user='$user' AND pass='$pass'";<br>
function mysql_entities_fix_string($string)<br>
{<br>
return htmlentities(mysql_fix_string($string));<br>
}<br>
function mysql_fix_string($string)<br>
{<br>
if (get_magic_quotes_gpc()) $string = stripslashes($string);<br>
return mysql_real_escape_string($string);<br>
}
</p>
<?php
/*
$user = mysql_entities_fix_string($_POST['user']);
$pass = mysql_entities_fix_string($_POST['pass']);
$query = "SELECT * FROM users WHERE user='$user' AND pass='$pass'";
function mysql_entities_fix_string($string)
{
return htmlentities(mysql_fix_string($string));
}
function mysql_fix_string($string)
{
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return mysql_real_escape_string($string);
}
*/
?>


		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
	</body>
</html>
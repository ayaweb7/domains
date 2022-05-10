<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/screen.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

<title>Cookie</title>
</head>

	<body name="top">
<!-- !!!!!!!!!!!!!!!!!       шаблоны, заготовки для тэгов, комментарии !!!!!!!!!!!!!!! -->

<!-- Абзацы, заголовки, комментарии -->
<h4></h4>
<p>

</br>
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


<!-- !!!!!!!!!!!!!!!!!       шаблоны, заготовки для тэгов, комментарии !!!!!!!!!!!!!!! -->

<h4>Установка cookie</h4>
<p>
Установка cookie в PHP осуществляется довольно просто. 
До передачи кода HTML нужно вызвать функцию setcookie, для чего используется следующий синтаксис
</p>
<p>setcookie(name, value, expire, path, domain, secure, httponly);</p>
<?php

?>
<p>Таблица 13.1. Параметры функции setcookie</p>
<table id="inventory" class="realty">
	<tr><th>Параметр</th><th>Описание</th><th>Пример</th></tr>
	<tr><td>name</td><td>Имя cookie. Это имя ваш сервер будет использовать для доступа к cookie при последующих запросах браузера</td><td>username</td></tr>
	<tr><td>value</td><td>Значение cookie или его содержимое. Объем может составлять до 4 Кбайт буквенно-цифрового текста</td><td>Hannah</td></tr>
	<tr><td>expire</td><td>(Необязательный.) Время истечения срока действия в формате метки времени UNIX. Как правило, для установки этого параметра будет использоваться функция time(), к которой будет прибавляться количество секунд. Если параметр не установлен, срок действия cookie заканчивается с закрытием браузера</td><td>time() + 2592000</td></tr>
	<tr><td>path</td><td>(Необязательный.) Путь к cookie на сервере. Если в качестве пути используется прямой слеш (/), cookie доступен для всего домена, например для домена www.webserver.com. Если указан подкаталог, cookie доступен только в пределах этого подкаталога. По умолчанию путь указывает на текущий каталог, где был установлен cookie, и, как правило, используется именно такая настройка</td><td>/</td></tr>
	<tr><td>domain</td><td>(Необязательный.) Интернет-домен, которому принадлежит cookie. Если это webserver.com, то cookie доступен для всего домена webserver.com и его поддоменов, например www.webserver.com и для images.webserver.com. Если это images.webserver.com, то cookie доступен только для images.webserver.com и его поддоменов, например sub.images.webserver.com, но не для www.webserver.com</td><td>.webserver.com</td></tr>
	<tr><td>secure</td><td>(Необязательный.) Определяет, должен ли cookie использовать безопасное подключение (https://). Если значение параметра установлено в TRUE, cookie может быть передан только по безопасному подключению. По умолчанию устанавливается значение FALSE</td><td>FALSE</td></tr>
	<tr><td>httponly</td><td>(Необязательный; реализован в PHP, начиная с версии 5.2.0.) Определяет, должен ли cookie использовать протокол HTTP. Если значение параметра установлено в TRUE, то такие языки сценариев, как JavaScript, не могут получить доступ к cookie. (Это свойство поддерживается не во всех браузерах.) По умолчанию заадется значение FALSE</td><td>FALSE</td></tr>
</table>
<p>
Для создания cookie-файла по имени username со значением "Hannah",
к которому имеется доступ со всего веб-сервера текущего домена и который будет удален из браузерного кэша через семь дней,
используется следующая строка кода:
</p>
<p>setcookie('username', 'Hannah', time() + 60 * 60 * 24 * 7, '/');</p>

<h4>Доступ к cookie</h4>
<p>
Для чтения значения cookie нужно просто обратиться к системному массиву $_COOKIE.<br>
Например, если нужно посмотреть, хранится ли на текущем браузере cookie по имени username,
и, если хранится, прочитать его значение, то используется следующая строка кода:
</p>
<p>
if (isset($_COOKIE['username']))<br>
$username = $_COOKIE['username'];
</p>
<p>
Учтите, что прочитать значение cookie можно только после того, как он был отправлен браузеру.<br>
Это означает, что при установке cookie его нельзя прочитать до тех пор, пока браузер не перезагрузит страницу
(или не совершит какое-нибудь другое действие с доступом к cookie) с вашего сайта и не передаст cookie в ходе этого процесса обратно на сервер.
</p>

<h4>Удаление cookie</h4>
<p>
Для удаления cookie его нужно повторно установить с настройкой даты истечения срока действия на прошедшее время.<br>
При этом важно, чтобы все параметры нового вызова функции setcookie, за исключением timestamp,
в точности повторяли те параметры, которые указывались при создании cookie, в противном случае удаление не состоится.<br>
Поэтому для удаления ранее созданного cookie нужно воспользоваться следующей строкой кода:
</p>
<p>setcookie('username', 'Hannah', time() - 2592000, '/');</p>
<p>
Поскольку указано уже прошедшее время, cookie будет удален. Здесь я использовал время, равное 2 592 000 с в прошлом (что соответствует одному месяцу).<br>
Это сделано в расчете на неправильную установку даты и времени на компьютере клиента.
</p>

<h4>HTTP-аутентификация</h4>
<p>
HTTP-аутентификация использует веб-сервер для управления пользователями и паролями при работе приложения.<br> 
Ее можно применять во многих приложениях, требующих от пользователей входа в приложение
</p>
<p>Пример 13.1. PHP-аутентификация</p>
<p>
if (isset($_SERVER['PHP_AUTH_USER']) &&<br>
isset($_SERVER['PHP_AUTH_PW']))<br>
{<br>
echo "Добро пожаловать, пользователь: " . $_SERVER['PHP_AUTH_USER'] .<br>
" , имеющий пароль: " . $_SERVER['PHP_AUTH_PW'];<br>
}<br>
else<br>
{<br>
header('WWW-Authenticate: Basic realm="Restricted Section"');<br>
header('HTTP/1.0 401 Unauthorized');<br>
die("Пожалуйста, введите имя пользователя и пароль");<br>
}
</p>
<?php
/*
if (isset($_SERVER['PHP_AUTH_USER']) &&
isset($_SERVER['PHP_AUTH_PW']))
{
echo "Добро пожаловать, пользователь: " . $_SERVER['PHP_AUTH_USER'] .
" , имеющий пароль: " . $_SERVER['PHP_AUTH_PW'];
}
else
{
header('WWW-Authenticate: Basic realm="Restricted Section"');
header('HTTP/1.0 401 Unauthorized');
die("Пожалуйста, введите имя пользователя и пароль");
}
*/
?>
<p>Пример 13.2. PHP-аутентификация с проверкой вводимой информации</p>
<p>
$username = 'admin';<br>
$password = 'letmein';<br>
if (isset($_SERVER['PHP_AUTH_USER']) &&<br>
isset($_SERVER['PHP_AUTH_PW']))<br>
{<br>
if ($_SERVER['PHP_AUTH_USER'] == $username &&<br>
$_SERVER['PHP_AUTH_PW'] == $password)<br>
echo "Регистрация прошла успешно";<br>
else die("Неверная комбинация имя пользователя–пароль");<br>
}<br>
else<br>
{<br>
header('WWW-Authenticate: Basic realm="Restricted Section"');<br>
header('HTTP/1.0 401 Unauthorized');<br>
die ("Пожалуйста, введите имя пользователя и пароль");<br>
}
</p>

<?php
/*
$username = 'admin';
$password = 'letmein';
if (isset($_SERVER['PHP_AUTH_USER']) &&
isset($_SERVER['PHP_AUTH_PW']))
{
if ($_SERVER['PHP_AUTH_USER'] == $username &&
$_SERVER['PHP_AUTH_PW'] == $password)
echo "Регистрация прошла успешно";
else die("Неверная комбинация имя пользователя–пароль");
}
else
{
header('WWW-Authenticate: Basic realm="Restricted Section"');
header('HTTP/1.0 401 Unauthorized');
die ("Пожалуйста, введите имя пользователя и пароль");
}
*/
?>

<h4>Сохранение имен пользователей и паролей</h4>
<p>
Вместо этого будет использован тонкий прием с применением так называемой односторонней функции.<br>
Функции этого типа просты в использовании и способны превращать строку текста в строку, напоминающую набор произвольных символов.<br>
Задействуемая нами функция называется md5. Ей передается строка для хеширования, а она возвращает 32-символьное шестнадцатеричное число.
Код, в котором она используется, имеет следующий вид:<br>
$token = md5('мой_пароль');<br><br>
При запуске этого кода переменная $token может получить такое значение:<br>
34819d7beeabb9260a5c854bc85b3e44
</p>
<p>
Поэтому я перешел к использованию PHP-функции hash с передачей ей версии алгоритма ripemd,
который был разработан открытым академическим сообществом и (как и md5) возвращает 32-символьное шестнадцатеричное число,
поэтому им можно легко заменить md5 в большинстве баз данных. Он используется следующим образом:<br>
$token = hash('ripemd128', 'mypassword');<br><br>
Этот пример может дать $token такое значение:<br>
7b694600c8a2a2b0897c719958713619
</p>


<h4>Добавление произвольных данных</h4>
<p>Пример 13.3. Создание таблицы users и добавление к ней двух учетных записей</p>
<p>
require_once '../login1.php';<br>
$connection =<br>
new mysqli($db_hostname, $db_username, $db_password, $db_database);<br>
if ($connection->connect_error) die($connection->connect_error);<br>
$query = "CREATE TABLE users (<br>
forename VARCHAR(32) NOT NULL,<br>
surname VARCHAR(32) NOT NULL,<br>
username VARCHAR(32) NOT NULL UNIQUE,<br>
password VARCHAR(32) NOT NULL<br>
)";<br>
$result = $connection->query($query);<br>
if (!$result) die($connection->error);<br>
$salt1 = "qm&h*";<br>
$salt2 = "pg!@";<br>
$forename = 'Bill';<br>
$surname = 'Smith';<br>
$username = 'bsmith';<br>
$password = 'mysecret';<br>
$token = hash('ripemd128', "$salt1$password$salt2");<br>
add_user($connection, $forename, $surname, $username, $token);<br>
$forename = 'Pauline';<br>
$surname = 'Jones';<br>
$username = 'pjones';<br>
$password = 'acrobat';<br>
$token = hash('ripemd128', "$salt1$password$salt2");<br>
add_user($connection, $forename, $surname, $username, $token);<br>
function add_user($connection, $fn, $sn, $un, $pw)<br>
{<br>
$query = "INSERT INTO users VALUES('$fn', '$sn', '$un', '$pw')";<br>
$result = $connection->query($query);<br>
if (!$result) die($connection->error);}
</p>
<?php
require_once '../login1.php';
/*
$connection =
new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);
*/
/*
$query = "CREATE TABLE users (
forename VARCHAR(32) NOT NULL,
surname VARCHAR(32) NOT NULL,
username VARCHAR(32) NOT NULL UNIQUE,
password VARCHAR(32) NOT NULL
)";
$result = $connection->query($query);
if (!$result) die($connection->error);
$salt1 = "qm&h*";
$salt2 = "pg!@";
$forename = 'Bill';
$surname = 'Smith';
$username = 'bsmith';
$password = 'mysecret';
$token = hash('ripemd128', "$salt1$password$salt2");
add_user($connection, $forename, $surname, $username, $token);
$forename = 'Pauline';
$surname = 'Jones';
$username = 'pjones';
$password = 'acrobat';
$token = hash('ripemd128', "$salt1$password$salt2");
add_user($connection, $forename, $surname, $username, $token);
function add_user($connection, $fn, $sn, $un, $pw)
{
$query = "INSERT INTO users VALUES('$fn', '$sn', '$un', '$pw')";
$result = $connection->query($query);
if (!$result) die($connection->error);}
*/
?>
<p>
В этой таблице будут созданы два пользователя — Bill Smith и Pauline Jones
c именами пользователей и паролями bsmith — mysecret и pjones — acrobat соответственно.<br>
Теперь, используя данные, имеющиеся в этой таблице, мы можем модифицировать код примера 13.2 для вполне приемлемой аутентификации пользователей.
</p>
<p>Пример 13.4. PHP-аутентификация с использованием MySQL</p>
<p>
require_once '../login1.php';<br>
$connection =<br>
new mysqli($db_hostname, $db_username, $db_password, $db_database);<br>
if ($connection->connect_error) die($connection->connect_error);<br>
<br>
if (isset($_SERVER['PHP_AUTH_USER']) &&<br>
isset($_SERVER['PHP_AUTH_PW']))<br>
{<br>
$un_temp = mysql_entities_fix_string($connection,$_SERVER['PHP_AUTH_USER']);<br>
$pw_temp = mysql_entities_fix_string($connection,$_SERVER['PHP_AUTH_PW']);<br>
$query = "SELECT * FROM users WHERE username='$un_temp'";<br>
$result = $connection->query($query);<br>
if (!$result) die($connection->error);<br>
elseif ($result->num_rows)<br>
{<br>
$row = $result->fetch_array(MYSQLI_NUM);<br>
$result->close();<br>
$salt1 = "qm&h*";<br>
$salt2 = "pg!@";<br>
$token = hash('ripemd128', "$salt1$pw_temp$salt2");<br>
if ($token == $row[3]) echo "$row[0] $row[1] :<br>
Привет, $row[0], теперь вы зарегистрированы под именем '$row[2]'";<br>
else die("Неверная комбинация имя пользователя–пароль");<br>
}<br>
else die("Неверная комбинация имя пользователя–пароль");<br>
}<br>
else<br>
{<br>
header('WWW-Authenticate: Basic realm="Restricted Section"');<br>
header('HTTP/1.0 401 Unauthorized');<br>
die ("Пожалуйста, введите имя пользователя и пароль");<br>
}<br>
$connection->close();<br>
<br>
function mysql_entities_fix_string($connection, $string)<br>
{<br>
return htmlentities(mysql_fix_string($connection, $string));<br>
}<br>
function mysql_fix_string($connection, $string)<br>
{<br>
if (get_magic_quotes_gpc()) $string = stripslashes($string);<br>
return $connection->real_escape_string($string);<br>
}
</p>
<?php
require_once '../login1.php';
/*
$connection =
new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);
*/
/*
if (isset($_SERVER['PHP_AUTH_USER']) &&
isset($_SERVER['PHP_AUTH_PW']))
{
$un_temp = mysql_entities_fix_string($connection,$_SERVER['PHP_AUTH_USER']);
$pw_temp = mysql_entities_fix_string($connection,$_SERVER['PHP_AUTH_PW']);
$query = "SELECT * FROM users WHERE username='$un_temp'";
$result = $connection->query($query);
if (!$result) die($connection->error);
elseif ($result->num_rows)
{
$row = $result->fetch_array(MYSQLI_NUM);
$result->close();
$salt1 = "qm&h*";
$salt2 = "pg!@";
$token = hash('ripemd128', "$salt1$pw_temp$salt2");
if ($token == $row[3]) echo "$row[0] $row[1] :
Привет, $row[0], теперь вы зарегистрированы под именем '$row[2]'";
else die("Неверная комбинация имя пользователя–пароль");
}
else die("Неверная комбинация имя пользователя–пароль");
}
else
{
header('WWW-Authenticate: Basic realm="Restricted Section"');
header('HTTP/1.0 401 Unauthorized');
die ("Пожалуйста, введите имя пользователя и пароль");
}
$connection->close();

function mysql_entities_fix_string($connection, $string)
{
return htmlentities(mysql_fix_string($connection, $string));
}
function mysql_fix_string($connection, $string)
{
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return $connection->real_escape_string($string);
}
*/
?>
<p>
Последние 10 строк — не что иное, как пример 10.22, который уже встречался в главе 10.<br>
Эти строки присутствуют здесь для выполнения очень важной задачи — обезвреживания введенных пользователем данных.<br>
начинаются с присваивания значений двум переменным — $un_temp и $pw_temp с использованием отправленных имени пользователя и пароля.
</p>
<p>
Затем выдается запрос к MySQL на поиск пользователя с именем $un_temp, и если будет возвращен результат,
значение его первой строки присваивается переменной $row.<br>
(Поскольку имя пользователя уникально, возвращена будет только одна строка.)<br>
Потом создаются переменные $salt1 и $salt2 с двумя произвольными строками, которые затем добавляются до и после отправленного пароля $pw_temp.<br>
Затем получившаяся в результате строка передается функции hash, которая возвращает 32-символьное шестнадцатеричное значение, присваиваемое переменной $token.
</p>
<p>
Теперь остается лишь сравнить значение переменной $token со значением, хранящимся в базе данных в четвертой графе,
которая при начале отсчета с нуля соответствует графе 3. Иными словами, $row[3] содержит предыдущую лексему, вычисленную для «посыпанного солью» пароля.<br>
Если значения совпадают, выдается строка приветствия, в которой содержится обращение к пользователю по его настоящему имени (рис. 13.4).<br>
В противном случае выдается сообщение об ошибке.
</p>

<h4>Использование сессий</h4>
<p>
Сессии — это группы переменных, которые хранятся на сервере, но относятся только к текущему пользователю.<br>
Чтобы обеспечить обращение нужных пользователей к нужным переменным, для уникальной идентификации этих пользователей
PHP сохраняет файлы cookie на пользовательских браузерах.
</p>
<p>
как быть с теми пользователями, которые отключили cookie.<br>
Это не проблема, поскольку в PHP, начиная с версии 4.2.0, такие случаи выявляются и cookie помещаются в область GET-запроса каждого URL-адреса.<br>
В любом случае сессии предоставляют надежный способ отслеживания действий ваших пользователей.
</p>

<h4>Начало сессии</h4>
<p>
Чтобы инициировать работу сессии, нужно перед выводом на экран любого кода HTML вызвать PHP-функцию session_start точно так же,
как это делалось при отправке cookie в процессе обмена заголовками.<br>
Затем, чтобы приступить к сохранению переменных сессии, им нужно присвоить значения как элементам массива $_SESSION:<br>
$_SESSION['имя_переменной'] = $переменная_со_значением;
</p>
<p>
При последующих запусках программы их значения можно будет снова прочитать, воспользовавшись таким кодом:<br>
$имя_переменной = $_SESSION['имя_переменной'];
</p>
<p>
Предположим, у вас есть приложение, которому всегда нужен доступ к пользовательскому имени и паролю,
а также к настоящему имени и фамилии каждого пользователя в том виде, в котором они сохранены в базе данных в таблице users, созданной совсем недавно.<br>
Выполним еще одну модификацию программы authenticate.php из примера 13.4, чтобы инициировать работу сессии сразу же после идентификации пользователя.
</p>
<p>
Единственное отличие касается раздела if ($token == $row[3]), который теперь начинается с открытия сессии и сохранения в ней четырех переменных.
</p>
<p>Пример 13.5. Открытие сессии после успешной аутентификации</p>
<p>
require_once 'login.php';<br>
<br>
$connection =<br>
new mysqli($db_hostname, $db_username, $db_password, $db_database);<br>
if ($connection->connect_error) die($connection->connect_error);<br>
<br>
if (isset($_SERVER['PHP_AUTH_USER']) &&<br>
isset($_SERVER['PHP_AUTH_PW']))<br>
{<br>
$un_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_USER']);<br>
$pw_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_PW']);<br>
$query = "SELECT * FROM users WHERE username='$un_temp'";<br>
$result = $connection->query($query);<br>
if (!$result) die($connection->error);<br>
elseif ($result->num_rows)<br>
{<br>
$row = $result->fetch_array(MYSQLI_NUM);<br>
$result->close();<br>
$salt1 = "qm&h*";<br>
$salt2 = "pg!@";<br>
$token = hash('ripemd128', "$salt1$pw_temp$salt2");<br>
if ($token == $row[3])<br>
{<br>
session_start();<br>
$_SESSION['username'] = $un_temp;<br>
$_SESSION['password'] = $pw_temp;<br>
$_SESSION['forename'] = $row[0];<br>
$_SESSION['surname'] = $row[1];<br>
echo "$row[0] $row[1] : Привет, $row[0],<br>
теперь вы зарегистрированы под именем '$row[2]'";<br>
die ("p a href=continue.php>Щелкните здесь<br>

</p>
<?php
require_once '../login1.php';
/*
$connection =
new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);
*/
/*
if (isset($_SERVER['PHP_AUTH_USER']) &&
isset($_SERVER['PHP_AUTH_PW']))
{
$un_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_USER']);
$pw_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_PW']);
$query = "SELECT * FROM users WHERE username='$un_temp'";
$result = $connection->query($query);
if (!$result) die($connection->error);
elseif ($result->num_rows)
{
$row = $result->fetch_array(MYSQLI_NUM);
$result->close();
$salt1 = "qm&h*";
$salt2 = "pg!@";
$token = hash('ripemd128', "$salt1$pw_temp$salt2");
if ($token == $row[3])
{
session_start();
$_SESSION['username'] = $un_temp;
$_SESSION['password'] = $pw_temp;
$_SESSION['forename'] = $row[0];
$_SESSION['surname'] = $row[1];
echo "$row[0] $row[1] : Привет, $row[0],
теперь вы зарегистрированы под именем '$row[2]'";
die ("<p><a href=continue.php>Щелкните здесь
для продолжения</a></p>");
}
else die("Неверная комбинация имя пользователя — пароль");
}
else die("Неверная комбинация имя пользователя – пароль");
}
else
{
header('WWW-Authenticate: Basic realm="Restricted Section"');
header('HTTP/1.0 401 Unauthorized');
die ("Пожалуйста, введите имя пользователя и пароль");
}
$connection->close();
function mysql_entities_fix_string($connection, $string)
{
return htmlentities(mysql_fix_string($connection, $string));
}
function mysql_fix_string($connection, $string)
{
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return $connection->real_escape_string($string);
}
*/
?>
<p>
К программе также добавлена ссылка Щелкните здесь для продолжения с URL-адресом continue.php.
Она будет использована для иллюстрации того, как сессия будет перенесена на другую программу или веб-страницу PHP-программы.<br>
Поэтому создайте файл continue.php, набрав и сохранив в нем программу из примера 13.6.
</p>
<p>Пример 13.6. Извлечение переменных сессии</p>
<p>
session_start();<br>
if (isset($_SESSION['username']))<br>
{<br>
$username = $_SESSION['username'];<br>
$password = $_SESSION['password'];<br>
$forename = $_SESSION['forename'];<br>
$surname = $_SESSION['surname'];<br>
echo "С возвращением, $forename.br><br>
Ваше полное имя $forename $surname.br><br>
Ваше имя пользователя '$username'<br>
и Ваш пароль '$password'.";<br>
}<br>
else echo "Пожалуйста, для входа a<br>
href='authenticate2.php'>щелкните здесь /a>.";
</p>

<?php
/*
session_start();
if (isset($_SESSION['username']))
{
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$forename = $_SESSION['forename'];
$surname = $_SESSION['surname'];
echo "С возвращением, $forename.<br>
Ваше полное имя $forename $surname.<br>
Ваше имя пользователя '$username'
и Ваш пароль '$password'.";
}
else echo "Пожалуйста, для входа <a
href='authenticate2.php'>щелкните здесь</a>.";
*/
?>
<p>
Теперь можно вызвать в браузере authenticate2.php, после появления приглашения ввести имя пользователя bsmith и пароль mysecret
(или pjones и acrobat) и щелкнуть на ссылке для загрузки программы continue.php.
</p>
<p>
После аутентификации пользователя и создания сессии весь остальной программный код действительно упрощается.
Нужно лишь вызвать функцию session_start и найти любые переменные, к которым нужен доступ из массива $_SESSION.<br>
</p>
<p>
В примере 13.6 быстрой проверки наличия значения у элемента $_SESSION['username'] вполне достаточно для того,
чтобы узнать об аутентификации текущего пользователя, потому что переменные сессии хранятся на сервере
(в отличие от cookie, которые хранятся на машине браузера) и им можно доверять.
</p>
<p>
Если элементу $_SESSION['username'] значение присвоено не было, значит, активная сессия отсутствует,
и поэтому последняя строка кода в примере 13.6 перенаправляет пользователей на страницу регистрации на сайте,
которая находится в программе authenticate2.php.
</p>

<h4>Завершение сессии</h4>
<p>
Обычно когда пользователю нужно уйти с вашего сайта, наступает момент завершения работы сессии, для чего, как показано в примере 13.7,
можно воспользоваться функцией session_destroy.<br>
В этом примере предоставляется полезная функция для полного уничтожения сессии, выхода пользователя и очистки всех переменных сессии.
</p>
<p>Пример 13.7. Полезная функция уничтожения сессии и ее данных</p>
<p>
function destroy_session_and_data()<br>
{<br>
session_start();<br>
$_SESSION = array();<br>
setcookie(session_name(), '', time() - 2592000, '/');<br>
session_destroy();<br>
}
</p>
<?php
/*
function destroy_session_and_data()
{
session_start();
$_SESSION = array();
setcookie(session_name(), '', time() - 2592000, '/');
session_destroy();
}
*/
?>

<p>
Чтобы увидеть этот код в действии, можно модифицировать программу continue.php, как показано в примере 13.8.<br>
Пример 13.8. Извлечение переменных сессии перед ее уничтожением
</p>
<p>
session_start();<br>
if (isset($_SESSION['username']))<br>
{<br>
$username = $_SESSION['username'];<br>
$password = $_SESSION['password'];<br>
$forename = $_SESSION['forename'];<br>
$surname = $_SESSION['surname'];<br>
destroy_session_and_data();<br>
echo "С возвращением, $forename. br><br>
Ваше полное имя $forename $surname. br><br>
Ваше имя пользователя '$username'<br>
и ваш пароль '$password'.";<br>
}<br>
else echo "Пожалуйста, для входа a<br>
href='authenticate2.php'>щелкните здесь /a>.";<br>
function destroy_session_and_data()<br>
{<br>
$_SESSION = array();<br>
if (session_id() != "" || isset($_COOKIE[session_name()]))<br>
setcookie(session_name(), '', time() - 2592000, '/');<br>
session_destroy();<br>
}
</p>
<?php
/*
session_start();
if (isset($_SESSION['username']))
{
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$forename = $_SESSION['forename'];
$surname = $_SESSION['surname'];
destroy_session_and_data();
echo "С возвращением, $forename.<br>
Ваше полное имя $forename $surname.<br>
Ваше имя пользователя '$username'
и ваш пароль '$password'.";
}
else echo "Пожалуйста, для входа <a
href='authenticate2.php'>щелкните здесь</a>.";
function destroy_session_and_data()
{
$_SESSION = array();
if (session_id() != "" || isset($_COOKIE[session_name()]))
setcookie(session_name(), '', time() - 2592000, '/');
session_destroy();
}
*/
?>
<p>
При первом переходе из authenticate2.php в continue.php будут выведены все переменные сессии.<br>
Но если после этого нажать в браузере кнопку обновления страницы, в результате предшествующего этому вызова функции destroy_session_and_data
сессия уже будет уничтожена и появится приглашение вернуться на страницу регистрации.
</p>

<h4>Установка времени ожидания</h4>
<p>
Есть и другие причины, по которым может потребоваться самостоятельное закрытие пользовательской сессии,
например, если пользователь забыл зарегистрироваться или проигнорировал этот процесс и нужно,
чтобы программа закрыла его сессию ради собственной безопасности.<br>
Это можно сделать, установив время ожидания, по истечении которого, если не предпринять активных действий, произойдет автоматическое завершение работы.
</p>
<p>
Для этого используется функция ini_set. В данном примере время ожидания устанавливается ровно на сутки:<br>
ini_set('session.gc_maxlifetime', 60 * 60 * 24);<br><br>
Если нужно узнать текущее время ожидания, его можно отобразить, воспользовавшись следующим кодом:<br>
echo ini_get('session.gc_maxlifetime');
</p>

<h4>Предупреждение хищения сессии</h4>
<p>
Когда применение SSL не представляется возможным, можно продолжить аутентификацию пользователей за счет хранения наряду с остальными сведениями их IP-адресов.
Для этого нужно при сохранении их сессии добавить следующую строку кода:<br>
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
</p>
<p>
Затем в качестве дополнительной меры контроля при любой загрузке страницы и доступности сессии проводится следующая проверка,
которая при несоответствии текущего IP-адреса сохраненному вызывает функцию different_user:<br>
if ($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']) different_user();
</p>
<?php

?>

<h4></h4>
<p>

</br>
</p>
<p></p>
<?php

?>

<h4></h4>
<p>

</br>
</p>
<p></p>
<?php

?>

<h4></h4>
<p>

</br>
</p>
<p></p>
<?php

?>

<h4></h4>
<p>

</br>
</p>
<p></p>
<?php

?>

<h4></h4>
<p>

</br>
</p>
<p></p>
<?php

?>

<h4></h4>
<p>

</br>
</p>
<p></p>
<?php

?>

<h4></h4>
<p>

</br>
</p>
<p></p>
<?php

?>


		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
		
	</body>
</html>
<?php // query.php
require_once 'login.php';
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysqli_error());
mysqli_select_db($db_server, $db_database)
or die("Невозможно выбрать базу данных: " . mysqli_error());
$query = "SELECT * FROM classics";
$result = mysqli_query($db_server, $query);
if (!$result) die ("Сбой при доступе к базе данных: " . mysqli_error());
$rows = mysqli_num_rows($result);
for ($j = 0 ; $j < $rows ; ++$j)
{
$row = mysqli_fetch_row($result);
echo 'Author: ' . $row[0] . '<br>';
echo 'Title: ' . $row[1] . '<br>';
echo 'Category: ' . $row[2] . '<br>';
echo 'Year: ' . $row[3] . '<br>';
echo 'ISBN: ' . $row[4] . '<br><br>';
}
?>
<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
</p>
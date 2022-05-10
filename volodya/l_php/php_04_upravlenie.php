<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/screen.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

<title>Управление</title>
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

<table>
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

<h4>TRUE или FALSE?</h4>
<p>Для каждой строки выводится буква от a до d, за которой следуют двоеточие и результат выражения</p>
<p>Пример 4.1. Четыре простых булевых выражения</p>
<p>
echo "a: [" . (20 > 9) . "];
echo "b: [" . (5 == 6) . "];
echo "c: [" . (1 == 0) . "];
echo "d: [" . (1 == 1) . "];
</p>

<?php
echo "a: [" . (20 > 9) . "]<br>";
echo "b: [" . (5 == 6) . "]<br>";
echo "c: [" . (1 == 0) . "]<br>";
echo "d: [" . (1 == 1) . "]<br>";
?>

<h4>Литералы и переменные</h4>
<p>Пример 4.3. Литералы и переменные</p>
<p>
$myname = "Brian";
$myage = 37;
echo "a: " . 73 . "<br>"; // Числовой литерал
echo "b: " . "Hello" . "<br>"; // Строковый литерал
echo "c: " . FALSE . "<br>"; // Литерал константы
echo "d: " . $myname . "<br>"; // Строковая переменная
echo "e: " . $myage . "<br>"; // Числовая переменная
</p>

<?php
$myname = "Brian";
$myage = 37;
echo "a: " . 73 . ": Числовой литерал" . "<br>"; // Числовой литерал
echo "b: " . "Hello" . ": Строковый литерал" . "<br>"; // Строковый литерал
echo "c: " . FALSE . ": Литерал константы" . "<br>"; // Литерал константы
echo "d: " . $myname . ": Строковая переменная" . "<br>"; // Строковая переменная
echo "e: " . $myage . ": Числовая переменная" . "<br>"; // Числовая переменная
?>

<p>Пример 4.4. Выражение и инструкция</p>
<p>
$day_number = 350;<br>
$days_to_new_year = 366 - $day_number; // Выражение<br>
if ($days_to_new_year < 30)<br>
{<br>
echo "Скоро Новый Год!"; // Инструкция
</p>

<?php
$day_number = 350;
$days_to_new_year = 366 - $day_number; // Выражение
if ($days_to_new_year < 30)
{
echo "Скоро Новый Год!"; // Инструкция
}
?>

<h4>Операторы</h4>
<p id="bold">
Один трехкомпонентный оператор, имеющий форму x ? y : z. <br>
По сути, это состоящая из трех частей однострочная инструкция if, в которой осуществляется выбор между двумя выражениями,<br> 
зависящий от результата вычисления третьего выражения.
</p>

<h4>Операторы равенства</h4>
<p>Пример 4.12. Присваивание значения и проверка его на равенство</p>
<?php
$month = "Март";
if ($month == "Март") echo "Весна наступила";
?>

<h4>Операторы сравнения</h4>
<p>Пример 4.15. Четыре оператора сравнения</p>
<?php
$a = 2; $b = 3;
if ($a > $b) echo "$a больше $b<br>";
if ($a < $b) echo "$a меньше $b<br>";
if ($a >= $b) echo "$a больше или равно $b<br>";
if ($a <= $b) echo "$a меньше или равно $b<br>";
?>

<h4>Логические операторы</h4>
<p>Пример 4.16. Использование логических операторов</p>
<?php
$a = 1; $b = 0;
echo ($a AND $b) . "<br>";
echo ($a or $b) . "<br>";
echo ($a XOR $b) . "<br>";
echo !$a . "<br>";
?>

<h4>Условия - Инструкция if</h4>
<p>Пример 4.19. Инструкция if, в которой используются фигурные скобки</p>
<p>$bank_balance = 99;<br>
echo "OLD_bank_balance = $bank_balance";<br>
if ($bank_balance < 100)<br>
{<br>
$money = 1000;<br>
$bank_balance += $money;<br>
echo "NEW_bank_balance = $bank_balance<br>";
}</p>

<?php
$bank_balance = 99;
echo "OLD_bank_balance = $bank_balance<br>";
if ($bank_balance < 100)
{
$money = 1000;
$bank_balance += $money;
echo "NEW_bank_balance = $bank_balance<br>";
}
?>

<h4>Инструкция switch</h4>
<p>Пример 4.22. Многострочная инструкция if...elseif</p>
<p>
if ($page == "Home") echo "Вы выбрали Home";<br>
elseif ($page == "About") echo "Вы выбрали About";<br>
elseif ($page == "News") echo "Вы выбрали News";<br>
elseif ($page == "Login") echo "Вы выбрали Login";<br>
elseif ($page == "Links") echo "Вы выбрали Links";
</p>
<?php
if ($page == "Home") echo "Вы выбрали Home";
elseif ($page == "About") echo "Вы выбрали About";
elseif ($page == "News") echo "Вы выбрали News";
elseif ($page == "Login") echo "Вы выбрали Login";
elseif ($page == "Links") echo "Вы выбрали Links";
?>

<p>Пример 4.23. Инструкция switch</p>
<p>
switch ($page)<br>
{<br>
case "Home":<br>
echo "Вы выбрали Home";<br>
break;<br>
case "About":<br>
echo "Вы выбрали About";<br>
break;<br>
case "News":<br>
echo "Вы выбрали News";<br>
break;<br>
case "Login":<br>
echo "Вы выбрали Login";<br>
break;<br>
case "Links":<br>
echo "Вы выбрали Links";<br>
break;<br>
}
</p>
<?php
switch ($page)
{
case "Home":
echo "Вы выбрали Home";
break;
case "About":
echo "Вы выбрали About";
break;
case "News":
echo "Вы выбрали News";
break;
case "Login":
echo "Вы выбрали Login";
break;
case "Links":
echo "Вы выбрали Links";
break;
}
?>

<h4>Оператор ?</h4>
<p>Пример 4.26. Использование оператора ?</p>
<?php
$fuel = 3;
echo "fuel = $fuel<br>";
echo $fuel <= 1 ? "Требуется дозаправка" : "Топлива еще достаточно";
?>

<h4>Циклы while</h4>
<p>Пример 4.29. Цикл while для вывода таблицы умножения на 12</p>
<p>
$count = 1;<br>
while ($count <= 12)<br>
{<br>
echo "Число $count, умноженное на 12, равно " . $count * 12;<br>
++$count;<br>
}
</p>
<?php
$count = 1;
while ($count <= 12)
{
echo "Число $count, умноженное на 12, равно " . $count * 12 . "<br>";
++$count;
}
?>

<p>Пример 4.30. Укороченная версия примера 4.29</p>
<p>
$count = 0;<br>
while (++$count <= 12)<br>
echo "Число $count, умноженное на 12, равно " . $count * 12;
</p>
<?php
$count = 0;
while (++$count <= 12)
echo "Число $count, умноженное на 12, равно " . $count * 12 . "<br>";
?>

<h4>Циклы do...while</h4>
<p>Пример 4.31. Цикл do...while, используемый для вывода таблицы умножения на 12</p>
<p>
$count = 1;<br>
do<br>
echo "Число $count, умноженное на 12, равно " . $count * 12;<br>
while (++$count <= 12);
</p>
<?php
$count = 1;
do
echo "Число $count, умноженное на 12, равно " . $count * 12 . "<br>";
while (++$count <= 12);
?>

<h4>Циклы for</h4>
<p>Пример 4.33. Вывод таблицы умножения на 12 из цикла for</p>
<p>
for ($count = 1 ; $count <= 12 ; ++$count)<br>
echo "Число $count, умноженное на 12, равно " . $count * 12;
</p>
<p>Пример 4.34. Цикл for из примера 4.33 с добавлением фигурных скобок</p>
<p>
for ($count = 1 ; $count <= 12 ; ++$count)<br>
{<br>
echo "Число $count, умноженное на 12, равно " . $count * 12;<br>
echo "";<br>
}
</p>
<?php
for ($count = 1 ; $count <= 12 ; ++$count)
echo "Число $count, умноженное на 12, равно " . $count * 12 . "<br>";
?>

<h4>Прекращение работы цикла</h4>
<p>Пример 4.35. Запись файла, использующая цикл for с перехватом ошибки</p>
<p>
$fp = fopen("text.txt", 'wb');<br>
for ($j = 0 ; $j < 100 ; ++$j)<br>
{<br>
$written = fwrite($fp, "data");<br>
if ($written == FALSE) break;<br>
}<br>
fclose($fp);
</p>
<?php
$fp = fopen("text.txt", 'wb');
for ($j = 0 ; $j < 100 ; ++$j)
{
$written = fwrite($fp, "data");
if ($written == FALSE) break;
}
fclose($fp);
?>
<p>
в первой строке кода открывается файл text.txt для записи в двоичном режиме, а затем переменной $fp возвращается указатель на него,<br>
который в дальнейшем используется для ссылки на этот открытый файл.
</p>
<p>
Затем осуществляется 100 проходов цикла (от 0 до 99), записывающих строку data в файл. После каждой записи функция fwrite присваивает переменной<br>
$written значение, представляющее собой количество успешно записанных символов.<br>
Но если происходит ошибка, то функция fwrite присваивает этой переменной значение FALSE.
</p>
<p>
Поведение функции fwrite облегчает коду проверку переменной $written на наличие значения FALSE, и если она имеет такое значение,<br>
код прекращает работу цикла и передает управление инструкции, закрывающей файл.
</p>
<p>При желании улучшить код можно упростить строку:</p>
<p id="italic">if ($written == FALSE) break;</p>
<p>за счет использования оператора NOT:</p>
<p id="italic">if (!$written) break;</p>
<p>Фактически пара инструкций, находящихся внутри цикла, может быть сокращена до одной:</p>
<p id="italic">if (!fwrite($fp, "data")) break;</p>


<h4></h4>
<p></p>
<p></p>


		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
	</body>
</html>
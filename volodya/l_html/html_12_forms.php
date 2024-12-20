﻿<html>
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

<h2 style='color: red;'>Обработка форм</h2>

<h4>Создание форм</h4>
<p>Пример 12.1. formtest.php — простой обработчик формы на PHP</p>

<?php // html_12_forms.php
echo <<<_END
<!--
<html>
<head>
<title>Form Test</title>
</head>
<body>
-->
<form method="post" action="html_12_forms.php">
Как Вас зовут?
<input type="text" name="name">
<input type="submit" value="Отправить данные">
</form>
<!--
</body>
</html>
-->
_END;
?>


<h4>Извлечение отправленных данных</h4>
<p>
В примере 12.2 показана расширенная версия предыдущей программы, включающая обработку данных.
</p>
<p style='color: blue;'>Пример 12.2. Обновленная версия formtest.php</p>

<?php // html_12_forms.php
if (isset($_POST['name'])) $name = $_POST['name'];
else $name = "(Не введено)";
echo <<<_END
Вас зовут: $name<br>
<form method="post" action="html_12_forms.php">
Как Вас зовут?
<input type="text" name="name">
<input type="submit" value="Отправить данные">
</form>
_END;
?>

<h4>Значения по умолчанию</h4>
<p>Пример 12.3. Установка значений по умолчанию</p>
<form method="post" action="html_12_forms.php"><pre>
Сумма заимствования <input type="text" name="principle">
Ежемесячная выплата <input type="text" name="monthly">
Количество лет <input type="text" name="years" value="25">
Процент годовых <input type="text" name="rate" value="6">
<input type="submit">
</pre></form>

<p>
Обратите внимание на третий и четвертый элементы ввода данных.
За счет указания значения для атрибута value в поле отображается значение по умолчанию,
которое пользователи в дальнейшем смогут изменить, если у них появится такое желание.
</p>

<h4>Типы элементов ввода данных</h4>
<h4>Текстовое поле</h4>
<p>
Типовой формат текстового поля для ввода информации имеет следующий вид:<br>
input type="text" name="имя" size="размер" maxlength="длина" value="значение">
</p>
<p>
Атрибут size определяет ширину поля в символах текущего шрифта, каким оно появится на экране,
а maxlength определяет максимальное количество символов, которое пользователю разрешено вводить в это поле.<br>
Единственными обязательными атрибутами являются type (тип), сообщающий браузеру ожидаемый тип элемента ввода данных,
и name (имя), дающий вводимым данным имя, которое используется в дальнейшем для обработки поля после получения отправленной формы.
</p>

<h4>Текстовая область</h4>
<p>
Когда нужно принять вводимые данные, превышающие по объему короткую строку текста, используется текстовая область.<br>
textarea name="имя" cols="ширина" rows="высота" wrap="тип"><br>
Это текст, отображаемый по умолчанию.<br>
/textarea>
</p>
<p>
Для управления шириной и высотой текстовой области используются атрибуты cols (графы) и rows (строки).
</p>
<p>
И наконец, с помощью атрибута wrap (перенос) можно управлять порядком переноса вводимого в область текста<br>
(и тем, как этот перенос будет отправляться на сервер).<br>
off - Текст не переносится, и строки появляются в строгом соответствии с тем, как их вводит пользователь<br>
soft - Текст переносится, но отправляется на сервер одной длинной строкой без символов возврата каретки и перевода строки<br>
hard - Текст переносится и отправляется на сервер в формате переноса с «мягким» возвратом в начало следующей строки и переводом строки
</p>

<h4>Флажки</h4>
<p>
Если пользователю нужно предложить выбор из нескольких вариантов данных,
при котором он может остановиться на одном или нескольких вариантах, то для этого всегда используются флажки.<br> Формат флажков выглядит следующим образом:
input type="checkbox" name="имя" value="значение" checked="checked">
</p>
<p>Пример 12.5. Отправка нескольких значений с помощью массива</p>
<p>
Ванильное input type="checkbox" name="ice[]" value="Vanilla"><br>
Шоколадное input type="checkbox" name="ice[]" value="Chocolate"><br>
Земляничное input type="checkbox" name="ice[]" value="Strawberry"><br><br>
Если переменная $ice является массивом, то для отображения ее содержимого можно использовать очень простой PHP-код:<br>
foreach($ice as $item) echo "$item br>";
</p>
<p>
В нем применяется стандартная PHP-конструкция foreach, осуществляющая последовательный перебор элементов массива $ice
и передающая значение каждого элемента переменной $item, содержимое которой затем отображается с помощью команды echo.
</p>

<h4>Переключатели</h4>
<p>Пример 12.6. Использование переключателей</p>
<p>
8.00-12.00 input type="radio" name="time" value="1"><br>
12.00-16.00 input type="radio" name="time" value="2" checked="checked"><br>
16.00-20.00 input type="radio" name="time" value="3">
</p>

<h4>Скрытые поля</h4>
<p>
Иногда бывает удобно пользоваться скрытыми полями формы, чтобы получить возможность отслеживать состояние ее ввода.
Например, может потребоваться узнать, отправлена форма или нет. Эти сведения можно получить, добавив к PHP-коду фрагмент кода HTML:<br>
echo 'input type="hidden" name="submitted" value="yes">'
</p>
<p>
когда пользователь отправит форму еще раз, PHP-программа получит ее с полем submitted, имеющим значение yes.
Существование этого поля можно легко проверить с помощью следующего кода:<br>
if (isset($_POST['submitted']))<br>
{...
</p>

<h4>SELECT</h4>
<p>
Тег select позволяет создавать раскрывающийся список, предлагающий выбор одного или нескольких значений. Для его создания используется следующий синтаксис:<br>
select name="имя" size="размер" multiple="multiple">
</p>


<h4>Кнопка отправки</h4>
<p>
Чтобы согласовать текст на кнопке отправки с разновидностью отправляемой формы, его можно изменить по своему усмотрению, воспользовавшись атрибутом value:<br>
input type="submit" value="Поиск">
</p>
<p>
Можно также заменить стандартный текст на кнопке выбранным вами графическим изображением, используя следующий код HTML:<br>
input type="image" name="submit" src="image.gif">
</p>

<h4 style='color: red;'>Обезвреживание введенных данных</h4>
<p>
Таким образом, нужно не только считывать введенные пользователем данные с помощью следующего кода:<br>
$variable = $_POST['user_input'];
</p>
<p>
чтобы предотвратить внедрение escape-символов в строку, которая будет представлена MySQL, можно применить код<br>
$variable = $connection->real_escape_string($variable);
</p>
<p>
Чтобы избавиться от нежелательных слеш-символов, например вставленных с помощью уже устаревшей директивы magic_quotes_gpc, применяется следующий код:<br>
$variable = stripslashes($variable);
</p>
<p>
А для удаления из строки любого HTML-кода используется такой код PHP:<br>
$variable = htmlentities($variable);<br>
Например, этот код интерпретируемого HTML <b>hi</b> заменяется строкой &lt;b&gt;hi&lt;/b&gt;,
которая отображается как простой текст и не будет интерпретироваться как теги HTML.
</p>
<p>
И наконец, если нужно полностью очистить введенные данные от HTML, используется следующий код:<br>
$variable = strip_tags($variable);
</p>
<p>
А пока вы не решите, какое именно обезвреживание требуется для вашей программы, рассмотрите показанные в примере 12.9 две функции,
в которых собраны вместе все эти ограничения, обеспечивающие довольно высокий уровень безопасности.
</p>
<p>Пример 12.9. Функции sanitizeString и sanitizeMySQL</p>
<p>
function sanitizeString($var)<br>
{<br>
$var = stripslashes($var);<br>
$var = htmlentities($var);<br>
$var = strip_tags($var);<br>
return $var;<br>
}<br><br>
function sanitizeMySQL($connection, $var)<br>
{ // Использование расширения mysqli<br>
$var = $connection->real_escape_string($var);<br>
$var = sanitizeString($var);<br>
return $var;<br>
}
</p>
<p>
Добавьте этот код в последние строки своих программ, и тогда вы сможете вызвать его для обезвреживания всех вводимых пользователями данных:<br>
$var = sanitizeString($_POST['user_input']);<br><br>
или, если имеется открытое подключение к MySQL и объект подключения mysqli (который в данном случае называется $connection):<br>
$var = sanitizeMySQL($connection, $_POST['user_input']);
</p>
<p>
Если используется процедурная версия расширения mysqli, нужно будет изменить sanitizeMySQL
для вызова функции mysqli_real_escape_string, получив примерно такой код (в этом случае $connection будет не объектом, а описателем):<br>
$var = mysqli_real_escape_string($connection, $var);
</p>

<h4 style='color: blue;'>Пример программы</h4>
<p>Программа перевода значений между шкалами Фаренгейта и Цельсия</p>
<p>
$f = $c = '';<br>
if (isset($_POST['f'])) $f = sanitizeString($_POST['f']);<br>
if (isset($_POST['c'])) $c = sanitizeString($_POST['c']);<br>
if ($f != '')<br>
{<br>
$c = intval((5 / 9) * ($f - 32));<br>
$out = "$f °f равно $c °c";<br>
}<br>
elseif($c != '')<br>
{<br>
$f = intval((9 / 5) * $c + 32);<br>
$out = "$c °c равно $f °f";<br>
}<br>
else $out = "";<br>
echo <<<_END<br>
html><br>
head><br>
title>Программа перевода температуры /title><br>
/head><br>
body><br>
pre><br>
Введите температуру по Фаренгейту или по Цельсию<br>
и нажмите кнопку Перевести<br>
b>$out /b><br>
form method="post" action="convert.php"><br>
По Фаренгейту input type="text" name="f" size="7"><br>
По цельсию input type="text" name="c" size="7"><br>
input type="submit" value="Перевести"><br>
/form><br>
/pre><br>
/body><br>
/html><br>
_END;<br>
function sanitizeString($var)<br>
{<br>
$var = stripslashes($var);<br>
$var = htmlentities($var);<br>
$var = strip_tags($var);<br>
return $var;<br>
}

</p>

<?php // html_12_forms.php
$f = $c = '';
if (isset($_POST['f'])) $f = sanitizeString($_POST['f']);
if (isset($_POST['c'])) $c = sanitizeString($_POST['c']);
if ($f != '')
{
$c = intval((5 / 9) * ($f - 32));
$out = "$f °f равно $c °c";
}
elseif($c != '')
{
$f = intval((9 / 5) * $c + 32);
$out = "$c °c равно $f °f";
}
else $out = "";
echo <<<_END
<h2>Программа перевода температуры</h2>
<pre>
Введите температуру по Фаренгейту или по Цельсию
и нажмите кнопку Перевести
<b>$out</b>
<form method="post" action="html_12_forms.php">
По Фаренгейту <input type="text" name="f" size="7">
По цельсию <input type="text" name="c" size="7">
<input type="submit" value="Перевести">
</form>
</pre>
_END;
function sanitizeString($var)
{
$var = stripslashes($var);
$var = htmlentities($var);
$var = strip_tags($var);
return $var;
}
?>
<p>
Проанализируем эту программу.<br>
В первой строке инициализируются переменные $c $f на тот случай, если их значения не были отправлены программе.
</p>
<p>
В следующих двух строках извлекаются значения либо из поля f, либо из поля c.
Эти поля предназначены для ввода значений температуры по Фаренгейту или по Цельсию.<br>
Если пользователь введет оба значения, то значение по Цельсию будет проигнорировано, а переведено будет значение по Фаренгейту.<br>
В качестве меры безопасности в программе также используется новая функция sanitizeString из примера 12.9.
</p>
<p>
Итак, располагая либо отправленными значениями, либо пустыми строками в обеих переменных $f и $c,
следующая часть кода использует структуру if...elseif...else, которая сначала проверяет, имеет ли значение переменная $f.<br>
Если эта переменная не имеет значения, проверяется переменная $c.
Если переменная $c также не имеет значения, переменной $out присваивается пустая строка
</p>
<p>
Если обнаружится, что у переменной $f есть значение, переменной $c будет присвоено простое математическое выражение,
которое переводит значение переменной $f со значения по Фаренгейту в значение по Цельсию.<br>
Для этого используется формула<br> По_Цельсию = (5 / 9) × (По_Фаренгейту – 32).
Затем переменной $out присваивается строковое значение, в котором содержится сообщение о результатах перевода.
</p>
<p>
Если же окажется, что у переменной $c есть значение, выполнится обратная операция по переводу значения $c
из значения по Цельсию в значение по Фаренгейту с присвоением результата переменной $f.<br>
При этом используется следующая формула:<br> По_Фаренгейту = (9 / 5) × По_Цельсию + 32.
Как и в предыдущем разделе, переменной $out затем присваивается строковое значение, в котором содержится сообщение о результатах перевода.
</p>
<p>
Для превращения результатов перевода в целое число в обоих переводах вызывается PHP-функция intval.
В этом нет особой необходимости, но результат выглядит лучше.
</p>
<p>
Если перевода температуры не осуществлялось, переменная $out будет иметь значение NULL
и выводиться на экран ничего не будет, что, собственно, нам и нужно до тех пор, пока не будут отправлены данные формы.<br>
Но если перевод состоялся, переменная $out содержит результат, который отображается на экране.
</p>
<p>
Затем следует форма, настроенная на отправку данных файлу convert.php (то есть самой программе) с использованием метода POST.
Внутри формы содержатся два поля для ввода температуры как по Фаренгейту, так и по Цельсию.<br>
Затем отображается кнопка отправки данных, имеющая надпись Перевести, и форма закрывается.
</p>
<p>
После вывода HTML-кода, закрывающего документ, программа завершается функцией sanitizeString из примера 12.9.
</p>


<h4>Атрибут autocomplete</h4>
<p>
Атрибут autocomplete можно применить либо к элементу form>, либо к любому из типов элемента input>:<br>
color, date, email, password, range, search, tel, text или url.<br>
При включении атрибута autocomplete заново вызываются ранее введенные пользователем данные,
которые автоматически вводятся в поля в качестве предложений.<br> Это свойство также можно отключить путем переключения autocomplete на off.
</p>
<p>
form action='myform.php' method='post' autocomplete='on'><br>
input type='text' name='username'><br>
input type='password' name='password' autocomplete='off'><br>
/form>

<h4>Атрибут autofocus</h4>
<p>
Атрибут autofocus приводит к моментальной установке фокуса на элемент при загрузке страницы.
Может быть применен к любому элементу input>, textarea> или button>, например:<br>
input type='text' name='query' autofocus='autofocus'>
</p>

<h4>Атрибут placeholder</h4>
<p>
Атрибут placeholder позволяет помещать в пустое поле ввода полезную подсказку,
объясняющую пользователям, что именно им нужно ввести. Он применяется следующим образом:<br>
input type='text' name='name' size='50' placeholder='Имя и фамилия'>
</p>

<h4>Атрибут required</h4>
<p>
Атрибут required предназначен для обеспечения обязательного заполнения поля перед отправкой формы:<br>
input type='text' name='creditcard' required='required'>
</p>
<p>Если браузер обнаружит попытку отправки формы с незаполненным обязательным вводом, то пользователю будет выведено приглашение на заполнение поля.</p>

<h4>Атрибуты подмены</h4>
<p>
С помощью этих атрибутов можно подменить настройки формы на поэлементной основе.<br>
К примеру, используя атрибут formaction, можно указать, что при нажатии кнопки отправки данные формы будут отправлены по URL-адресу,
отличающемуся от того адреса, который указан в самой форме (исходный URL-адрес действия и тот адрес, которым он подменяется, показаны полужирным шрифтом):
</p>
<p>
form action='url1.php' method='post'><br>
input type='text' name='field'><br>
input type='submit' formaction='url2.php'><br>
/form>
</p>

<h4>Атрибуты width и height</h4>
<p>
Используя эти новые атрибуты, можно изменить размеры вводимого изображения:<br>
input type='image' src='picture.png' width='120' height='80'>
</p>

<h4>Тип ввода color</h4>
<p>
Тип ввода color вызывает на экран окно выбора цвета, позволяющее выбрать цвет простым щелчком кнопкой мыши. Он используется следующим образом:<br>
Выберите цвет input type='color' name='color'>
</p>
Выберите цвет <input type='color' name='color'>

<h4>Типы ввода number и range</h4>
<p>
Типы ввода number и range ограничивают ввод, который должен быть либо числом, либо числом в указанном диапазоне, например:<br>
input type='number' name='age'><br>
input type='range' name='num' min='0' max='100' value='50' step='1'>
</p>

<h4>Окно выбора даты и времени</h4>
<p>
При выборе типа ввода date, month, week, time, datetime или datetimelocal
в поддерживающих это свойство браузерах будет появляться окно выбора, в котором пользователь может сделать свой выбор,
как, например, в следующем коде, где вводится время:<br>
input type='time' name='time' value='12:34'>
</p>
<input type='date' name='time' value=''>
<input type='month' name='time' value=''>
<input type='week' name='time' value=''>
<input type='time' name='time' value='12:34'>
<input type='datetime' name='time' value='now'>

<p></p>
<?php

?>
<p>

</p>
<p></p>

<h4></h4>
<p>

</p>
<p></p>
<?php

?>
<p>

</p>
<p></p>

<h4></h4>
<p>

</p>
<p></p>
<?php

?>
<p>

</p>
<p></p>

<h4></h4>
<p>

</p>
<p></p>
<?php

?>
<p>

</p>
<p></p>

<h4></h4>
<p>

</p>
<p></p>
<?php

?>
<p>

</p>
<p></p>



		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
	</body>
</html>
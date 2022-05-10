<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/screen.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

<title>Массивы</title>
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
<h4>Массивы с числовой индексацией</h4>
<p>Пример 6.1. Добавление элементов в массив</p>
<p>
$paper[] = "Copier";<br>
$paper[] = "Inkjet";<br>
$paper[] = "Laser";<br>
$paper[] = "Photo";<br>
print_r($paper);
</p>
<?php
$paper[] = "Copier";
$paper[] = "Inkjet";
$paper[] = "Laser";
$paper[] = "Photo";
print_r($paper);
?>

<p>Пример 6.3. Добавление элементов в массив и извлечение их из массива</p>
<p>
$paper[] = "Copier";<br>
$paper[] = "Inkjet";<br>
$paper[] = "Laser";<br>
$paper[] = "Photo";<br>
for ($j = 0 ; $j < 4 ; ++$j)<br>
echo "$j: $paper[$j] br;
</p>
<?php
$paper[] = "Copier";
$paper[] = "Inkjet";
$paper[] = "Laser";
$paper[] = "Photo";
for ($j = 0 ; $j < 4 ; ++$j)
echo "$j: $paper[$j]<br>";
?>


<h4></h4>
<p>Пример 6.4. Добавление элементов к ассоциативному массиву и извлечение этих элементов</p>
<p>
$paper['copier'] = "Copier & Multipurpose";<br>
$paper['inkjet'] = "Inkjet Printer";<br>
$paper['laser'] = "Laser Printer";<br>
$paper['photo'] = "Photographic Paper";<br>
echo $paper['laser'];
</p>
<?php
$paper['copier'] = "Copier & Multipurpose";
$paper['inkjet'] = "Inkjet Printer";
$paper['laser'] = "Laser Printer";
$paper['photo'] = "Photographic Paper";
echo $paper['laser'];
?>


<h4>Присваивание с использованием ключевого слова array</h4>
<p>Пример 6.5. Добавление элементов к массиву с использованием ключевого слова array</p>
<p>
$p1 = array("Copier", "Inkjet", "Laser", "Photo");<br>
echo "Элемент массива p1: " . $p1[2] . "<br>";<br>
$p2 = array('copier' => "Copier & Multipurpose",<br>
'inkjet' => "Inkjet Printer",<br>
'laser' => "Laser Printer",<br>
'photo' => "Photographic Paper");<br>
echo "Элемент массива p2: " . $p2['inkjet']br;<br>
echo $p1['inkjet']; // Неопределенный индекс<br>
echo $p2['3']; // Неопределенное смещение<br>
</p>
<p>Применение оператора => похоже на использование простого оператора присваивания =,<br>
за исключением того, что значение присваивается индексу, а не переменной.</p>
<?php
$p1 = array("Copier", "Inkjet", "Laser", "Photo");
echo "Элемент массива p1: " . $p1[2] . "<br>";
$p2 = array('copier' => "Copier & Multipurpose",
'inkjet' => "Inkjet Printer",
'laser' => "Laser Printer",
'photo' => "Photographic Paper");
echo "Элемент массива p2: " . $p2['inkjet'] . "<br>";
// Применение оператора => похоже на использование простого оператора присваивания =, за исключением того, что значение присваивается индексу, а не переменной.
echo $p1['inkjet']; // Неопределенный индекс
echo $p2['3']; // Неопределенное смещение
?>


<h4>Цикл foreach...as</h4>
<p>Пример 6.6. Последовательный перебор элементов числового массива с использованием цикла foreach...as</p>
<p>
$paper = array("Copier", "Inkjet", "Laser", "Photo");<br>
$j = 0;<br>
foreach ($paper as $item)<br>
{<br>
echo "№ $j: $item br";<br>
++$j;<br>
}
</p>
<?php
$paper = array("Copier", "Inkjet", "Laser", "Photo");
$j = 0;
foreach ($paper as $item)
{
echo "№ $j: $item<br>";
++$j;
}
?>

<p>Пример 6.7. Последовательный перебор элементов ассоциативного массива с использованием цикла foreach...as</p>
<p>
$paper = array('copier' => "Copier & Multipurpose",<br>
'inkjet' => "Inkjet Printer",<br>
'laser' => "Laser Printer",<br>
'photo' => "Photographic Paper");<br>
foreach ($paper as $item => $description)<br>
echo "$item: $description br";<br>
</p>
<?php
$paper = array('copier' => "Copier & Multipurpose",
'inkjet' => "Inkjet Printer",
'laser' => "Laser Printer",
'photo' => "Photographic Paper");
foreach ($paper as $item => $description)
echo "$item: $description<br>";
?>

<p>В качестве альтернативы синтаксису foreach...as можно воспользоваться функцией list в сочетании с функцией each (пример 6.8).</p>
<p>Пример 6.8. Последовательный перебор элементов ассоциативного массива с помощью функций each и list</p>
<p>
$paper = array('copier' => "Copier & Multipurpose",<br>
'inkjet' => "Inkjet Printer",<br>
'laser' => "Laser Printer",<br>
'photo' => "Photographic Paper");<br>
while (list($item, $description) = each($paper))<br>
echo "$item: $description br";<br>
</p>
<?php
$paper = array('copier' => "Copier & Multipurpose",
'inkjet' => "Inkjet Printer",
'laser' => "Laser Printer",
'photo' => "Photographic Paper");
while (list($item, $description) = each($paper))
echo "$item: $description<br>";
?>

<h4>Многомерные массивы</h4>
<p>Пример 6.11. Создание многомерного числового массива</p>
<p>
$chessboard = array(<br>
array('r', 'n', 'b', 'q', 'k', 'b', 'n', 'r'),<br>
array('p', 'p', 'p', 'p', 'p', 'p', 'p', 'p'),<br>
array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),<br>
array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),<br>
array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),<br>
array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),<br>
array('P', 'P', 'P', 'P', 'P', 'P', 'P', 'P'),<br>
array('R', 'N', 'B', 'Q', 'K', 'B', 'N', 'R')<br>
);<br>
echo "<pre>";<br>
foreach ($chessboard as $row)<br>
{<br>
foreach ($row as $piece)<br>
echo "$piece ";<br>
echo "br";<br>
}<br>
echo "/pre";
</p>
<?php
$chessboard = array(
array('r', 'n', 'b', 'q', 'k', 'b', 'n', 'r'),
array('p', 'p', 'p', 'p', 'p', 'p', 'p', 'p'),
array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
array('P', 'P', 'P', 'P', 'P', 'P', 'P', 'P'),
array('R', 'N', 'B', 'Q', 'K', 'B', 'N', 'R')
);
echo "<pre>";
foreach ($chessboard as $row)
{
foreach ($row as $piece)
echo "$piece ";
echo "<br>";
}
echo "</pre>";
?>

<h4>Использование функций для работы с массивами</h4>
<h4>is_array</h4>
<p>
$fred = array('R', 'N', 'B', 'Q', 'K', 'B', 'N', 'R');<br>
echo (is_array($fred)) ? "Это массив" : "Это не массив";
</p>
<?php
$fred = array('R', 'N', 'B', 'Q', 'K', 'B', 'N', 'R');
echo (is_array($fred)) ? "Это массив" : "Это не массив";
?>


<h4>count</h4>
<p>
Для подсчета всех элементов на верхнем уровне массива используется следующая команда:<br>
echo count($fred);<br>
Если нужно узнать, сколько всего элементов содержится в многомерном массиве, можно воспользоваться следующей инструкцией:<br>
echo count($fred, 1);
</p>
<?php
echo count($fred);
?>

<h4>sort</h4>
<p>Сортировка является настолько распространенной операцией, что PHP предоставляет для нее встроенную функцию.
В наипростейшей форме ее можно использовать следующим образом:<br>
sort($fred);</p>
<p>
предписывают проведение либо числовой, либо строковой сортировки:<br>
sort($fred, SORT_NUMERIC);<br>
sort($fred, SORT_STRING);<br>
Массив можно также отсортировать в обратном порядке, воспользовавшись функцией rsort:<br>
rsort($fred, SORT_NUMERIC);<br>
rsort($fred, SORT_STRING);
</p>

<h4>shuffle</h4>
<p>Иногда, например при создании игры или при игре в карты, требуется, чтобы элементы массива располагались в случайном порядке:<br>
shuffle($cards);</p>

<h4>explode</h4>
<p>Это очень полезная функция, позволяющая взять строку, содержащую несколько элементов, отделенных друг от друга одиночным символом
(или строкой символов), а затем поместить каждый из этих элементов в массив.</p>
<p>Пример 6.12. Извлечение слов из строки в массив с использованием пробелов</p>
<p>
$temp = explode(' ', "Это предложение из пяти слов");<br>
print_r($temp);
</p>
<?php
$temp = explode(' ', "Это предложение из пяти слов");
print_r($temp);
?>



		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
		
	</body>
</html>
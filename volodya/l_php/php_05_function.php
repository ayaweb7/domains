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
<h4>Функции PHP</h4>
<p>
Например, показанная ниже функция phpinfo отображает массу информации о текущей установке PHP и не требует никаких аргументов:
</p>
<?php //phpinfo(); ?>

<p>В примере 5.1 показано несколько встроенных функций, использующих один аргумент и более.</p>
<p>Пример 5.1. Три функции для работы со строками</p>
<p>echo strrev(" .dlrow olleH"); // Реверсирование строки<br>
echo str_repeat("Hip ", 2); // Повторение строки<br>
echo strtoupper("hooray!"); // Преобразование символов строки в верхний</p>
<?php
echo strrev(" .dlrow olleH"); // Реверсирование строки
echo str_repeat("Hip ", 2); // Повторение строки
echo strtoupper("hooray!"); // Преобразование символов строки в верхний
// регистр
?>

<h4>Возвращение значения</h4>
<p>
Рассмотрим простую функцию, преобразующую буквы чьих-нибудь полных имен в нижний регистр, а затем переводящую в верхний регистр первую букву каждого имени.<br>
В примере 5.1 нам уже встречалась встроенная PHP-функция strtoupper.<br>
Для нашей текущей функции будет использована ее противоположность — функция strtolower:
</p>
<p>
$lowered = strtolower("HJkmk NJL NJknjN JK jnJKK JJK");<br>
echo $lowered;
</p>
<p>
$ucfixed = ucfirst("HJkmk NJL NJknjN JK jnJKK JJK");<br>
echo $ucfixed;
</p>
<p>
ucfirst(strtolower("HJkmk NJL NJknjN JK jnJKK JJK"));
</p>
<?php
$lowered = strtolower("HJkmk NJL NJknjN JK jnJKK JJK");
echo $lowered . "<br>";
// 

$ucfixed = ucfirst("HJkmk NJL NJknjN JK jnJKK JJK") . "<br>";
echo $ucfixed;

echo ucfirst(strtolower("HJkmk NJL NJknjN JK jnJKK JJK"));
?>
<p>
Теперь определим функцию (показанную в примере 5.2), которая берет три имени и переводит их буквы в нижний регистр,<br> 
после чего превращает первую букву в прописную.
</p>
<p>Пример 5.2. Приведение в порядок полного имени</p>
<p>
echo fix_names("WILLIAM", "henry", "gatES");<br>
function fix_names($n1, $n2, $n3)<br>
{<br>
$n1 = ucfirst(strtolower($n1));<br>
$n2 = ucfirst(strtolower($n2));<br>
$n3 = ucfirst(strtolower($n3));<br>
return $n1 . " " . $n2 . " " . $n3;<br>
}
</p>
<?php
echo fix_names("WILLIAM", "henry", "gatES");
function fix_names($n1, $n2, $n3)
{
$n1 = ucfirst(strtolower($n1));
$n2 = ucfirst(strtolower($n2));
$n3 = ucfirst(strtolower($n3));
return $n1 . " " . $n2 . " " . $n3;
}
?>

<h4>Возвращение массива</h4>
<p>Пример 5.3. Возвращение нескольких значений в массиве</p>
<p>
$names = fix_names("WILLIAM", "henry", "gatES");<br>
echo $names[0] . " " . $names[1] . " " . $names[2];<br>
function fix_names($n1, $n2, $n3)<br>
{<br>
$n1 = ucfirst(strtolower($n1));<br>
$n2 = ucfirst(strtolower($n2));<br>
$n3 = ucfirst(strtolower($n3));<br>
return array($n1, $n2, $n3);<br>
}
</p>
<?php
$names = fix_names("WILLIAM", "henry", "gatES");
echo $names[0] . " " . $names[1] . " " . $names[2];
/*
function fix_names($n1, $n2, $n3)
{
$n1 = ucfirst(strtolower($n1));
$n2 = ucfirst(strtolower($n2));
$n3 = ucfirst(strtolower($n3));
return array($n1, $n2, $n3);
}
*/
?>

<p>Пример 5.3. Возвращение нескольких значений в массиве</p>
<p>
$names = fix_names("WILLIAM", "henry", "gatES");<br>
echo $names[0] . " " . $names[1] . " " . $names[2];<br>
function fix_names($n1, $n2, $n3)<br>
{<br>
$n1 = ucfirst(strtolower($n1));<br>
$n2 = ucfirst(strtolower($n2));<br>
$n3 = ucfirst(strtolower($n3));<br>
return array($n1, $n2, $n3);<br>
}
</p>
<?php
/*
function fix_names($n1, $n2, $n3)
{
$n1 = ucfirst(strtolower($n1));
$n2 = ucfirst(strtolower($n2));
$n3 = ucfirst(strtolower($n3));
return array($n1, $n2, $n3);
}
*/
$names = fix_names("WILLIAM", "henry", "gatES");
echo $names[0] . " " . $names[1] . " " . $names[2];
?>

<p>Пример 5.4. Возвращение значений из функции по ссылке</p>
<p>
$a1 = "WILLIAM";<br>
$a2 = "henry";<br>
$a3 = "gatES";<br>
echo $a1 . " " . $a2 . " " . $a3 . "<br>";
fix_names($a1, $a2, $a3);<br>
echo $a1 . " " . $a2 . " " . $a3;<br>
function fix_names(&$n1, &$n2, &$n3)<br>
{<br>
$n1 = ucfirst(strtolower($n1));<br>
$n2 = ucfirst(strtolower($n2));<br>
$n3 = ucfirst(strtolower($n3));<br>
}
</p>

<?php
$a1 = "WILLIAM";
$a2 = "henry";
$a3 = "gatES";
echo $a1 . " " . $a2 . " " . $a3 . "<br>";
fix_names($a1, $a2, $a3);
echo $a1 . " " . $a2 . " " . $a3;
/*
function fix_names(&$n1, &$n2, &$n3)
{
$n1 = ucfirst(strtolower($n1));
$n2 = ucfirst(strtolower($n2));
$n3 = ucfirst(strtolower($n3));
}
*/
?>
<p></p>

<h4>Включение и запрос файлов</h4>
<h4>Инструкция include</h4>
<h4>Инструкция include_once</h4>
<h4>Инструкции require и require_once</h4>
<h4>Совместимость версий PHP</h4>
<p>Если нужно проверить доступность в вашем коде какой-нибудь конкретной функции, можно воспользоваться функцией function_exists,<br>
которая проверяет все предопределенные и созданные пользователем функции.</p>
<p>Пример 5.9. Проверка существования функции</p>
<p>
if (function_exists("Array"))<br>
{<br>
echo "Функция существует";<br>
}<br>
else<br>
{<br>
echo "Функция не существует, желательно создать ее самостоятельно";<br>
}
</p>
<?php
if (function_exists("Array"))
{
echo "Функция существует";
}
else
{
echo "Функция не существует, желательно создать ее самостоятельно";
}
?>


<h4>Объявление класса</h4>
<p>Пример 5.10. Объявление класса и проверка объекта</p>
<p>
$object = new User;<br>
print_r($object);<br>
class User<br>
{<br>
public $name, $password;<br>
function save_user()<br>
{<br>
echo "Сюда помещается код, сохраняющий данные пользователя";<br>
}<br>
}
</p>
<?php
$object = new User;
print_r($object); // требует от PHP отобразить информацию о переменной в удобной для восприятия человеком форме, о чем говорит элемент _r в ее имени (означающий readable — «читаемый»)
class User // определение класса User, имеющего два свойства — $name и $password (которые обозначены ключевым словом public)
{
public $name, $password;
function save_user()
{
echo "Сюда помещается код, сохраняющий данные пользователя";
}
}
?>


<h4>Создание объекта</h4>
<p>Для создания объекта определенного класса используется ключевое слово new, применяемое в выражении: объект = new Класс.<br>
Вот два способа создания объектов:</p>
<p>
$object = new User;<br>
$temp = new User('name', 'password');
</p>
<p>В первой строке мы просто назначаем объект классу User. А во второй строке передаем вызову параметры.</p>

<h4>Доступ к объектам</h4>
<p>Пример 5.11. Создание объекта и взаимодействие с ним</p>
<p>
$object = new User;<br>
print_r($object); echo br; <br>
$object->name = "Joe";<br>
$object->password = "mypass";<br>
print_r($object); echo br; <br>
$object->save_user();<br>
class User<br>
{<br>
public $name, $password;<br>
function save_user()<br>
{<br>
echo "Сюда помещается код, сохраняющий данные пользователя";<br>
}<br>
}
</p>
<?php
/*
$object = new User;
print_r($object); echo "<br>";
$object->name = "Joe";
$object->password = "mypass";
print_r($object); echo "<br>";
$object->save_user();
class User
{
public $name, $password;
function save_user()
{
echo "Сюда помещается код, сохраняющий данные пользователя";
}
}
*/
?>

<h4>Клонирование объектов</h4>
<p>Пример 5.13. Клонирование объекта</p>
<p>
$object1 = new User();<br>
$object1->name = "Alice";<br>
$object2 = clone $object1;<br>
$object2->name = "Amy";<br>
echo "object1 name = " . $object1->name . br;<br>
echo "object2 name = " . $object2->name;<br>
class User<br>
{<br>
public $name;<br>
}
</p>
<?php
$object1 = new User();
$object1->name = "Alice";
$object2 = clone $object1;
$object2->name = "Amy";
echo "object1 name = " . $object1->name . "<br>";
echo "object2 name = " . $object2->name;
//class User
//{
//public $name;
//}
?>



<h4></h4>
<p></p>
<p></p>


<h4></h4>
<p></p>
<p></p>


<h4></h4>
<p></p>
<p></p>


<h4></h4>
<p></p>
<p></p>


<h4></h4>
<p></p>
<p></p>


<h4></h4>
<p></p>
<p></p>


<h4></h4>
<p></p>
<p></p>


<h4></h4>
<p></p>
<p></p>


<h4></h4>
<p></p>
<p></p>




		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
	</body>
</html>
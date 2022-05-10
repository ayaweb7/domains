<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/screen.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/dostup.js"></script>
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

<title>Функции, объекты, массивы</title>
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

<h1 style='color: blue;'></h1>

<!-- !!!!!!!!!!!!!!!!!       шаблоны, заготовки для тэгов, комментарии !!!!!!!!!!!!!!! -->

<h4>Функции JavaScript</h4>
<p>
В JavaScript наряду с доступом к десяткам встроенных функций (или методов), среди которых и метод write, который, как мы уже видели,
использовался в вызовах document.write, можно создавать и собственные функции.<br>
Как только появляется какой-нибудь непростой фрагмент кода с перспективами на многократное использование,
он становится кандидатом на оформление в виде функции.
</p>

<h4>Определение функции</h4>
<p>
В общем виде синтаксис функции выглядит следующим образом:<br>
function имя_функции ([параметр [, ...]])<br>
{<br>
инструкции<br>
}
</p>
<p>
Из первой строки синтаксиса следует, что:<br>
определение начинается со слова function;<br>
следующее за этим словом имя должно начинаться с буквы или символа подчеркивания, за которым следует любое количество букв, цифр,
символов доллара или подчеркивания;<br>
необходимо использовать скобки;<br>
дополнительно могут применяться один или несколько параметров, разделенных запятыми
(о чем свидетельствуют квадратные скобки, не являющиеся частью синтаксиса функции).
</p>
<p>
В JavaScript для имен функций действует общепринятое соглашение:<br>
первая буква каждого слова в имени, за исключением первой буквы всего имени, должна быть прописной.<br>
Поэтому в приведенных примерах имен предпочтение следует отдать имени getInput, имеющему формат, используемый большинством программистов.
Это соглашение часто называют bumpyCaps (неровностями из прописных букв) или camelCase (как горбы у верблюда).
</p>
<p>
Инструкции, которые будут выполняться после вызова функции, начинаются с открывающей фигурной скобки,
а составляющая ей пару закрывающая фигурная скобка должна завершать перечень этих инструкций.<br>
Среди инструкций обязаны присутствовать одна или несколько инструкций return, которые заставляют функцию прекратить выполнение
и вернуть управление вызвавшему ее коду.<br>
Если к инструкции return прилагается какое-нибудь значение, то вызывающий код может его извлечь.
</p>

<h4>Массив аргументов</h4>
<p>
Составной частью каждой функции является массив аргументов — arguments.
Благодаря ему можно определить количество переменных, переданных функции, и понять, что они собой представляют.
</p>
<p>Пример 16.1. Определение функции</p>
<p>
displayItems("Собака", "Кошка", "Пони", "Хомяк", "Черепаха")<br>
function displayItems(v1, v2, v3, v4, v5)<br>
{<br>
document.write(v1 + "br>")<br>
document.write(v2 + "br>")<br>
document.write(v3 + "br>")<br>
document.write(v4 + "br>")<br>
document.write(v5 + "br>")<br>
}
</p>
<p style='color: blue;'>Start code</p>
<script>
displayItems("Собака", "Кошка", "Пони", "Хомяк", "Черепаха")
function displayItems(v1, v2, v3, v4, v5)
{
document.write(v1 + "<br>")
document.write(v2 + "<br>")
document.write(v3 + "<br>")
document.write(v4 + "<br>")
document.write(v5 + "<br>")
}
</script>

<p>Пример 16.2. Модификация функции для использования массива аргументов</p>
<p>
displayItems("Собака", "Кошка", "Пони", "Хомяк", "Черепаха")<br>
function displayItems()<br>
{<br>
for (j = 0 ; j < displayItems.arguments.length ; ++j)<br>
document.write(displayItems.arguments[j] + "br>")<br>
}
</p>

<p style='color: blue;'>Start code</p>
<script>
displayItems("Собака", "Кошка", "Пони", "Хомяк", "Черепаха")
function displayItems()
{
for (j = 0 ; j < displayItems.arguments.length ; ++j)
document.write(displayItems.arguments[j] + "<br>")
}
</script>

<h4>Возвращение значения</h4>
<p>
Функции используются не только для отображения информации.
Чаще всего они применяются для выполнения вычислений или обработки данных с возвращением полученного результата.<br>
Функция fixNames, показанная в примере 16.3, задействует массив arguments (рассмотренный в предыдущем пункте)
для приема переданной ей последовательности строк и возвращения всех этих строк в виде одной строки.<br>
Слово fix (исправление) в ее имени означает, что она переводит каждый символ в аргументах в нижний регистр,
делая исключение для первой буквы каждого аргумента, которую она превращает в прописную.
</p>
<p>Пример 16.3. Приведение в порядок полного названия</p>
<p>
document.write(fixNames("the", "DALLAS", "CowBoys"))<br><br>
function fixNames()<br>
{<br>
var s = ""<br>
for (j = 0 ; j < fixNames.arguments.length ; ++j)<br>
s += fixNames.arguments[j].charAt(0).toUpperCase() +<br>
fixNames.arguments[j].substr(1).toLowerCase() + " "<br>
return s.substr(0, s.length-1)<br>
}
</p>
<p style='color: blue;'>Start code</p>
<script>
document.write(fixNames("the", "DALLAS", "CowBoys"))
function fixNames()
{
var s = ""
for (j = 0 ; j < fixNames.arguments.length ; ++j)
s += fixNames.arguments[j].charAt(0).toUpperCase() +
fixNames.arguments[j].substr(1).toLowerCase() + " "
return s.substr(0, s.length-1)
}
</script>
<p>
Проанализируем работу этой функции.<br>
Сначала она инициализирует временную (и локальную) переменную s, присваивая ей значение пустой строки.
Затем с помощью цикла for осуществляется последовательный перебор каждого переданного параметра с выделением его первой буквы
с помощью метода charAt и переводом ее в верхний регистр с помощью метода toUpperCase.<br>
Все методы, показанные в этом примере, встроены в JavaScript и доступны по умолчанию.
</p>
<p>
После этого для извлечения оставшейся части каждой строки используется метод substr,
а для перевода букв этой части строки в нижний регистр — метод toLowerCase.<br>
Если здесь применить полную версию вызова метода substr, то в ней вторым аргументом нужно указать,
из какого количества символов будет состоять извлекаемая подстрока:<br>
substr(1, (arguments[j].length) - 1 )
</p>
<p>
Иными словами, в этом вызове метода substr говорится следующее:<br>
«Начни с символа, который находится в позиции 1 (это второй символ),
и верни оставшуюся часть строки (равную длине строки — length за вычетом одного символа)».<br>
Но что особенно приятно, метод substr заранее предполагает, что если второй аргумент опущен, то вам нужна вся оставшаяся часть строки.
</p>
<p>
После того как весь аргумент будет переделан для получения нужного результата,
к нему добавляется пробел и результат присоединяется к значению временной переменной s.<br>
На завершающей стадии к содержимому переменной s опять применяется метод substr.<br>
Поскольку последний пробел нам не нужен, мы используем метод substr, чтобы вернуть всю строку, за исключением ее последнего символа.
</p>
<p>
Этот пример особенно интересен тем, что в нем показано использование в одном выражении сразу нескольких свойств и методов, например:<br>
fixNames.arguments[j].substr(1).toLowerCase()
</p>
<p>
Чтобы понять суть этой инструкции, ее нужно мысленно разделить на части, используя в качестве разделителей точки.
JavaScript вычисляет эти элементы инструкции слева направо.<br>
1. Берется имя функции: fixNames.<br>
2. Из массива аргументов этой функции извлекается элемент j.<br>
3. К извлеченному элементу применяется метод substr с параметром 1.
Благодаря этому следующей части выражения будет передан весь извлеченный элемент, за исключением первого символа.<br>
4. К той строке, которая только что была передана, применяется метод toLowerCase.
</p>
<p>
И последнее напоминание: созданная внутри функции переменная s имеет локальную область видимости и не может быть доступна за ее пределами.<br>
Возвращая s с помощью инструкции return, мы делаем ее значение доступным вызывавшему функцию коду,
который может его сохранить или использовать любым другим способом.
</p>

<h4>Возвращение массива</h4>
<p>
В примере 16.3 функция возвращает только один параметр.
А что делать, если нужно вернуть сразу несколько параметров? Решить задачу поможет возвращение массива, показанное в примере 16.4.
</p>
<p>Пример 16.4. Возвращение массива значений</p>
<p>
words = fixNames("the", "DALLAS", "CowBoys")<br>
for (j = 0 ; j < words.length ; ++j)<br>
document.write(words[j] + "br>")<br>
document.write(words[0] + " " + words[2])<br><br>
function fixNames()<br>
{<br>
var s = new Array()<br>
for (j = 0 ; j < fixNames.arguments.length ; ++j)<br>
s[j] = fixNames.arguments[j].charAt(0).toUpperCase() +<br>
fixNames.arguments[j].substr(1).toLowerCase()<br>
return s<br>
}
</p>

<p style='color: blue;'>Start code</p>
<script>
words = fixNames("the", "DALLAS", "CowBoys")
for (j = 0 ; j < words.length ; ++j)
document.write(words[j] + "<br>")
document.write(words[0] + " " + words[2])
function fixNames()
{
var s = new Array()
for (j = 0 ; j < fixNames.arguments.length ; ++j)
s[j] = fixNames.arguments[j].charAt(0).toUpperCase() +
fixNames.arguments[j].substr(1).toLowerCase()
return s
}
</script>
<p>
Здесь переменная words автоматически определяется в виде массива и заполняется результатами, возвращенными вызовом функции fixNames.<br>
Затем цикл for осуществляет последовательный перебор элементов массива, отображая каждый элемент.
</p>
<p>
Что касается функции fixNames, то она практически идентична использованной в примере 16.3,
за исключением того, что переменная s теперь является массивом, возвращаемым с помощью инструкции return.
</p>
<p>
Эта функция позволяет извлекать отдельные параметры из возвращенных ею элементов, например, как в следующем коде (который выводит строку The Cowboys):<br>
words = fixNames("the", "DALLAS", "CowBoys")<br>
document.write(words[0] + " " + words[2])
</p>

<h4>Объекты JavaScript</h4>
<p>
По сравнению с переменными, которые в каждый конкретный момент могут содержать только одно значение,
объекты JavaScript — это значительный шаг вперед, поскольку в них могут содержаться несколько значений и даже функций.
Объект группирует вместе данные и функции для работы с ними.
</p>

<h4>Объявление класса</h4>
<p>
Для создания класса нужно просто создать функцию с именем этого класса.<br>
Эта функция может воспринимать аргументы (позже будет показано, как она вызывается) и создавать свойства и методы для объектов класса.
Такая функция называется конструктором.
</p>
<p>
В примере 16.5 показан конструктор для класса User, имеющий три свойства: имя — forename, пользовательское имя — username и пароль — password.<br>
В классе также определяется метод демонстрации сведений о пользователе — showUser.<br>
Пример 16.5. Объявление класса User и его метода
</p>
<p>
function User(forename, username, password)<br>
{<br>
this.forename = forename<br>
this.username = username<br>
this.password = password<br><br>
this.showUser = function()<br>
{<br>
document.write("Имя: " + this.forename + "br>")<br>
document.write("Пользовательское имя: " + this.username + "br>")<br>
document.write("Пароль: " + this.password + "br>")<br>
}<br>
}
</p>
<p>
От ранее рассмотренных эту функцию отличают две особенности.<br>
Она ссылается на объект по имени this. Когда программа благодаря запуску этой функции создает экземпляр класса User,
объект this является ссылкой на создаваемый экземпляр.<br>
Одна и та же функция может быть многократно вызвана с разными аргументами, всякий раз создавая новый экземпляр класса User
с разными значениями для свойств forename и т. д.
</p>
<p>
Внутри этой функции создается новая функция по имени showUser.
Здесь показан новый, усложненный синтаксис. Его задача — привязать showUser к классу User. Таким образом, showUser становится методом класса User.
</p>
<p>
В примере 16.5 соблюдается рекомендуемый способ создания конструктора класса, который заключается в том, что методы включаются в функции конструктора.<br>
Но в примере 16.6 показано, что можно также ссылаться на те функции, которые определены за пределами конструктора.<br>
Пример 16.6. Раздельное объявление класса и метода
</p>
<p>
function User(forename, username, password)<br>
{<br>
this.forename = forename<br>
this.username = username<br>
this.password = password<br>
this.showUser = showUser<br>
}<br><br>
function showUser()<br>
{<br>
document.write("Имя: " + this.forename + "br>")<br>
document.write("Пользовательское имя: " + this.username + "br>")<br>
document.write("Пароль: " + this.password + "br>")<br>
}
</p>
<p>
Эта форма объявления класса показана с расчетом на то, что вам наверняка придется сталкиваться с использованием кода, созданного другими программистами.
</p>

<h4>Создание объекта</h4>
<p>
Для создания экземпляра класса User можно воспользоваться следующей инструкцией:<br>
details = new User("Wolfgang", "w.a.mozart", "composer")<br><br>
Или же можно создать пустой объект:<br>
details = new User()<br>
а затем наполнить его содержимым:<br>
details.forename = "Wolfgang"<br>
details.username = "w.a.mozart"<br>
details.password = "composer"<br>
</p>
<p>
К объекту также можно добавлять новые свойства:<br>
details.greeting = "Привет"<br><br>
Проверить работу только что добавленного свойства можно с помощью следующей инструкции:<br>
document.write(details.greeting)
</p>

<h4>Доступ к объектам</h4>
<p>
Для доступа к объекту можно сослаться на его свойства, как показано в следующих не связанных друг с другом примерах инструкций:<br>
name = details.forename<br>
if (details.username == "Admin") loginAsAdmin()
</p>
<p>
А для доступа к методу showUser, принадлежащему объекту класса User, нужно воспользоваться следующим синтаксисом,
в котором применяется уже созданный и заполненный данными объект details:<br>
details.showUser()<br>
В соответствии с ранее предоставленными объекту данными этот код отобразит следующую информацию:<br>
Имя: Wolfgang<br>
Пользовательское имя: w.a.mozart<br>
Пароль: composer
</p>

<h4>Ключевое слово prototype</h4>
<p>
вместо использования в конструкторе класса строки кода:<br>
this.showUser = function()<br>
можно воспользоваться следующей строкой:<br>
User.prototype.showUser = function()
</p>
<p>Пример 16.7. Объявление класса с использованием для метода ключевого слова prototype</p>
<p>
function User(forename, username, password)<br>
{<br>
this.forename = forename<br>
this.username = username<br>
this.password = password<br><br>
User.prototype.showUser = function()<br>
{<br>
document.write("Имя: " + this.forename + "br>")<br>
document.write("Пользовательское имя: " + this.username + "br>")<br>
document.write("Пароль: " + this.password + "br>")<br>
}<br>
}
</p>

<p style='color: blue;'>Start code</p>
<script>
function User(forename, username, password)
{
this.forename = forename
this.username = username
this.password = password

User.prototype.showUser = function()
{
document.write("Имя: " + this.forename + "<br>")
document.write("Пользовательское имя: " + this.username + "<br>")
document.write("Пароль: " + this.password + "<br>")
}
}
</script>
<p>
Этот код работает благодаря тому, что у всех функций имеется свойство по имени prototype, разработанное для хранения свойств и методов,
не тиражируемых в каждом объекте, создаваемом на основе класса. Вместо этого они передаются объектам данного класса по ссылке.<br>
Это означает, что свойства или методы prototype могут быть добавлены в любое время, и они будут унаследованы всеми объектами
(даже теми, которые уже были созданы), что можно проиллюстрировать следующими инструкциями:<br>
User.prototype.greeting = "Привет"<br>
document.write(details.greeting)
</p>
<p>
Первая инструкция добавляет к классу User прототипное свойство prototype.greeting, имеющее значение Привет.
Во второй строке уже созданный объект details вполне корректно отображает это новое свойство.
</p>
<p>
Можно также добавлять к классу методы или вносить в них изменения, как показано в следующих инструкциях:<br>
User.prototype.showUser = function()<br>
{<br>
document.write("Имя " + this.forename +<br>
" Пользователь " + this.username +<br>
" Пароль " + this.password)<br>
}<br>
details.showUser()
</p>
<p>
Эти строки можно поместить в свой сценарий, в инструкцию условия (например, в if), чтобы они запускались только в том случае,
когда действия пользователя наталкивают на принятие решения о применении другого метода showUser.<br>
После запуска этих строк кода даже для уже созданного объекта details при всех последующих вызовах метода details.showUser будет запускаться новая версия,
а старое определение showUser будет стерто.
</p>

<h4>Расширение объектов JavaScript</h4>
<p>
Предположим, что нужно добавить возможность замены всех пробелов в строке неразрываемыми пробелами, чтобы избежать переноса ее части на новую строку.<br>
Это можно сделать добавлением к имеющемуся в JavaScript определению исходного объекта String прототипного метода:<br>
String.prototype.nbsp = function()<br>
{<br>
return this.replace(/ /g, '&nbsp;')<br>
}
</p>
<p>
В коде этого метода для поиска всех одиночных пробелов и замены их строкой &nbsp; используются метод replace и регулярное выражение (см. главу 17).<br>
Если после запуска этого кода будет введена следующая команда:<br>
document.write("Шустрая бурая лиса".nbsp())<br>
то в результате ее работы будет выведена следующая строка:<br> Шустрая&nbsp;бурая&nbsp;лиса.
</p>
<p>
Посмотрите также на метод, приведенный далее.<br>
Его можно добавить для удаления всех пробелов, с которых начинается и которыми заканчивается строка (в нем опять используется регулярное выражение):<br>
String.prototype.trim = function()<br>
{<br>
return this.replace(/^\s+|\s+$/g, '')<br>
}
</p>
<p>
Если выдать следующую инструкцию, то на выходе будет получена строка Пожалуйста, избавьте меня от лишних пробелов
(то есть из нее будут удалены все начальные и замыкающие пробелы):<br>
document.write("   Пожалуйста, избавьте меня от лишних пробелов   ".trim())
</p>
<p>
Если разбить выражение на составные части, то два символа / помечают начало и конец выражения, а завершающий символ g задает глобальный поиск.<br>
Внутри выражения его часть ^\s+ задает поиск одного или нескольких пробельных символов применительно к началу строки, в которой ведется поиск,
а его часть \s+$ задает поиск одного или нескольких пробельных символов применительно к концу строки, в которой ведется поиск.<br>
Расположенный в середине символ | служит разделителем альтернативных вариантов регулярного выражения.
</p>

<h4>Массивы в JavaScript</h4>
<p>
Работа с массивами в JavaScript очень напоминает работу с ними в PHP, хотя синтаксис имеет несколько иной вид.
</p>

<h4>Числовые массивы</h4>
<p>
Чтобы создать новый массив, нужно воспользоваться следующим синтаксисом:<br>
arrayname = new Array()<br><br>
или же его более краткой формой:<br>
arrayname = []
</p>

<h4>Присваивание значений элементам массива</h4>
<p>
В PHP можно было добавить к массиву новый элемент простым присваиванием ему значения, без указания смещения элемента относительно начала массива:<br>
$arrayname[] = "Элемент 1";<br>
$arrayname[] = "Элемент 2";<br><br>
В JavaScript для этих же целей используется метод push:<br>
arrayname.push("Элемент 1")<br>
arrayname.push("Элемент 2")
</p>
<p>
Он позволяет добавлять к массиву элементы, не отслеживая их количество.<br>
Когда потребуется узнать, сколько элементов содержится в массиве, можно будет воспользоваться свойством length:<br>
document.write(arrayname.length)
</p>
<p>
Если нужно будет проконтролировать размещение элементов, расставляя их по конкретным местам, можно воспользоваться другим синтаксисом:<br>
arrayname[0] = "Элемент 1"<br>
arrayname[1] = "Элемент 2"
</p>
<p>Пример 16.8. Создание, построение и вывод массива на экран</p>
<p>
numbers = []<br>
numbers.push("Один")<br>
numbers.push("Два")<br>
numbers.push("Три")<br>
for (j = 0 ; j < numbers.length ; ++j)<br>
document.write("Элемент " + j + " = " + numbers[j] + "br>")
</p>

<p style='color: blue;'>Start code</p>
<script>
numbers = []
numbers.push("Один")
numbers.push("Два")
numbers.push("Три")
for (j = 0 ; j < numbers.length ; ++j)
document.write("Элемент " + j + " = " + numbers[j] + "<br>")
</script>

<h4>Присваивание с использованием ключевого слова array</h4>
<p>
С помощью ключевого слова Array можно также создать массив с несколькими исходными элементами:<br>
numbers = Array("Один", "Два", "Три")
</p>

<h4>Ассоциативные массивы</h4>
<p>
К ассоциативным относятся такие массивы, в которых ссылки на элементы осуществляются по именам, а не по числовому смещению.
Чтобы создать ассоциативный массив, нужно определить блок элементов, заключенный в фигурные скобки.
Для каждого элемента слева от двоеточия (:) указывается его ключ, а справа — содержимое.
</p>
<p>Пример 16.9. Создание и отображение ассоциативного массива</p>
<p>
balls = {"гольф": "Мячи для гольфа, 6",<br>
"теннис": "Мячи для тенниса, 3",<br>
"футбол": "Футбольный мяч, 1",<br>
"пинг-понг": "Мячи для пинг-понга, 12 шт."}<br><br>
for (ball in balls)<br>
document.write(ball + " = " + balls[ball] + "br>")
</p>

<p style='color: blue;'>Start code</p>
<script>
balls = {"гольф": "Мячи для гольфа, 6",
"теннис": "Мячи для тенниса, 3",
"футбол": "Футбольный мяч, 1",
"пинг-понг": "Мячи для пинг-понга, 12 шт."}
for (ball in balls)
document.write(ball + " = " + balls[ball] + "<br>")
document.write(balls['футбол'])
</script>
<p>
Для проверки факта создания и заполнения массива я воспользовался еще одной разновидностью цикла for, в которой применяется ключевое слово in.<br>
В этом цикле создается новая переменная, которая задействуется только внутри массива (в данном примере — ball),
и вызывается последовательный перебор всех элементов массива, указанных справа от ключевого слова in (в данном примере — balls).<br>
Цикл обрабатывает каждый элемент массива balls, помещая значение ключа в переменную ball.
</p>
<p>
Чтобы получить значение конкретного элемента ассоциативного массива, нужно в явном виде указать его ключ
(в данном случает будет выведено значение Футбольный мяч, 1):<br>
document.write(balls['футбол'])
</p>

<h4>Использование методов массивов</h4>
<p>
Реализовать возможности, предоставленные массивами, помогают имеющиеся в JavaScript готовые к использованию методы для работы с ними
и с содержащимися в них данными.
</p>

<h4>Метод concat</h4>
<p>
Метод concat объединяет два массива или ряд значений в массив.<br> Например, следующий код выведет Банан,Виноград,Морковь,Капуста:<br>
fruit = ["Банан", "Виноград"]<br>
veg = ["Морковь", "Капуста"]<br>
document.write(fruit.concat(veg))
</p>
<p>
В качестве аргументов можно указать несколько массивов, тогда метод concat добавит все их элементы в порядке указания массивов.<br>
А вот еще один способ использования метода concat, где с массивом pets объединяются простые значения
и на экран выводится строка Кошка,Собака,Рыба,Кролик,Хомяк:<br>
pets = ["Кошка", "Собака", "Рыба"]<br>
more_pets = pets.concat("Кролик", "Хомяк")<br>
document.write(more_pets)
</p>

<h4>Метод forEach (для браузеров не из семейства IE)</h4>
<p>Пример 16.11. Использование метода forEach</p>
<p>
pets = ["Кошка", "Собака", "Кролик", "Хомяк"]<br>
pets.forEach(output)<br><br>
function output(element, index, array)<br>
{<br>
document.write("Элемент с индексом " + index + " содержит значение " +<br>
element + "br>")<br>
}
</p>

<p style='color: blue;'>Start code</p>
<script>
pets = ["Кошка", "Собака", "Кролик", "Хомяк"]
pets.forEach(output)
function output(element, index, array)
{
document.write("Элемент с индексом " + index + " содержит значение " +
element + "<br>")
}
</script>
<p>
В данном случае функция, передаваемая методу forEach, называется output.<br> Она воспринимает три параметра: элемент, его индекс и массив.
Как они используются, зависит от потребностей вашей функции.<br>
В данном примере они просто отображают значения индекса и элемента с помощью метода document.write.
</p>

<h4>Метод join</h4>
<p>
Метод join позволяет превратить все значения массива в строки, а затем объединить их в одну большую строку,
расставляя между значениями необязательные разделители.
</p>
<p>Пример 16.12. Использование метода join</p>
<p>
pets = ["Кошка", "Собака", "Кролик", "Хомяк"]<br>
document.write(pets.join() + "br>")<br>
document.write(pets.join(' ') + "br>")<br>
document.write(pets.join(' : ') + "br>")
</p>

<p style='color: blue;'>Start code</p>
<script>
pets = ["Кошка", "Собака", "Кролик", "Хомяк"]
document.write(pets.join() + "<br>")
document.write(pets.join(' ') + "<br>")
document.write(pets.join(' : ') + "<br>")
</script>
<p>
Если не указывать параметр, метод join использует в качестве разделителя элементов запятую,
в противном случае между элементами вставляется переданная методу join строка.
</p>

<h4>Методы push и pop</h4>
<p>
Противоположным push по действию является метод pop. Он удаляет последний вставленный элемент из массива и возвращает значение этого элемента.
</p>
<p>Пример 16.13. Использование методов push и pop</p>
<p>
sports = ["Футбол", "Теннис", "Бейсбол"]<br>
document.write("Изначально = " + sports + "br>")<br>
sports.push("Hockey")<br>
document.write("После вставки = " + sports + "br>")<br>
removed = sports.pop()<br>
document.write("После удаления = " + sports + "br>")<br>
document.write("Удаленный элемент = " + removed + "br>")
</p>

<p style='color: blue;'>Start code</p>
<script>
sports = ["Футбол", "Теннис", "Бейсбол"]
document.write("Изначально = " + sports + "<br>")
sports.push("Hockey")
document.write("После вставки = " + sports + "<br>")
removed = sports.pop()
document.write("После удаления = " + sports + "<br>")
document.write("Удаленный элемент = " + removed + "<br>")
</script>


<h4>Использование метода reverse</h4>
<p>
Метод reverse осуществляет простую перестановку элементов массива в обратном порядке.
</p>
<p>Пример 16.15. Использование метода reverse</p>
<p>
sports = ["Футбол", "Теннис", "Бейсбол", "Хоккей"]<br>
sports.reverse()<br>
document.write(sports)
</p>

<p style='color: blue;'>Start code</p>
<script>
sports = ["Футбол", "Теннис", "Бейсбол", "Хоккей"]
sports.reverse()
document.write(sports)
</script>

<h4>Метод sort</h4>
<p>
Метод sort позволяет расставить все элементы массива в алфавитном или в каком-нибудь другом порядке в зависимости от применяемых параметров.<br>
В примере 16.16 показаны четыре типа сортировки.
</p>
<p>Пример 16.16. Использование метода sort</p>
<p>
// Сортировка по алфавиту<br>
sports = ["Футбол", "Теннис", "Бейсбол", "Хоккей"]<br>
sports.sort()<br>
document.write(sports + "br>")<br><br>
// Сортировка по алфавиту в обратном порядке<br>
sports = ["Футбол", "Теннис", "Бейсбол", "Хоккей"]<br>
sports.sort().reverse()<br>
document.write(sports + "br>")<br><br>
// Сортировка чисел по возрастанию<br>
numbers = [7, 23, 6, 74]<br>
numbers.sort(function(a,b){return a - b})<br>
document.write(numbers + "br>")<br><br>
// Сортировка чисел по убыванию<br>
numbers = [7, 23, 6, 74]<br>
numbers.sort(function(a,b){return b - a})<br>
document.write(numbers + "br>")
</p>

<p style='color: blue;'>Start code</p>
<script>
document.write("Сортировка по алфавиту" + "<br>")
sports = ["Футбол", "Теннис", "Бейсбол", "Хоккей"]
sports.sort()
document.write(sports + "<br><br>")

document.write("Сортировка по алфавиту в обратном порядке" + "<br>")
sports = ["Футбол", "Теннис", "Бейсбол", "Хоккей"]
sports.sort().reverse()
document.write(sports + "<br><br>")

document.write("Сортировка чисел по возрастанию" + "<br>")
numbers = [7, 23, 6, 74]
numbers.sort(function(a,b){return a - b})
document.write(numbers + "<br><br>")

document.write("Сортировка чисел по убыванию" + "<br>")
numbers = [7, 23, 6, 74]
numbers.sort(function(a,b){return b - a})
document.write(numbers + "<br>")
</script>
<p>
В первом из четырех блоков этого примера применяется сортировка по алфавиту,<br>
во втором — возвращение к исходному виду, а затем метод reverse, чтобы получить сортировку по алфавиту в обратном порядке.
</p>
<p>
Третий и четвертый блоки усложнены использованием функции для сравнения взаимоотношений между a и b.<br>
У нее отсутствует имя, поскольку она используется только при сортировке.
Функция по имени function, которая применяется для создания безымянных функций, уже встречалась при определении метода класса (метода showUser).
</p>
<p>
Здесь function создает безымянную функцию, отвечающую запросам метода sort.<br>
Если функция возвращает значение больше нуля, сортировка предполагает, что b ставится перед a.
Если функция возвращает значение меньше нуля, сортировка предполагает, что a ставится перед b.<br>
Сортировка запускает эту функцию применительно ко всем значениям массива для определения порядка их следования.
</p>
<p>
За счет манипуляции возвращаемыми значениями (a - b или b - a) в третьем и четвертом блоках примера 16.16
осуществляется выбор между сортировкой чисел по возрастанию и по убыванию.
</p>

<h4>Создаем всплывающую контактную форму для сайта</h4>
<h4>HTML-код формы</h4>
<p>
a class="show-btn" href="javascript:void(0)" onclick = "document.getElementById('envelope').style.display='block';document.getElementById('fade').style.display='block'">Обратная связь/a><br>
           div id="envelope" class="envelope"><br>
                a class="close-btn" href="javascript:void(0)" onclick = "document.getElementById('envelope').style.display='none';document.getElementById('fade').style.display='none'">Закрыть/a><br>
                h1 class="title">Отправить нам сообщение/h1><br>
                form method="post" action="путь до обработчика"><br>
                     input type="text" name="sender" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'* Ваше Имя':this.value;" value="* Ваше Имя" class="your-name"/><br>
                     input type="text" name="email" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'* Ваш Email':this.value;" value="* Ваш Email" class="email-address"/><br>
                     textarea class="your-message">Пожалуйста, введите своё сообщение здесь ../textarea><br>
                     input type="submit" name="send" value="Отправить" class="send-message"><br>
                /form><br>
           /div><br>
           div id="fade" class="black-overlay">/div>
</p>


<p style='color: blue;'>Start code</p>
<a class="show-btn" href="javascript:void(0)" onclick = "document.getElementById('envelope').style.display='block';document.getElementById('fade').style.display='block'">Обратная связь</a>
           <div id="envelope" class="envelope">
                <a class="close-btn" href="javascript:void(0)" onclick = "document.getElementById('envelope').style.display='none';document.getElementById('fade').style.display='none'">Закрыть</a>
                <h1 class="title">Отправить нам сообщение</h1>
                <form method="post" action="../sendletter.php">
                     <input type="text" name="sender" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'* Ваше Имя':this.value;" value="* Ваше Имя" class="your-name"/>
                     <input type="text" name="email" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'* Ваш Email':this.value;" value="* Ваш Email" class="email-address"/>
                     <textarea class="your-message">Пожалуйста, введите своё сообщение здесь ..</textarea>
                     <input type="submit" name="send" value="Отправить" class="send-message">
                </form>
           </div>
           <div id="fade" class="black-overlay"></div>
<p>
Ничего сверхъестественного,  максимально простой каркас обычной контактной формы, помещенный в блочный элемент div с определенным идентификатором и классом,
для дальнейшего формирования внешнего вида формы в css  и взаимодействия с небольшим javascript, который нам понадобится для активации и закрытия
всплывающей формы.
</p>
<p>
Так же, нам необходимо создать слой затемнения общего фона, при активации всплывающей формы.
Выполнить эту задачу можно по разному, но мы мудрить особо не будем и добавим еще один div, присвоив ему идентификатор:<br>
id="fade" и класс: class="black-overlay".<br> Поместить его можете рядом с формой, чтобы долго не искать при необходимости.
div id="fade" class="black-overlay">/div>
</p>
<p>
В моем примере, текстовая ссылка для вызова всплывающей контактной формы, сформирована с помощью свойств CSS3 в виде кнопки.
Вы же можете использовать под это дело любую картинку, пункт меню или фрагмент текста,<br>
a class="show-btn" href = "javascript:void(0)" onclick = "document.getElementById('envelope').style.display='block';document.getElementById('fade').style.display='block'">Обратная связь/a>
</p>
<p>
Вы наверное заметили, что кнопка закрытия, вписана в блок контактной формы, непосредственно перед заголовком и это логично,
а где же ей еще быть, кнопка должна появляться и исчезать вместе с формой. Внешний вид и позицию кнопки закрытия мы в дальнейшем сформируем в CSS<br>
a class="close-btn" href="javascript:void(0)" onclick = "document.getElementById('envelope').style.display='none';document.getElementById('fade').style.display='none'">Закрыть/a>
</p>
<p>
Завершающим штрихом html-разметки нашей формы будет подключение к документу файла стилей modal-contact-form.css,
в котором мы и будем формировать все необходимые элементы формы. Подключаем по накатанной, для тех кто не в теме поясню, в разделе между тегами
head>.../head> следует прописать такую сточку:<br>
link rel="stylesheet" type="text/css" href="modal-contact-form.css" />
</p>
<p>
Прежде чем перейдем к самому интересному, к формированию стилей нашей контактной формы с помощью CSS, немного отступлю.
Самые внимательные, наверняка заметили, что кнопки открытия и закрытия формы реализованы в виде ссылок с «глушилкой» href="javascript:void(0)".<br>
Плохо этот или хорошо, точного ответа для себя я так и не нашел, использую этот способ по привычке.
Хотя для элементов, на которых событие onclick обрабатывается скриптом, думается мне, логичнее и правильнее, использовать button>, span> или div>.
При желании, вы всегда можете так и поступить с кнопками из данного примера.
</p>

<h4>Магия CSS</h4>
<p>
/* устанавливаем слой затемнения фона,<br>
  ** опрделяем позиции, цвет и интенсивность затемнения  */<br>
.black-overlay{<br>
        display: none;<br>
        position: absolute;<br>
        top: 0%;<br>
        left: 0%;<br>
        width: 100%;<br>
        height: 100%;<br>
        background-color: black;<br>
        z-index:1001;<br>
        -moz-opacity: 0.7;<br>
        opacity:.70;<br>
        filter: alpha(opacity=70);<br>
}<br><br>
/* устанавливаем рисунок основы,<br>
  ** опрделяем размеры и положение на экране  */<br>
<br>
.envelope {<br>
        display: none;<br>
        position: absolute;<br>
        width: 600px;<br>
        height: 340px;<br>
        background: url(images/envelope.png) center no-repeat;<br>
        z-index:1002;<br>
        position: relative;<br>
        margin: 10% auto;<br>
}<br>
/* формируем кнопку закрытия,<br>
  ** размеры, положение на форме  */<br>
.close-btn {<br>
        width: 31px;<br>
        height: 31px;<br>
        display: block;<br>
        cursor: pointer;/* для случая применения отличных от a> тегов */<br>
        background: url(images/close.png);<br>
        text-indent: -4999px;<br>
}<br>
<br>
/* кнопка закрытия при наведении */<br>
.close-btn:hover{<br>
        background: url(images/close-hover.png);<br>
 <br>
}<br>
/* оформляем заголовок формы */<br>
.title {<br>
        font-family: "Trebuchet MS",Tahoma,Arial,sans-serif;<br>
        font-size:22px;<br>
        font-weight: normal;<br>
        font-weight: 200;<br>
        text-align:left;<br>
        position: absolute;<br>
        top: 30px;<br>
        left: 40px;<br>
/* можно заменить на другую картинку<br>
   ** или border-bottom: бла бла бла */ <br> 
        background: url(images/divider.png) no-repeat bottom;<br>
        color: #545151;<br>
        height: 40px;<br>
        width: 400px;<br>
        margin: 15px 0;<br>
        text-shadow: 1px 1px #FFF;/* тень текста */<br>
}<br>
<br>
/* стили для полей ввода */<br>
input[type=text] {<br>
        font-family: "Trebuchet MS",Tahoma,Arial,sans-serif;<br>
        font-size: 13px;<br>
        background-color:rgb(255,255,255);<br>
        color: #787474;<br>
        padding-left: 10px;<br>
        width:208px;<br>
        height:33px;<br>
        border-color:rgb(182,182,182);<br>
        border-width:1px;<br>
        border-style:solid;<br>
        -moz-box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 2px 0px rgba(0,0,0,0.2);<br>
        -webkit-box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 2px 0px rgba(0,0,0,0.2);<br>
        box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 2px 0px rgba(0,0,0,0.2);<br>
        -ms-filter:"progid:DXImageTransform.Microsoft.dropshadow(OffX = 0,OffY = 1,Color = #80ffffff,Positive = true)";<br>
        filter:progid:DXImageTransform.Microsoft.dropshadow(OffX = 0,OffY = 1,Color = #80ffffff,Positive = true);<br>
        border-radius: 3px;<br>
        -moz-border-radius: 3px;<br>
}<br>
<br>
/* меняем оформление полей ввода при фокусе */<br>
input[type=text]:focus, .your-message:focus {<br>
        outline: none;<br>
        background-color:rgb(255,255,255);<br>
        border-color:rgb(126,139,153);<br>
        border: 1px solid;<br>
        -moz-box-shadow:0px 0px 5px 0px rgba(168,178,188,0.75) ,0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 2px 0px rgba(0,0,0,0.4);<br>
        -webkit-box-shadow:0px 0px 5px 0px rgba(168,178,188,0.75) ,0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 2px 0px rgba(0,0,0,0.4);<br>
        box-shadow:0px 0px 5px 0px rgba(168,178,188,0.75) ,0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 2px 0px rgba(0,0,0,0.4);<br>
        -ms-filter:"progid:DXImageTransform.Microsoft.Glow(Color=#bfa8b2bc,Strength=5)<br>
                progid:DXImageTransform.Microsoft.dropshadow(OffX = 0,OffY = 1,Color = #80ffffff,Positive = true)";<br>
        filter:progid:DXImageTransform.Microsoft.Glow(Color=#bfa8b2bc,Strength=5)<br>
                progid:DXImageTransform.Microsoft.dropshadow(OffX = 0,OffY = 1,Color = #80ffffff,Positive = true);<br>
}<br>
<br>
.your-message {<br>
        font-family: "Trebuchet MS",Tahoma,Arial,sans-serif;<br>
        font-size: 13px;<br>
        background-color:rgb(255,255,255);<br>
        color: #787474;<br>
        padding: 10px 0 0 10px;<br>
        width:448px;<br>
        height:93px;<br>
        border-color:rgb(182,182,182);<br>
        border-width:1px;<br>
        border-style:solid;<br>
        -moz-box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 2px 0px rgba(0,0,0,0.2);<br>
        -webkit-box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 2px 0px rgba(0,0,0,0.2);<br>
        box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 2px 0px rgba(0,0,0,0.2);<br>
        -ms-filter:"progid:DXImageTransform.Microsoft.dropshadow(OffX = 0,OffY = 1,Color = #80ffffff,Positive = true)";<br>
        filter:progid:DXImageTransform.Microsoft.dropshadow(OffX = 0,OffY = 1,Color = #80ffffff,Positive = true);<br>
        position: absolute;<br>
        top: 150px;<br>
        left: 40px;<br>
        border-radius: 3px;<br>
        -moz-border-radius: 3px;<br>
}<br>
<br>
.your-name {<br>
        position: absolute;<br>
        top: 100px;<br>
        left: 40px;<br>
}<br>
 <br>
.email-address {<br>
        position: absolute;<br>
        top: 100px;<br>
        left: 280px;<br>
}<br>
<br>
/* оформляем кнопку отправки */<br>
.send-message {<br>
    background-color: #929FAB;<br>
        background-image:-moz-linear-gradient(49% 0% -90deg,rgb(171,181,191) 0%,rgb(124,138,152) 100%); <br>
        background-image:-webkit-gradient(linear,49% 0%,49% 109%,color-stop(0, rgb(171,181,191)),color-stop(1, rgb(124,138,152)));<br>
        background-image:-webkit-linear-gradient(-90deg,rgb(171,181,191) 0%,rgb(124,138,152) 100%);<br>
        background-image:-o-linear-gradient(-90deg,rgb(171,181,191) 0%,rgb(124,138,152) 100%);<br>
        background-image:-ms-linear-gradient(-90deg,rgb(171,181,191) 0%,rgb(124,138,152) 100%);<br>
        background-image:linear-gradient(-90deg,rgb(171,181,191) 0%,rgb(124,138,152) 100%);<br>
        width:130px;<br>
        height:35px;<br>
        -moz-box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 3px rgb(97,108,122);<br>
        -webkit-box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 3px rgb(97,108,122);<br>
        box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 3px rgb(97,108,122);<br>
        -ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffabb5bf,endColorstr=#ff7c8a98,GradientType=0)<br>
        progid:DXImageTransform.Microsoft.dropshadow(OffX = 0,OffY = 1,Color = #80ffffff,Positive = true)";<br>
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffabb5bf,endColorstr=#ff7c8a98,GradientType=0)<br>
        progid:DXImageTransform.Microsoft.dropshadow(OffX = 0,OffY = 1,Color = #80ffffff,Positive = true); <br>
        color: #fff;<br>
        font-family: "Trebuchet MS",Tahoma,Arial,sans-serif;<br>
        font-size: 13px;<br>
        text-shadow: 0 1px 0 #21405D;<br>
        font-weight: bold;<br>
        border: none;<br>
        cursor: pointer;<br>
        border-radius: 3px;<br>
        -moz-border-radius: 3px;<br>
        position: absolute;<br>
        top: 269px;<br>
        right: 100px;<br>
}<br>
/* оформляем кнопку отправки при наведении */<br>
.send-message:hover{<br>
    background-color: #A0ACB9;<br>
        background-image:-moz-linear-gradient(49% 0% -90deg,rgb(170,181,195) 0%,rgb(144,157,169) 100%); <br>
        background-image:-webkit-gradient(linear,49% 0%,49% 109%,color-stop(0, rgb(170,181,195)),color-stop(1, rgb(144,157,169)));<br>
        background-image:-webkit-linear-gradient(-90deg,rgb(170,181,195) 0%,rgb(144,157,169) 100%);<br>
        background-image:-o-linear-gradient(-90deg,rgb(170,181,195) 0%,rgb(144,157,169) 100%);<br>
        background-image:-ms-linear-gradient(-90deg,rgb(170,181,195) 0%,rgb(144,157,169) 100%);<br>
        background-image:linear-gradient(-90deg,rgb(170,181,195) 0%,rgb(144,157,169) 100%);<br>
        width:130px;<br>
        height:35px;<br>
        -moz-box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 3px rgb(97,108,122);<br>
        -webkit-box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 3px rgb(97,108,122);<br>
        box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 3px rgb(97,108,122);<br>
        -ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffaab5c3,endColorstr=#ff909da9,GradientType=0)<br>
        progid:DXImageTransform.Microsoft.dropshadow(OffX = 0,OffY = 1,Color = #80ffffff,Positive = true)";<br>
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffaab5c3,endColorstr=#ff909da9,GradientType=0)<br>
        progid:DXImageTransform.Microsoft.dropshadow(OffX = 0,OffY = 1,Color = #80ffffff,Positive = true);<br>
}<br><br>
/* оформляем кнопку отправки в режиме активной */<br>
.send-message:active{<br>
        background-image:-moz-linear-gradient(49% 0% -90deg,rgb(142,154,167) 0%,rgb(124,138,152) 100%); <br>
        background-image:-webkit-gradient(linear,49% 0%,49% 109%,color-stop(0, rgb(142,154,167)),color-stop(1, rgb(124,138,152)));<br>
        background-image:-webkit-linear-gradient(-90deg,rgb(142,154,167) 0%,rgb(124,138,152) 100%);<br>
        background-image:-o-linear-gradient(-90deg,rgb(142,154,167) 0%,rgb(124,138,152) 100%);<br>
        background-image:-ms-linear-gradient(-90deg,rgb(142,154,167) 0%,rgb(124,138,152) 100%);<br>
        background-image:linear-gradient(-90deg,rgb(142,154,167) 0%,rgb(124,138,152) 100%);<br>
        width:130px;<br>
        height:35px;<br>
        -moz-box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 5px rgb(65,73,85);<br>
        -webkit-box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 5px rgb(65,73,85);<br>
        box-shadow:0px 1px 0px 0px rgba(255,255,255,0.5) ,inset 0px 1px 5px rgb(65,73,85);<br>
        -ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#ff8e9aa7,endColorstr=#ff7c8a98,GradientType=0)<br>
        progid:DXImageTransform.Microsoft.dropshadow(OffX = 0,OffY = 1,Color = #80ffffff,Positive = true)";<br>
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#ff8e9aa7,endColorstr=#ff7c8a98,GradientType=0)<br>
        progid:DXImageTransform.Microsoft.dropshadow(OffX = 0,OffY = 1,Color = #80ffffff,Positive = true);<br>
}
</p>

<p style='color: red;'>Start code</p>
<div id="a-div" style="display: block;">
	<button id="add" class="btnstyle">Add </button>
</div>
<div id="d-div" style="display: none;">
	<button id="delete" class="btnstyle">Delete</button>
</div>
<script>
//$("#a-div").hide();
//$("#d-div").hide();

var mode = 'add';
//var mode = 'delete';
if (mode === 'add') {
    $("#a-div").show();
} else {
    $("#d-div").show();
}
</script>

<p style='color: red;'>Start code</p>
<script>
var portfolioDiv = document.getElementById('portfolio');
    var resultsDiv = document.getElementById('results');

    var portfolioBtn = document.getElementById('RenderPortfolio_Btn');
    var resultsBtn = document.getElementById('RenderResults_Btn');

    portfolioBtn.onclick = function() {
        resultsDiv.setAttribute('class', 'hidden');
        portfolioDiv.setAttribute('class', 'visible');
    };

    resultsBtn.onclick = function() {
        portfolioDiv.setAttribute('class', 'hidden');
        resultsDiv.setAttribute('class', 'visible');
    };
</script>

<button id="RenderPortfolio_Btn">View Portfolio</button>
<button id="RenderResults_Btn">View Results</button>

<div class = 'visibleO' id='portfolio' style='display: block;'>
    <span>div1</span>
</div>

<div class = 'hiddenO' id='results' style='display: none;'>
    <span>div2</span>
</div>


<script>
function changeDiv()
  {
  document.getElementById('body').hidden = 'hidden'; // hide body div tag
  document.getElementById('body1').hidden = ''; // show body1 div tag
  document.getElementById('body1').innerHTML = 'If you can see this, JavaScript function worked'; 
  // display text if JavaScript worked
   }
</script>
<div id='body' hidden=''>
 <h1>Numbers</h1>
 </div>
 <div id='body1' hidden='hidden'>
 Body 1
 </div>


<p style='color: lime;'>Start code</p>
<div id="xyz" style="display:block">
     .....BLOCK......
</div>
<!--
<div id="xyz">
     ....BLOCK......
</div>
-->
<button id="RenderPortfolio_Btn" onclick = "document.getElementById('xyz').style.display='block';document.getElementById('xyz').style.display='none'">Обратная связь</button>


<p>
//In JavaScript<br>
document.getElementById('xyz').style.display ='block';  // to hide<br>
Чтобы скрыть показанный div<br>
<br>
//In JavaScript<br>
document.getElementById('zyx').style.display ='none';  // to display
</p>
<script>

</script>

<p></p>
<p>

</p>

<p>

</p>
<h4>Просто простая функция, необходимая для реализации Показать/скрыть 'div' с помощью JavaScript</h4>
<a id="morelink" class="link-more" style="font-weight: bold; display: block;" onclick="this.style.display='none'; document.getElementById('states').style.display='block'; return false;">READ MORE</a>


<div id="states" style="display: block; line-height: 1.6em;">
 text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here  
    <a class="link-less" style="font-weight: bold;" onclick="document.getElementById('morelink').style.display='inline-block'; document.getElementById('states').style.display='none'; return false;">LESS INFORMATION</a>
    </div>

<p style='color: lime;'>Start code</p>
<p>Click the "Try it" button to set the display property of the DIV element to "block":</p>

<button onclick="myFunction()">Try it block</button>
<button onclick="myFunctionNone()">Try it NONE</button>

<div id="myDIV">
This is my DIV element.
</div>

<p><b>Note:</b> The element will not take up any space when the display property set to "none".</p>

<script>
function myFunction() {
    document.getElementById("myDIV").style.display = "block";
}
function myFunctionNone() {
    document.getElementById("myDIV").style.display = "none";
}
</script>

<h4>Как скрыть поле формы?</h4>
<p style='color: red;'>Start code</p>
<select name="foobar" onchange="checkAndHide(this.options[this.selectedIndex].value)">
<option value="right1">right1</option>
<option value="wrong">wrong</option>
<option value="right2">right2</option>
</select>

<input type="text" id="shouldHide" name="test">

<script type="text/javascript">
function checkAndHide(value){

    if(value == 'wrong')
        document.getElementById('shouldHide').style.display = 'none';

    else
        document.getElementById('shouldHide').style.display = 'block';

}
</script>

<h4>Как скрыть поле формы?</h4>
<p style='color: green;'>Start code</p>
<form>
            <tr>
                <div id="textFieldBlock">
                    <label for="testTextfield">Test Label for textfield</label><br>
                    <input type="textfield" id="testTextField" value="Test TextField"/>
                </div>
            </tr>
            <tr>
                <div id="buttonBlock">
                    <input type="button" id="testButton" value="Test Button"/>
                </div>
            </tr>
            <tr>
                <input type="checkbox" id="hideTextField" onclick="changeVisibility('textFieldBlock', checked)"/>Hide TextField
                <input type="checkbox" id="hideButton" onclick="changeVisibility('buttonBlock', checked)"/>Hide Button
            </tr>
        </form>
        <script type="text/javascript" language="JavaScript">
            function changeVisibility(divId, visible){
                document.getElementById(divId).style.display = visible ? "none": "block";
            }
        </script>
<p>

</p>
<h4>Как скрыть поле формы?</h4>
<p style='color: yellow;'>Start code</p>
<form method="post" name="installer" onsubmit="showHide(); return false;"> <!-- -->

<label>Home Keyword</label>
<br />
<input type="text" name="hello" value="">
<br />
<input type="submit" value="send" name="submit" />

</form>

<div id="hidden_div" style="display:none">
<p>Show me when form is submitted :) </p>
</div>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>

<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>

<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>

<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>

<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>

<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


<h4></h4>
<p>

</p>
<p>

</p>
<p></p>
<script>

</script>
<p></p>
<p></p>


		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
		
	</body>
</html>
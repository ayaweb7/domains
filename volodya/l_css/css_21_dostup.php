<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/screen.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../js/dostup.js"></script>
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

<title>Доступ к CSS</title>
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
<?php  ?>
<!-- !!!!!!!!!!!!!!!!!       шаблоны, заготовки для тэгов, комментарии !!!!!!!!!!!!!!! -->

<h4>Еще одно обращение к функции getElementById</h4>
<p>
В главе 13 уже упоминалось, что символ $ часто используется как имя функции чтобы облегчить доступ к функции getElementById.
</p>
<p>
чтобы избежать конфликтов со средами программирования, использующими символ $, я буду просто применять в качестве имени функции заглавную букву O,
поскольку это первая буква слова Object (объект), а именно объект будет возвращаться при вызове этой функции
(тот самый объект, представленный идентификатором ID, переданным функции).
</p>

<h4>Функция O</h4>
<p>
Основа функции O имеет следующий вид:<br>
function O(obj)<br>
{<br>
return document.getElementById(obj)<br>
}
</p>
<p>
Только лишь этот код уже сокращает количество набираемого текста при вызове функции на 22 символа,
но я намерен немного расширить функцию, позволяя передавать ей либо ID, либо объект, как показано в полной версии функции, представленной в примере 21.1.
</p>
<p>Пример 21.1. Функция O</p>
<p>
function O(obj)<br>
{<br>
if (typeof obj == 'object') return obj<br>
else return document.getElementById(obj)<br>
}
</p>
<p>
Если функции передается объект, она просто возвращает его обратно.
В противном случае она предполагает, что ей был передан ID, и возвращает объект, на который этот ID ссылается.
</p>

<h4>Функция S</h4>
<p>
вспомогательную функцию, названную S и показанную в примере 21.2, которую я вам предоставляю для упрощения доступа к стилевым свойствам (или CSS) объекта.
</p>
<p>Пример 21.2. Функция S</p>
<p>
function S(obj)<br>
{<br>
return O(obj).style<br>
}
</p>
<p>
Для этой функции имя S выбрано потому, что это первая буква слова Style, а функция выполняет задачу возвращения свойства стиля
(или подчиненного объекта) того элемента, на который она ссылается.<br>
Поскольку встроенная функция O принимает либо ID, либо объект, вы можете передавать функции S как ID, так и объект.
</p>
<p>
Рассмотрим, что получится, когда мы возьмем div>-элемент с ID myobj и установим для цвета его текста значение green (зеленый):
</p>
<p>
div id='myobj'>Some text/div><br>
script><br>
O('myobj').style.color = 'green'<br>
/script><br>
</p>
<p>

</p>
<p style='color: lime;'>Start code Функция O</p>
<div id='myobj'>Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text</div>
<script>
	O('myobj').style.color = 'lime'
</script>
<p>
Предыдущий код справится с этой задачей, но значительно проще будет вызвать новую функцию S:<br>
S('myobj').color = 'green'
</p>
<p style='color: red;'>Start code Функция S</p>
<div id='myobj_1'>Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text</div>
<script>
	S('myobj_1').color = 'red'
</script>

<p>
Теперь рассмотрим случай, при котором объект, возвращенный в результате вызова функции O, сохранен, к примеру, в объекте по имени fred:<br>
fred = O('myobj')
</p>
<p>
Благодаря тому способу, который используется в работе функции S, мы можем для изменения цвета на зеленый вызвать и этот объект:<br>
S(fred).color = 'green'
</p>
<p style='color: magenta;'>Start NEW code</p>
<div id='myobj_2'>Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text</div>
<script>
	fred = O('myobj_2')
	S(fred).color = 'magenta'
</script>
<p>
Это означает, что при желании получить доступ к объекту непосредственно или через его ID вы можете сделать это,
передавая его либо функции O, либо функции S, в зависимости от того, что вам нужно.<br>
Нужно лишь помнить, что при передаче объекта (а не ID) ни в коем случае не следует брать его имя в кавычки.
</p>

<h4>Функция C</h4>
<p>
Вам уже предоставлены две простые функции, упрощающие доступ к любому элементу на веб-странице и любому свойству стиля элемента.
Но иногда вам понадобится одновременный доступ более чем к одному элементу.<br>
Это можно сделать путем присваивания имени класса CSS каждому такому элементу, как показано в следующем примере,
где для каждого элемента применяется класс myclass:<br>
div class='myclass'>Содержимое div-контенера /div><br>
p class='myclass'>Содержимое абзаца/p>
</p>
<p>
Если нужен доступ ко всем элементам страницы, использующим конкретный класс, можно обратиться к функции C
(чье имя происходит от первой буквы в слове Class), показанной в примере 21.3.<br>
Она вернет массив, состоящий из всех объектов, которые соответствуют предоставленному имени класса.
</p>
<p>Пример 21.3. Функция C()</p>
<p>
function C(name)<br>
{<br>
var elements = document.getElementsByTagName('*')<br>
var objects = []<br><br>
for (var i = 0 ; i < elements.length ; ++i)<br>
if (elements[i].className == name)<br>
objects.push(elements[i])<br>
return objects<br>
}
</p>

<p>
Разберем код по частям.
В аргументе 'name' содержится имя класса, по которому мы пытаемся извлечь объекты.<br>
Затем внутри функции создается новый объект по имени 'elements', содержащий все элементы документа, возвращенные путем вызова функции
'getElementsByTagName' с аргументом '*', который означает «нужно найти все элементы»:<br>
var elements = document.getElementsByTagName('*')
</p>
<p>
Затем создается новый массив по имени 'objects', куда будут помещаться все найденные объекты, соответствующие условию поиска:<br>
var objects = []
</p>
<p>
Затем цикл 'for' осуществляет перебор всех элементов, имеющихся в объекте 'elements', используя в качестве индекса переменную 'i':<br>
for (var i = 0 ; i < elements.length ; ++i)
</p>
<p>
При каждом проходе цикла объект помещается в массив 'objects' при условии, что значение свойства элемента 'className'
совпадает со строковым значением, переданным в аргументе 'name':<br>
if (elements[i].className == name)<br>
objects.push(elements[i])
</p>
<p>
И наконец, когда цикл завершится, массив objects будет содержать все элементы в документе, которые используют имя класса,
являющееся значением переменной name, поэтому он возвращается функцией:<br>
return objects
</p>
<p>
Для использования эту функцию следует просто вызвать, как показано далее, сохраняя возвращенный массив,
чтобы иметь возможность получить доступ отдельно к каждому нужному элементу или (что чаще всего и бывает) ко всем элементам с помощью цикла:<br>
myarray = C('myclass')
</p>
<p>
Теперь можете делать с возвращенными объектами все, что нужно, например установить для их свойства 'textDecoration' значение подчеркивания — 'underline':<br>
for (i = 0 ; i < myarray.length ; ++i)<br>
S(myarray[i]).textDecoration = 'underline'
</p>
<p>
Этот код осуществляет последовательный перебор объектов в 'myarray[]', а затем использует функцию 'S' для ссылки на свойство стиля каждого объекта,
задавая для свойства textDecoration значение 'underline'.
</p>
<p style='color: teal;'>Start code</p>
<div class='myclass'>
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера Содержимое div-контенера
</div>
<p class='myclass'>
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца Содержимое абзаца
</p>
<script>
myarray = C('myclass')

for (i = 0 ; i < myarray.length ; ++i)
S(myarray[i]).color = 'teal',
S(myarray[i]).textDecoration = 'underline'
</script>


<h4>Обращение к свойствам CSS из JavaScript</h4>
<p>
Свойство textDecoration, использовавшееся в ранее показанном примере, представляет свойство CSS, имя которого в обычном виде содержит дефис:
text-decoration. Но поскольку в JavaScript дефис зарезервирован для применения в качестве математического оператора, при доступе к свойству CSS,
в имени которого используется дефис, этот дефис нужно опустить и перевести в верхний регистр символ, следовавший непосредственно за ним.
</p>
<p>
Еще одним примером может послужить свойство font-size, на которое в JavaScript при помещении после оператора точки ссылаются как на fontSize:<br>
myobject.fontSize = '16pt'
</p>
<p>
Вместо этого можно предоставить более развернутый код и воспользоваться функцией setAttribute, которая поддерживает
(и фактически требует) стандартное имя свойства CSS:<br>
myobject.setAttribute('style', 'font-size:16pt')
</p>

<h4>Некоторые общие свойства</h4>
<p>
как получить доступ к свойствам CSS, используя либо краткую форму JavaScript, либо функцию setAttribute
(чтобы применить абсолютно такие же имена свойств, как и в CSS).
</p>
<p>
рассмотрим изменение нескольких свойств CSS из JavaScript, используя код примера 21.5, который в первую очередь загружает в себя три ранее упомянутые функции,
затем создает <div>-элемент и, наконец, запускает инструкции JavaScript, находящиеся внутри блока script> кода HTML
с целью изменения различных атрибутов элемента div> (рис. 21.1).
</p>
<p>Пример 21.5. Обращение к свойствам CSS из JavaScript</p>
<p>
div id='object'>Div-объект/div><br><br>
script><br>
S('object').border = 'solid 1px red'<br>
S('object').width = '100px'<br>
S('object').height = '100px'<br>
S('object').background = '#eee'<br>
S('object').color = 'blue'<br>
S('object').fontSize = '15pt'<br>
S('object').fontFamily = 'Helvetica'<br>
S('object').fontStyle = 'italic'<br>
/script>
</p>
<p style='color: blue;'>Пример 21.5. Обращение к свойствам CSS из JavaScript</p>
<div id='object'>Div-объект</div>
<script>
S('object').border = 'solid 1px red'
S('object').width = '100px'
S('object').height = '100px'
S('object').background = '#eee'
S('object').color = 'blue'
S('object').fontSize = '15pt'
S('object').fontFamily = 'Helvetica'
S('object').fontStyle = 'italic'
</script>

<h4>Другие свойства</h4>
<p>
JavaScript также открывает доступ к очень широкому диапазону других свойств, таких как ширина и высота окна браузера и любых появляющихся или
присутствующих в браузере окон или фреймов, и к такой полезной информации, как родительское окно (если таковое имеется)
и история URL-адресов, по которым осуществлялись визиты в текущем сеансе.
</p>
<p>
Все эти свойства доступны из объекта window через оператор «точка» (.) (например, window.name). В табл. 21.1 перечислены все эти свойства с описаниями.
</p>
<p>Таблица 21.1. Общие свойства объекта window</p>
<table id="inventory" class="realty">
	<tr><th>Свойство</th><th>Устанавливает и (или) возвращает</th></tr>
	<tr><td>closed</td><td>Возвращает булево значение, показывающее, было ли закрыто окно</td></tr>
	<tr><td>defaultStatus</td><td>Устанавливает или возвращает исходный текст панели состояния окна</td></tr>
	<tr><td>document</td><td>Возвращает объект документа для окна</td></tr>
	<tr><td>frames</td><td>Возвращает массив, состоящий из всех фреймов и i-фреймов окна</td></tr>
	<tr><td>history</td><td>Возвращает для окна объект истории</td></tr>
	<tr><td>innerHeight</td><td>Устанавливает или возвращает внутреннюю высоту области содержимого окна</td></tr>
	<tr><td>innerWidth</td><td>Устанавливает или возвращает внутреннюю ширину области содержимого окна</td></tr>
	<tr><td>length</td><td>Возвращает количество фреймов и i-фреймов окна</td></tr>
	<tr><td>location</td><td>Возвращает местоположение объекта в окне</td></tr>
	<tr><td>name</td><td>Устанавливает или возвращает имя окна</td></tr>
	<tr><td>navigator</td><td>Возвращает для окна объект-навигатор</td></tr>
	<tr><td>opener</td><td>Возвращает ссылку на то окно, из которого было создано данное окно</td></tr>
	<tr><td>outerHeight</td><td>Устанавливает или возвращает внешнюю высоту окна, включая панель инструментов и полосу прокрутки</td></tr>
	<tr><td>outerWidth</td><td>Устанавливает или возвращает внешнюю ширину окна, включая панель инструментов и полосу прокрутки</td></tr>
	<tr><td>pageXOffset</td><td>Возвращает количество пикселов, на которое был горизонтально прокручен документ от левого края окна</td></tr>
	<tr><td>pageYOffset</td><td>Возвращает количество пикселов, на которое был вертикально прокручен документ от верхнего края окна</td></tr>
	<tr><td>parent</td><td>Возвращает для окна объект родительского окна</td></tr>
	<tr><td>screen</td><td>Возвращает для окна объект экрана</td></tr>
	<tr><td>screenLeft</td><td>Возвращает координату x окна относительно экрана во всех последних браузерах, кроме Mozilla Firefox (для которого нужно использовать screenX)</td></tr>
	<tr><td>screenTop</td><td>Возвращает координату y окна относительно экрана во всех последних браузерах, кроме Mozilla Firefox (для которого нужно применять screenY)</td></tr>
	<tr><td>screenX</td><td>Возвращает координату x окна относительно экрана во всех последних браузерах, кроме Opera, который возвращает неправильное значение; не поддерживается в версиях Internet Explorer, предшествующих 9-й версии</td></tr>
	<tr><td>screenY</td><td>Возвращает координату y окна относительно экрана во всех последних браузерах, кроме Opera, который возвращает неправильное значение; не поддерживается в версиях Internet Explorer, предшествующих 9-й версии</td></tr>
	<tr><td>self</td><td>Возвращает the current window</td></tr>
	<tr><td>status</td><td>Устанавливает или возвращает текст на панели состояния окна</td></tr>
	<tr><td>top</td><td>Возвращает верхнее окно браузера</td></tr>
</table>

<h4>Встроенный JavaScript</h4>
<p>
Получить доступ к JavaScript можно также из тегов HTML, что и делается для повышения динамической интерактивности.<br>
Например, для быстрого добавления эффекта при прохождении указателя мыши над объектом можно воспользоваться таким же кодом, который показан в теге
img /> в примере 21.6. Там изначально отображается картинка с яблоком, которая при прохождении над ней указателя мыши заменяется картинкой с апельсином
(а при выходе указателя за пределы картинки возвращается картинка с яблоком).
</p>
<p>Пример 21.6. Использование встроенного JavaScript</p>
<p>
img src='../images/phone.png'<br>
onmouseover="this.src='../images/telephone.png'"<br>
onmouseout="this.src='../images/phone.png'">
</p>
<p style='color: lime;'>Использование встроенного JavaScript</p>
<img src='../images/phone.png'
onmouseover="this.src='../images/telephone.png'"
onmouseout="this.src='../images/phone.png'" >

<h4>Ключевое слово this</h4>
<p>
В предыдущем примере вы можете увидеть применение ключевого слова 'this'. Оно заставляет JavaScript работать с названным объектом, а именно с тегом img />.
</p>
<p>
Когда ключевое слово this находится во встроенном вызове JavaScript, оно представляет вызываемый объект.
А при использовании в методах класса оно представляет объект, к которому применяется метод.

<h4>Привязка событий к объектам в сценарии</h4>
<p>
Предыдущий код является эквивалентом предоставления тегу img> идентификатора с последующей привязкой действий к событиям мыши этого тега, как в примере 21.7.
</p>
<p>Пример 21.7. Невстроенный JavaScript</p>
<p>
img id='object' src='../images/phone.png'><br>
script><br>
O('object').onmouseover = function() { this.src = '../images/telephone.png' }<br>
O('object').onmouseout = function() { this.src = '../images/phone.png' }<br>
/script>
</p>

<p style='color: blue;'>Start code</p>
<img id='object' src='../images/phone.png'>
<script>
O('object').onmouseover = function() { this.src = '../images/telephone.png' }
O('object').onmouseout = function() { this.src = '../images/phone.png' }
</script>
<p>
Этот код применяет ID объекта к тегу img /> в блоке HTML, а затем продолжает работать с ним отдельно в блоке JavaScript,
прикрепив к каждому событию безымянную функцию.
</p>

<h4>Прикрепление к другим событиям</h4>
<p>
Какой бы JavaScript ни использовался, встроенный или отдельный, существуют события, к которым вы можете прикрепить действия.
И активизировать тем самым множество дополнительных функций, которые можете предоставить своим пользователям.<br>
В табл. 21.2 перечислены эти события и указаны условия их наступления.
</p>
<p>Таблица 21.2. События и условия их наступления</p>
<table id="inventory" class="realty">
	<tr><th>Событие</th><th>Условие его наступления</th></tr>
	<tr><td>onabort</td><td>Загрузка изображения останавливается до ее завершения</td></tr>
	<tr><td>onblur</td><td>Элемент теряет фокус</td></tr>
	<tr><td>onchange</td><td>Изменяется любая часть формы</td></tr>
	<tr><td>onclick</td><td>Происходит щелчок кнопкой мыши на объекте</td></tr>
	<tr><td>ondblclick</td><td>Происходит двойной щелчок кнопкой мыши на объекте</td></tr>
	<tr><td>onerror</td><td>Обнаруживается ошибка JavaScript</td></tr>
	<tr><td>onfocus</td><td>Элемент получает фокус</td></tr>
	<tr><td>onkeydown</td><td>Нажата клавиша (включая Shift, Alt, Ctrl и Esc)</td></tr>
	<tr><td>onkeypress</td><td>Нажата клавиша (исключая Shift, Alt, Ctrl и Esc)</td></tr>
	<tr><td>onkeyup</td><td>Клавиша отпущена</td></tr>
	<tr><td>onload</td><td>Объект загрузился</td></tr>
	<tr><td>onmousedown</td><td>Над элементом нажата кнопка мыши</td></tr>
	<tr><td>onmousemove</td><td>Указатель мыши проходит над элементом</td></tr>
	<tr><td>onmouseout</td><td>Указатель мыши покидает элемент</td></tr>
	<tr><td>onmouseover</td><td>Указатель мыши заходит на элемент со стороны</td></tr>
	<tr><td>onmouseup</td><td>Отпускается кнопка мыши</td></tr>
	<tr><td>onsubmit</td><td>Отправляется форма</td></tr>
	<tr><td>onreset</td><td>Сбрасываются данные формы</td></tr>
	<tr><td>onresize</td><td>Изменяются размеры окна браузера</td></tr>
	<tr><td>onscroll</td><td>Документ прокручивается</td></tr>
	<tr><td>onselect</td><td>Выделяется какой-нибудь текст</td></tr>
	<tr><td>onunload</td><td>Удаляется документ</td></tr>
</table>

<h4>Добавление новых элементов</h4>
<p>
Работая с JavaScript, вы можете манипулировать не только элементами и объектами, которые были предоставлены документу его кодом HTML.
Вы можете создавать объекты по своему желанию, вставляя их в DOM.
</p>
<p>
Предположим, к примеру, что вам нужен новый элемент div>. Способ добавления его к веб-странице показан в примере 21.8.
</p>
<p>Пример 21.8. Вставка элемента в DOM</p>
<p>
В этом документе содержится только этот текст.br>br><br>
script><br>
alert('Для добавления элемента щелкните на кнопке OK')<br>
newdiv = document.createElement('div')<br>
newdiv.id = 'NewDiv'<br>
document.body.appendChild(newdiv)<br>
S(newdiv).border = 'solid 1px red'<br>
S(newdiv).width = '100px'<br>
S(newdiv).height = '100px'<br>
newdiv.innerHTML = "Это новый объект, вставленный в DOM"<br>
tmp = newdiv.offsetTop<br>
alert('Для удаления элемента щелкните на кнопке OK')<br>
pnode = newdiv.parentNode<br>
pnode.removeChild(newdiv)<br>
tmp = pnode.offsetTop<br>
/script>
</p>

<p style='color: blue;'>Start code</p>
В этом документе содержится только этот текст.<br><br>
<script>
//alert('Для добавления элемента щелкните на кнопке OK')
newdiv = document.createElement('div')
newdiv.id = 'NewDiv'
document.body.appendChild(newdiv)
S(newdiv).border = 'solid 1px red'
S(newdiv).width = '100px'
S(newdiv).height = '100px'
newdiv.innerHTML = "Это новый объект, вставленный в DOM"
tmp = newdiv.offsetTop
//alert('Для удаления элемента щелкните на кнопке OK')
pnode = newdiv.parentNode
pnode.removeChild(newdiv)
tmp = pnode.offsetTop
</script>

<p>
Сначала новый элемент создается с помощью функции createElement, затем вызывается функция appendChild и элемент вставляется в DOM.
</p>
<p>
После этого элементу присваиваются различные свойства, включая текст для его свойства innerHTML (внутреннего HTML).
А затем, чтобы обеспечить немедленное отображение нового элемента на экране, значение его свойства offsetTop считывается во временную переменную tmp.
Это заставляет DOM обновиться и вывести элемент на экран в любом браузере, который в противном случае выдержал бы паузу, прежде чем это сделать.
В частности, это касается Internet Explorer.
</p>
<p>
Этот новый элемент точно такой же, как если бы он был включен в исходный HTML, и он открывает доступ к аналогичным свойствам и методам.
</p>

<h4>Альтернативы добавлению и удалению элементов</h4>
<p>
Вставка элемента предназначена для добавления к веб-странице абсолютно нового объекта.
Но если вы намерены только скрывать и показывать объекты в соответствии с наступлением события onmouseover или какого-нибудь другого события,
не забудьте, что есть пара свойств CSS, которые могут использоваться для этой цели без принятия таких радикальных мер, как создание и удаление элементов DOM.
</p>
<p>
Например, когда нужно сделать элемент невидимым, но оставить его на месте (оставляя на своих местах все окружающие его элементы),
можно просто установить для свойства visibility объекта значение 'hidden':<br>
myobject.visibility = 'hidden'
</p>
<p>
А для повторного отображения объекта можно воспользоваться следующим кодом:<br>
myobject.visibility = 'visible'
</p>
<p>
Можно также свернуть элемент, чтобы он занимал нулевую ширину и высоту (и чтобы все окружающие его объекты заняли освободившееся пространство):<br>
myobject.display = 'none'
</p>
<p>
Для последующего восстановления элемента в его исходных размерах можно написать такой код:<br>
myobject.display = 'block'
</p>
<p>
И конечно же, в вашем распоряжении всегда есть свойство innerHTML, с помощью которого можно изменить код HTML, примененный к элементу. Например:<br>
mylement.innerHTML = 'b>Замена HTML/b>'
</p>
<p>
Можно также воспользоваться упомянутой ранее функцией O:<br>
O('someid').innerHTML = 'Новое содержимое'
</p>
<p>
Можно заставить элемент показаться исчезнувшим:<br>
O('someid').innerHTML = ''
</p>
<p>
Не забывайте обо всех других полезных свойствах CSS, к которым можно обратиться из JavaScript.<br>
Например, для переключения объекта из видимого в невидимое состояние и обратно можно воспользоваться свойством непрозрачности,
а для изменения размеров объекта можно изменить значения свойств width и height.<br>
И конечно же, применяя для свойства position значения 'absolute', 'static' или 'relative', вы можете даже поместить объект в любое место окна браузера
(или снаружи).
</p>

<h4>Использование прерываний</h4>
<p>
JavaScript предоставляет доступ к прерываниям, методу, с помощью которого можно попросить браузер вызвать ваш код после определенного периода
времени или даже продолжать вызовы через указанные интервалы времени.<br>
Это дает вам средства обработки фоновых задач, таких как обмен данными с помощью AJAX или даже такие средства, как анимация веб-элементов.<br>
Существует два типа прерываний — setTimeout и setInterval, сопровождающихся функциями clearTimeout и clearInterval для их выключения.
</p>

<h4>Использование функции setTimeout</h4>
<p>
При вызове функции setTimeout передается код JavaScript или имя функции и значение в миллисекундах,
отображающее продолжительность задержки запуска кода на выполнение:<br>
setTimeout(dothis, 5000)
</p>
<p>
Ваша функция dothis может иметь следующий вид:<br>
function dothis()<br>
{<br>
alert('Это ваш будильник!');<br>
}
</p>

<h4>Передача строки</h4>
<p>
Если исполняемой функции нужно передать аргумент, то функции setTimeout можно также передать строковое значение,
которое не будет выполняться, пока не наступит нужное время. Например:<br>
setTimeout("alert('Hello!')", 5000)
</p>
<p>
Фактически если после каждой инструкции ставить точку с запятой, то можно передать столько строк кода JavaScript, сколько нужно:<br>
setTimeout("document.write('Starting'); alert('Hello!')", 5000)
</p>

<h4>Повторение тайм-аутов</h4>
<p>
Для предоставления повторяющихся прерываний, создаваемых функцией setTimeout, некоторые программисты используют технологию вызова функции
setTimeout из кода, вызываемого этой же функцией, как в следующем примере, который инициирует бесконечный цикл вывода окон предупреждений:<br>
setTimeout(dothis, 5000)<br>
function dothis()<br>
{<br>
setTimeout(dothis, 5000)<br>
alert('Я вас раздражаю!')<br>
}<br><br>
Теперь окно предупреждения будет появляться каждые пять секунд.
</p>

<h4>Отмена тайм-аута</h4>
<p>
После установки тайм-аута вы можете отменить его, если предварительно сохранили значение, возвращенное при начальном вызове функции setTimeout:<br>
handle = setTimeout(dothis, 5000)<br><br>
Теперь, когда у вас есть это значение в переменной handle, вы можете отменить прерывание в любой момент, вплоть до истечения назначенного срока:<br>
clearTimeout(handle)<br><br>
В результате этого прерывание полностью забывается и код, назначенный ему для выполнения, никогда не выполняется.
</p>

<h4>Функция setInterval</h4>
<p>
Самый простой способ установки регулярных прерываний заключается в использовании функции setInterval.<br>
Она работает точно так же, как и описанная выше, за исключением того, что, проявив себя после интервала, заданного вами в миллисекундах,
она сделает это снова, после того как этот же интервал снова пройдет, и так далее до бесконечности, пока вы ее не остановите.
</p>
<p>
В примере 21.9 эта функция используется для вывода в браузере простых часов, показанных на рис. 21.4.
</p>
<p>Пример 21.9. Часы, созданные с помощью прерываний</p>
<p>
Текущее время: span id='time'>00:00:00/span>br><br>
script><br>
setInterval("showtime(O('time'))", 5000)<br>
function showtime(object)<br>
{<br>
var date = new Date()<br>
object.innerHTML = date.toTimeString().substr(0,8)<br>
}<br>
/script>
</p>

<p style='color: blue;'>Start code</p>
Текущее время: <span id='time' style='color: magenta;'>00:00:00</span><br>
<script>
setInterval("showtime(O('time'))", 5000)
function showtime(object)
{
var date = new Date()
object.innerHTML = date.toTimeString().substr(0,8)
}
</script>
<p>
При каждом вызове функции ShowTime она присваивает объекту date текущее время и дату с помощью вызова функции Date:<br>
var date = new Date()
</p>
<p>
Затем свойству innerHTML объекта, переданного функции showtime (то есть object), присваивается значение текущего времени в часах, минутах и секундах,
как определено вызовом функции toTimeString.<br> В результате возвращается строка «09:57:17 UTC+0530»,
которая затем усекается до первых восьми символов с помощью вызова функции substr:<br>
object.innerHTML = date.toTimeString().substr(0,8)
</p>

<h4>Использование функции</h4>
<p>
Чтобы воспользоваться этой функцией, сначала нужно создать объект, чье свойство innerHTML будет применено для отображения времени,
как в следующем коде HTML:<br>
Текущее время: span id='time'>00:00:00/span>
</p>
<p>
Затем в блоке кода script> вызов помещается в функцию setInterval:<br>
setInterval("showtime(O('time'))", 5000)
</p>
<p>
Этот вызов передает функции setInterval строку, содержащую следующую инструкцию, настроенную на выполнение 5 раз в секунду (каждые 5000 миллисекунд):
showtime(O('time'))
</p>
<p>
В том редком случае, когда кто-нибудь отключил на своем браузере JavaScript (что некоторые делают из соображений безопасности),
ваш JavaScript не запустится и пользователь увидит исходное значение 00:00:00.
</p>

<h4>Отмена интервала</h4>
<p>
Чтобы остановить повторяющийся интервал, при первой установке интервала путем вызова функции setInterval
вы должны пометить для себя в переменной handle дескриптор этого интервала:<br>
handle = setInterval("showtime(O('time'))", 1000)
</p>
<p>
Теперь можно остановить часы в любое время, сделав следующий вызов:<br>
clearInterval(handle)
</p>
<p>
Можно также настроить таймер на остановку через определенный период времени:<br>
setTimeout("clearInterval(handle)", 10000)<br><br>
Эта инструкция выдаст прерывание через 10 секунд (10 000 миллисекунд), которое очистит повторяющиеся интервалы.
</p>

<h4>Использование прерываний для анимации</h4>
<p>
Путем сочетания нескольких свойств CSS с повторяющимся прерыванием можно создавать всевозможные анимации и эффекты.
</p>
<p>
Код в примере 21.10 перемещает прямоугольник по верхней части окна браузера, все время увеличивая его в размерах (рис. 21.5).<br>
Когда значение переменной LEFT сбрасывается в 0, анимация начинается снова.
</p>
<p>Пример 21.10. Простая анимация</p>
<p>
style><br>
#box {<br>
position :absolute;<br>
background:orange;<br>
border :1px solid red; }<br>
/style><br><br>
/head><br>
body><br><br>
div id='box'>/div><br><br>
script><br>
SIZE = LEFT = 0<br>
setInterval(animate, 30)<br>
function animate()<br>
{<br>
SIZE += 10<br>
LEFT += 3<br>
if (SIZE == 200) SIZE = 0<br>
if (LEFT == 600) LEFT = 0<br>
S('box').width = SIZE + 'px'<br>
S('box').height = SIZE + 'px'<br>
S('box').left = LEFT + 'px'<br>
}<br>
/script>
</p>
<p style='color: olive;'>Простая анимация</p>
<div id='box' style='position:absolute; background:orange; border:1px solid red;'></div>

<script>
	SIZE = LEFT = 0
//	setInterval(animate, 50)
	function animate()
	{
		SIZE += 10
		LEFT += 3
		if (SIZE == 200) SIZE = 0
		if (LEFT == 600) LEFT = 0
			S('box').width = SIZE + 'px'
			S('box').height = SIZE + 'px'
			S('box').left = LEFT + 'px'
	}
</script>
<p>
В блоке head> документа объекту box устанавливается цвет фона 'orange' (оранжевый) со значением его границы (border) '1px solid red',
а его свойству позиционирования position задается значение absolute, чтобы ему разрешалось перемещаться по окну браузера.
</p>
<p>
Затем в функции animate происходит постоянное обновление глобальных переменных SIZE и LEFT, а их значения применяются к атрибутам стиля
width, height и left объекта box (с добавлением после каждого значения строки 'px' для указания, что значение в пикселах),
таким образом анимируя объект с частотой один раз каждые 30 миллисекунд. Тем самым задается скорость 33,33 кадра в секунду (1000 / 30 миллисекунд).
</p>

<h4>Фильтры в Internet Explorer</h4>
<p>Синтаксис:</p>
<p>
"filter:имя_фильтра(параметр1=значение, параметр2=значение,...)"<br>
Некоторые фильтры могут быть без параметров.<br>
Фильтры деляться на статические и динамические. Статические фильтры меняют вид
объекта, а сам он остается неподвижным. Динамические фильтры позволяют менять объект с
задаваемой скоростью переключения кадров.<br>
</p>
<p>
Фильтры применяют через параметр STYLE:<br>
Возьмём картинку (img.gif) и применим к ней фильтр прозрачности:<br>
IMG SRC=img.gif STYLE="filter:alpha(opacity=50)"><br>
- имеем ту же картинку, но полупрозрачную.<br>
Фильтры поддерживаются языками сценариев. Доступ к фильтрам организуется через
объектное свойство filters и атрибут ID графического элемента.
</p>
<p>
SCRIPT language="JavaScript">function Blur(inc){Pic.filters.blur.strength+=inc;} /script>...<br>
IMG ID=Pic SRC=img.gifSTYLE="filter:blur(strength=10)"OnMouseOver="javascript:Blur(20)"OnMouseOut="javascript:20)">
</p>

<p style='color: blue;'>Start code</p>
<!-- <script language='JavaScript'>function Blur(inc){pic.filters.blur.strength+=inc;}</script>-->
<img id='pic' SRC='../images/esc1.png' style='filter: Blur(strength=10);'
			O('pic').onmouseover = function() {this.filter = 'Blur.strength+=20;'}>

<!-- OnMouseOver='Blur(20)' OnMouseOut='javascript: Blur(20)'-->

<p>
O('pic').onmouseover = function() { this.src = '../images/telephone.png' }<br>
O('pic').onmouseout = function() { this.src = '../images/phone.png' }
</p>

<h4>Динамические фильтры</h4>
<p>Barn()</p>
<p>
Создает эффект "открывающейся и закрывающейся двери".
</p>

<p style='color: blue;'>Start code</p>
<p>Пример 1:</p>

<script>
//	var bToggle = 0;
	function fnToggle() {
		bToggle = 0;
		oDiv.filters[0].Apply();
// После того, как применяется метод Apply к выбранному объекту
// фильтр не запустится пока не будет вызван метод Play
		if (bToggle) { bToggle = 0; oDiv.style.backgroundColor="gold"; }
		else { bToggle = 1; oDiv.style.backgroundColor="blue";} oDiv.filters[0].Play();}
</script>

<button onclick="fnToggle()">Toggle Transition</button>

<div ID="oDiv" STYLE="height:250px; width:250px; background-color: gold;
				filter:progid:DXImageTransform.Microsoft.Barn( duration=2, motion=out, orientation=vertical);">
	This is DIV oDIV
</div>

<p>Пример 2:</p>

<script>
//var bTranState = 0;
function fnToggle1() {
	bTranState = 0;
	oTransContainer.filters[0].Apply(); 
	if (bTranState=="0") { bTranState = 1; oDIV2.style.visibility="visible"; oDIV1.style.visibility="hidden"; }
	else { bTranState = 0; oDIV2.style.visibility="hidden"; oDIV1.style.visibility="visible";}
oTransContainer.filters[0].Play();
}
</script>

<button onclick="fnToggle1()">Toggle Transition</button>

<!-- К этому элементу применяется фильтр. -->
<div id="oTransContainer" style="position: relative; top: 0px; left: 0px; width: 300px; height:300px;
							filter: progid:DXImageTransform.Microsoft.Barn(orientation=horizontal, motion=out);
">

<!-- Это первое содержимое, которое будет показано. -->
	<div id="oDIV1" style="position: relative; top:50px; left:10px; width:240px; height:160px; background:gold">
		This is DIV oDIV1 #1 
	</div>

<!-- Это содержимое, которое будет показано после применения фильтра. -->
	<div id="oDIV2" style="visibility:hidden; position: relative; top:50px; left:10px; width:240px; height:160px; background: yellowgreen; "><br>
		This is DIV oDIV2 #2 
	</div>
</div>

<p>

</p>

<h4>GradientWipe()</h4>
<p>
Создает наползание нового содержимого элемента страницы на старое, причем граница
выглядит как градиентная полоса
</p>

<p style='color: blue;'>Start code</p>
<p>Пример 1:</p>

<script>
var bToggle = 0;
function fnToggle3() { oDiv.filters[0].Apply();
// После того, как применяется метод Apply к выбранному объекту
// фильтр не запустится пока не будет вызван метод Play
	if (bToggle) { bToggle = 0; oDiv.style.backgroundColor="orange";}
	else { bToggle = 1; oDiv.style.backgroundColor="blue";} oDiv.filters[0].Play();}
</script>

<button onclick="fnToggle3()">Toggle Transition</button>
<br>
<br>

<div id="oDiv" STYLE="height:250px; width:250px; background-color: orange;
	filter:progid:DXImageTransform.Microsoft.gradientWipe( duration=3, gradientsize=0.5);">
	This is DIV oDIV
</div>

<p>Пример 2:</p>

<script>
var bTranState = 0;
function fnToggle4() { oTransContainer.filters[0].Apply();
	if (bTranState=="0") { bTranState = 1; oDIV2.style.visibility="visible"; oDIV1.style.visibility="hidden";}
	else { bTranState = 0; oDIV2.style.visibility="hidden"; oDIV1.style.visibility="visible";}
	oTransContainer.filters[0].Play(duration=2);}
</script>

<button onclick="fnToggle4()">Toggle Transition</button>

<!-- К этому элементу применяется фильтр. -->
<div id="oTransContainer" STYLE="position: relative; top: 0px; left: 0px; width: 300px;
height: 300px; filter:progid:DXImageTransform.Microsoft.Wipe( GradientSize=1.0, wipeStyle=0,
motion=forward) ">
<!-- Это первое содержимое, которое будет показано. -->
	<div id="oDIV1" STYLE="position: relative; top:50px; left:10px; width:240px;
	height:160px;background:gold">
		This is DIV oDIV1 #1
	</div>
	<!-- Это содержимое, которое будет показано после применения фильтра. -->
	<div id="oDIV2" STYLE="visibility:hidden; position: relative; top:50px; left:10px; width:240px;
	height:160px; background: yellowgreen; ">
	<br>
		This is DIV oDIV2 #2
	</div>
</div>

<h2 style='color: red; font-weight: bold;'>STYLE FILTER</h2>
<p>
Barn()<br>
filter:progid:DXImageTransform.Microsoft.Barn(duration=2, motion=out, orientation=vertical);
</p>
<p>
GradientWipe()<br>
filter:progid:DXImageTransform.Microsoft.gradientWipe(duration=3, gradientsize=0.5);
</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>

<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p><p>

</p>

<h4>-webkit-linear-gradient</h4>
<div id="example" style='position: relative;
	top:50px;
	left:10px;
	width:240px;
	height:160px;
    background: #e2e2e2;
    background: -moz-linear-gradient(top, #e2e2e2 0%, #dbdbdb 50%, #d1d1d1 51%, #fefefe 100%);
    background: -webkit-linear-gradient(top, #e2e2e2 0%,#dbdbdb 50%,#d1d1d1 51%,#fefefe 100%);
    background: -o-linear-gradient(top, #e2e2e2 0%,#dbdbdb 50%,#d1d1d1 51%,#fefefe 100%);
    background: -ms-linear-gradient(top, #e2e2e2 0%,#dbdbdb 50%,#d1d1d1 51%,#fefefe 100%);
    background: linear-gradient(top, #e2e2e2 0%,#dbdbdb 50%,#d1d1d1 51%,#fefefe 100%);
    padding: 10px;'>
Содержимое страницы
</div>
<p>
Угол может задаваться в следующих единицах:<br>
В градусах. После значения пишется deg. Полный круг равен 360deg.<br>
В градах. Обозначается как grad. Полный круг равен 400grad,<br>
В радианах. Обозначается как rad. Полный круг равен 2π или примерно 6.2832rad.<br>
В поворотах. Обозначается как turn. Один круг равен одному повороту и пишется как 1turn.
</p>
<p>
позиция<br><br>
Для записи позиции применяются ключевые слова top, bottom и left, right, а также их сочетания.<br>
Порядок слов не важен, можно написать left top или top left.<br>
В табл. 1 приведены разные позиции и тип получаемого градиента для цветов #000 и #fff (от чёрного к белому).
</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4>Передать переменную из jquery в php</h4>

<?php
if (isset($_GET['test'])) {
    echo 'Вы нажали на кнопку: ' . $_GET['test'];
      $a= $_GET['test'];
echo "<table border=1>";
for ($i=0;  $i< $a; $i=$i+1)
{
    echo '<tr>';

        for ($i2=0;  $i2 < $a ; $i2=$i2+1){
                     
            echo "<td>12</td>";
                   
        }
    echo'</tr>';
}

echo "</table>";
die();
}
?>

<span id="spantabs"><a href="#" onClick="set_mode_view(0);">закладка 1</a></span>
<span id="spantabs"><a href="#" onClick="set_mode_view(1);">закладка 2</a></span>
<span id="spantabs"><a href="#" onClick="set_mode_view(2);">закладка 3</a></span>
<span id="spantabs"><a href="#" onClick="set_mode_view(3);">закладка 4</a></span>
<span id="spantabs"><a href="#" onClick="set_mode_view(4);">закладка 5</a></span>
<br/><br/>


<div id="test_value"></div>
<script>
function set_mode_view(id)
{
    $.ajax({
        url:'css_21_dostup.php',
        data:{test:id},
        success:function(data){
            $('#test_value').text(data);
        }
    });
}
</script>

<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p style='color: blue;'>Start code</p>
<p>

</p>


		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
		
	</body>
</html>
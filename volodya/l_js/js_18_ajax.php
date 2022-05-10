<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/screen.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../js/mistakes.js"></script>
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

<title>Технологии AJAX</title>
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

<h4>XMLHttpRequest</h4>
<p>Пример 18.1. Кросс-браузерная AJAX-функция</p>
<p>
function ajaxRequest()<br>
{<br>
try // Браузер не относится к семейству IE?<br>
{ // Да<br>
var request = new XMLHttpRequest()<br>
}<br>
catch(e1)<br>
{<br>
try // Это IE 6+?<br>
{ // Да<br>
request = new ActiveXObject("Msxml2.XMLHTTP")<br>
}<br>
catch(e2)<br>
{<br>
try // Это IE 5?<br>
{ // Да<br>
request = new ActiveXObject("Microsoft.XMLHTTP")<br>
}<br>
catch(e3) // Данный браузер не поддерживает AJAX<br>
{<br>
request = false<br>
}<br>
}<br>
}<br>
return request<br>
}
</p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>
function ajaxRequest()
{
try // Браузер не относится к семейству IE?
{ // Да
var request = new XMLHttpRequest()
}
catch(e1)
{
try // Это IE 6+?
{ // Да
request = new ActiveXObject("Msxml2.XMLHTTP")
}
catch(e2)
{
try // Это IE 5?
{ // Да
request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch(e3) // Данный браузер не поддерживает AJAX
{
request = false
}
}
}
return request
}
alert (request);
</script>

<input type='button' value='Данный браузер' onclick ='ajaxRequest();' />


<p>Таблица 18.1. Свойства объектов XMLHttpRequest</p>
<table id="inventory" class="realty">
	<tr><th>Свойства</th><th>Описания</th></tr>
	<tr><td>onreadystatechange</td><td>Определяет функцию обработки события, вызываемую при изменении имеющегося в объекте свойства readyState</td></tr>
	<tr><td>readyState</td><td>Целочисленное свойство, дающее представление о состоянии запроса. Оно может иметь любое из следующих значений: 0 = неинициализирован, 1 = загружается, 2 = загружен, 3 = в состоянии диалога и 4 = завершен</td></tr>
	<tr><td>responseText</td><td>Данные, возвращенные сервером в текстовом формате</td></tr>
	<tr><td>responseXML</td><td>Данные, возвращенные сервером в формате XML</td></tr>
	<tr><td>status</td><td>Код статуса HTTP, возвращенный сервером</td></tr>
	<tr><td>statusText</td><td>Текст статуса HTTP, возвращенный сервером</td></tr>
</table>

<p>Таблица 18.2. Методы объектов XMLHttpRequest</p>
<table id="inventory" class="realty">
	<tr><th>Методы</th><th>Описания</th></tr>
	<tr><td>abort()</td><td>Отмена текущего запроса</td></tr>
	<tr><td>getAllResponseHeaders()</td><td>Возвращение всех заголовков в виде строк</td></tr>
	<tr><td>getResponseHeader(параметр)</td><td>Возвращение значения параметра в виде строки</td></tr>
	<tr><td>open('метод', 'url', 'асинхронно')</td><td>Определение используемого HTTP-метода (GET или POST), целевого URL-адреса и обязательности обработки запроса в асинхронном режиме (true или false)</td></tr>
	<tr><td>send(данные)</td><td>Отправка данных серверу назначения с использованием указанного HTTP-метода</td></tr>
	<tr><td>setRequestHeader('параметр', 'значение')</td><td>Установка в заголовок пары «параметр — значение»</td></tr>
</table>

<p>
Перечисленные свойства и методы позволяют управлять данными, отправляемыми на сервер и получаемыми в ответ,
а также выбирать методы отправки и получения этих данных.<br>
Например, можно выбрать формат запрашиваемых данных: текстовый (который может включать HTML и прочие теги) или XML.<br>
Можно также решить, какой из методов — POST или GET — следует использовать для отправки данных на сервер.
</p>

<h4>Ваша первая программа, использующая AJAX</h4>
<p>
!DOCTYPE html><br>
html><br>
head><br>
title>Пример использования AJAX/title><br>
/head><br>
body style='text-align:center'><br>
h1>Загрузка веб-страницы в контейнер DIV/h1><br>
div id='info'>Это предложение будет заменено/div><br>
script><br>
params = "url=amazon.com/gp/aw "<br>
request = new ajaxRequest()<br>
request.open("POST", "urlpost.php", true)<br>
request.setRequestHeader("Content-type",<br>
"application/x-www-form-urlencoded")<br>
request.setRequestHeader("Content-length", params.length)<br>
request.setRequestHeader("Connection", "close")<br>
request.onreadystatechange = function()<br>
{<br>
if (this.readyState == 4)<br>
{<br>
if (this.status == 200)<br>
{<br>
if (this.responseText != null)<br>
{<br>
document.getElementById('info').innerHTML =<br>
this.responseText<br>
}<br>
else alert("Ошибка AJAX: Данные не получены")<br>
}<br>
else alert( "Ошибка AJAX: " + this.statusText)<br>
}<br>
}<br>
request.send(params)<br>
function ajaxRequest()<br>
{<br>
try<br>
{<br>
var request = new XMLHttpRequest()<br>
}<br>
catch(e1)<br>
{<br>
try<br>
{<br>
request = new ActiveXObject("Msxml2.XMLHTTP")<br>
}<br>
catch(e2)<br>
{<br>
try<br>
{<br>
request = new ActiveXObject("Microsoft.XMLHTTP")<br>
}<br>
catch(e3)<br>
{<br>
request = false<br>
}<br>
}<br>
}<br>
return request<br>
}<br>
/script><br>
/body><br>
/html>
</p>

<p style='color: blue;'>Start code</p>
<h1>Загрузка веб-страницы в контейнер DIV</h1>
<div id='info' style='color: red; font-size: 1.2em; font-weight: bold;'>Это предложение будет заменено</div>
<script>
/**/
params = "url=krasavino:8080/search.php"/*url=amazon.com/gp/aw*/
request = new ajaxRequest()
request.open("POST", "js_18_ajax.php", true)/*urlpost.php*/
request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
request.setRequestHeader("Content-length", params.length)
request.setRequestHeader("Connection", "close")

request.onreadystatechange = function()
{
	if (this.readyState == 4)
	{
		if (this.status == 200)
		{
			if (this.responseText != null)
			{
				document.getElementById('info').innerHTML = this.responseText
			}
		else alert("Ошибка AJAX: Данные не получены")
		}
	else alert( "Ошибка AJAX: " + this.statusText)
	}
}
request.send(params)

function ajaxRequest()
{
	try {var request = new XMLHttpRequest()}
	catch(e1)
	{
		try {request = new ActiveXObject("Msxml2.XMLHTTP")}
		catch(e2)
		{
			try {request = new ActiveXObject("Microsoft.XMLHTTP")}
			catch(e3)
			{request = false}
		}
	}
	return request
}

</script>

<p>
Разберем этот документ и посмотрим, что он делает, начиная с первых шести строк, в которых устанавливается, что это HTML-документ,
и отображается его заголовок.<br> В следующей строке создается div>-тег с ID info, в котором изначально содержится текст: «Это предложение будет заменено».
Позже сюда будет вставлен текст, возвращенный с помощью технологии AJAX.
</p>
<p>
Следующие шесть строк нужны для создания AJAX-запроса HTTP POST.<br>
В первой строке переменной params, которая отправляется на сервер, присваивается значение, состоящее из пары «параметр = значение».
Затем создается AJAX-объект запроса.
После этого вызывается метод open, настраивающий объект на создание POST-запроса по адресу urlpost.php в асинхронном режиме.
</p>
<p>
Последние три строки в этой группе настраивают заголовки, необходимые для того, чтобы получающий сервер знал о поступлении POST-запроса.
</p>

<h4>Свойство readyState</h4>
<p>
Теперь мы наконец добрались до самых тонкостей AJAX-вызова, которые целиком базируются на использовании свойства readyState.<br>
Наряду с тем, что наша программа настраивает свойство onreadystatechange на то, чтобы при каждом изменении свойства readyState
вызывалась выбранная нами функция, «асинхронность» AJAX позволяет браузерам реагировать на пользовательский ввод и изменять содержимое экрана.<br>
В данном случае будет использоваться не отдельная функция, имеющая собственное имя, а безымянная (или анонимная) встроенная функция.
Она относится к так называемым функциям обратного вызова, поскольку вызывается при каждом изменении свойства readyState.
</p>
<p>
Синтаксис объявления функции обратного вызова, в котором применяется встроенная безымянная функция, имеет следующий вид:<br>
request.onreadystatechange = function()<br>
{<br>
if (this.readyState == 4)<br>
{<br>
// какие-нибудь действия<br>
}<br>
}
</p>
<p>
Если нужно воспользоваться отдельной функцией, имеющей собственное имя, применяется несколько иной синтаксис:<br>
request.onreadystatechange = ajaxCallback<br>
function ajaxCallback()<br>
{<br>
if (this.readyState == 4)<br>
{<br>
// какие-нибудь действия<br>
}<br>
}
</p>
<p>
При изучении табл. 18.1 можно увидеть, что у свойства readyState могут быть пять разных значений.
Но только одно из них представляет для нас интерес: значение 4, которое свидетельствует о завершении вызова AJAX.<br>
Поэтому при каждом вызове новой функции она возвращает управление без каких-либо действий до тех пор, пока свойство readyState не получит значение 4.
Когда наша функция обнаружит это значение, следующим своим действием она проверит статус вызова, чтобы убедиться в том, что он имеет значение 200,
означающее, что вызов прошел удачно.<br>
Если этот статус не равен 200, выводится окно предупреждения с сообщением об ошибке, которое содержится в свойстве statusText.
</p>
<p>
Итак, после того, как установлено, что readyState равен 4, а status равен 200, проверяется наличие значения у свойства responseText.
Если значение отсутствует, в окне предупреждения выводится сообщение об ошибке.<br>
В противном случае содержимому контейнера div> присваивается значение свойства responseText:<br>
document.getElementById('info').innerHTML = this.responseText
</p>
<p>
В этой строке с помощью метода getElementByID осуществляется ссылка на элемент info, а затем его свойству innerHTML присваивается значение,
возвращенное AJAX-вызовом.
</p>
<p>
После всех этих настроечных и подготовительных действий AJAX-запрос наконец-то посылается на сервер с помощью следующей команды,
которой передаются параметры, заранее определенные в переменной params:<br>
request.send(params)
</p>
<p>
Затем весь предыдущий код активизируется при каждом изменении свойства readyState.
В конце документа находятся метод ajaxRequest из примера 18.1 и теги, закрывающие сценарий JavaScript и код HTML.
</p>

<h4>Серверная половина AJAX-процесса</h4>
<p>Пример 18.3. urlpost.php</p>
<p>
php // urlpost.php<br>
if (isset($_POST['url'])) {<br>
	echo file_get_contents('http://' . SanitizeString($_POST['url']));<br>
}<br>
function SanitizeString($var)<br>
{<br>
$var = strip_tags($var);<br>
$var = htmlentities($var);<br>
return stripslashes($var);<br>
}
</p>

<p style='color: blue;'>Start code</p>
<?php // urlpost.php
if (isset($_POST['url'])) {
	echo file_get_contents('http://' . SanitizeString($_POST['url'])); //
}

function SanitizeString($var)
{
	$var = strip_tags($var);
	$var = htmlentities($var);
	return stripslashes($var);
}
?>
<p>
код невелик по объему и использует неизменно актуальную функцию обезвреживания содержимого строки — SanitizeString,
которая должна применяться ко всем отправляемым в адрес сервера данным.<br>
В этом случае необезвреженные данные могут привести к получению пользователем возможностей управления вашим кодом.
</p>
<p>
В этой программе для загрузки веб-страницы, которая находится по URL-адресу, представленному в POST-переменной $_POST['url'],
применяется PHP-функция file_get_contents.<br>
Эта функция обладает достаточной универсальностью, позволяющей ей загружать все содержимое файла или веб-страницы как с локального,
так и с удаленного сервера — она даже учитывает перемещенные страницы и другие перенаправления.
</p>
<p>
После набора программы можно будет вызвать в браузере файл urlpost.html, и через несколько секунд должна появиться первая страница сайта Amazon
для мобильных устройств, содержимое которой загружено в div>-контейнер, созданный нами для этих целей.<br>
Произойдет это не так быстро, как при непосредственной загрузке веб-страницы, поскольку данные переносятся дважды:
сначала на сервер, а потом с сервера на браузер.
</p>
<p>
Мы не только добились осуществления AJAX-вызова и получения ответа, возвращенного JavaScript, но и воспользовались способностью PHP
объединять совершенно не связанные друг с другом веб-объекты.<br>
Кстати, если бы мы попытались найти способ извлечения веб-страницы Amazon для мобильных устройств непосредственно через AJAX
(без обращения к PHP-модулю на стороне сервера), у нас ничего бы не вышло, поскольку существуют блоки безопасности,
не допускающие кросс-доменного применения технологии AJAX.
</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>


<h4></h4>
<p>

</p>
<p></p>
<p>

</p>

<p style='color: blue;'>Start code</p>
<script>

</script>
<p>

</p>
<p>

</p>

		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
		
	</body>
</html>
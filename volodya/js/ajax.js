// Ваша первая программа, использующая AJAX

params = "url=krasavino:8080/index.php" //amazon.com/gp/aw В первой строке переменной params, которая отправляется на сервер, присваивается значение,
															// состоящее из пары «параметр = значение».
request = new ajaxRequest() // Затем создается AJAX-объект запроса.
request.open("POST", "mysql_18_urlpost.php", true) // После этого вызывается метод open, настраивающий объект на создание POST-запроса по адресу
													// urlpost.php в асинхронном режиме.

request.setRequestHeader("Content-type", "application/x-www-form-urlencoded") // Последние три строки в этой группе
request.setRequestHeader("Content-length", params.length) // настраивают заголовки, необходимые для того,
request.setRequestHeader("Connection", "close") // чтобы получающий сервер знал о поступлении POST-запроса.

// Наряду с тем, что наша программа настраивает свойство onreadystatechange на то, чтобы при каждом изменении свойства readyState 
// вызывалась выбранная нами функция, «асинхронность» AJAX позволяет браузерам реагировать на пользовательский ввод и изменять содержимое экрана.
// В данном случае будет использоваться не отдельная функция, имеющая собственное имя, а безымянная (или анонимная) встроенная функция. 
// Она относится к так называемым функциям обратного вызова, поскольку вызывается при каждом изменении свойства readyState.
request.onreadystatechange = function() // 
{
	if (this.readyState == 4)
	{
		if (this.status == 200)
		{
// Если значение отсутствует, в окне предупреждения выводится сообщение об ошибке.
// В противном случае содержимому контейнера <div> присваивается значение свойства responseText:
// В этой строке с помощью метода getElementByID осуществляется ссылка на элемент info,
// а затем его свойству innerHTML присваивается значение, возвращенное AJAX-вызовом.
			if (this.responseText != null) {document.getElementById('info').innerHTML = this.responseText}
			else alert("Ошибка AJAX: Данные не получены")
		}
		else alert( "Ошибка AJAX: " + this.statusText)
	}
}
// После всех этих настроечных и подготовительных действий AJAX-запрос наконец-то посылается на сервер с помощью следующей команды,
// которой передаются параметры, заранее определенные в переменной params:
request.send(params)


// 
function ajaxRequest()
{
	try {var request = new XMLHttpRequest()} // Браузер не относится к семейству IE?
	catch(e1) // Да
	{
		try {request = new ActiveXObject("Msxml2.XMLHTTP")} // Это IE 6+?
		catch(e2) // Да
		{
			try {request = new ActiveXObject("Microsoft.XMLHTTP")} // Это IE 5?
			catch(e3) // Да
			{
				request = false// Данный браузер не поддерживает AJAX
			}
		}
	}
	return request
}


// Функция передачи данных выбранных оператором 'SELECT'
function selectTown()
{
	var tS = document.form.town.selectedIndex;
	var townSelected = document.form.town.options[tS].text;
	var defSelected = document.form.town.options[tS].defaultSelected;
	request.open("POST", "mysql_18_urlpost.php", true)
	
	request.onreadystatechange = function()
	{
		if (this.readyState == 4)
		{
			if (this.status == 200)
			{
				if (this.responseText != null) {
					document.getElementById('townHidden').innerHTML = townSelected;
					document.getElementById('g').innerHTML = townSelected;
					}
				else alert("Ошибка AJAX: Данные не получены")
			}
			else alert( "Ошибка AJAX: " + this.statusText)
		}
	}
request.send(params)


	function ajaxRequest()
	{
		try {var request = new XMLHttpRequest()} // Браузер не относится к семейству IE?
		catch(e1) // Да
		{
			try {request = new ActiveXObject("Msxml2.XMLHTTP")} // Это IE 6+?
			catch(e2) // Да
			{
				try {request = new ActiveXObject("Microsoft.XMLHTTP")} // Это IE 5?
				catch(e3) // Да
				{
					request = false// Данный браузер не поддерживает AJAX
				}
			}
		}
		return request
	}
}
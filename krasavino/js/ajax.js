// Ваша первая программа, использующая AJAX

params = "url=krasavino:8080/index.php" //amazon.com/gp/aw В первой строке переменной params, которая отправляется на сервер, присваивается значение,
															// состоящее из пары «параметр = значение».
request = new ajaxRequest() // Затем создается AJAX-объект запроса.
request.open("POST", "mysql_search.php", true) // После этого вызывается метод open, настраивающий объект на создание POST-запроса по адресу
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
			if (this.responseText != null) {document.getElementById('town_input').innerHTML = this.responseText;} //
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
//	alert('OK-K-k');
	var tS = document.form.town.selectedIndex;
	var townSelected = document.form.town.options[tS].text;
	var defSelected = document.form.town.options[tS].defaultSelected;
	request.open("POST", "search.php", true)
	
	request.onreadystatechange = function()
	{
		if (this.readyState == 4)
		{
			if (this.status == 200)
			{
				if (this.responseText != null) {
					window.location.href = 'search.php?townSelected='+townSelected;
					document.getElementById('divShop').style.display = 'flex';
					document.getElementById('town_hidden').style.display = 'flex';
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

// Скрыть блок
function hiddenBlock(div) {
    var x = document.getElementById(div);
//	alert('GOOD');
    x.style.display = 'none';
}

// Показать блок
function showBlock(div) {
    var x = document.getElementById(div);
//	alert('GOOD');
    x.style.display = 'flex';
}

// Показать два блока
function showTwoBlocks(div1, div2, div3) {
    var x1 = document.getElementById(div1);
	var x2 = document.getElementById(div2);
	var x3 = document.getElementById(div3);
//	alert('GOOD');
    x1.style.display = 'flex';
	x2.style.display = 'flex';
	x3.innerHTML = '';
	
}

// Скрипт для валидации формы ввода новых товаров - ЗАДЕЙСТВОВАНА В 'SEARCH.PHP'
function validateSearch(form) {
//	alert ('OK');
	fail = validateTown(form.townSelected.value)
	if (fail == "") return true
	else { alert(fail); return false }
}

// Скрипт для проверки полей формы
// Проверка заполнения даты
function validateTown(field) {return (field == "") ? "Не введено название города - ОБЯЗАТЕЛЬНО ДЛЯ ЗАПОЛНЕНИЯ!.\n" : ""}


// Скрипт для валидации формы ввода новых товаров - ЗАДЕЙСТВОВАНА В 'STORE_INSERT.PHP'
function validateStore(form) {
	fail = validateDate(form.date.value)
	fail += validateTown(form.town.value)
	fail += validateShop(form.shop.value)
	fail += validateStreet(form.street.value)
	fail += validateHouse(form.house.value)
	if (fail == "") return true
	else { alert(fail); return false }
}

// Скрипт для проверки полей формы
// Проверка заполнения даты
function validateDate(field)
{
	if (field == "") return "Не введена дата ввода информации.\n"
	else if (!/\d{4}-\d{2}-\d{2}/.test(field))
		return "Вводите дату в формате: ДД.ММ.ГГГГ.\n"
	return ""
}

// Проверка заполнения названия магазина
function validateShop(field) {return (field == "") ? "Не введено название магазина.\n" : ""}

// Проверка заполнения названия города
function validateTown(field) {return (field == "") ? "Не введено название города.\n" : ""}

// Проверка заполнения названия улицы
function validateStreet(field) {return (field == "") ? "Не введена улица.\n" : ""}

// Проверка заполнения номера дома
function validateHouse(field) {return (field == "") ? "Не введен номер дома.\n" : ""}

// Скрипт для валидации формы ввода новых товаров - ЗАДЕЙСТВОВАНА В 'SHOP_INSERT.PHP'
function validateShop(form) {
	fail = validateDate(form.date.value)
	fail += validateShop(form.shop.value)
	fail += validateGruppa(form.gruppa.value)
	fail += validateName(form.name.value)
	fail += validateCharacteristic(form.characteristic.value)
	fail += validateQuantity(form.quantity.value)
	fail += validatePrice(form.price.value)
	fail += validateAmount(form.amount.value)
	if (fail == "") return true
	else { alert(fail); return false }
}

// Скрипт для проверки полей формы
// Проверка заполнения даты
function validateDate(field)
{
	if (field == "") return "Не введена дата покупки.\n"
	else if (!/\d{4}-\d{2}-\d{2}/.test(field))
		return "Вводите дату в формате: ДД.ММ.ГГГГ.\n"
	return ""
}

// Проверка заполнения магазинов
function validateShop(field) {return (field == "") ? "Не введено название магазина.\n" : ""}

// Проверка заполнения категорий
function validateGruppa(field) {return (field == "") ? "Не введена категория товара.\n" : ""}

// Проверка заполнения наименований товаров
function validateName(field) {return (field == "") ? "Не введено наименование товара.\n" : ""}

// Проверка заполнения характеристик товаров
function validateCharacteristic(field) {return (field == "") ? "Не введены характеристики товара.\n" : ""}

// Проверка заполнения количества товаров
function validateQuantity(field)
{
	if (field == "") return "Не введено количество товара.\n"
	else if (!/\d+/.test(field) || field <=0)
		return "Количество - это целое положительное число.\n"
	return ""
}

// Проверка заполнения цены товара
function validatePrice(field)
{
	if (field == "") return "Не введена цена товара.\n"
	else if (!/\d+/.test(field) || field <=0)
		return "Цена товара - это положительное число.\n"
	return ""
}

// Проверка заполнения стоимости товара
function validateAmount(field)
{
	if (field == "") return "Не введена стоимость товара.\n"
	else if (!/\d+/.test(field) || field <=0)
		return "Стоимость товара - это положительное число.\n"
	return ""
}

// ******************************** !!
//									!!
// Блок скриптов для GALLERY.PHP	!!
//									!!
// ******************************** !!

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}


// ************************************************************************ !!
//		                                       					    		!!
// Блок скриптов для QUERY.PHP - для определения дат в отправляемых формах	!!
//		                                       					    		!!
// ************************************************************************ !!

// ЭТО ФУНКЦИИ ВВОДА ДАТЫ    
    /* функция добавления ведущих нулей */
    /* (если число меньше десяти, перед числом добавляем ноль) */
    function zero_first_format(value)
    {
        if (value < 10)
        {
            value='0'+value;
        }
        return value;
    }

    /* функция получения текущей даты и времени */
    function date_time()
    {
        var current_datetime = new Date();
        var day = zero_first_format(current_datetime.getDate());
        var month = zero_first_format(current_datetime.getMonth()+1);
        var year = current_datetime.getFullYear();
        var hours = zero_first_format(current_datetime.getHours());
        var minutes = zero_first_format(current_datetime.getMinutes());
        var seconds = zero_first_format(current_datetime.getSeconds());

        return day+"."+month+"."+year+" "+hours+":"+minutes+":"+seconds;
    }

    /* выводим текущую дату и время на сайт в блок с id "current_date_time_block" */
    /*document.getElementById('current_date_time_block').innerHTML = date_time();*/
	
	/* каждую секунду получаем текущую дату и время */
    /* и вставляем значение в блок с id "current_date_time_block2" 
    setInterval(function () {
        document.getElementById('current_date_time_block2').innerHTML = date_time();
    }, 1000);
	*/
	/* выводим текущую дату и время на сайт в поле формы с id "time_query" */
	document.getElementById('time_query').value = date_time();
	
	/* выводим текущую дату и ТЕКУЩЕЕ время на сайт в поле формы с id "send_time" */
	setInterval(function () {
        document.getElementById('send_time').value = date_time();
    }, 1000);
	
	/* выводим текущее время в формате UNIX time на сайт в поле формы с id "unix_time" */
	setInterval(function () {
        document.getElementById('unix_time').value = new Date().getTime();
    }, 1000);

// Функция O - НЕ ЗАДЕЙСТВОВАНА
function O(obj)
{
	if (typeof obj == 'object') return obj
	else return document.getElementById(obj)
}

// Функция S - НЕ ЗАДЕЙСТВОВАНА
function S(obj)
{
	return O(obj).style
}

// Функция C - НЕ ЗАДЕЙСТВОВАНА
function C(name)
{
	var elements = document.getElementsByTagName('*')
	var objects = []
	for (var i = 0 ; i < elements.length ; ++i)
		if (elements[i].className == name)
		objects.push(elements[i])
	return objects
}

// Скрипт для скрытия блока - НЕ ЗАДЕЙСТВОВАНА
function changeVisibility(divId, visible){
                document.getElementById(divId).style.display = visible ? "none": "block";
            }

// Скрипт для скрытия блока - НЕ ЗАДЕЙСТВОВАНА
function showHide() {
   var div = document.getElementById(hidden_div);
   if (div.style.display == 'none') {
     div.style.display = 'flex';
   }
   else {
     div.style.display = 'none';
   }
 }
 
 // Скрипт для перехода на якорь - ЗАДЕЙСТВОВАНА В 'SHOPS.PHP'
 function goToAnchor2(anchor) {
	var div = document.getElementById(anchor);
	var loc = document.location.toString().split('#')[0];
	document.location = loc + '#' + anchor;
	
//	alert(document.location.toString().split('#')[0]);
	
	if (div.style.display == 'none') {
     div.style.display = 'block';
   }
   else {
     div.style.display = 'none';
   }
	
	return false;
}

// Скрипт для перехода на якорь - НЕ ЗАДЕЙСТВОВАНА
 function goToAnchor(anchor) {
	var elem = document.getElementById('check');
	elem.addEventListener('click', scroll);
	
	function scroll() {
	var loc = document.location.toString().split('#')[0];
	  document.location = loc + '#' + anchor;
	  return false;
	}
}

// Скрипт для перехода на якорь - НЕ ЗАДЕЙСТВОВАНА
 function goToAnchor1(anchor) {
	 document.getElementById(anchor).scrollIntoView();
	 return false;
}

// javascript onclick прокрутки в div в центре страницы? - НЕ ЗАДЕЙСТВОВАНА
function scroll() {
    var body = document.body,
    html = document.documentElement;
var height = Math.max( body.scrollHeight, body.offsetHeight, 
                   html.clientHeight, html.scrollHeight, html.offsetHeight );
$('html, body').animate({
    scrollTop: height/2 - window.innerHeight/2
}, 200);
}

// Работа с addEventListener При этом имя события пишется без 'on': 'click' вместо 'onclick', 'mouseover' вместо 'onmouseover' и так далее. 
//Имя функции (второй параметр) пишется без кавычек и без круглых скобок - НЕ ЗАДЕЙСТВОВАНА
function event() {
	var elem = document.getElementById('test');
	elem.addEventListener('click', scroll);
	
		function scroll() {
			var body = document.body,
			html = document.documentElement;
			var height = Math.max( body.scrollHeight, body.offsetHeight, 
                   html.clientHeight, html.scrollHeight, html.offsetHeight );
			$('html, body').animate({scrollTop: height/2 - window.innerHeight/2}, 200);}
		}
		

var el = document.getElementById("id");
el.addEventListener("click", function(){alert("click1 triggered")}, false);
el.addEventListener("click", function(){alert("click2 triggered")}, false);


var btn = document.querySelector('#check');
btn.addEventListener('click', goToAnchor2(anchor));
btn.addEventListener('click', scroll);
function method2(){
  console.log("Method 2");
}
function method1(){
  console.log("Method 1");
}

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






// Проверка фамилии
function validateSurname(field)
{
	return (field == "") ? "Не введена фамилия.\n" : ""
}

// Проверка имени пользователя
function validateUsername(field)
{
	if (field == "") return "Не введено имя пользователя.\n"
	else if (field.length < 5)
		return "В имени пользователя должно быть не менее 5 символов.\n"
	else if (/[^a-zA-Z0-9_-]/.test(field))
		return "В имени пользователя разрешены только a-z, A-Z, 0-9, - и _.\n"
	return ""
}

// Проверка пароля
function validatePassword(field) {
	if (field == "") return "Не введен пароль.\n"
	else if (field.length < 6)
		return "В пароле должно быть не менее 6 символов.\n"
	else if (!/[a-z]/.test(field) || ! /[A-Z]/.test(field) ||
			!/[0-9]/.test(field))
		return "Пароль требует 1 символа из каждого набора a-z, A-Z и 0-9.\n"
	return ""
}

// Проверка возраста
function validateAge(field) {
	if (isNaN(field)) return "Не введен возраст.\n"
	else if (field < 18 || field > 110)
		return "Возраст должен быть между 18 и 110.\n"
	return ""
}

// Проверка адреса электронной почты
function validateEmail(field) {
	if (field == "") return "Не введен адрес электронной почты.\n"
	else if (!((field.indexOf(".") > 0) &&
			(field.indexOf("@") > 0)) ||
			/[^a-zA-Z0-9.@_-]/.test(field))
		return "Электронный адрес имеет неверный формат.\n"
	return ""
}

// Скрытие ненужного блока
function hiddenBlock111111(blockId) {
	var visibleBlock = document.getElementsByClassName("blockId");
	visibleBlock.style.display = "block";
	return false;
}

// Показ скрытого блока
function showDiv111111(Div) {
    var x = document.getElementById(Div);
    if(x.style.display == "none") {
        alert ('GOOD');
		x.style.display = "flex";
    } else {
        alert ('BAD');
		x.style.display = "none";
		
    }
}

// Скрыть блок
function hiddenBlock(div) {
    var x = document.getElementById(div);
	alert('GOOD');
    x.style.display = "none";
}

// Показать блок
function showBlock(div) {
    var x = document.getElementById(div);
	alert('GOOD');
    x.style.display = "flex";
}

function test() {
	document.write("Hello World");
	return;
}

// Функция для определения показа списка магазинов в зависимости от выбранного города - ПЕРВЫЙ ВАРИАНТ - БОЛВАНКА ДЛЯ БУДУЩИХ СКРИПТОВ
function selectTownNNN()
{
	var tS = document.form.town.selectedIndex;
	var Txt = "";
	var codeSelected = document.form.town.options[tS].value;
	var townSelected = document.form.town.options[tS].text;
	var defSelected = document.form.town.options[tS].defaultSelected;

	Txt="Предложено "+(document.form.town.length-1)+" городов"+
	"\nВыбран "+document.form.town.options[tS].text+
	" (value= "+document.form.town.options[tS].value+
	", index= "+document.form.town.options[tS].index+")";
//			
	if(document.form.town.options[tS].defaultSelected)
		{Txt+="\nЭтот город выбирается по умолчанию";}
		alert(Txt);
		
		alert("\ntownSelected= "+ codeSelected);
		
		if (townSelected != defSelected)
			{
				window.location.href = 'search.php?townSelected='+townSelected;
				document.getElementById('divShop').style.display = 'flex';
			
		
//		var opt= document.getElementById('town').options[0];
//		opt.value =  'box';
//		opt.text = townSelected;

//		form.document.getElementById('town').options['tval'].innerHTML='box';
		
//		document.getElementById('town').options[0].text = townSelected;
		

			
			}
}

// Функция для определения показа списка магазинов в зависимости от выбранного города - РАБОЧИЙ ВАРИАНТ
function selectTownNNNNNN()
{
	var Txt = "";
	var tS = document.form.town.selectedIndex;
	var townSelected = document.form.town.options[tS].text;
	var defSelected = document.form.town.options[tS].defaultSelected;
	document.write(townSelected);

	if (townSelected != defSelected)
	{
		window.location.href = 'search.php?townSelected='+townSelected;
		document.getElementById('divShop').style.display = 'flex';
		document.getElementById('townHidden').style.display = 'flex';
	}
	
	else if (townSelected == undefined)
	{
		Txt+="\nЭтот город выбирается по умолчанию";
		document.write(Txt);
		document.getElementById('townHidden').style.display = 'none';
		document.getElementById('divShop').style.display = 'none';
	}
}

// Функция для определения показа списка магазинов в зависимости от выбранного города - NOT РАБОЧИЙ ВАРИАНТ
function selectTownN()
{
	var tS = document.form.town.selectedIndex;
	var townSelected = document.form.town.options[tS].text;
	var defSelected = document.form.town.options[tS].defaultSelected;

	if (townSelected != defSelected)
	{
		$.get('search.php', {message:townSelected}, function(data)	{alert('Сервер ответил: '+data);});
		document.getElementById('divShop').style.display = 'flex';
		document.getElementById('townHidden').style.display = 'flex';
	}
	else
	{
		$.get('search.php', {townSelected:townSelected}, function(data)	{alert('Сервер ответил: '+data);});
		document.getElementById('townHidden').style.display = 'none';
		
	}
//	{
		
//	}
}

// Функция для определения показа списка магазинов в зависимости от выбранного города
// Функция передачи данных выбранных оператором 'SELECT'

	alert ('townSelected');
//	params = "townSelected = townSelected"
//	request = new ajaxRequest()
	request.open("POST", "search.php", true)
	
	
	request.onreadystatechange = function()
	{
		if (this.readyState == 4)
		{
			if (this.status == 200)
			{
				if (this.responseText != null) {document.getElementById('townHidden').innerHTML = townSelected}
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

// Это то, что я использую для отправки значения формы на другую страницу
function Gonder()
{
    var str = $("form").serialize();
    $.ajax({
        type: "POST",
        url: "other_page.php",
        data: str,
        success: function(data){
            $('#load').fadeOut();
            $('#ShowResult').html(data);
        }
    });
return false;
}

// Согласно документам jQuery:
$.ajax({
  type: "POST",
  url: "some.php",
  data: { name: "John", location: "Boston" }
}).done(function( msg ) {alert("Data Saved: " + msg);});


// Я пытаюсь передать переменную из моего кода javascript на PHP-код на стороне сервера.
// Я знаю, что это должно быть сделано через вызов ajax, который, я считаю, я сделал правильно, однако доступ к переменной, которую я передал из моего ajax в мой php, - это когда я сталкиваюсь с проблемами, поскольку я новичок в php. 
//Вот мой код, который у меня есть до сих пор:
$(document).ready(function() {


            $(".clickable").click(function() {
                var userID = $(this).attr('id');
                //alert($(this).attr('id'));
                $.ajax({
                    type: "POST",
                    url: 'logtime.php',
                    data: "userID=" + userID,
                    success: function(data)
                    {
                        alert("success!");
                    }
                });
            });
        });



<?php //logtime.php
$uid = isset($_POST['userID']);
//rest of code that uses $uid
?>

// Передайте данные, подобные этому, в вызов ajax
data: { userID : userID }

// И в вашем PHP сделайте следующее:
if(isset($_POST['userID']))
{
    $uid = $_POST['userID'];

    // Do whatever you want with the $uid
}

function selectTownff()
{
	var tS = document.form.town.selectedIndex;
	var townSelected = document.form.town.options[tS].text;
	var defSelected = document.form.town.options[tS].defaultSelected;
	
	$.ajax({
        url:'search.php',
        data:{townSelected:townSelected},
        success:function(data){
            $('#townHidden').text(data);
        }
    });
}

function selectTownss()
{
	alert ('OK');
	var tS = document.form.town.selectedIndex;
	var townSelected = document.form.town.options[tS].text;
	var defSelected = document.form.town.options[tS].defaultSelected;
	
	var ob = {
  'townSelected':townSelected
 }

$(".for_button").click(function() {
  $.ajax({
 
 type:'POST',
 url:'search.php',
 dataType:'json',
 data:"param="+JSON.stringify(ob),
 success:function(html) {
$("<p class='for_content'>" + html['title'] + "</p>").
 prependTo(".content").
 hide().
 fadeIn(500);
 }
  });
 
 });
}

function selectTown()
alert('OK');
{
//        var name = 20;  вот эта переменная

			var tS = document.form.town.selectedIndex;
			var townSelected = document.form.town.options[tS].text;
			var defSelected = document.form.town.options[tS].defaultSelected;
			
			alert(townSelected);
 
        $.ajax({
            type: 'POST', // метод
            url: 'search.php', // скрипт который получит отправление
//            dataType: 'json',  тип послания
            data: townSelected,//{  тут создаем json со значением которое нужно
                
//            }
//            cache: false,
			success: function (data) {alert('Success' + data);}, // необязательная функция, срабатывает при успехе
            error: function () {alert('Error');}// необязательная функция, срабатывает при неудаче
             
        });
return false;
}
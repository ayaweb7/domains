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
			

// Функция для определения показа списка магазинов в зависимости от выбранного города - РАБОЧИЙ ВАРИАНТ
function selectTown()
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

// Вроде рабочий вариант
function selectTownQQQQQ()
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

// Функция передачи данных выбранных оператором 'SELECT'
function selectTownQQQ()
{
	var tS = document.form.town.selectedIndex;
	var townSelected = document.form.town.options[tS].text;
	var defSelected = document.form.town.options[tS].defaultSelected;
	request.open("GET", "search.php", true)
	
	request.onreadystatechange = function()
	{
		if (this.readyState == 4)
		{
			if (this.status == 200)
			{
				if (this.responseText != null) {
					document.getElementById('townHidden').innerHTML = townSelected;
					document.getElementById('townHidden1').innerHTML = townSelected;
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
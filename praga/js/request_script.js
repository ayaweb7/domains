// Функция для проверки условий при заполнении цели для вывода последующих блоков 
function aimSelect(f) {
    var aim = document.getElementById('aim');
    var mer = document.getElementById('mer');
    var contact = document.getElementById('contact');
    var otherAim = document.getElementById('otherAim');
    var sell = document.getElementById('sell');
    var buy = document.getElementById('buy');
    var get = document.getElementById('get');
    var rent = document.getElementById('rent');
    var swap = document.getElementById('swap');
     n = f.aim.selectedIndex
     if(f.aim.options[n].value == 'продать') {
        aim.style.left = '30%';
        otherAim.style.display = 'none';
        sellTitle.style.display = 'inline';
        buyTitle.style.display = 'none';
        getTitle.style.display = 'none';
        rentTitle.style.display = 'none';
        swapTitle.style.display = 'none';
        wantTitle.style.display = 'none';
        sell.style.display = 'inline';
        buy.style.display = 'none';
        get.style.display = 'none';
        rent.style.display = 'none';
        swap.style.display = 'inline';
        contact.style.display = 'inline';
        }
        
        
        else if (f.aim.options[n].value == 'купить') {
            aim.style.left = '30%';
            otherAim.style.display = 'none';
            sellTitle.style.display = 'none';
            buyTitle.style.display = 'inline';
            getTitle.style.display = 'none';
            rentTitle.style.display = 'none';
            swapTitle.style.display = 'none';
            wantTitle.style.display = 'none';
            sell.style.display = 'inline';
            buy.style.display = 'inline';
            get.style.display = 'none';
            rent.style.display = 'none';
            swap.style.display = 'inline';
            contact.style.display = 'inline';
        }
        
        else if (f.aim.options[n].value == 'сдать') {
            aim.style.left = '30%';
            otherAim.style.display = 'none';
            sellTitle.style.display = 'none';
            buyTitle.style.display = 'none';
            getTitle.style.display = 'inline';
            rentTitle.style.display = 'none';
            swapTitle.style.display = 'none';
            wantTitle.style.display = 'none';
            sell.style.display = 'inline';
            buy.style.display = 'none';
            get.style.display = 'inline';
            rent.style.display = 'none';
            swap.style.display = 'inline';
            contact.style.display = 'inline';
        }
        
        else if (f.aim.options[n].value == 'снять') {
            aim.style.left = '30%';
            otherAim.style.display = 'none';
            sellTitle.style.display = 'none';
            buyTitle.style.display = 'none';
            getTitle.style.display = 'none';
            rentTitle.style.display = 'inline';
            swapTitle.style.display = 'none';
            wantTitle.style.display = 'none';
            sell.style.display = 'none';
            buy.style.display = 'none';
            get.style.display = 'inline';
            rent.style.display = 'inline';
            swap.style.display = 'inline';
            contact.style.display = 'inline';
        }
        
        else if (f.aim.options[n].value == 'обмен') {
            aim.style.left = '30%';
            otherAim.style.display = 'none';
            sellTitle.style.display = 'none';
            buyTitle.style.display = 'none';
            getTitle.style.display = 'none';
            rentTitle.style.display = 'none';
            swapTitle.style.display = 'inline';
            wantTitle.style.display = 'inline';
            sell.style.display = 'inline';
            buy.style.display = 'none';
            get.style.display = 'none';
            rent.style.display = 'inline';
            swap.style.display = 'inline';
            contact.style.display = 'inline';
        }
        
        else if (f.aim.options[n].value == 'другое') {
            aim.style.left = '12.5%';
            otherAim.style.display = 'inline';
            sellTitle.style.display = 'none';
            buyTitle.style.display = 'none';
            getTitle.style.display = 'none';
            rentTitle.style.display = 'none';
            swapTitle.style.display = 'none';
            wantTitle.style.display = 'none';
            sell.style.display = 'none';
            buy.style.display = 'none';
            get.style.display = 'none';
            rent.style.display = 'none';
            swap.style.display = 'none';
            contact.style.display = 'inline';
        }
      else {
            aim.style.left = '30%';
            otherAim.style.display = 'none';
            sellTitle.style.display = 'none';
            buyTitle.style.display = 'none';
            getTitle.style.display = 'none';
            rentTitle.style.display = 'none';
            swapTitle.style.display = 'none';
            wantTitle.style.display = 'none';
            sell.style.display = 'none';
            buy.style.display = 'none';
            get.style.display = 'none';
            rent.style.display = 'none';
            swap.style.display = 'none';
            contact.style.display = 'none';
     }      
}



// Функция для вывода поля ДРУГАЯ НЕДВИЖИМОСТЬ
function typeSelect(f) {
    var aim = document.getElementById('aim');
    var otherType = document.getElementById('otherType');
    var otherType1 = document.getElementById('otherType1');
    var type_help = document.getElementById('type_help');
    var sell = document.getElementById('sell');
     n = f.type.selectedIndex
     if(f.type.options[n].value == 'другая недвижимость') {
    otherType.style.display = 'inline';
    sell.style.left = '12.5%';
    otherType1.style.width = "20em";
    aim.style.width = otherType1.style.width + type.style.width;
    aim.style.left = '12.5%';
        }
    else {
    otherType.style.display = 'none';
    otherType1.value = '';
    type_help.innerHTML = '';
    sell.style.left = '30%';
    otherType1.style.width = "0";
    aim.style.width = "30em";
    aim.style.left = '30%';
    }
}


// Функция для вывода поля ДРУГОЙ ГОРОД
function regionSelect(f) {
    var otherRegion = document.getElementById('otherRegion');
    var otherRegion1 = document.getElementById('otherRegion1');
    var region_help = document.getElementById('region_help');
    var sell = document.getElementById('sell');
     n = f.region.selectedIndex
     if(f.region.options[n].value == 'другой город') {
    otherRegion.style.display = 'inline';
    sell.style.left = '12.5%';
        }
    else {
    otherRegion.style.display = 'none';
    otherRegion1.value = '';
    region_help.innerHTML = '';
    sell.style.left = '30%';
    }
}


// Функция для вывода поля ДРУГАЯ УЛИЦА
function streetSelect(f) {
    var otherStreet = document.getElementById('otherStreet');
    var otherStreet1 = document.getElementById('otherStreet1');
    var street_help = document.getElementById('street_help');
    var sell = document.getElementById('sell');
     n = f.street.selectedIndex
     if(f.street.options[n].value == 'другая улица') {
    otherStreet.style.display = 'inline';
    sell.style.left = '12.5%';
        }
    else {
    otherStreet.style.display = 'none';
    otherStreet1.value = '';
    street_help.innerHTML = '';
    sell.style.left = '30%';
    }
}

// Функция для вывода поля ДРУГОЕ УЛУЧШЕНИЕ
function improvedSelect(f) {
    var otherImproved = document.getElementById('otherImproved');
    var otherImproved1 = document.getElementById('otherImproved1');
    var improved_help = document.getElementById('improved_help');
    var sell = document.getElementById('sell');
     n = f.improved.selectedIndex
     if(f.improved.options[n].value == 'другое') {
    otherImproved.style.display = 'inline';
    sell.style.left = '12.5%';
        }
    else {
    otherImproved.style.display = 'none';
    otherImproved1.value = '';
    improved_help.innerHTML = '';
    sell.style.left = '30%';
    }
}
  

// Функция для вывода поля ДРУГАЯ ОПЛАТА
function paymentSelect(f) {
    var otherPayment = document.getElementById('otherPayment');
    var otherPayment1 = document.getElementById('otherPayment1');
    var payment_help = document.getElementById('payment_help');
    var buy = document.getElementById('buy');
     n = f.payment.selectedIndex
     if(f.payment.options[n].value == 'другой вид оплаты') {
    otherPayment.style.display = 'inline';
    buy.style.left = '12.5%';
        }
    else {
    otherPayment.style.display = 'none';
    otherPayment1.value = '';
    payment_help.innerHTML = '';
    buy.style.left = '30%';
    }
}
  

// Функция для вывода поля ДРУГАЯ НЕДВИЖИМОСТЬ при ОБМЕНЕ и АРЕНДЕ
function swapTypeSelect(f) {
    var otherSwapType = document.getElementById('otherSwapType');
    var otherSwapType1 = document.getElementById('otherSwapType1');
    var swapType_help = document.getElementById('swapType_help');
    var rent = document.getElementById('rent');
     n = f.swapType.selectedIndex
     if(f.swapType.options[n].value == 'другая недвижимость') {
    otherSwapType.style.display = 'inline';
    rent.style.left = '12.5%';
        }
    else {
    otherSwapType.style.display = 'none';
    otherSwapType1.value = '';
    swapType_help.innerHTML = '';
    rent.style.left = '30%';
    }
}


// Функция для вывода поля ДРУГОЙ СРОК при АРЕНДЕ
function limitationSelect(f) {
    var otherLimitation = document.getElementById('otherLimitation');
    var otherLimitation1 = document.getElementById('otherLimitation1');
    var limitation_help = document.getElementById('limitation_help');
    var get = document.getElementById('get');
     n = f.limitation.selectedIndex
     if(f.limitation.options[n].value == 'другой срок') {
    otherLimitation.style.display = 'inline';
    get.style.left = '12.5%';
        }
    else {
    otherLimitation.style.display = 'none';
    otherLimitation1.value = '';
    limitation_help.innerHTML = '';
    get.style.left = '30%';
    }
}

// Функция проверяет правильность заполнения полей по шаблонам 
function validateRegEx(regex, input, helpText, helpMessage) {
        // Смотрим корректны ли введенные данные
    if (!regex.test(input)) {
            
          // Данные не корректны - выдаем сообщение и присваеваем значению ложь
        if (helpText != null)
            helpText.innerHTML = helpMessage;
          return false;
    }
    else {
          // Данные в порядке - очищаем сообщение и присваеваем значению истину
         if (helpText != null)
            helpText.innerHTML = "";
            
          return true;
        }
}


// Проверка на наличие текста в любом из полей формы
function validateNonEmpty(inputField, helpText) {
        // Сообщаем пользователю, что данные не введены
        return validateRegEx(/.+/,
         inputField.value, helpText,
        "Пожалуйста, введите данные!");
}

// Проверка правильности заполнения адреса электронной почты
function validateEmail(inputField, helpText) {
        // Проверка правильности введенного индекса
        // Сначала проверяем количество введенных символов - должно быть 5.
        
    if (!validateNonEmpty(inputField, helpText))
        return false;
        
          // Проверяем, являются ли данные адресом электронной почты
          return validateRegEx(/^[\w\.-_\+]+@[\w-]+(\.\w{2,3})+$/, inputField.value, helpText,
            "Пожалуйста, введите адрес правильно (например, test@test.ru)");
}

// Окончательная проверка заполнения полей данных перед отправкой заявки на сервер
function placeOrder(form) {
        // Функция производит окончательную проверку по всем полям формы
    
    if (validateNonEmpty(form["name"], form["name_help"]) &&
        validateNonEmpty(form["lastname"], form["lastname_help"]) &&
        validateEmail(form["email"], form["email_help"])) {
          
          // Отправить распоряжение на сервер
        form.submit();
    }
         
    else {
        alert("Будьте внимательны! Остались незаполненные поля!");
    }
    
}
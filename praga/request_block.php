<?php 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */

$result = mysql_query("SELECT title,meta_d,meta_k FROM settings WHERE page='index'",$db);

$myrow = mysql_fetch_array($result);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $myrow['title'] ?></title>
<meta name="keywords" content="<?php echo $myrow['meta_k'] ?>" />
<meta name="description" content="<?php echo $myrow['meta_d'] ?>" />
<link href="css/screen.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/request_script.js"></script>
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
<style type="text/css">
    form table {
        outline: 1px solid #ff0000;
    }
    table tr td {
        border: 1px solid #ccc;
    }
</style>
</head>

<body id="request">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header.php"); ?>

<!-- Начало кода REQUEST -->
<h1>Подать заявку</h1>

<form name='form' action='admin/request_email.php' method='post'>
<h2>Заполнить форму</h2>
<!-- Цель сделки -->
<div id='aim'>
    <table>
        <tr><td colspan="2" class="topic aim">Цель сделки</td></tr>
        <tr><td class="select">
                <select name='aim' size='1' onchange='aimSelect(this.form)'>
                    <option value=''></option>
                    <option value='продать'>продать</option>
                    <option value='купить'>купить</option>
                    <option value='сдать'>сдать</option>
                    <option value='снять'>снять</option>
                    <option value='обмен'>обмен</option>
                    <option value='другое'>другое</option>
                </select>
             </td>


                               
<td id='otherAim' class="select"><span>Укажите Ваш интерес:<em class="help"> ***</em></span><br/>
	<textarea name='otherAim' rows='3' cols='43'>-</textarea>
</td></tr></table>
</div> <!-- aim -->

<div id="mer">
<!-- Заголовки-->
<h3 id="sellTitle">Продажа:</h3>
<h3 id="buyTitle">Купля:</h3>
<h3 id="getTitle">Сдача жилья в аренду:</h3>
<h3 id="rentTitle">Сниму жильё:</h3>
<h3 id="swapTitle">Обмен - имеющаяся недвижимость:</h3>

<!-- ПРОДАТЬ -->
                              
<div id="sell">

<!--  -->

<table>
    
<!-- Вид недвижимости -->    
<tr><td colspan="2" class="topic input">Вид недвижимости</td></tr>
<tr>
<td class="select">
	<select id='type' name='type' size='1' onchange='typeSelect(this.form)'>
        <option>1-комнатная квартира</option>
        <option>2-х комнатная квартира</option>
        <option>3-х комнатная квартира</option>
        <option>4-х комнатная квартира</option>
        <option>секция</option>
        <option>гостинка</option>
        <option>частный сектор</option>
        <option>дача</option>
        <option>дом</option>
        <option>участок</option>
        <option value='другая недвижимость'>другое</option>
    </select>
</td>

    
    
<td id='otherType' class="select"><span>Ваша недвижимость:<em class="help"> *</em></span><br/>
	<input type='text' id='otherType1' name='otherType' size='20' value='-' />
        <em id="type_help" class="help"></em>
</td></tr>



<!-- Регион -->
<tr><td colspan="2" class="topic input">Город</td></tr>
<tr>
<td class="select">
    <select id='region' name='region' size='1' onchange='regionSelect(this.form)'>
        <option>Коряжма</option>
        <option>Котлас</option>
        <option>загород</option>
        <option value='другой город'>другой город</option>
   </select>
</td>


  
<td id='otherRegion' class="select"><span>Местонахождение Вашей недвижимости:<em class="help"> ***</em></span><br/>
	<input type='text' id='otherRegion1' name='otherRegion' size='20' value='-' />
        <em id="region_help" class="help"></em>
</td></tr>
                                                           
<!-- Улица -->
<tr><td colspan="2" class="topic input">Улица в Коряжме</td></tr>
<tr>
<td class="select">
    <select id='street' name='street' size='1' onchange="streetSelect(this.form)">
        <option>-</option>
        <option>Архангельская</option>
        <option>Восточная</option>
        <option>Глейха</option>
        <option>Гоголя</option>
        <option>Дыбцына</option>
        <option>Зелёная</option>
        <option>Кирова</option>
        <option>Космонавтов</option>
        <option>Кутузова</option>
        <option>Ленина</option>
        <option>Лермонтова</option>
        <option>Ломоносова</option>
        <option>Набережная</option>
        <option>Пушкина</option>
        <option>Сафьяна</option>
        <option>Свердлова</option>
        <option>Советская</option>
        <option>Театральная</option>
        <option>Чапаева</option>
        <option>Черёмуха</option>
        <option>Черёмуха (до переезда)</option>
        <option value='другая улица'>другая улица</option>
    </select>
</td>
                            
<td id='otherStreet' class="select"><span>Ваша улица:<em class="help"> ***</em></span><br/>
	<input type='text' id='otherStreet1' name='otherStreet' size='20' value='-' />
        <em id="street_help" class="help"></em>
</td></tr>
                             

<!-- Дом -->
<tr><td colspan="2" class="topic">№ дома (необязательно)</td></tr>
<tr id='house'>
   <td class="select"><input type='text' name='house' size='10' value='-'/>
</td></tr>

<!-- Характеристики -->
<tr><td colspan="2" class="topic">Площадь, кв.м.</td></tr>
<tr id='square'>
    <td class="select"><input type='text' name='square' size='10' value='-'/>
</td></tr>  
                              
<tr><td colspan="2" class="topic">Балкон</td></tr>
<tr>
<td class="select">
    <select id='balcony' name='balcony' size='1'>
       <option>-</option>
       <option>балкон</option>
       <option>без балкона</option>
       <option>лоджия</option>
    </select>
</td></tr>

<tr><td colspan="2" class="topic">Стены</td></tr>                             
<tr>
<td class="select">
    <select id='wall' name='wall' size='1'>
        <option>-</option>
        <option>кирпич</option>
        <option>панель</option>
        <option>дерево</option>
    </select>
</td></tr>

<tr><td colspan="2" class="topic input">Улучшение</td></tr>                              
<tr>
<td class="select">
    <select id='improved' name='improved' onchange='improvedSelect(this.form)'>
        <option>-</option>
        <option>сталинская</option>
        <option>улучшенная</option>
		<option>комната в квартире</option>
        <option>душ</option>
        <option value='другое'>другое</option>
    </select>
</td>


                            
<td id='otherImproved' class="select"><span>Ваше улучшение:<em class="help"> ***</em></span><br/>
	<input type='text' id='otherImproved1' name='otherImproved' size='20' value='-' />
        <em id="improved_help" class="help"></em>
</td></tr>

<tr><td colspan="2" class="topic">Ремонт</td></tr>                              
<tr>
<td class="select">
    <select id='repair' name='repair' size='1'>
       <option>-</option>
       <option>не важно</option>
       <option>без ремонта</option>
       <option>нужен ремонт</option>
       <option>ремонт сделан</option>
       <option>евроремонт</option>
    </select>
</td></tr>

<tr><td colspan="2" class="topic">Этаж</td></tr>                             
<tr>
<td class="select">
    <select id="floor1" name="floor" size='1'>
        <option>-</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
        <option>Выше 12</option>
    </select>
</td></tr>

<!-- Цена -->
<tr><td colspan="2" class="topic">Цена</td></tr>
<tr id='price'>
	<td class="select"><input type='text' name='price' size='10' value='-'/>
</td></tr>
</table>



</div> <!-- sell -->

<!-- КУПИТЬ -->
<div id="buy" style="outline: 1px solid #00ff00;">
<table>
    
<!-- Вид оплаты -->    
<tr><td colspan="2" class="topic input">Вид оплаты</td></tr>
<tr>
<td class="select">
	<select id='payment' name='payment' size='1' onchange='paymentSelect(this.form)'>
        <option>-</option>
        <option>безналичный расчет</option>
        <option>наличные</option>
        <option>материнский капитал</option>
        <option>ипотека</option>
        <option value='другой вид оплаты'>другое</option>
    </select>
</td>
    
<td id='otherPayment' class="select"><span>Укажите вид оплаты:<em class="help"> ***</em></span><br/>
	<input type='text' id='otherPayment1' name='otherPayment' size='20' value='-' />
        <em id="payment_help" class="help"></em>
</td></tr></table>

</div> <!-- buy -->



<!-- СНЯТЬ -->
<h3 id="wantTitle">Желательный обмен:</h3>
<div id="rent" style="outline: 1px solid #ccc;">
<table>
    
<!-- Вид недвижимости -->    
<tr><td colspan="2" class="topic input">Вид недвижимости</td></tr>
<tr><td class="select">
	<select id='swapType' name='type1' size='1' onchange='swapTypeSelect(this.form)'>
        <option>1-комнатная квартира</option>
        <option>2-х комнатная квартира</option>
        <option>3-х комнатная квартира</option>
        <option>секция</option>
        <option>гостинка</option>
        <option value='другая недвижимость'>другая недвижимость</option>
    </select>
</td>


    
<td id='otherSwapType' class="select"><span>Ваша недвижимость:<em class="help"> ***</em></span><br/>
	<input type='text' id='otherSwapType1' name='otherType1' size='20' value='-' />
        <em id="swapType_help" class="help"></em>
</td></tr></table>

</div> <!-- rent -->


<!-- СДАТЬ -->
<div id="get" style="outline: 1px solid #00ffff;">
<table>
    
<!-- Срок аренды -->    
<tr><td colspan="2" class="topic input">На какой срок</td></tr>
<tr>
<td class="select">
	<select id='limitation' name='limitation' size='1' onchange='limitationSelect(this.form)'>
        <option>-</option>
        <option>посуточно</option>
        <option>более 15 суток</option>
        <option>1 месяц</option>
        <option>3 месяца</option>
        <option>6 месяцев</option>
        <option>1 год</option>
        <option>более 1 года</option>
        <option value='другой срок'>другое</option>
    </select>
</td>


    
<td id='otherLimitation' class="select"><span>Укажите срок аренды:<em class="help"> ***</em></span><br/>
	<input type='text' id='otherLimitation1' name='otherLimitation' size='20' value='-' />
        <em id="limitation_help" class="help"></em>
</td></tr></table>

</div> <!-- get -->



<!-- ОБМЕН -->
<div id="swap" style="outline: 1px solid #ff00ff;">
<table>
<tr><td colspan="2" class="topic input">Дополнительно</td></tr>
<tr><td id='extra' class="select">
	<textarea name='extra' rows='3' cols='35'>-</textarea>
</td></tr></table>

</div> <!-- swap -->
</div>  <!-- mer -->


<div id="contact">
<h2>Заполните контактные данные для связи</h2>
    <table>
         <tr id='lastname'>
			<td class="right"><span>Фамилия</span></td> 
			<td> <input type='text' name='lastname' size='10' value='' autofocus onblur="validateNonEmpty(this, document.getElementById('lastname_help'))" />
        </td></tr>
        <tr><td colspan="2"><em id="lastname_help" class="help"></em></td></tr>
        
        
        <tr id='name'>
            <td class="right"><span>Имя</span></td> 
            <td><input type='text' name='name' size='10' value='' autofocus onblur="validateNonEmpty(this, document.getElementById('name_help'))" />
        </td></tr>
        <tr><td colspan="2"><em id="name_help" class="help"></em></td></tr>
        
                            
        <tr id='email'>
			<td class="right"><span>Адрес электронной почты</span></td> 
			<td> <input type='text' name='email' size='10' value='' autofocus onblur="validateEmail(this, document.getElementById('email_help'))"/>
        </td></tr>
        <tr><td colspan="2"><em id="email_help" class="help"></em></td></tr>
        
                              
        <tr id='phone'>
			<td class="right"><span>Телефон</span></td> <td>
				<input type='text' name='phone' size='10' value='+7'/>
        </td></tr>
                              
        <tr id='mode'>
			<td class="right"><span>Укажите другой способ для связи с Вами</span></td> <td>
				<input type='text' name='mode' size='10' value='-'/>
        </td></tr></table>


<input class='button' type="button" value='Отправить заявку на обработку' style='margin-left:20px;' onclick="placeOrder(this.form);"/>
<input class='button' type='reset' value='Сбросить'/>
</div> <!-- contact -->
</form>

<!-- Конец кода REQUEST -->  


<!-- Подключаем ACTIVITIES -->
		<?php include ("blocks/activities.php"); ?>


<!-- Подключаем FOOTER -->
		<?php include ("blocks/footer.php"); ?>

</body>
</html>
<html>

<head>
	<title>Форма заявки с сайта</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="shortcut icon" type="image/ico" href="img/favicon.ico" />
<!-- jQuery -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<script src="js/jquery-3.6.0.min.js"></script>	
<!-- Маска ввода номера телефона -->
<!-- jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
</head>

<body>
<!----> 
<div class="form-wrapper"> 
	<form class="contact-form" id="contact-form_1" method="POST"> <!-- action="php/mysql_form_insert.php" class="ajaxform"-->
		<p class="contact-form__title">Заказать рекламу</p>
		<p class="contact-form__description"></p>
<!-- ИМЯ -->
		<div class="contact-form__input-wrapper">
			<input type="text" id="name" name="name" class="contact-form__input contact-form__input_name"
				placeholder="Введите ваше имя">
			<div class="contact-form__error contact-form__error_name"></div>
		</div>
<!-- ТЕЛЕФОН -->
		<div class="contact-form__input-wrapper">
			<input type="text" id="tel" name="tel" class="contact-form__input contact-form__input_tel"
				placeholder="Введите ваш телефон">
			<div class="contact-form__error contact-form__error_tel"></div>
		</div>
<!-- ПОЧТА -->
		<div class="contact-form__input-wrapper"> 
			<input type="email" id="email" name="email" class="contact-form__input contact-form__input_email"
				placeholder="Введите ваш email">
			<div class="contact-form__error contact-form__error_email"></div>
		</div>
<!-- СООБЩЕНИЕ -->
		<div class="contact-form__input-wrapper">		
			<textarea id="mess" name="mess" class="contact-form__input contact-form__text"
				placeholder="Введите ваше сообщение"></textarea>
			<div class="contact-form__error contact-form__error_text"></div>
		</div>
<!-- БРАУЗЕР И ДРУГИЕ СВОЙСТВА ПОЛЬЗОВАТЕЛЯ -->
        <div class="contact-form__input-wrapper">		
			<input type="hidden" id="ip" name="ip" />
			<input type="hidden" id="location" name="location" />
			<input type="hidden" id="city" name="city" />
			<input type="hidden" id="region" name="region" />
			<input type="hidden" id="hostname" name="hostname" />
			<input type="hidden" id="brauser" name="brauser" />
			<input type="hidden" id="version" name="version" />
			<input type="hidden" id="os" name="os" />
		</div>	
<!-- ДАТА, ВРЕМЯ -->
		<div class="contact-form__input-wrapper">		
			<input type="hidden" id="start_time" name="start_time" action="javascript:date_time()" />
			<input type="hidden" id="send_time" name="send_time" action="javascript:date_time()" />
			<input type="hidden" id="unix_time" name="unix_time" />
		</div>
<!-- КНОПКА "ОТПРАВИТЬ ЗАЯВКУ" -->
		<button class="contact-form__button" type="submit" id="submit"> Отправить заявку </button>
	</form>
</div>

<!-- Answer stackoverflow
<div id="ip1"></div>
<div id="address"></div>
<div id="details"></div>
 -->
<div id="error-block-id"></div>

<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';
?>

<script src="/mail/js/mail.js"></script>
<script src="/mail/js/browser.js"></script>
<!--<script src="/mail/js/detect.js"></script>-->

</body>
</html>
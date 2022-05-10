(function ($) {
	$(".contact-form").submit(function (event) {
		event.preventDefault();
		let form = $('#' + $(this).attr('id'))[0];

		// Сохраняем в переменные дивы, в которые будем выводить текст ошибки
		let inpNameError = $(this).find('.contact-form__error_name');
		let inpEmailError = $(this).find('.contact-form__error_email');
		let inpTelError = $(this).find('.contact-form__error_tel');
		let inpTextError = $(this).find('.contact-form__error_text');
		let inpAgreementError = $(this).find('.contact-form__error_agreement');
		let inpFileError = $(this).find('.contact-form__error_file');

		// Сохраняем в переменную див, в который будем выводить сообщение формы
		let formDescription = $(this).find('.contact-form__description');

		let fd = new FormData(form);
		$.ajax({
			url: "/mail/php/mail.php",
			type: "POST",
			data: fd,
			processData: false,
			contentType: false,
			success: function success(res) {
				console.log(res);
				let respond = $.parseJSON(res);
				
				if (respond.name) {
					inpNameError.text(respond.name);
				} else {
					inpNameError.text('');
				}

				if (respond.tel) {
					inpTelError.text(respond.tel);
				} else {
					inpTelError.text('');
				}

				if (respond.email) {
					inpEmailError.text(respond.email);
				} else {
					inpEmailError.text('');
				}

				if (respond.mess) {
					inpTextError.text(respond.mess);
				} else {
					inpTextError.text('');
				}
/*				
				if (respond.file) {
					inpFileError.text(respond.file);
				} else {
					inpFileError.text('');
				}

				if (respond.agreement) {
					inpAgreementError.text(respond.agreement);
				} else {
					inpAgreementError.text('');
				}
*/
				if (respond.attantion) {
					formDescription.text(respond.attantion).css('color', '#e84a66').fadeIn();
				} else {
					formDescription.text('');
				}
/*
				if (respond.success) {
					formDescription.text(respond.success).fadeIn();
					setTimeout(() => {
						formDescription.fadeOut("slow");
					}, 4000);
					setTimeout(() => {
						formDescription.text('');
					}, 5000);
				}
*/

				if (respond.success) {
					window.location.replace("/thank-you-page.php?status=success"); 
				}
			},
		});
	});
}(jQuery));



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

	return year+"-"+month+"-"+day+" "+hours+":"+minutes+":"+seconds;
}


/* выводим текущую дату и ТЕКУЩЕЕ время на сайт в поле формы с id "send_time" */
setInterval(function () {
	document.getElementById('send_time').value = date_time();
}, 1000);

// Маска ввода номера телефона
$(function() {
			$('.contact-form__input_tel').mask('+7(000) 000-00-00');
		});
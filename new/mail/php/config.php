<?
	// *** Настройка обязательности полей, в случае если они присутствуют в вашей форме

	// Имя
	const NAMEISREQUIRED = true;
	const MSGSNAMEERROR = "⚠ Поле обязательно для заполнения";

	// Телефон
	const TELISREQUIRED = false;
	const MSGSTELERROR = "⚠ Поле обязательно для заполнения";

	// Email
	const EMAILISREQUIRED = false;
	const MSGSEMAILERROR = "⚠ Поле обязательно для заполнения";
	const MSGSEMAILINCORRECT = "⚠ Некорректный почтовый адрес";

	// Текстовое поле
	const TEXTISREQUIRED = true;
	const MSGSTEXTERROR = "⚠ Поле обязательно для заполнения";

	// Файл
	const FILEISREQUIRED = false;
	const MSGSFILEERROR = "⚠ Забыли добавить файл";

	// Соглашение
	const AGGREMENTISREQUIRED = false;
	const MSGSAGGREMENTERROR = "⚠ Примите пользовательское соглашение"; 

	// Сообщение об успешной отправке
	const MSGSSUCCESS = "Заявка успешно отправлена на почту!";

	// ***YANDEX - 'ssl://smtp.yandex.ru' SMTP *** GOOGLE - 'smtp.gmail.com' //

//		require_once($_SERVER['DOCUMENT_ROOT'] . '/mail/phpmailer/smtp.php');
//		const HOST = 'smtp.gmail.com';
//		const LOGIN = 'ayaweb7@gmail.com';
//		const PASS = 'arteeva12';
//		const PORT = '465';

	// *** /SMTP *** //

  // Почта с которой будет приходить письмо
	const SENDER = 'ayaweb7@yandex.ru';
	
	// Почта на которую будет приходить письмо
	const CATCHER = 'ayaweb7@gmail.com';
	
	// Тема письма
	const SUBJECT = 'Заявка с сайта';
	
	// Кодировка
  const CHARSET = 'UTF-8';
  
  



?>
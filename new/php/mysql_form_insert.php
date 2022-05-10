<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Страница благодарности формы обратной связи</title>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Refresh" content="4; URL=/"><!--  -->
</head>

<body>
	<div class="thank-you-page">

		<h1 class="thank-you-page__title">Страница благодарности</h1>
		<p class="thank-you-page__descriptor">Оформляйте как вам будет угодно</p>
		<a class="thank-you-page__button" href="/">Вернуться на главную</a>

	</div>

<?php
// Соединяемся с базой данных
require_once '../blocks/date_base.php';

// Вычислитель
//$name = $tel = $email = $text = $start_time = $send_time = $unix_time = "";

if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['tel'])) {$tel = $_POST['tel'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['mess'])) {$mess = $_POST['mess'];}
if (isset($_POST['start_time'])) {$start_time = $_POST['start_time'];}
if (isset($_POST['send_time'])) {$send_time = $_POST['send_time'];}
if (isset($_POST['unix_time'])) {$unix_time = $_POST['unix_time'];}
if (isset($_POST['id_client'])) {$id_client = $_POST['id_client'];}
if (isset($_POST['ip'])) {$ip = $_POST['ip'];}
if (isset($_POST['hostname'])) {$hostname = $_POST['hostname'];}
if (isset($_POST['city'])) {$city = $_POST['city'];}
if (isset($_POST['region'])) {$region = $_POST['region'];}
if (isset($_POST['location'])) {$location = $_POST['location'];}
if (isset($_POST['brauser'])) {$brauser = $_POST['brauser'];}
if (isset($_POST['version'])) {$version = $_POST['version'];}
if (isset($_POST['os'])) {$os = $_POST['os'];}

$id = (int) $id;
 
 // Функция преобразует все символы, которые пользователь попытается добавить в форму:
 $name = htmlspecialchars($name);
 $tel = htmlspecialchars($tel);
 $email = htmlspecialchars($email);
 
 // Функция декодирует url, если пользователь попытается его добавить в форму:
 $name = urldecode($name);
 $tel = urldecode($tel);
 $email = urldecode($email);
 $mess = urldecode($mess);
 
 // Удаляем пробелы с начала и конца строки, если таковые имеются:
 $name = trim($name);
 $tel = trim($tel);
 $email = trim($email);
 $mess = trim($mess);

 // Отправляем данные в базу
$query = "INSERT INTO application (id, name, tel, email, mess, start_time, send_time, unix_time, ip, hostname, city, region, location, brauser, version, os)
VALUES ('$id', '$name', '$tel', '$email', '$mess', '$start_time','$send_time', '$unix_time', '$ip', '$hostname', '$city', '$region', '$location', '$brauser','$version', '$os')";

// Проверка на ошибки при вводе в базу
if ($result = mysqli_query($db, $query)) {
	echo "Проверка формы прошла успешно:<br>
	Имя: $name;<br> Телефон: $tel;<br> Электронная почта: $email;<br> Текст заявки: $mess;<br>
	Время входа в форму: $start_time;<br> Время отправки заявки: $send_time;<br> Время отправки в ЮНИКС: $unix_time.<br><br>";
	echo "Данные успешно отправлены в базу";
} else {
      echo "При отправке данных возникли ошибки - Error: " . $query . "<br>" . mysqli_error($db);
}

// Сообщение о результате ввода в базу
if ($result == 'true') {
print <<<HERE
<h6  style='font: 2em bold Georgia, "Times New Roman", Times, serif; color: #19910f;' align="center">В базе</h6> <!---->
HERE;
}
else {
print <<<HERE
<h6  style='font: 3em bold Georgia, "Times New Roman", Times, serif; color: #e50000;' align="center">Ошибочка!</h6> <!---->
HERE;
}


 // Отправляем заявку на почту
//if (mail("ayaweb7@gmail.com", "Заявка с сайта", "ФИО:".$name.". E-mail: ".$email ,"From: ayaweb7@yandex.ru \r\n")){
// echo "Заявка успешно отправлена на почту! (MY SQL)";
// } else {
// echo "При отправке заявки на почту возникли ошибки";
// }


// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$db->close(); // Закрываем базу данных

?>

</body>

</html>
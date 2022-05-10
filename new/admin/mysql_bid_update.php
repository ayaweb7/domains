<?php
// Пароль в админскую часть
include ("lock.php");
// Соединяемся с базой данных
require_once 'blocks/date_base.php';
// Подключаем HEADER
include ("blocks/header_adm.php");

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Сделано</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="shortcut icon" type="image/ico" href="img/favicon.ico" />
	<meta http-equiv="Refresh" content="4; URL=/admin/bid_update.php"><!--  -->
</head>

<body>
<?php
// Вычислитель
$work_time = $working = $effect = $amount = "";

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
if (isset($_POST['work_time'])) {$work_time = $_POST['work_time'];}
if (isset($_POST['working'])) {$working = $_POST['working'];}
if (isset($_POST['effect'])) {$effect = $_POST['effect'];}
if (isset($_POST['amount'])) {$amount = $_POST['amount'];}
$id = (int) $id;


$query = "UPDATE application SET work_time='$work_time', working='$working', effect='$effect', amount='$amount' WHERE id='$id'";
//$query = "UPDATE application SET working='$working' WHERE id='$id'";

// Проверка на ошибки при вводе в базу
if ($result = mysqli_query($db, $query)) {
	echo "Удачный ввод - $work_time";
} else {
      echo "НЕудачный ввод - Error: " . $query . "<br>" . mysqli_error($db);
}

// Сообщение о результате ввода в базу
if ($result == 'true') {
print <<<HERE
<h6  style='font: 2em bold Georgia, "Times New Roman", Times, serif; color: #19910f;' align="center">В базе</h6> <!---->
HERE;
}
else {
print <<<HERE
<h6  style='font: 3em bold Georgia, "Times New Roman", Times, serif; color: #e50000;' align="center">Ошибочка</h6> <!---->
HERE;
}


// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$db->close(); // Закрываем базу данных

//UPDATE shops SET shop='Энергия' WHERE shop='Электрика для электрика' AND gruppa='Сантехника';
?>

<a class="thank-you-page__button" href="/">Вернуться на главную</a>

</body>

</html>
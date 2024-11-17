<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

//include_once "class/Admin.php"; //Подключаем класс для работы с Вложенные запросы MySQL
//$admin = new Admin();
//$menu_arr = $admin->getMenu();

// Определение надписи для титула страницы
if (isset($_GET['page'])) {
	$url = $_GET['page'];
} elseif(isset($_GET['menu_id'])) {
    $url = 'page_edit';
}  else {
    $url = '/admin';
}
	
$query = "SELECT * FROM menu_admin WHERE link ='$url'";
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$myrow = mysqli_fetch_assoc($result);

if(!$myrow) {
    $query = "SELECT * FROM menu_admin WHERE link ='404'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $myrow = mysqli_fetch_assoc($result);
    header("HTTP/1.0 404 Not Found");
}
$title = $myrow['titer'];

?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <title><?= $title ?></title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" type="text/css" href="/admin/css/screen.css">
        <link rel="shortcut icon" type="image/ico" href="img/favicon.ico">
    </head>

    <body>
        <div id='wrapper'>
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
				<div id='header'>
<?php
					include 'blocks/menu.php'; // подключаем MENU
?>
					
				</div> <!--header-->
            </header>

			<main>
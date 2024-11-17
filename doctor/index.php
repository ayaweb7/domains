<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = '/';
}

$query = "SELECT * FROM menu_admin WHERE url='$page'";
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$page = mysqli_fetch_assoc($result);

if(!$page) {
    $query = "SELECT * FROM menu_admin WHERE url='404'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $page = mysqli_fetch_assoc($result);
    header("HTTP/1.0 404 Not Found");
}

$title = $page['title'];
$content = $page['h1']. " " .$page['h2'];

include 'blocks/layout.php';
echo 'hello////';
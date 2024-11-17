<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

// Соединяемся с базой данных
require_once 'blocks/date_base.php';

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = '/';
}

$query = "SELECT * FROM pages WHERE url='$page'";
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$page = mysqli_fetch_assoc($result);

if(!$page) {
    $query = "SELECT * FROM pages WHERE url='404'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $page = mysqli_fetch_assoc($result);
    header("HTTP/1.0 404 Not Found");
}

$title = $page['title'];
$content = $page['text'];

include 'pages/layout.php';



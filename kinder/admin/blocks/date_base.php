<?php
//
error_reporting(E_ALL);
ini_set('display_errors', 'on');

// session_start(); 
/*
if (!isset($_SESSION)) { 
  // no session has been started yet - сеанс еще не начался
  session_start(); 
}
*/
$hostname = 'localhost';
$database = 'doctor';
$username = 'nikart';
$password = 'arteeva12';

$db = mysqli_connect($hostname, $username, $password) or die("Нет связи с СЕРВЕРОМ"); // Can't connect to SERVER
mysqli_select_db($db, $database) or die("Не могу выбрать БД"); // Can't select DB
mysqli_set_charset($db, "utf8") or die("Не могу подключить arte0374_agency"); // Can't set AGENCY

// $db = new mysqli($hostname, $username, $password, $database);
if ($db->connect_error) die($db->connect_error);


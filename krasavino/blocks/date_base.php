<?php  // date_base.php
$hostname = 'localhost';
$database = 'agency';
$username = 'nikart';
$password = 'arteeva12';

$db = new mysqli($hostname, $username, $password, $database);
if ($db->connect_error) die($db->connect_error);
?>
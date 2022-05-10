<?php  // date_base.php
$hostname = 'localhost';
$database = 'arte0374_agency';
$username = 'arte0374_nikart';
$password = 'arteeva12';

$db = new mysqli($hostname, $username, $password, $database);
if ($db->connect_error) die($db->connect_error);
?>
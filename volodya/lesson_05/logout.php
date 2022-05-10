<?php
session_start();
define('MYSITE', 1);

require_once('config.php');

session_unset();

header('Location: index.php');
?>

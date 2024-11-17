<?php
session_start();
session_destroy();

echo 'logout success!<br>';

//include 'header.php';
//include '../../blocks/layout.php';
//include '../index.php';
//header('Location: blocks/header.php'); die();

echo '<a href="/">Main</a>';

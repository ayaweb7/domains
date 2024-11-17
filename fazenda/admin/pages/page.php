<?php
// Соединяемся с базой данных
require_once '../blocks/date_base.php';

// Подключаем HEADER
include ("../blocks/header.php");


// Начало кода INFO
printf ("<div id='info'>
			<h1>%s</h1>
			<h2>%s</h2>", $myrow['h1'], $myrow['h2']);

// Подключаем PAGES.PHP
include '../blocks/status.php';
include ($url . ".php");
printf ("</div>"); // info
// Конец кода INFO

// Подключаем FOOTER
include ("../blocks/footer.php");
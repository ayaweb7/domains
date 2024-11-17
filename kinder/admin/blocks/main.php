<?php
include 'info.php';
include 'status.php';

if($myrow['link'] != '/admin' and $myrow['link'] != '#' and $myrow['link'] != '/') {
	$path = 'pages/' .$myrow['link']. '.php';
	include $path;
} elseif($myrow['link'] == '/admin' or $myrow['link'] == '#') {
	$path = '';
} else {
	$path = $myrow['link'];
	}

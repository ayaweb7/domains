<?php

	include 'blocks/header.php';
	
	echo $_GET['page'];
	include ('pages/' .$_GET['page']. '.php');
	
	include 'blocks/footer.php';

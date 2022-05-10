<?php

define('MY_SITE', 1);

require_once('output.class.php');
$page = new Output();

require_once('config_1.php');

$page -> setTitle('Моя страница');
if($sayHello)
{
	$page ->putParagraph('Hello World');
}
	
include_once('view.php');

?>

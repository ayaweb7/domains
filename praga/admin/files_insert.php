﻿<?php
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
mysql_query('SET NAMES utf8');
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='files_insert'",$db);

$myrow = mysql_fetch_array($result);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $myrow['title'] ?></title>
<meta name="keywords" content="<?php echo $myrow['meta_k'] ?>" />
<meta name="description" content="<?php echo $myrow['meta_d'] ?>" />
<link href="css/screen.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/praga_script.js"></script>
<script type="text/javascript" src="http://4geo.ru/maps/js/4geoAPI.js" ></script>
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
</head>

<body id="firm_redact">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header_admin.php"); ?>

<!-- Начало кода INDEX -->

<div id="info">
<?php
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='files_insert'",$db);

$myrow = mysql_fetch_array($result);
?>


    <h1><?php echo $myrow['h1'] ?></h1>
    <?php printf ("<h2>%s %s</h2>", $myrow['h2'],$myrow['month']);?>

<!-- Подключаем FORMA_FIRM_SQL_REDACT.PHP -->
		<?php include ("blocks/files_form_insert.php"); ?>
    
</div> <!-- info -->    
    
    

<!-- Конец кода INDEX -->  
<p><a href="index_admin.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>

</body>
</html>
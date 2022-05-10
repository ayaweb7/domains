<?php 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
//mysql_query('SET NAMES utf8');
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2 FROM settings WHERE page='valuation'",$db);

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


<!-- Начало кода VALUATION -->
<body id="valuation">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header.php"); ?>

<!-- Начало кода REALTIES -->

    <div id="realties">
<h1><?php echo $myrow['h1'] ?></h1>

<table id="inventory" width="99%" class="valuation">
    <caption> <!-- Заголовок таблицы -->
        <h2><?php echo $myrow['h2'] ?></h2>
    </caption>
    <tr><td>
    <h3>Перечень услуг:</h3>
    
    <ul>
	<li>Оценка имущества</li>
	<li>Оценка ущерба</li>
	<li>Сбор и подготовка документов для судебных инстанций</li>
	<li>Выезд к месту нахождения имущества</li>
    </ul>

    </td></tr>
</table> <!-- inventory -->    
    
        </div> <!-- realties -->    
	

<!-- Конец кода VALUATION -->  


<!-- Подключаем ACTIVITIES -->
		<?php include ("blocks/activities.php"); ?>


<!-- Подключаем EXTRA -->
		<?php include ("blocks/extra.php"); ?>


<!-- Подключаем FOOTER -->
		<?php include ("blocks/footer.php"); ?>

</body>
</html>
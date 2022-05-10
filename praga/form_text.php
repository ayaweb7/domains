<?php 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
//mysql_query('SET NAMES utf8');
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2 FROM settings WHERE page='form_text'",$db);
$myrow = mysql_fetch_array($result);

if (isset($_GET['id'])) {$id=$_GET['id'];}
$result1 = mysql_query("SELECT title FROM form WHERE id='$id'", $db);
$myrow1 = mysql_fetch_array($result1);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $myrow1['title'] ?></title>
<meta name="keywords" content="<?php echo $myrow['meta_k'] ?>" />
<meta name="description" content="<?php echo $myrow['meta_d'] ?>" />
<link href="css/screen.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/praga_script.js"></script>
<script type="text/javascript" src="http://4geo.ru/maps/js/4geoAPI.js" ></script>
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
</head>


<!-- Начало кода VALUATION -->
<body id="form_text">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header.php"); ?>

<!-- Начало кода REALTIES -->

    <div id="realties">
<?php
if (isset($_GET['id'])) {$id=$_GET['id'];}

$result1 = mysql_query("SELECT * FROM form WHERE id='$id'", $db);
$myrow1 = mysql_fetch_array($result1);



printf ("<h1>%s</h1>
        <h2>%s</h2>
<p><a href='%s'>Скачать файл в формате .doc (документ Microsoft Word)</a>&nbsp;|&nbsp;
<a href='javascript:history.back()' title='Вернуться на предыдущую страницу' >Назад на предыдущую страницу</a></p>
<div id='statement'>%s</div>", $myrow1['type'],$myrow1['title'],$myrow1['download'],$myrow1['text']);

?>

  
        </div> <!-- realties -->    
	

<!-- Подключаем ACTIVITIES -->
		<?php include ("blocks/activities.php"); ?>


<!-- Подключаем FOOTER -->
		<?php include ("blocks/footer.php"); ?>

</body>
</html>
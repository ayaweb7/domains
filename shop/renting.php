<?php 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
//mysql_query('SET NAMES utf8');
if (isset($_GET['id'])) {$id=$_GET['id'];}

$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2 FROM settings WHERE page='renting'",$db);

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

<body id="renting">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header.php"); ?>

<!-- Начало кода RENTING -->

<div id="realties">
        <h1><?php echo $myrow['h1'] ?></h1>
        
<table id="inventory" width="99%" class="">
    <caption> <!-- Заголовок таблицы -->
        <h2><?php echo date('d'); ?> <?php echo $myrow['h2'] ?></h2>
    </caption>

<!-- Скрипт для вывода характеристик в цикле -->

<?php

$result1 = mysql_query("SELECT * FROM characteristics_flat", $db);

$myrow1 = mysql_fetch_array($result1);
$i=1;
do {
?>
                    
    <tr><td><table width="100%">
        <tr class="sub"><td colspan="2"><?php echo $myrow1['type'] ?></td></tr>
                    
            <tr>
                <td width="60%" style="border-top: 1px solid #00843e;">
                    <table width="100%">
                    <tr><td align="center">
                    
<!-- Скрипт для первого фото -->

<?php 

$result = mysql_query("SELECT * FROM photo_flats WHERE folder='flats$i'", $db);

$myrow = mysql_fetch_array($result);
?>
                     
                     <a href="<?php echo $myrow['link'] ?>" target ="_blank" title="<?php echo $myrow['title'] ?>"><img src="<?php echo $myrow['link'] ?>" alt="<?php echo $myrow['alt'] ?>" width="40%" style="margin: 1%;"/></a>
                    <div id="<?php echo $myrow['folder'] ?>" style="display: none;">

<!-- Цикл для вывода остальных фото -->
                                    
<?php
$myrow = mysql_fetch_array($result);                    
do {
?>
<a href="<?php echo $myrow['link'] ?>" target ="_blank" title="<?php echo $myrow['title'] ?>"><img src="<?php echo $myrow['link'] ?>" alt="<?php echo $myrow['alt'] ?>" width="40%" style="margin: 1%;"/></a>
<?php
}
while ($myrow = mysql_fetch_array($result));
$i++;                    
?>
<!-- Окончание цикла -->                   
                    
                    </div>
                    </td></tr>
                    
                    <tr><td><input id="<?php echo $myrow1['button'] ?>" type="button" value="Показать все фото" onclick="<?php echo $myrow1['function'] ?>" /></td></tr> <!-- Кнопка -->
                    </table></td>
                    
                    
                    <td width="39%" style="vertical-align: top; border-top: 1px solid #00843e;">
                    <div class="ren">
        	           <h3>Характеристика</h3>
       			
        	           <ul class="lst1">	
        				<li>Расположение:<br /> <em><?php echo $myrow1['location'] ?></em></li>
        				<li>Этаж: <em><?php echo $myrow1['floor'] ?></em></li>
                        <li>Площадь: <em><?php echo $myrow1['square'] ?> кв.м.</em></li>
                        <li>Ремонт: <em><?php echo $myrow1['repair'] ?></em></li>
                        <li>Мебель: <em><?php echo $myrow1['furniture'] ?></em></li>
						<li>Спальных мест: <em><?php echo $myrow1['sleeper'] ?></em></li>
                        <li>При периоде проживания более 15 суток:<br /> <em><?php echo $myrow1['note'] ?></em></li>
						<li>Стоимость проживания:<br /> <span><?php echo $myrow1['price'] ?> рублей </span>в сутки</li>
        				</ul>
                    </div> <!-- ren -->
                    
           </td></tr>
           
                  
    </table></td></tr>
<?php
}
while ($myrow1 = mysql_fetch_array($result1));
                    
?>

<!-- Окончание скрипта для вывода характеристик -->                    
    
                    
</table> <!-- inventory -->
 
<p>Квартиры оборудованы необходимой бытовой техникой, кухонными и спальными принадлежностями, телевизором, посудой. В стоимость проживания включены уборка помещений и смена белья. По желанию оформляются отчетные документы.</p> 
                
</div> <!-- realties -->

<!-- Конец кода RENTING -->  

<!-- Подключаем ACTIVITIES -->
		<?php include ("blocks/activities.php"); ?>


<!-- Подключаем EXTRA -->
		<?php include ("blocks/extra.php"); ?>


<!-- Подключаем FOOTER -->
		<?php include ("blocks/footer.php"); ?>

</body>
</html>
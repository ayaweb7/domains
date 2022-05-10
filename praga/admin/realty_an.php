<!-- Agency -->

<?php
session_start();
//include ("lock.php"); /* Пароль в админскую часть */ 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
mysql_query('SET NAMES utf8');

if (isset($_GET['id'])) {$id=$_GET['id'];}
if (isset($_GET['title'])) {$title=$_GET['title'];}
$result2 = mysql_query("SELECT id,title FROM agency WHERE id='$id'", $db);
$myrow2 = mysql_fetch_array($result2);

$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='realty1'",$db);
$myrow = mysql_fetch_array($result);

$result1 = mysql_query("SELECT * FROM flats_firm WHERE firm='$myrow2[title]'", $db);
$myrow1 = mysql_fetch_array($result1);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $myrow1['firm'] ?><?php echo $myrow['title'] ?></title>
<meta name="keywords" content="<?php echo $myrow['meta_k'] ?>" />
<meta name="description" content="<?php echo $myrow['meta_d'] ?>" />

<link rel="stylesheet" type="text/css" href="css/screen.css" />
<link rel="alternate stylesheet" type="text/css" href="css/print_screen.css" title="print_screen" />
<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="for_IE.css"><![endif]-->
<script type="text/javascript" src="../js/praga_script.js"></script>
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
</head>

<body id="realty_an">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header_adm.php"); ?>

<!-- Начало кода REALTIES -->

    <div id="realties">

<?php 
if (isset($_GET['id'])) {$id=$_GET['id'];}
if (isset($_GET['title'])) {$title=$_GET['title'];}
$result2 = mysql_query("SELECT id,title FROM agency WHERE id='$id'", $db);
$myrow2 = mysql_fetch_array($result2);

$result1 = mysql_query("SELECT * FROM flats_firm WHERE firm='$myrow2[title]'", $db);
$myrow1 = mysql_fetch_array($result1);

$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='realty1'",$db);
$myrow = mysql_fetch_array($result);

$result3 = mysql_query("SELECT date,month FROM settings WHERE page='realty'",$db);
$myrow3 = mysql_fetch_array($result3);
                  
?> 


            <h1><?php echo $myrow['h1'] ?><br /><em><?php echo $myrow1['firm'] ?></em></h1>
              <table id="inventory" width="99%" class="realty">
                  <caption> <!-- Заголовок таблицы -->
                    <?php printf ("<h2>%s %s %s</h2>", $myrow['h2'],$myrow3['date'],$myrow3['month']);?>
                  </caption>
                  
                  <tr class="input"><td colspan="8">
                  <input class="back" type="button" value="назад" onclick="setActiveStyleSheet('screen'); return false;" />
                  <input class="print" type="button" value="версия для печати" onclick="setActiveStyleSheet('print_screen'); return false;" />
                  <input type="button" value="печать" onclick="printit()" />
                  </td></tr>
                  
                  <colgroup> <!-- Задание ширины и стилей для колонок таблицы -->
                      <col id="idid" />
                      <col id="address1" /> <!-- Задание ширины и стилей для одной из колонок таблицы -->
                      <col id="square1" />
                      <col id="characteristic1" />
                      <col id="floor1" />
                      <col id="trade1" />
                      <col id="price1" />
                      <col id="firm1" />
                  </colgroup>
                  
                    <tr class="alt"> <!-- Строка таблицы -->
                      <th scope="col">ID</th>
                      <th scope="col">Адрес</th> <!-- Заголовочная ячейка таблицы -->
                      <th scope="col" >Площадь, кв.м.</th>
                      <th scope="col">Балкон, стены, планировка</th>
                      <th scope="col" axis="num">Этаж</th>
                      <th scope="col">Вид сделки</th>
                      <th scope="col" axis="num">Цена, тыс.руб.</th>
                      <th scope="col">Дата</th>
                    </tr>
                    

<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE type='секция' AND firm='$myrow2[title]' ORDER BY street, house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Секции</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td><p><a href='flats1.php?id=%s'>%s, %s</a></p></td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price'],$myrow['application']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>
                  
                    
<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE type='гостинка' AND firm='$myrow2[title]' ORDER BY street, house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Гостинки</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td><p><a href='flats1.php?id=%s'>%s, %s</a></p></td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price'],$myrow['application']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>
                    
                    
<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE type='квартира' AND firm='$myrow2[title]' AND rooms='1' ORDER BY street, house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Однокомнатные квартиры</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td><p><a href='flats1.php?id=%s'>%s, %s</a></p></td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price'],$myrow['application']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>
                    
                    
<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE type='квартира' AND firm='$myrow2[title]' AND rooms='2' ORDER BY street, house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Двухкомнатные квартиры</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td><p><a href='flats1.php?id=%s'>%s, %s</a></p></td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price'],$myrow['application']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>
                    
                    
<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE type='квартира' AND firm='$myrow2[title]' AND rooms='3' ORDER BY street, house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Трёхкомнатные квартиры</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td><p><a href='flats1.php?id=%s'>%s, %s</a></p></td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price'],$myrow['application']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>
                     
                    
<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE type='квартира' AND firm='$myrow2[title]' AND rooms='4' ORDER BY street, house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Четырёхкомнатные квартиры</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td><p><a href='flats1.php?id=%s'>%s, %s</a></p></td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price'],$myrow['application']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>
                    
                    
<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE category='загородная' AND firm='$myrow2[title]' ORDER BY street, house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Частный сектор</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td>%s</td>
                      <td colspan='3'>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ", $myrow['id'],$myrow['street'],$myrow['note'],$myrow['trade'],$myrow['price'],$myrow['application']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>

                    
<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE category='другое' AND firm='$myrow2[title]' ORDER BY street, house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Гаражи</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td>%s</td>
                      <td colspan='3'>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ", $myrow['id'],$myrow['street'],$myrow['note'],$myrow['trade'],$myrow['price'],$myrow['application']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>

                    
<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE category='коммерческая' AND firm='$myrow2[title]' ORDER BY street, house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Коммерческая недвижимость</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td>%s</td>
                      <td colspan='3'>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ", $myrow['id'],$myrow['street'],$myrow['note'],$myrow['trade'],$myrow['price'],$myrow['application']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>
                 
                  <tr class="input"><td colspan="8">
                  <input class="back" type="button" value="назад" onclick="setActiveStyleSheet('screen'); return false;" />
                  <input class="print" type="button" value="версия для печати" onclick="setActiveStyleSheet('print_screen'); return false;" />
                  <input type="button" value="печать" onclick="printit()" />
                  </td></tr>
 

                </table> <!-- inventory -->
                
        </div> <!-- realties -->

<!-- Конец кода REALTIES -->

<!-- Подключаем EXTRA -->
		<?php include ("blocks/extra.php"); ?>

</body>
</html>
<?php 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
//mysql_query('SET NAMES utf8');
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='realty'",$db);

$myrow = mysql_fetch_array($result);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $myrow['title'] ?></title>
<meta name="keywords" content="<?php echo $myrow['meta_k'] ?>" />
<meta name="description" content="<?php echo $myrow['meta_d'] ?>" />

<link rel="stylesheet" type="text/css" href="css/screen.css" />
<link rel="alternate stylesheet" type="text/css" href="css/print_screen.css" title="print_screen" />
<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="for_IE.css"><![endif]-->
<script type="text/javascript" src="js/praga_script.js"></script>
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
</head>

<body id="realty">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header.php"); ?>


<!-- Начало кода REALTIES -->

    <div id="realties">
        <h1><?php echo $myrow['h1'] ?></h1>
              <table id="inventory" width="99%" class="realty">
                  <caption> <!-- Заголовок таблицы -->
                    <?php printf ("<h2>%s %s %s</h2>", $myrow['h2'],$myrow['date'],$myrow['month']);?>
                  </caption>
                  
                  <tr class="input"><td colspan="6">
                  <input class="back" type="button" value="назад" onclick="setActiveStyleSheet('screen'); return false;" />
                  <input class="print" type="button" value="версия для печати" onclick="setActiveStyleSheet('print_screen'); return false;" />
                  <input type="button" value="печать" onclick="printit()" />
                  </td></tr>
                  
                  <colgroup> <!-- Задание ширины и стилей для колонок таблицы -->
                      <col id="address" /> <!-- Задание ширины и стилей для одной из колонок таблицы -->
                      <col id="square" />
                      <col id="characteristic" />
                      <col id="floor" />
                      <col id="trade" />
                      <col id="price" />
                  </colgroup>
                  
                    <tr class="alt"> <!-- Строка таблицы -->
                      <th scope="col">Адрес</th> <!-- Заголовочная ячейка таблицы -->
                      <th scope="col" >Площадь, кв.м.</th>
                      <th scope="col">Характеристики</th>
                      <th scope="col" axis="num">Этаж</th>
                      <th scope="col">Вид сделки</th>
                      <th scope="col" axis="num">Цена, тыс.руб.</th>
                    </tr>
                    

<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE type='секция' AND firm='Прага' ORDER BY street,house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='6'>Секции</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><p><a href='flats.php?id=%s'>%s, %s</a></p></td>
                      <td>%s</td>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>

                    
<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE type='гостинка' AND firm='Прага' ORDER BY street,house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='6'>Гостинки</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><p><a href='flats.php?id=%s'>%s, %s</a></p></td>
                      <td>%s</td>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>
                    
                    
<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE type='квартира' AND firm='Прага' AND rooms='1' ORDER BY street,house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='6'>Однокомнатные квартиры</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><p><a href='flats.php?id=%s'>%s, %s</a></p></td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>
                    
                    
<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE type='квартира' AND firm='Прага' AND rooms='2' ORDER BY street,house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='6'>Двухкомнатные квартиры</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><p><a href='flats.php?id=%s'>%s, %s</a></p></td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>
                    
                    
<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE type='квартира' AND firm='Прага' AND rooms='3' ORDER BY street,house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='6'>Трёхкомнатные квартиры</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><p><a href='flats.php?id=%s'>%s, %s</a></p></td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>
                     
                    
<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE type='квартира' AND firm='Прага' AND rooms='4' ORDER BY street,house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='6'>Четырёхкомнатные квартиры</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><p><a href='flats.php?id=%s'>%s, %s</a></p></td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>
                    
                    
<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE category='загородная' AND firm='Прага' ORDER BY street,house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='6'>Частный сектор</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td colspan='3'>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['street'],$myrow['note'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>


<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE category='другое' AND firm='Прага' ORDER BY street,house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='6'>Гаражи</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td colspan='3'>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['street'],$myrow['note'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>


<?php 
$result = mysql_query("SELECT * FROM flats_firm WHERE category='коммерческая' AND firm='Прага' ORDER BY street,house", $db);
$myrow = mysql_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='6'>Коммерческая недвижимость</td></tr>");

$even=true;                    
do {
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td colspan='3'>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ",$myrow['street'],$myrow['note'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));
}
?>


                   
                </table> <!-- inventory -->
                  
                  <tr class="input"><td colspan="8">
                  <input class="back" type="button" value="назад" onclick="setActiveStyleSheet('screen'); return false;" />
                  <input class="print" type="button" value="версия для печати" onclick="setActiveStyleSheet('print_screen'); return false;" />
                  <input type="button" value="печать" onclick="printit()" />
                  </td></tr>
                
        </div> <!-- realties -->

<!-- Конец кода REALTIES -->


<!-- Подключаем ACTIVITIES -->
		<?php include ("blocks/activities.php"); ?>


<!-- Подключаем EXTRA -->
		<?php include ("blocks/extra.php"); ?>


<!-- Подключаем FOOTER -->
		<?php include ("blocks/footer.php"); ?>

</body>
</html>
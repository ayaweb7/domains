<?php 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */

$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='firms'",$db);

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

<body id="firms">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header.php"); ?>


<!-- Начало кода REALTIES -->

    <div id="realties">
        <h1><?php echo $myrow['h1'] ?></h1>
              <table id="inventory" width="99%" class="realty">
                  <caption> <!-- Заголовок таблицы -->
                    <?php printf ("<h2>%s %s %s</h2>", $myrow['h2'],$myrow['date'],$myrow['month']);?>
                  </caption>
                  
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
                      <th scope="col" axis="num">Цена, руб.</th>
                    </tr>
                    
                    <tr class="sub">
                      <td colspan="6">Секции</td> <!-- Ячейка таблицы -->
                    </tr>

<?php 
$result = mysql_query("SELECT street, house, square, balcony, wall, floor, trade, price FROM flats_firm WHERE type='секция' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s 000</td>
                    </tr>  ", $myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>

                    
                    <tr class="sub">
                      <td colspan="6">Гостинки</td> <!-- Ячейка таблицы -->
                    </tr>
                    
<?php 
$result = mysql_query("SELECT street, house, square, balcony, wall, floor, trade, price FROM flats_firm WHERE type='гостинка' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s 000</td>
                    </tr>  ", $myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>
                    
                    <tr class="sub">
                      <td colspan="6">Однокомнатные квартиры</td> <!-- Ячейка таблицы -->
                    </tr>
                    
<?php 
$result = mysql_query("SELECT street, house, square, balcony, wall, improved, floor, trade, price FROM flats_firm WHERE type='квартира' AND rooms='1' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s 000</td>
                    </tr>  ", $myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>
                    
                    <tr class="sub">
                      <td colspan="6">Двухкомнатные квартиры</td> <!-- Ячейка таблицы -->
                    </tr>
                    
<?php 
$result = mysql_query("SELECT street, house, square, balcony, wall, improved, floor, trade, price FROM flats_firm WHERE type='квартира' AND rooms='2' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s 000</td>
                    </tr>  ", $myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>
                    
                    <tr class="sub">
                      <td colspan="6">Трёхкомнатные квартиры</td> <!-- Ячейка таблицы -->
                    </tr>
                    
<?php 
$result = mysql_query("SELECT street, house, square, balcony, wall, improved, floor, trade, price FROM flats_firm WHERE type='квартира' AND rooms='3' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s 000</td>
                    </tr>  ", $myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>
                    
                    <tr class="sub">
                      <td colspan="6">Четырёхкомнатные квартиры</td> <!-- Ячейка таблицы -->
                    </tr>
                    
<?php 
$result = mysql_query("SELECT street, house, square, balcony, wall, improved, floor, trade, price FROM flats_firm WHERE type='квартира' AND rooms='4' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s 000</td>
                    </tr>  ", $myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>
                    
					<tr class="sub">
                      <td colspan="6">Частный сектор</td> <!-- Ячейка таблицы -->
                    </tr>
                    
<?php 
$result = mysql_query("SELECT street, note, trade, price FROM flats_firm WHERE category='загородная' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td colspan='3'>%s</td>
                      <td>%s</td>
                      <td>%s 000</td>
                    </tr>  ", $myrow['street'],$myrow['note'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>

                    <tr class="sub">
                      <td colspan="6">Коммерческая недвижимость</td> <!-- Ячейка таблицы -->
                    </tr>
                    
<?php 
$result = mysql_query("SELECT street, note, trade, price FROM flats_firm WHERE category='коммерческая' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td colspan='3'>%s</td>
                      <td>%s</td>
                      <td>%s 000</td>
                    </tr>  ", $myrow['street'],$myrow['note'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>

                    <tr class="sub">
                      <td colspan="6">Прочая недвижимость</td> <!-- Ячейка таблицы -->
                    </tr>
                    
<?php 
$result = mysql_query("SELECT street, note, trade, price FROM flats_firm WHERE category='другое' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td colspan='3'>%s</td>
                      <td>%s</td>
                      <td>%s 000</td>
                    </tr>  ", $myrow['street'],$myrow['note'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>

                    
                </table> <!-- inventory -->
                
        </div> <!-- realties -->

<!-- Конец кода REALTIES -->


<!-- Подключаем ACTIVITIES -->
		<?php include ("blocks/activities.php"); ?>


<!-- Подключаем FOOTER -->
		<?php include ("blocks/footer.php"); ?>

</body>
</html>
<?php 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */

$result = mysql_query("SELECT title,meta_d,meta_k FROM settings WHERE page='search'",$db);

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

<body id="realty">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header.php"); ?>


<!-- Начало кода REALTIES -->

    <div id="realties">
        <h1>Квартиры, комнаты, гостинки, частный сектор </h1>
              <table id="inventory" width="99%" class="realty">
                  <caption> <!-- Заголовок таблицы -->
                    <h2>Перечень недвижимости в стадии продажи или обмена на <span>24 июля 2013</span></h2>
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
                      <th scope="col" axis="num">Цена, тыс.руб.</th>
                    </tr>
                    
                    <tr class="sub">
                      <td colspan="6">Секции</td> <!-- Ячейка таблицы -->
                    </tr>

<?php 
$result = mysql_query("SELECT street, house, square, balcony, wall, improved, floor, trade, price FROM flats WHERE type='секции' AND status='в продаже' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ", $myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>

                    
                    <tr class="sub">
                      <td colspan="6">Гостинки</td> <!-- Ячейка таблицы -->
                    </tr>
                    
<?php 
$result = mysql_query("SELECT street, house, square, balcony, wall, improved, floor, trade, price FROM flats WHERE type='гостинки' AND status='в продаже' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ", $myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>
                    
                    <tr class="sub">
                      <td colspan="6">Однокомнатные квартиры</td> <!-- Ячейка таблицы -->
                    </tr>
                    
<?php 
$result = mysql_query("SELECT street, house, square, balcony, wall, improved, floor, trade, price FROM flats WHERE type='1-комнатные квартиры' AND status='в продаже' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ", $myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>
                    
                    <tr class="sub">
                      <td colspan="6">Двухкомнатные квартиры</td> <!-- Ячейка таблицы -->
                    </tr>
                    
<?php 
$result = mysql_query("SELECT street, house, square, balcony, wall, improved, floor, trade, price FROM flats WHERE type='2-х комнатные квартиры' AND status='в продаже' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ", $myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>
                    
                    <tr class="sub">
                      <td colspan="6">Трёхкомнатные квартиры</td> <!-- Ячейка таблицы -->
                    </tr>
                    
<?php 
$result = mysql_query("SELECT street, house, square, balcony, wall, improved, floor, trade, price FROM flats WHERE type='3-х комнатные квартиры' AND status='в продаже' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ", $myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>
                    
                    <tr class="sub">
                      <td colspan="6">Четырёхкомнатные квартиры</td> <!-- Ячейка таблицы -->
                    </tr>
                    
<?php 
$result = mysql_query("SELECT street, house, square, balcony, wall, improved, floor, trade, price FROM flats WHERE type='4-х комнатные квартиры' AND status='в продаже' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s, %s</td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ", $myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>
                    
					<tr class="sub">
                      <td colspan="6">Частный сектор</td> <!-- Ячейка таблицы -->
                    </tr>
                    
<?php 
$result = mysql_query("SELECT street, house, square, balcony, wall, improved, floor, trade, price FROM flats WHERE type='частный сектор' AND status='в продаже' ORDER BY street", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s, %s</td>
                      <td colspan='3'>%s соток</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>  ", $myrow['street'],$myrow['house'],$myrow['square'],$myrow['trade'],$myrow['price']); 
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
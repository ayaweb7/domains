<!-- praga -->

<?php 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
//mysql_query('SET NAMES utf8');
if (isset($_GET['id'])) {$id=$_GET['id'];}

$result0 = mysql_query("SELECT title,meta_d,meta_k,h1,h2,month FROM settings WHERE page='flats'",$db);
$myrow0 = mysql_fetch_array($result0);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $myrow0['title'] ?></title>
<meta name="keywords" content="<?php echo $myrow0['meta_k'] ?>" />
<meta name="description" content="<?php echo $myrow0['meta_d'] ?>" />
<link href="css/screen.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/praga_script.js"></script>
<script type="text/javascript" src="http://4geo.ru/maps/js/4geoAPI.js" ></script>
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
</head>

<body id="flats">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header_adm.php"); ?>

<?php
if (isset($_GET['id'])) {$id=$_GET['id'];}
if (isset($_GET['street'])) {$street=$_GET['street'];}
if (isset($_GET['house'])) {$house=$_GET['house'];}
$result1 = mysql_query("SELECT * FROM flats_firm WHERE id='$id'", $db);
$myrow1 = mysql_fetch_array($result1);

$street=$myrow1['street'];
$house=$myrow1['house'];
$result2 = mysql_query("SELECT * FROM houses WHERE street='$street' AND house='$house'", $db);
$myrow2 = mysql_fetch_array($result2);
?>

<!-- Начало кода RENTING -->

<div id="realties">
        <?php printf ("<h1>Подробная характеристика: <em>%s</em></h1>", $myrow1['type']); ?>
        
<table id="inventory" width="99%" class="">
    <caption> <!-- Заголовок таблицы -->
    
    <?php printf ("<h2>Адрес: <span>ул.%s, д.%s </span>(%s %s) </h2>", $myrow1['street'],$myrow1['house'],$myrow2['street_dop'],$myrow2['house_dop']); ?> 
    
    </caption>

         
    <tr><td><table width="100%">
        <tr class="sub"><td colspan="2">Характеристика</td></tr>
                               
           <tr><td style="vertical-align: top;" colspan="2">
               <div class="ren">
       			
                            
  	   <ul class="lst1">	
<?php        			
                    printf ("<li><em>%s-</em>комнатная %s, <em>%s-</em>й этаж.</li>
                    <li>Общая площадь: <em>%s</em> кв.м., <em>%s</em>, планировка - <em>%s</em></li>
                    <li>Цена: <span>%s 000</span> руб.</li>
                    <li>Дополнения продавца - <em>%s</em></li>
                    <li style='margin-bottom: 1em; border-bottom: 1px solid #00843e;'><em style='text-transform: capitalize;'>%s</em> продаётся агентством недвижимости <em>%s</em></li>
                    <li>Дом: <em>%s, %s-</em>этажный</li>
					<li>Дополнительные сведения о доме (для ориентации) - <br /> <em>%s</em></li>",
$myrow1['rooms'],$myrow1['type'],$myrow1['floor'],$myrow1['square'],$myrow1['balcony'],$myrow2['improved'],$myrow1['price'],$myrow1['note'],$myrow1['type'],$myrow1['firm'],$myrow2['walls'],$myrow2['floors'],$myrow2['orientation']);


if ($myrow1['street'] == 'Набережная') {$street = 'Набережная им. Н. Островского';}
elseif (($myrow1['street'] == 'Сафьяна') && ($myrow1['house'] == '2-а')) {$street = 'М.Х. Сафьяна'; $house = '2';}
elseif ($myrow1['street'] == 'Сафьяна') {$street = 'М.Х. Сафьяна';}
elseif (($myrow1['street'] == 'Советская') && ($myrow1['house'] == '2-а')) {$house = '2';}
elseif (($myrow1['street'] == 'Пушкина') && ($myrow1['house'] == '13')) {$house = '13 к2';}
elseif (($myrow1['street'] == 'Пушкина') && ($myrow1['house'] == '17')) {$house = '17 к1';}
else if (($myrow1['street'] == 'Ломоносова') && ($myrow1['house'] == '3-а')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '3А';}
else if (($myrow1['street'] == 'Ломоносова') && ($myrow1['house'] == '3-б')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '3Б';}
else if (($myrow1['street'] == 'Ломоносова') && ($myrow1['house'] == '3-в')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '3В';}
else if (($myrow1['street'] == 'Ломоносова') && ($myrow1['house'] == '3-г')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '3Г';}
else if (($myrow1['street'] == 'Ломоносова') && ($myrow1['house'] == '5-в')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '5В';}
else if (($myrow1['street'] == 'Ломоносова') && ($myrow1['house'] == '7-а')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '7А';}
else if (($myrow1['street'] == 'Ломоносова') && ($myrow1['house'] == '7-б')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '7Б';}
else if (($myrow1['street'] == 'Ломоносова') && ($myrow1['house'] == '7-в')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '7В';}
else if (($myrow1['street'] == 'Ломоносова') && ($myrow1['house'] == '9-а')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '9А';}
else if (($myrow1['street'] == 'Ломоносова') && ($myrow1['house'] == '9-б')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '9Б';}
else if (($myrow1['street'] == 'Ломоносова') && ($myrow1['house'] == '9-в')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '9В';}
else if ($myrow1['street'] == 'Ломоносова') {$street = 'пр-кт. Имени М.В.Ломоносова';}
elseif ($myrow1['house'] == '3-а') {$house = '3А';}
elseif ($myrow1['house'] == '5-а') {$house = '5А';}
elseif ($myrow1['house'] == '6-а') {$house = '6А';}
elseif ($myrow1['house'] == '7-а') {$house = '7А';}
elseif ($myrow1['house'] == '9-а') {$house = '9А';}
elseif ($myrow1['house'] == '10-а') {$house = '10А';}
elseif ($myrow1['house'] == '11-а') {$house = '11А';}
elseif ($myrow1['house'] == '12-а') {$house = '12А';}
elseif ($myrow1['house'] == '13-а') {$house = '13А';}
elseif ($myrow1['house'] == '14-а') {$house = '14А';}
elseif ($myrow1['house'] == '15-а') {$house = '15А';}
elseif ($myrow1['house'] == '17-а') {$house = '17А';}
elseif ($myrow1['house'] == '18-а') {$house = '18А';}
elseif ($myrow1['house'] == '20-а') {$house = '20А';}
elseif ($myrow1['house'] == '22-а') {$house = '22А';}
elseif ($myrow1['house'] == '27-а') {$house = '27А';}
elseif ($myrow1['house'] == '29-а') {$house = '29А';}
elseif ($myrow1['house'] == '31-а') {$house = '31А';}
elseif ($myrow1['house'] == '32-а') {$house = '32А';}
elseif ($myrow1['house'] == '36-а') {$house = '36А';}
elseif ($myrow1['house'] == '41-а') {$house = '41А';}
elseif ($myrow1['house'] == '42-а') {$house = '42А';}
elseif ($myrow1['house'] == '43-а') {$house = '43А';}
elseif ($myrow1['house'] == '45-а') {$house = '45А';}
elseif ($myrow1['house'] == '46-а') {$house = '46А';}
elseif ($myrow1['house'] == '47-а') {$house = '47А';}
elseif ($myrow1['house'] == '49-а') {$house = '49А';}
elseif ($myrow1['house'] == '54-а') {$house = '54А';}
elseif ($myrow1['house'] == '3-б') {$house = '3Б';}
elseif ($myrow1['house'] == '5-б') {$house = '5Б';}
elseif ($myrow1['house'] == '6-б') {$house = '6Б';}
elseif ($myrow1['house'] == '7-б') {$house = '7Б';}
elseif ($myrow1['house'] == '9-б') {$house = '9Б';}
elseif ($myrow1['house'] == '11-б') {$house = '11Б';}
elseif ($myrow1['house'] == '12-б') {$house = '12Б';}
elseif ($myrow1['house'] == '15-б') {$house = '15Б';}
elseif ($myrow1['house'] == '17-б') {$house = '17Б';}
elseif ($myrow1['house'] == '27-б') {$house = '27Б';}
elseif ($myrow1['house'] == '29-б') {$house = '29Б';}
elseif ($myrow1['house'] == '31-б') {$house = '31Б';}
elseif ($myrow1['house'] == '41-б') {$house = '41Б';}
elseif ($myrow1['house'] == '45-б') {$house = '45Б';}
elseif ($myrow1['house'] == '3-в') {$house = '3В';}
elseif ($myrow1['house'] == '5-в') {$house = '5В';}
elseif ($myrow1['house'] == '7-в') {$house = '7В';}
elseif ($myrow1['house'] == '9-в') {$house = '9В';}
elseif ($myrow1['house'] == '15-в') {$house = '15В';}
elseif ($myrow1['house'] == '29-в') {$house = '29В';}
elseif ($myrow1['house'] == '3-г') {$house = '3Г';}

else {$street = $myrow1['street']; $house = $myrow1['house'];} 


?>
        </ul>         
                </div> <!-- ren -->
                   
           </td></tr>
           <tr class="sub"><td colspan="2">Фотографии дома</td></tr>
    <tr><td class="one" id="photo1">
    <img width="100%" src="images/houses/<?php echo $myrow2['photo1'] ?>.jpg" alt="Фото №1 дома <?php echo $myrow2['house'] ?> по ул.<?php echo $myrow2['street'] ?>"/>
    
    </td><td class="two" id="photo2">
    <img width="100%" src="images/houses/<?php echo $myrow2['photo2'] ?>.jpg" alt="Фото №2 дома <?php echo $myrow2['house'] ?> по ул.<?php echo $myrow2['street'] ?>"/>
    
    </td></tr>
    
    <tr><td colspan="2" class="map"><div id="mapFrame"></div></td></tr>
    </table></td></tr>
  
                    
</table> <!-- inventory -->

     
	<script type="text/javascript">

    
<!-- Задание начальных параметров для карты -->


var options = {
town: 'Коряжма', street: '<?php echo $street; ?>', building: '<?php echo $house; ?>'
};
<!-- Инициализировать карту -->
var map = new geoAPI.maps.Map(document.getElementById('mapFrame'), options);

<!-- Создание маркера по адресу -->
var marker = new geoAPI.maps.Marker({
town: 'Коряжма', street: '<?php echo $street; ?>', building: '<?php echo $house; ?>'
});
<!-- Размещение маркера на карте -->
marker.setMap(map);
</script>



 
                
</div> <!-- realties -->

<!-- Конец кода REALTIES -->

 <p><a href="index_admin.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>   

<!-- Подключаем EXTRA -->
		<?php include ("blocks/extra.php"); ?>
  


</body>
</html>
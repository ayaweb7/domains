<!-- agency -->
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
<script type="text/javascript" src="js/agency_script.js"></script>
<script type="text/javascript" src="http://4geo.ru/maps/js/4geoAPI.js" ></script>
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
</head>

<body id="house">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header_adm.php"); ?>


<?php
if (isset($_POST['street'])) {$street=$_POST['street'];}
if (isset($_POST['house_Ar']) && !empty($_POST['house_Ar'])) {$house=$_POST['house_Ar'];}
if (isset($_POST['house_Gl']) && !empty($_POST['house_Gl'])) {$house=$_POST['house_Gl'];}
if (isset($_POST['house_Go']) && !empty($_POST['house_Go'])) {$house=$_POST['house_Go'];}
if (isset($_POST['house_Dy']) && !empty($_POST['house_Dy'])) {$house=$_POST['house_Dy'];}
if (isset($_POST['house_Ki']) && !empty($_POST['house_Ki'])) {$house=$_POST['house_Ki'];}
if (isset($_POST['house_Ko']) && !empty($_POST['house_Ko'])) {$house=$_POST['house_Ko'];}
if (isset($_POST['house_Ku']) && !empty($_POST['house_Ku'])) {$house=$_POST['house_Ku'];}
if (isset($_POST['house_Ln']) && !empty($_POST['house_Ln'])) {$house=$_POST['house_Ln'];}
if (isset($_POST['house_Lr']) && !empty($_POST['house_Lr'])) {$house=$_POST['house_Lr'];}
if (isset($_POST['house_Lo']) && !empty($_POST['house_Lo'])) {$house=$_POST['house_Lo'];}
if (isset($_POST['house_Ma']) && !empty($_POST['house_Ma'])) {$house=$_POST['house_Ma'];}
if (isset($_POST['house_Na']) && !empty($_POST['house_Na'])) {$house=$_POST['house_Na'];}
if (isset($_POST['house_Pu']) && !empty($_POST['house_Pu'])) {$house=$_POST['house_Pu'];}
if (isset($_POST['house_Sa']) && !empty($_POST['house_Sa'])) {$house=$_POST['house_Sa'];}
if (isset($_POST['house_So']) && !empty($_POST['house_So'])) {$house=$_POST['house_So'];}
if (isset($_POST['house_Te']) && !empty($_POST['house_Te'])) {$house=$_POST['house_Te'];}
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
$result2 = mysql_query("SELECT * FROM houses WHERE street='$street' AND house='$house'", $db);
$myrow2 = mysql_fetch_array($result2);
?>

      
<table id="inventory" width="99%" class="">
    <caption> <!-- Заголовок таблицы -->
    <?php printf ("<h2>Характеристика дома по адресу: ул.<em>%s,</em> д.<em>%s</em> (%s, %s)</h2>", $myrow2['street'],$myrow2['house'],$myrow2['street_dop'],$myrow2['house_dop']); ?>
        
    </caption>

         
    <tr><td><table width="100%">
           <tr><td style="vertical-align: top;" colspan="2">
               <div class="ren">
       			
  	   <ul class="lst1">	
<?php        			
    printf ("<li>Дом: <span>%s, %s-</span>этажный, планировка квартир: <span>%s</span>.</li>
			<li>Дополнительные сведения о доме (для ориентации) - <span>%s</span></li>",
$myrow2['walls'],$myrow2['floors'],$myrow2['improved'],$myrow2['orientation']);

if ($myrow2['street'] == 'Набережная') {$street = 'Набережная им. Н. Островского';}
else if (($myrow2['street'] == 'Сафьяна') && ($myrow2['house'] == '2-а')) {$street = 'М.Х. Сафьяна'; $house = '2';}
else if ($myrow2['street'] == 'Сафьяна') {$street = 'М.Х. Сафьяна';}
else if (($myrow2['street'] == 'Советская') && ($myrow2['house'] == '2-а')) {$house = '2';}
else if (($myrow2['street'] == 'Пушкина') && ($myrow2['house'] == '13')) {$house = '13 к2';}
else if (($myrow2['street'] == 'Пушкина') && ($myrow2['house'] == '17')) {$house = '17 к1';}
else if (($myrow2['street'] == 'Ломоносова') && ($myrow2['house'] == '3-а')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '3А';}
else if (($myrow2['street'] == 'Ломоносова') && ($myrow2['house'] == '3-б')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '3Б';}
else if (($myrow2['street'] == 'Ломоносова') && ($myrow2['house'] == '3-в')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '3В';}
else if (($myrow2['street'] == 'Ломоносова') && ($myrow2['house'] == '3-г')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '3Г';}
else if (($myrow2['street'] == 'Ломоносова') && ($myrow2['house'] == '5-в')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '5В';}
else if (($myrow2['street'] == 'Ломоносова') && ($myrow2['house'] == '7-а')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '7А';}
else if (($myrow2['street'] == 'Ломоносова') && ($myrow2['house'] == '7-б')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '7Б';}
else if (($myrow2['street'] == 'Ломоносова') && ($myrow2['house'] == '7-в')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '7В';}
else if (($myrow2['street'] == 'Ломоносова') && ($myrow2['house'] == '9-а')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '9А';}
else if (($myrow2['street'] == 'Ломоносова') && ($myrow2['house'] == '9-б')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '9Б';}
else if (($myrow2['street'] == 'Ломоносова') && ($myrow2['house'] == '9-в')) {$street = 'пр-кт. Имени М.В.Ломоносова'; $house = '9В';}
else if ($myrow2['street'] == 'Ломоносова') {$street = 'пр-кт. Имени М.В.Ломоносова';}
else if ($myrow2['house'] == '3-а') {$house = '3А';}
else if ($myrow2['house'] == '5-а') {$house = '5А';}
else if ($myrow2['house'] == '6-а') {$house = '6А';}
else if ($myrow2['house'] == '7-а') {$house = '7А';}
else if ($myrow2['house'] == '9-а') {$house = '9А';}
else if ($myrow2['house'] == '10-а') {$house = '10А';}
else if ($myrow2['house'] == '11-а') {$house = '11А';}
else if ($myrow2['house'] == '12-а') {$house = '12А';}
else if ($myrow2['house'] == '13-а') {$house = '13А';}
else if ($myrow2['house'] == '14-а') {$house = '14А';}
else if ($myrow2['house'] == '15-а') {$house = '15А';}
else if ($myrow2['house'] == '17-а') {$house = '17А';}
else if ($myrow2['house'] == '18-а') {$house = '18А';}
else if ($myrow2['house'] == '20-а') {$house = '20А';}
else if ($myrow2['house'] == '22-а') {$house = '22А';}
else if ($myrow2['house'] == '27-а') {$house = '27А';}
else if ($myrow2['house'] == '29-а') {$house = '29А';}
else if ($myrow2['house'] == '31-а') {$house = '31А';}
else if ($myrow2['house'] == '32-а') {$house = '32А';}
else if ($myrow2['house'] == '36-а') {$house = '36А';}
else if ($myrow2['house'] == '41-а') {$house = '41А';}
else if ($myrow2['house'] == '42-а') {$house = '42А';}
else if ($myrow2['house'] == '43-а') {$house = '43А';}
else if ($myrow2['house'] == '45-а') {$house = '45А';}
else if ($myrow2['house'] == '46-а') {$house = '46А';}
else if ($myrow2['house'] == '47-а') {$house = '47А';}
else if ($myrow2['house'] == '49-а') {$house = '49А';}
else if ($myrow2['house'] == '54-а') {$house = '54А';}
else if ($myrow2['house'] == '3-б') {$house = '3Б';}
else if ($myrow2['house'] == '5-б') {$house = '5Б';}
else if ($myrow2['house'] == '6-б') {$house = '6Б';}
else if ($myrow2['house'] == '7-б') {$house = '7Б';}
else if ($myrow2['house'] == '9-б') {$house = '9Б';}
else if ($myrow2['house'] == '11-б') {$house = '11Б';}
else if ($myrow2['house'] == '12-б') {$house = '12Б';}
else if ($myrow2['house'] == '15-б') {$house = '15Б';}
else if ($myrow2['house'] == '17-б') {$house = '17Б';}
else if ($myrow2['house'] == '27-б') {$house = '27Б';}
else if ($myrow2['house'] == '29-б') {$house = '29Б';}
else if ($myrow2['house'] == '31-б') {$house = '31Б';}
else if ($myrow2['house'] == '41-б') {$house = '41Б';}
else if ($myrow2['house'] == '45-б') {$house = '45Б';}
else if ($myrow2['house'] == '3-в') {$house = '3В';}
else if ($myrow2['house'] == '5-в') {$house = '5В';}
else if ($myrow2['house'] == '7-в') {$house = '7В';}
else if ($myrow2['house'] == '9-в') {$house = '9В';}
else if ($myrow2['house'] == '15-в') {$house = '15В';}
else if ($myrow2['house'] == '29-в') {$house = '29В';}
else if ($myrow2['house'] == '3-г') {$house = '3Г';}

else {$street = $myrow2['street']; $house = $myrow2['house'];}

?>
        </ul>         
                </div> <!-- ren -->
                   
        </td></tr>

  <tr>
    <td class="one" id="photo1"><img width="70%" src="images/houses/<?php echo $myrow2['photo1'] ?>.jpg" alt="Фото №1 дома <?php echo $myrow2['house'] ?> по ул.<?php echo $myrow2['street'] ?>"/></td>
    <td class="two" id="photo2"><img width="70%" src="images/houses/<?php echo $myrow2['photo2'] ?>.jpg" alt="Фото №2 дома <?php echo $myrow2['house'] ?> по ул.<?php echo $myrow2['street'] ?>"/></td>
  </tr>

           
    </table></td></tr>
    
  
                    
</table> <!-- inventory -->

<div id="photoFlat">

<!-- MAPS -->
<div id="map">
    <div id="mapFrame"></div>
</div>
 
     
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



</div> <!-- photoFlat -->


 <p><a href="index_adm.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>   
  


</body>
</html>
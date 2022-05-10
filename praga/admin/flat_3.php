<?php
//include ("lock.php"); /* Пароль в админскую часть */
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
//mysql_query('SET NAMES utf8');
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='flat_3'",$db);

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
<script type="text/javascript" src="../js/praga_script.js"></script>

</head>

<body id="flat_3">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header_adm.php"); ?>


<!-- Начало кода REALTIES -->
<?php
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='flat_3'",$db);
$myrow = mysql_fetch_array($result);

$result1 = mysql_query("SELECT date,month,text FROM settings WHERE page='realty'",$db);
$myrow1 = mysql_fetch_array($result1);

?>


    <div id="realties">
        <h1><?php echo $myrow['h1'] ?></h1>
              <table id="inventory" width="99%" class="realty">
                  <caption> <!-- Заголовок таблицы -->
                    <?php printf ("<h2>%s %s %s</h2>", $myrow['h2'],$myrow1['date'],$myrow1['month']);?>
                    <?php echo $myrow1['text'] ?>
                  </caption>

<!-- Подключаем БЛОК выбора параметров -->
    <?php include ("blocks/parameters_flat3.php"); ?>

                  <tr class="input"><td colspan="8">
                  <input class="back" type="button" value="назад" onclick="setActiveStyleSheet('screen'); return false;" />
                  <input class="print" type="button" value="версия для печати" onclick="setActiveStyleSheet('print_screen'); return false;" />
                  <input type="button" value="печать" onclick="printit()" />
                  </td></tr>
                  
                  <colgroup> <!-- Задание ширины и стилей для колонок таблицы -->
                      <col id="idid" />
                      <col id="address" /> <!-- Задание ширины и стилей для одной из колонок таблицы -->
                      <col id="square" />
                      <col id="characteristic" />
                      <col id="floor" />
                      <col id="trade" />
                      <col id="price" />
                      <col id="firm" />
                  </colgroup>
                  
                    <tr class="alt"> <!-- Строка таблицы -->
                      <th scope="col">ID</th>
                      <th scope="col">Адрес</th> <!-- Заголовочная ячейка таблицы -->
                      <th scope="col" >Площадь, кв.м.</th>
                      <th scope="col">Характеристики</th>
                      <th scope="col" axis="num">Этаж</th>
                      <th scope="col">Вид сделки</th>
                      <th scope="col" axis="num">Цена, руб.</th>
                      <th scope="col">Агентство</th>
                    </tr>

<?php include ("blocks/vybor_flat3.php");?>
                    
<?php
$result = mysql_query("SELECT * FROM flats_firm WHERE $param ORDER BY street, house", $db);
$myrow = mysql_fetch_array($result);
if (isset($_GET['id'])) {$id=$_GET['id'];}
if (isset($_GET['firm'])) {$firm=$_GET['firm'];}

$even=true;                    
do {
    
$result1 = mysql_query("SELECT * FROM agency WHERE title='$myrow[firm]'", $db);
$myrow1 = mysql_fetch_array($result1);    
    
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
                      <td><p><a href='flats1.php?id=%s'>%s, %s</a></p></td>
                      <td>%s</td>
                      <td>%s, %s, %s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td><p><a href='full.php?id=%s'>%s</a></p></td>
                    </tr>  " ,$myrow['id'],$myrow['id'],$myrow['street'],$myrow['house'],$myrow['square'],$myrow['balcony'],$myrow['wall'],$myrow['improved'],$myrow['floor'],$myrow['trade'],$myrow['price'],$myrow1['id'],$myrow['firm']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
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
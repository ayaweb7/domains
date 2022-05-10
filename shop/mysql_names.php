<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='mysql_names'");
$myrow1 = mysqli_fetch_array($result1);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $myrow1['title'] ?></title>
<link href="css/screen.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/praga_script_adm.js"></script>
<!-- <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" /> -->

</head>

<body>
<?php

if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['town'])) {$town = $_POST['town'];}
if (isset($_POST['adress'])) {$adress = $_POST['adress'];}
if (isset($_POST['shop'])) {$shop = $_POST['shop'];}
if (isset($_POST['gruppa'])) {$gruppa = $_POST['gruppa'];}
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['characteristic'])) {$characteristic = $_POST['characteristic'];}
if (isset($_POST['quantity'])) {$quantity = $_POST['quantity'];}
if (isset($_POST['item'])) {$item = $_POST['item'];}
if (isset($_POST['price'])) {$price = $_POST['price'];}
if (isset($_POST['amount'])) {$amount = $_POST['amount'];}

$db = mysqli_connect ("localhost","nikart","arteeva12");
mysqli_select_db ($db, "agency");

$result = mysqli_query($db, "SELECT * FROM shops WHERE name='$name'");
$myrow = mysqli_fetch_array($result);

		include ("header_admin.php");
?>
	<!-- Начало кода REALTIES -->

    <div id="realties">
              <table id="inventory" width="99%" class="realty">

				<colgroup> <!-- Задание ширины и стилей для колонок таблицы -->
                      <col id="id" /> <!-- Задание ширины и стилей для одной из колонок таблицы -->
                      <col id="shop" />
					  <col id="address" />
					  <col id="characteristic" />
                      <col id="item" />
                      <col id="trade" />
                      <col id="price" />
					  <col id="date" />
                </colgroup>
                  
                    <tr class="alt"> <!-- Строка таблицы -->
                      <th scope="col">ID</th> <!-- Заголовочная ячейка таблицы -->
                      <th scope="col">Магазин</th>
					  <th scope="col">Адрес</th>
					  <th scope="col">Наименование товара</th>
                      <th scope="col">Количество</th>
                      <th scope="col">Цена, руб.</th>
                      <th scope="col">Стоимость, руб.</th>
					  <th scope="col">Дата</th>
                    </tr>

<?php 
$result = mysqli_query($db, "SELECT * FROM shops WHERE name='$name' ORDER BY name, characteristic");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {

$even=true;
$sum = 0;                    
do {
	$sum = $sum + $myrow['amount'];
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><a href='form.php?id=%s'>%s</a></td>
					  <td>%s</td>
					  <td>%s, %s</td>
					  <td>%s %s</td>
                      <td>%s %s</td>
                      <td>%s</td>
                      <td>%s</td>
					  <td>%s</td>
					</tr>  ",$myrow['id'],$myrow['id'],$myrow['shop'],$myrow['town'],$myrow['adress'],$myrow['name'],$myrow['characteristic'],$myrow['quantity'],$myrow['item'],$myrow['price'],$myrow['amount'],$myrow['date']); 
$even=!$even;
}

while ($myrow = mysqli_fetch_array($result));

}
?>
					<tr><td colspan='6'></td><td style='background-color: #19910f; font: 1,2em bold Georgia, "Times New Roman", Times, serif; color: #FFF300;'><?php echo $sum.' руб.' ?></td></tr>

				<caption> <!-- Заголовок таблицы -->
                    <h1>Всего на <em><?php echo $name ?></em> затрачено: <em><?php echo $sum.' руб.' ?></em></h1>
                  </caption>
                </table> <!-- inventory -->

<!-- Подключаем FOOTER -->
		<?php include ("footer.php"); ?>

</body>
</html>
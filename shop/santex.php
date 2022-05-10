<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='santex'");
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

<body id="realty">

<!-- Подключаем HEADER -->
		<?php include ("header_admin.php"); ?>

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
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='Сантехника' ORDER BY name, characteristic");
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
                    <h1>На <em><?php echo $myrow1['h1'] ?></em><?php echo $myrow1['h2'] ?> потрачено: <em><?php echo $sum.' руб.' ?></em></h1>
                  </caption>
                   
                </table> <!-- inventory -->

<!-- Подключаем FOOTER -->
		<?php include ("footer.php"); ?>

</body>
</html>
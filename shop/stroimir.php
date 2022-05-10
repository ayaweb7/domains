<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='stroimir'");
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
        <h1><?php echo $myrow['h1'] ?></h1>
              <table id="inventory" width="99%" class="realty">
                  
                  <colgroup> <!-- Задание ширины и стилей для колонок таблицы -->
                      <col id="id" /> <!-- Задание ширины и стилей для одной из колонок таблицы -->
                      <col id="characteristic" />
                      <col id="item" />
                      <col id="trade" />
                      <col id="price" />
					  <col id="date" />
                  </colgroup>
                  
                    <tr class="alt"> <!-- Строка таблицы -->
                      <th scope="col">ID</th> <!-- Заголовочная ячейка таблицы -->
                      <th scope="col">Наименование товара</th>
                      <th scope="col">Количество</th>
                      <th scope="col">Цена, руб.</th>
                      <th scope="col">Стоимость, руб.</th>
					  <th scope="col">Дата</th>
                    </tr>
                    
<?php 
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='Ветряк' and shop='СтройМир' ORDER BY name, characteristic");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Ветряк</td></tr>");

$even=true;
$sum9 = 0;                    
do {
	$sum9 = $sum9 + $myrow['amount'];
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><a href='form.php?id=%s'>%s</a></td>
					  <td>%s %s</td>
                      <td>%s %s</td>
                      <td>%s</td>
                      <td>%s</td>
					  <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['name'],$myrow['characteristic'],$myrow['quantity'],$myrow['item'],$myrow['price'],$myrow['amount'],$myrow['date']); 

$even=!$even;
}
while ($myrow = mysqli_fetch_array($result));
}
?>

<!--					<tr><td colspan='4'></td><td style='background-color: #19910f; font: 1,2em bold Georgia, "Times New Roman", Times, serif; color: #FFF300;'><?php echo $sum9.' руб.' ?></td></tr> -->

<?php 
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='Дерево' and shop='СтройМир' ORDER BY name, characteristic");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Пиломатериалы, изделия из дерева</td></tr>");

$even=true;
$sum1 = 0;                    
do {
	$sum1 = $sum1 + $myrow['amount'];
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><a href='form.php?id=%s'>%s</a></td>
					  <td>%s %s</td>
                      <td>%s %s</td>
                      <td>%s</td>
                      <td>%s</td>
					  <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['name'],$myrow['characteristic'],$myrow['quantity'],$myrow['item'],$myrow['price'],$myrow['amount'],$myrow['date']); 

$even=!$even;
}
while ($myrow = mysqli_fetch_array($result));
}
?>

<!--					<tr><td colspan='4'></td><td style='background-color: #19910f; font: 1,2em bold Georgia, "Times New Roman", Times, serif; color: #FFF300;'><?php echo $sum1.' руб.' ?></td></tr> -->

<?php 
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='Инструмент' and shop='СтройМир' ORDER BY name, characteristic");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Инструмент</td></tr>");

$even=true;
$sum2 = 0;                    
do {
	$sum2 = $sum2 + $myrow['amount'];
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><a href='form.php?id=%s'>%s</a></td>
					  <td>%s %s</td>
                      <td>%s %s</td>
                      <td>%s</td>
                      <td>%s</td>
					  <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['name'],$myrow['characteristic'],$myrow['quantity'],$myrow['item'],$myrow['price'],$myrow['amount'],$myrow['date']); 
$even=!$even;
}
while ($myrow = mysqli_fetch_array($result));
}
?>
					<tr><td colspan='4'></td><td style='background-color: #19910f; font: 1,2em bold Georgia, "Times New Roman", Times, serif; color: #FFF300;'><?php echo $sum2.' руб.' ?></td></tr>

<?php 
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='Лакокрасочные' and shop='СтройМир' ORDER BY name, characteristic");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Лакокрасочные материалы</td></tr>");

$even=true;
$sum3 = 0;                    
do {
	$sum3 = $sum3 + $myrow['amount'];
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><a href='form.php?id=%s'>%s</a></td>
					  <td>%s %s</td>
                      <td>%s %s</td>
                      <td>%s</td>
                      <td>%s</td>
					  <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['name'],$myrow['characteristic'],$myrow['quantity'],$myrow['item'],$myrow['price'],$myrow['amount'],$myrow['date']); 
$even=!$even;
}
while ($myrow = mysqli_fetch_array($result));
}
?>
					<tr><td colspan='4'></td><td style='background-color: #19910f; font: 1,2em bold Georgia, "Times New Roman", Times, serif; color: #FFF300;'><?php echo $sum3.' руб.' ?></td></tr>

<?php 
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='Посуда' and shop='СтройМир' ORDER BY name, characteristic");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Посуда</td></tr>");

$even=true;
$sum10 = 0;                    
do {
	$sum10 = $sum10 + $myrow['amount'];
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><a href='form.php?id=%s'>%s</a></td>
					  <td>%s %s</td>
                      <td>%s %s</td>
                      <td>%s</td>
                      <td>%s</td>
					  <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['name'],$myrow['characteristic'],$myrow['quantity'],$myrow['item'],$myrow['price'],$myrow['amount'],$myrow['date']); 

$even=!$even;
}
while ($myrow = mysqli_fetch_array($result));
}
?>
<!--					<tr><td colspan='4'></td><td style='background-color: #19910f; font: 1,2em bold Georgia, "Times New Roman", Times, serif; color: #FFF300;'><?php echo $sum10.' руб.' ?></td></tr> -->

<?php 
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='Расходники' and shop='СтройМир' ORDER BY name, characteristic");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Расходные материалы</td></tr>");

$even=true;
$sum4 = 0;                    
do {
	$sum4 = $sum4 + $myrow['amount'];
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><a href='form.php?id=%s'>%s</a></td>
					  <td>%s %s</td>
                      <td>%s %s</td>
                      <td>%s</td>
                      <td>%s</td>
					  <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['name'],$myrow['characteristic'],$myrow['quantity'],$myrow['item'],$myrow['price'],$myrow['amount'],$myrow['date']); 
$even=!$even;
}
while ($myrow = mysqli_fetch_array($result));
}
?>
					<tr><td colspan='4'></td><td style='background-color: #19910f; font: 1,2em bold Georgia, "Times New Roman", Times, serif; color: #FFF300;'><?php echo $sum4.' руб.' ?></td></tr>

<?php 
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='Сад' and shop='СтройМир' ORDER BY name, characteristic");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Сад & Огород</td></tr>");

$even=true;
$sum10 = 0;                    
do {
	$sum10 = $sum10 + $myrow['amount'];
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><a href='form.php?id=%s'>%s</a></td>
					  <td>%s %s</td>
                      <td>%s %s</td>
                      <td>%s</td>
                      <td>%s</td>
					  <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['name'],$myrow['characteristic'],$myrow['quantity'],$myrow['item'],$myrow['price'],$myrow['amount'],$myrow['date']); 

$even=!$even;
}
while ($myrow = mysqli_fetch_array($result));
}
?>
					<tr><td colspan='4'></td><td style='background-color: #19910f; font: 1,2em bold Georgia, "Times New Roman", Times, serif; color: #FFF300;'><?php echo $sum10.' руб.' ?></td></tr>

<?php 
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='Сантехника' and shop='СтройМир' ORDER BY name, characteristic");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Сантехника</td></tr>");

$even=true;
$sum8 = 0;                    
do {
	$sum8 = $sum8 + $myrow['amount'];
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><a href='form.php?id=%s'>%s</a></td>
					  <td>%s %s</td>
                      <td>%s %s</td>
                      <td>%s</td>
                      <td>%s</td>
					  <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['name'],$myrow['characteristic'],$myrow['quantity'],$myrow['item'],$myrow['price'],$myrow['amount'],$myrow['date']); 
$even=!$even;
}
while ($myrow = mysqli_fetch_array($result));
}
?>
					<tr><td colspan='4'></td><td style='background-color: #19910f; font: 1,2em bold Georgia, "Times New Roman", Times, serif; color: #FFF300;'><?php echo $sum8.' руб.' ?></td></tr>

<?php 
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='Стройматериалы' and shop='СтройМир' ORDER BY name, characteristic");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Стройматериалы</td></tr>");

$even=true;
$sum5 = 0;                    
do {
	$sum5 = $sum5 + $myrow['amount'];
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><a href='form.php?id=%s'>%s</a></td>
					  <td>%s %s</td>
                      <td>%s %s</td>
                      <td>%s</td>
                      <td>%s</td>
					  <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['name'],$myrow['characteristic'],$myrow['quantity'],$myrow['item'],$myrow['price'],$myrow['amount'],$myrow['date']); 
$even=!$even;
}
while ($myrow = mysqli_fetch_array($result));
}
?>
					<tr><td colspan='4'></td><td style='background-color: #19910f; font: 1,2em bold Georgia, "Times New Roman", Times, serif; color: #FFF300;'><?php echo $sum5.' руб.' ?></td></tr>

<?php 
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='Химия' and shop='СтройМир' ORDER BY name, characteristic");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Химия</td></tr>");

$even=true;
$sum6 = 0;                    
do {
	$sum6 = $sum6 + $myrow['amount'];
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><a href='form.php?id=%s'>%s</a></td>
					  <td>%s %s</td>
                      <td>%s %s</td>
                      <td>%s</td>
                      <td>%s</td>
					  <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['name'],$myrow['characteristic'],$myrow['quantity'],$myrow['item'],$myrow['price'],$myrow['amount'],$myrow['date']); 
$even=!$even;
}
while ($myrow = mysqli_fetch_array($result));
}
?>
					<tr><td colspan='4'></td><td style='background-color: #19910f; font: 1,2em bold Georgia, "Times New Roman", Times, serif; color: #FFF300;'><?php echo $sum6.' руб.' ?></td></tr>

<?php 
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='Электрика' and shop='СтройМир' ORDER BY name, characteristic");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {
printf ("<tr class='sub absent'><td colspan='8'>Электрика</td></tr>");

$even=true;
$sum7 = 0;                    
do {
	$sum7 = $sum7 + $myrow['amount'];
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><a href='form.php?id=%s'>%s</a></td>
					  <td>%s %s</td>
                      <td>%s %s</td>
                      <td>%s</td>
                      <td>%s</td>
					  <td>%s</td>
                    </tr>  ",$myrow['id'],$myrow['id'],$myrow['name'],$myrow['characteristic'],$myrow['quantity'],$myrow['item'],$myrow['price'],$myrow['amount'],$myrow['date']); 
$even=!$even;
}
while ($myrow = mysqli_fetch_array($result));
}
?>
					<tr><td colspan='4'></td><td style='background-color: #19910f; font: 1,2em bold Georgia, "Times New Roman", Times, serif; color: #FFF300;'><?php echo $sum7.' руб.' ?></td></tr>
				<caption> <!-- Заголовок таблицы -->
                    <h1>В магазинах сети <?php echo $myrow1['h1'] ?><em><?php echo $myrow1['h2'] ?></em> оставлено:</br><em><?php echo $sum1+$sum2+$sum3+$sum4+$sum5+$sum6+$sum7.' руб.' ?></em></h1>
                 </caption>
                   
                </table> <!-- inventory -->

<!-- Подключаем FOOTER -->
		<?php include ("footer.php"); ?>

</body>
</html>
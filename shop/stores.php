<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='stores'");
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
// Подключаем HEADER
include ("header_admin.php");

if (isset($_POST['id_store'])) {$id_store = $_POST['id_store'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['town'])) {$town = $_POST['town'];}
if (isset($_POST['id_locality'])) {$id_locality = $_POST['id_locality'];}
if (isset($_POST['street'])) {$street = $_POST['street'];}
if (isset($_POST['house'])) {$house = $_POST['house'];}
if (isset($_POST['shop'])) {$shop = $_POST['shop'];}
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}

$db = mysqli_connect ("localhost","nikart","arteeva12");
mysqli_select_db ($db, "agency");


//$result = mysqli_query($db, "SELECT * FROM store WHERE shop='$shop'");
//$myrow = mysqli_fetch_array($result);

		
?>
	<!-- Начало кода REALTIES -->

    <div id="realties">
		<form name='form' action='form_stores.php' method='post'>
              <table id="inventory" width="99%" class="realty">

				<colgroup> <!-- Задание ширины и стилей для колонок таблицы -->
                      <col id="id_store" /> <!-- Задание ширины и стилей для одной из колонок таблицы -->
                      <col id="shop" />
					  <col id="town" />
					  <col id="address" />
					  <col id="phone" />
					  <col id="date" />
                </colgroup>
                  
                    <tr class="alt"> <!-- Строка таблицы -->
                      <th scope="col">ID</th> <!-- Заголовочная ячейка таблицы -->
                      <th scope="col">Магазин</th>
					  <th scope="col">Город</th>
					  <th scope="col">Адрес</th>
                      <th scope="col">Телефоны</th>
                      <th scope="col">Дата ввода</th>
                    </tr>

<?php 
$result = mysqli_query($db, "SELECT * FROM store ORDER BY shop");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id_store'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {

$even=true;
$sum = 0;                    
do {
	$sum = $sum + 1;
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td><a href='store_form_update.php?id_store=%s'>%s</a></td>
					  <td>%s</td>
					  <td>%s - %s</td>
                      <td>%s, %s</td>
					  <td>%s</td>
					  <td>%s</td>
					</tr>  ",$myrow['id_store'],$myrow['id_store'],$myrow['shop'],$myrow['town'],$myrow['id_locality'],$myrow['street'],$myrow['house'],$myrow['phone'],$myrow['date']); 
$even=!$even;
}

while ($myrow = mysqli_fetch_array($result));

}
?>
				<caption> <!-- Заголовок таблицы -->
                    <h1>Всего магазинов в базе: <em><?php echo $sum ?></em></h1>
                  </caption>
                </table> <!-- inventory -->
			</form>
	</div>

<!-- Подключаем FOOTER -->
		<?php //include ("footer_update.php"); ?>

</body>
</html>
<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='settings_update'");
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
		<!-- Подключаем HEADER -->
		<?php include ("header_admin.php"); ?>

		<!-- Начало кода REALTIES -->

    <div id="realties">
		<form name='form' action='settings_form_update.php' method='post'>
              <table id="inventory" width="99%" class="realty">

				<colgroup> <!-- Задание ширины и стилей для колонок таблицы -->
                      <col id="id" /> <!-- Задание ширины и стилей для одной из колонок таблицы -->
                      <col id="shop" />
					  <col id="address" />
					  <col id="characteristic" />
                      <col id="item" />
                      <col id="trade" />
                      <col id="date" />
                </colgroup>
                  
                    <tr class="alt"> <!-- Строка таблицы -->
                      <th scope="col">ID</th> <!-- Заголовочная ячейка таблицы -->
                      <th scope="col">PAGE</th>
					  <th scope="col">TITLE</th>
					  <th scope="col">META_D</th>
                      <th scope="col">META_K</th>
                      <th scope="col">H1</th>
                      <th scope="col">H2</th>
                    </tr>

<?php 
$result = mysqli_query($db, "SELECT * FROM settings ORDER BY page");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {

$even=true;
$sum = 0;                    
do {
	$sum = $sum + $myrow['amount'];
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
					  <td><a href='settings_form_update.php?id=%s'>%s</a></td>
					  <td>%s</td>
					  <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
					  <td>%s</td>
					</tr>  ",$myrow['id'],$myrow['id'],$myrow['page'],$myrow['title'],$myrow['meta_d'],$myrow['meta_k'],$myrow['h1'],$myrow['h2']); 
$even=!$even;
}

while ($myrow = mysqli_fetch_array($result));

}
?>

				<caption> <!-- Заголовок таблицы -->
                    <h1><?php echo $myrow1['h1'] ?> - <em><?php echo $myrow1['h2'] ?></em></h1>
                  </caption>
                </table> <!-- inventory -->
			</form>
	</div>

<!-- Подключаем FOOTER -->
		<?php include ("footer.php"); ?>

</body>
</html>
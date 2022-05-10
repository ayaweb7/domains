<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='settings_update'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
?>
	<!-- Начало кода REALTIES -->

<!--<div id="realties">-->

<form name='form' action='settings_form_update.php' method='post'>
	<table id="inventory" width="99%" class="realty">

		<colgroup> <!-- Задание ширины и стилей для колонок таблицы -->
			<col id="id" /> <!-- Задание ширины и стилей для одной из колонок таблицы -->
			<col id="shop" />
			<col id="address" />
			<col id="trade" />
			<col id="date" />
		</colgroup>
                  
		<tr class="alt"> <!-- Строка таблицы -->
			<th scope="col">ID</th> <!-- Заголовочная ячейка таблицы -->
			<th scope="col">PAGE</th>
			<th scope="col">TITLE</th>
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
	$sum = $sum + 1;
printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
                      <td>%s</td>
					  <td><a href='form_settings_update.php?id=%s'>%s</a></td>
					  <td>%s</td>
					  <td>%s</td>
					  <td>%s</td>
					</tr>  ", $myrow['id'],$myrow['id'], $myrow['page'], $myrow['title'], $myrow['h1'], $myrow['h2']); 
$even=!$even;
}

while ($myrow = mysqli_fetch_array($result));

}
?>

<!-- Заголовок таблицы -->
		<caption>
			<h1><?php echo $myrow1['h1'] ?> - <em><?php echo $myrow1['h2'] ?></em><br>
			Общее количество страниц: <em><?php echo $sum ?></em></h1>
		</caption>
	</table> <!-- inventory -->
</form>
<!--</div>-->

<?php
// Подключаем FOOTER_MAIN
include ("blocks/footer_main.php");
?>
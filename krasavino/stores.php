<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='stores'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
?>
	<!-- Начало кода REALTIES -->

<!--<div id="realties">-->
<form name='form' action='form_stores.php' method='post'>
	<table id="inventory" width="99%" class="realty">

		<colgroup> <!-- Задание ширины и стилей для колонок таблицы -->
			<col class="id_store" /> <!-- Задание ширины и стилей для одной из колонок таблицы -->
			<col class="shop_store" />
			<col class="town_store" />
			<col class="address_store" />
			<col class="phone_store" />
		</colgroup>
                  
		<tr class="alt"> <!-- Строка таблицы -->
			<th scope="col">ID</th> <!-- Заголовочная ячейка таблицы -->
			<th scope="col">Магазин</th>
			<th scope="col">Город, код города</th>
			<th scope="col">Адрес</th>
			<th scope="col">Телефоны</th>
		</tr>

<?php
// Выборка в цикле всех существующих магазинов
$result = mysqli_query($db, "SELECT * FROM store ORDER BY shop");
$myrow = mysqli_fetch_array($result);

if (!isset($myrow['id_store'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
else {

$even=true;
$sum = 0;
do {
	$sum = $sum + 1;
printf ("<tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
			<td>%s</td>
			<td><a href='form_store.php?id_store=%s'>%s</a></td>
			<td>%s - %s</td>
			<td>%s, %s</td>
			<td>%s</td>
		</tr>  ", $myrow['id_store'], $myrow['id_store'], $myrow['shop'], $myrow['town'], $myrow['id_locality'],
				$myrow['street'], $myrow['house'], $myrow['phone']); 
$even=!$even;
}

while ($myrow = mysqli_fetch_array($result));

}
?>
<!-- Заголовок таблицы -->
		<caption><h1>Всего магазинов в базе: <em><?php echo $sum ?></em></h1></caption>
	</table> <!-- inventory -->
</form>
<!--</div>-->

<?php
// Подключаем FOOTER_MAIN
include ("blocks/footer_main.php");
?>
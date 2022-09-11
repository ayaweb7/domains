<?php
// Подключаем HEADER
include ("blocks/header_admin.php");

if (isset($_POST['shop_search'])) {
	$shop_search = $_POST['shop_search'];
	
	
	$result = mysqli_query($db, "SELECT * FROM store WHERE shop='$shop_search'");
	$myrow = mysqli_fetch_array($result);
	
	print <<<HERE
<table class="adm" align="center" width="100%">
	<caption> <!-- Заголовок таблицы -->
		<h1 style='font-size: 2.5em; font-style: italic; font-weight: normal; color: #19910f;' align='center'>Магазин <em style='color: #e50000; font-weight: bold;'>$myrow[shop]</em></h1><br>
		<h1 style='font-size: 2em;' align='center'>№ <em>$myrow[store_id]</em> Находится по адресу: <em style='color: #19910f;'>$myrow[town], $myrow[street], $myrow[house]</em><br> (Контактная информация, телефон: <span style='color: #e50000;'>$myrow[phone]</span>)</br>
	</caption>
</table>
HERE;
}


if (isset($_GET['store_id'])) {
	$store_id = $_GET['store_id'];
	
	$result = mysqli_query($db, "SELECT * FROM store WHERE store_id='$store_id'");
	$myrow = mysqli_fetch_array($result);
		
	print <<<HERE
<table class="adm" align="center" width="100%">
	<caption> <!-- Заголовок таблицы -->
		<h1 style='font-size: 2.5em; font-style: italic; font-weight: normal; color: #19910f;' align='center'>Магазин <em style='color: #e50000; font-weight: bold;'>$myrow[shop]</em></h1><br>
		<h1 style='font-size: 2em;' align='center'>№ <em>$myrow[store_id]</em> Находится по адресу: <em style='color: #19910f;'>$myrow[town], $myrow[street], $myrow[house]</em><br> (Контактная информация, телефон: <span style='color: #e50000;'>$myrow[phone]</span>)</br>
	</caption>
</table>
HERE;
}





//Закрытие объектов с результатами и подключение к базе данных
$result->close();
$db->close();

// Подключаем FOOTER_SEARCH
include ("blocks/footer_store.php");
?>
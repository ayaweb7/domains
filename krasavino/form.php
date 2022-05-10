<?php
// Подключаем HEADER
include ("blocks/header_admin.php");

if (isset($_GET['id'])) {$id = $_GET['id'];}

$result = mysqli_query($db, "SELECT * FROM shops WHERE id='$id'");
$myrow = mysqli_fetch_array($result);

// Выборка параметров магазинов (город - town, адрес - adress, id_store) на основании предыдущей выборки - $myrow
$result5 = mysqli_query($db, "SELECT * FROM store WHERE shop='$myrow[shop]'");
$myrow5 = mysqli_fetch_array($result5);

print <<<HERE
<table class="adm" align="center" width="100%">
	<caption> <!-- Заголовок таблицы -->
		<h1 style='font-size: 2.5em; font-style: italic; font-weight: bold; color: #e50000;' align='center'>$myrow6[h1]</h1><br>
		<h1 style='font-size: 2em;' align='center'>№ <em>$myrow[id]</em> - <em style='color: #19910f;'>$myrow[name] $myrow[characteristic]</em> (группа $myrow[gruppa])</br>
			<span style='color: #e50000;'>$myrow[quantity]</span> $myrow[item] по <span style='color: #e50000;'>$myrow[price]</span> руб., всего <span style='color: #e50000;'>$myrow[amount]</span> руб.</br>
			Куплено в магазине <em style='color: #e50000;'>$myrow[shop]</em> по адресу: $myrow5[town], $myrow5[street], $myrow5[house] (№ <em style='color: #19910f;'>$myrow5[id_store]</em>)</br>
			Дата покупки: <em style='color: #8b0000;'>$myrow[date].</em></h1>
	</caption>
</table>

HERE;

//Закрытие объектов с результатами и подключение к базе данных
$result->close();
$result5->close();
$db->close();

// Подключаем FOOTER_SEARCH
include ("blocks/footer_search.php");
?>
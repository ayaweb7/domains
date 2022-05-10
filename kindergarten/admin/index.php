<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'pages' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM pages WHERE page='index_admin'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
	include ("blocks/header_adm.php");
?>

<!-- INFO -->
	<div id="info">
		<h1><?php echo $myrow1['h1'] ?></h1>
		<?php printf ("<h2>%s</h2>", $myrow1['h2']); ?>
	</div> <!-- info -->    

<!-- Подключаем FOOTER -->
	<?php include ("blocks/footer_adm.php"); ?>
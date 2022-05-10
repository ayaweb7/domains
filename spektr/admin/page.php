<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Подключаем HEADER
include ("blocks/header_adm.php");
?>

<!-- Начало кода INDEX -->
<div id="info">
	<h1><?php echo $myrow['h1'] ?></h1>
	<?php printf ("<h2>%s</h2>", $myrow['h2']); ?>

<!-- Подключаем UPDATES.PHP -->
	<?php include ($page . ".php"); ?>
</div> <!-- info -->    
 <!-- Конец кода INDEX -->

<!-- Подключаем FOOTER -->
		<?php include ("blocks/footer_adm.php"); ?>
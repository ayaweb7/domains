<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='photo_update'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
?>
<!---->

<form name="form" action="form_photo_update.php" method="post"><!-- onSubmit="return validateSearch(this)"-->

<!--divBig-->
<div id='divBig' class='flexBig'><!--divBig - #ccc-->
	<div id='divTop' class='flexTitle'><!--divTop -  style='background-color: lightgreen;'-->
		<?php echo $myrow1['h1'] . " " . $myrow1['h2'] ?>
	</div><!--divTop-->

<!--divMiddle-->
	<div id='divSmall' class='flexSmall'><!--divMiddle_1 - style='background-color: brown;' -->

<!--Введите номер фотографии-->			
			<div id='divNumber--' class='flexSmall'><!--divTown - style='background-color: olive;' -->
				<div class='blockInput'>
					<span>Введите номер фотографии</span>
					<input type="text" name="number" size="5" value="" />
				</div>
			</div><!--divNumber-->

	</div><!--divSmall-->
</div><!--divBig-->
<!--divBottom'-->	
	<div id='divBottom' class='flexTitle'><!-- style='background-color: #f9910f;'-->
		<input class='inputSubmit' type='submit' name='set_filter' value=' В В О Д ' />
		<input class='inputSubmit' type="reset" name="set_filter" value="сброс"/>
	</div><!--divBottom'-->	
</form>

<?php
// Подключаем FOOTER_SEARCH
include ("blocks/footer_search.php");
?>
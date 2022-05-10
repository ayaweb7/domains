<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='photo_insert'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
?>
<!---->

<form name="form" action="mysql_photo_insert.php" method="post"><!-- onSubmit="return validateSearch(this)"-->

<!--divBig-->
<div id='divBig' class='flexBig'><!--divBig - #ccc-->
	<div id='divTop' class='flexTitle'><!--divTop -  style='background-color: lightgreen;'-->
		<?php echo $myrow1['h1'] . " " . $myrow1['h2'] ?>
	</div><!--divTop-->

<!--divMiddle-->
	<div id='divSmall' class='flexSmall'><!--divMiddle_1 - style='background-color: brown;' -->

<!--divNumber-->			
			<div id='divNumber--' class='flexSmall'><!--divTown - style='background-color: olive;' -->
				<div class='blockInput'>
					<span>Номер фотографии</span>
					<input type="text" name="number" size="7" value="3-х значное число" />
				</div>
			</div><!--divNumber-->

<!--divDatePhoto-->			
			<div id='divDate' class='flexSmall'><!--divTown - style='background-color: olive;' -->
				<div class='blockInput'>
					<span>Дата фотографии</span>
					<input type="text" name="date_photo" size="20" value="25 апреля 2021" />
				</div>
			</div><!--divDatePhoto-->

<!--divDate-->			
			<div id='divDate' class='flexSmall'><!--divTown - style='background-color: olive;' -->
				<div class='blockInput'>
					<span>Дата фотографии</span>
					<input type='date' name='date' value='2021-03-19'>
				</div>
			</div><!--divDate-->

<!--divNotes-->
			<div id='divNotes' class='flexSmall'><!--divCharacteristic - style='background-color: blue;' -->
				<div class='blockInput'>
					<span>Описание<br>фотографии</span>
					<input type="text" name="notes" size="40" value="Что-нибудь написать"/>
				</div>
			</div><!--divNotes-->


	</div><!--divSmall-->
</div><!--divBig-->
<!--divBottom'-->	
	<div id='divBottom' class='flexTitle'><!-- style='background-color: #f9910f;'-->
		<input class='inputSubmit' type='submit' name='set_filter' value=' В В О Д ' />
		<input class='inputSubmit' type="reset" name="set_filter" value="сброс"/>
	</div><!--divBottom'-->	
</form>

<?php
//if (isset($_GET['townSelected'])) {$townSelected = $_GET['townSelected']; echo $townSelected;}
//else {echo 'BAD';}

// Подключаем FOOTER_SEARCH
include ("blocks/footer_search.php");

//SELECT * FROM 'store' WHERE town='Вологда' ORDER BY shop;
?>
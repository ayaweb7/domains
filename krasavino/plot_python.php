<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='plot_python'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
		
//if (isset($_GET['townSelected'])) {$townSelected = $_GET['townSelected'];} // echo $townSelected;
//else {echo 'BAD';}
?>

<form name="form" action="plot_result_python.php" method="post"><!-- onSubmit="return validateSearch(this)"-->

<!--divBig-->
<div id='divBig' class='flexBig'><!--divBig - #ccc-->
	<div id='divTop' class='flexTitle title'><!--divTop - -->
		<h1><em><?php echo $myrow1['h1'] . "</em><br>" . $myrow1['h2'] ?></h1>
	</div><!--divTop-->

<!--divLarge-->	
	<div id='divLarge' class='flexTitle'><!--divLarge - -->

<!--divMiddle_1-->
		<div id='divMiddle' class='flexMiddle'><!--divMiddle_1 - -->

<!--divView-->
			<div id='divName' class='flexSmall'><!--divName - -->
				<div class='blockInput'>
					<span>Вид графика</span><br>
					<select id='view' name='view' size='7'><!---->
						<option value='1' selected>Категории</option>
						<option value='2'>Месяцы</option>
						<option value='3'>Годы - Бары</option>
						<option value='4'>Годы - Круги</option>
						<option value='5'>Магазины</option>
						<option value='6'>Города</option>
						<option value='7'>Товары</option>
<!--						
						<option value='7'>Категории - Линии</option>
						<option value='8'>Города - Линии</option>
						<option value='9'>Магазины - Линии</option>
						<option value='10'>Категория:Год - Линии</option>
-->
					</select>
				</div>
			</div><!--divView---->


		</div><!--divMiddle_1-->

<!--divMiddle_2-->		
		<div id='divMiddle' class='flexMiddle'><!--divMiddle_2 - -->

<!--divYear-->
			<div id='divName' class='flexSmall'><!--divName - -->
				<div class='blockInput'>
					<span>Аналитика года</span><br>
					<select id='acct_yr' name='acct_yr' size='7'><!---->
						<option selected>все годы</option>
<?php
						for ($y = 2013 ; $y < 2023 ; ++$y)
							printf("<option>$y</option>");
?>						
					</select>
				</div>
			</div><!--divYear------>

		</div><!--divMiddle-->
	</div><!--divLarge-->

<!--divBottom'-->	
	<div id='divBottom' class='flexTitle'><!---->
		<input class='inputSubmit' type='submit' name='set_filter' value='ВЫБОРКА' />
		<input class='inputSubmit' type="reset" name="set_filter" value="сброс"/>
	</div><!--divBottom'-->

</div><!--divBig-->
</form>

<?php
// Подключаем FOOTER_SEARCH
include ("blocks/footer_search.php");

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
//$result1->close(); // Титулы, заголовки из таблицы 'settings'
//$db->close(); // Закрываем базу данных
?>
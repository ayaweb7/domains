<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='plot_search'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
		
//if (isset($_GET['townSelected'])) {$townSelected = $_GET['townSelected'];} // echo $townSelected;
//else {echo 'BAD';}
?>

<form name="form" action="plot_result.php" method="post"><!-- onSubmit="return validateSearch(this)"-->

<!--divBig-->
<div id='divBig' class='flexBig'><!--divBig - #ccc-->
	<div id='divTop' class='flexTitle title'><!--divTop - -->
		<h1><em><?php echo $myrow1['h1'] . "</em><br>" . $myrow1['h2'] ?></h1>
	</div><!--divTop-->

<!--divLarge-->	
	<div id='divLarge' class='flexTitle'><!--divLarge - -->

<!--divMiddle_1-->
		<div id='divMiddle' class='flexMiddle'><!--divMiddle_1 - -->
<!--divPlot-->
			<div id='divPlot' class='flexSmall'><!--divName - -->
				<div class='blockInput'>
					<span>Вид графика</span><br>
					<select id='view' name='view' size='7'><!---->
						<option value='1' selected>Категории</option>
						<option value='2'>Месяцы</option>
						<option value='3'>Годы - Бары</option>
						<option value='4'>Годы - Круги</option>
						<option value='5'>Топ Магазинов</option>
						<option value='6'>Топ Городов</option>
						<option value='7'>Топ Товаров</option>
<!--						
						<option value='7'>Категории - Линии</option>
						<option value='8'>Города - Линии</option>
						<option value='9'>Магазины - Линии</option>
						<option value='10'>Категория:Год - Линии</option>
-->
					</select>
				</div><!--divBlockInput-->
			</div><!--divPlot-->
		</div><!--divMiddle_1-->


<!--divMiddle_2-->		
		<div id='divMiddle' class='flexMiddle'><!--divMiddle_2 - -->
<!-- Категория -->
			<div id='divGruppa' class='flexSmall'><!--divName - -->
				<div class='blockInput'>
					<span>Выберите категорию</span><br>
						<select id='gruppa' name='gruppa' size='7'>
							<option selected>Не выбрана</option>
<?php
// Выборка в цикле всех существующих наименований товаров
$result1 = mysqli_query($db, "SELECT * FROM shops ORDER BY gruppa");
$myrow1 = mysqli_fetch_array($result1);
	$gruppa='';
	do
	{
		if ($myrow1['gruppa'] != $gruppa)
		{	
			printf  ("<option value=%s>%s</option>", $myrow1['gruppa'], $myrow1['gruppa']);
			$gruppa = $myrow1['gruppa'];
		}
	}
	while ($myrow1 = mysqli_fetch_array($result1));

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result1->close(); // Товары, отсортированные по алфавиту
?>
						</select>
				</div><!--divBlockInput-->
			</div><!--divGruppa---->
		</div><!--divMiddle_2-->		


<!--divMiddle_3-->		
		<div id='divMiddle' class='flexMiddle'><!--divMiddle_3 - -->
<!-- Выбор товара -->
			<div id='divName' class='flexSmall'><!--divName - -->
				<div class='blockInput'>
					<span>Выберите товар</span><br>
						<select id='name' name='name' size='7'>
							<option selected>Товар не выбран</option>
<?php
// Выборка в цикле всех существующих наименований товаров
$result = mysqli_query($db, "SELECT * FROM shops ORDER BY name");
$myrow = mysqli_fetch_array($result);
	$name='';
	do
	{
		if ($myrow['name'] != $name)
		{	
			printf  ("<option value=%s>%s</option>", $myrow['name'], $myrow['name']);
			$name = $myrow['name'];
		}
	}
	while ($myrow = mysqli_fetch_array($result));

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result->close(); // Товары, отсортированные по алфавиту
?>
						</select>
				</div><!--divBlockInput-->
			</div><!--divName---->
		</div><!--divMiddle_3-->		
		

<!--divMiddle_4-->		
		<div id='divMiddle' class='flexMiddle'><!--divMiddle_4 - -->
<!--divYear-->
			<div id='divYear' class='flexSmall'><!--divName - -->
				<div class='blockInput'>
					<span>Аналитика года</span><br>
					<select id='acct_yr' name='acct_yr' size='7'><!---->
						<option selected>Все годы</option>
<?php
						for ($y = 2013 ; $y < 2025 ; ++$y)
							printf("<option>$y</option>");
?>						
					</select>
				</div><!--divBlockInput-->
			</div><!--divYear------>
		</div><!--divMiddle_4-->
		
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
?>
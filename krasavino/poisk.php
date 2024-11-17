<?php 
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='poisk'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
?>

	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
		<caption>
			<h1 id='title'>
			<?php echo $myrow1['h1'] ?><br>
			<em><?php echo $myrow1['h2'] ?></em><br>
			<span style='font-size: 0.7em; font-style: italic';>(используйте клавиши <em>CTRL</em> или <em>SHIFT</em> для множественного выбора товаров или магазинов)</span>
			</h1>
		</caption>
		<tr valign="top" class="tablehead">

<!-- Выбор товара -->
			<td colspan="2" width="24%"><span>Выберите товар из списка</span><br><br>
				<form name='form' action='mysql_poisk.php' method='post'>
				<select name='name_search[]' size='7' multiple='multiple'>
<?php
// Выборка в цикле всех существующих наименований товаров
$result = mysqli_query($db, "SELECT * FROM shops ORDER BY name");
$myrow = mysqli_fetch_array($result);
	$name='';
	do
	{
		if ($myrow['name'] != $name)
		{	
			printf  ("<option value='%s'>%s</option>", $myrow['name'], $myrow['name']);
			$name = $myrow['name'];
		}
	}
	while ($myrow = mysqli_fetch_array($result));

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result->close(); // Товары, отсортированные по алфавиту
?>
				</select><br>
				<input class='inputSubmit' type='submit' value='подтвердите выбранный товар' /><br>
				<!--<input type="reset" name="set_filter" value="Сбросить"/>-->
				</form>
			</td>

<!-- Выбор магазина -->
			<td colspan="2" width="24%"><span>Выберите магазин из списка</span><br><br>
				<form name='form' action='mysql_poisk.php' method='post'>
				<select name='shop_search[]' size='7' multiple='multiple'>
<?php
// Выборка в цикле всех существующих магазинов
$result = mysqli_query($db, "SELECT * FROM shops ORDER BY shop");
$myrow = mysqli_fetch_array($result);
	$shop='';
	do
	{
		if ($myrow['shop'] != $shop)
		{	
			printf  ("<option value='%s'>%s</option>", $myrow['shop'], $myrow['shop']);
			$shop = $myrow['shop'];
		}
	}
	while ($myrow = mysqli_fetch_array($result));

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result->close(); // Магазины, отсортированные по алфавиту
$result1->close(); // Титулы, заголовки из таблицы 'settings'
$db->close(); // Закрываем базу данных
?>
				</select><br>
				<input class='inputSubmit' type='submit' value='подтвердите выбор магазина' /><br>
				<!--<input type="reset" name="set_filter" value="Сбросить"/>-->
				</form>
			</td>

<!-- Выбор даты покупки -->
			<td colspan="2" width="24%"><span>Выберите дату покупки</span><br><br>
				<form name='form' action='mysql_poisk.php' method='post'>
				<input type='date' name='date_search' value=''><br><br>
				<input class='inputSubmit' type='submit' value='подтвердите дату покупки' /><br>
				<!--<input type="reset" name="set_filter" value="Сбросить"/>-->
				</form>
			</td>

<!-- Выбор месяца -->
			<td colspan="2" width="24%"><span>Выберите интересующий месяц</span><br><br>
				<form name='form' action='mysql_poisk.php' method='post'>
				<input type='month' name='month_search' value=''><br><br>
				<input class='inputSubmit' type='submit' value='подтвердите выбор месяца' /><br>
				<!--<input type="reset" name="set_filter" value="Сбросить"/>-->
				</form>
			</td>


<!-- Выбор цены товара -->
			<td colspan="2" width="24%"><span>Введите цену покупки</span><br><br>
				<form name='form' action='mysql_poisk.php' method='post'>
				<input type="text" name="price_search" size="10" value="" /><br><br>
				<input class='inputSubmit' type='submit' value='подтвердите цену товара' /><br>
				<!--<input type="reset" name="set_filter" value="Сбросить"/>-->
				</form>
			</td>
		</tr>
<!--		<tr><td colspan="3" width="100%" style="text-align: center;" ><input type="reset" name="set_filter" value="Сбросить"/></td></tr>-->
	</table>

<!-- Подключаем FOOTER_MAIN -->
<?php include ("blocks/footer_main.php"); ?>
<?php 
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='shop_update'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
?>

	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
		<caption>
			<h1 id='title'><?php echo $myrow1['h1'] ?></br><em><?php echo $myrow1['h2'] ?></em></h1>
		</caption>
			<tr valign="top" class="tablehead">

<!--Выберите товар из списка-->
			<td colspan="2" width="32%"><span>Выберите товар из списка</span><br><br>
				<form name='form' action='updates.php' method='post'>
				<select name='name_update' size='7'>
<?php
// Выборка в цикле всех существующих наименований товаров
$result = mysqli_query($db, "SELECT * FROM shops ORDER BY name");
$myrow = mysqli_fetch_array($result);
	$name='';
	do
	{
		if ($myrow['name'] != $name)
		{	
			printf  ("<option>%s</option>",$myrow['name']);
			$name = $myrow['name'];
		}
	}
	while ($myrow = mysqli_fetch_array($result));

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result->close(); // Товары, отсортированные по алфавиту
?>
				</select><br>
				<input id='check' type='submit' value='Выбрать товар для изменения' src='images/tovar.png' alt='Список товаров'/><br>
				<input type="reset" name="set_filter" value="Сбросить"/>
				</form>
			</td>

<!--Выберите магазин из списка-->
			<td colspan="2" width="32%"><span>Выберите магазин из списка</span><br><br>
				<form name='form' action='updates.php' method='post'>
				<select name='shop_update' size='7'>
<?php
// Выборка в цикле всех существующих магазинов
$result = mysqli_query($db, "SELECT * FROM shops ORDER BY shop");
$myrow = mysqli_fetch_array($result);
	$shop='';
	do
	{
		if ($myrow['shop'] != $shop)
		{	
			printf  ("<option>%s</option>",$myrow['shop']);
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
				<input id='check' type='submit' value='Выбрать магазин' src='images/shop.png' alt='Список товаров'/><br>
				<input type="reset" name="set_filter" value="Сбросить"/>
				</form>
			</td>

<!--Введите ID товара-->
			<td colspan="2" width="32%"><span>Введите ID товара</span><br><br>
				<form name='form' action='form_shop_update.php' method='post'>
				<input type="text" name="id_update" size="10" value="" /><br><br>
				<input id='check' type='submit' value='Ввести ID изменяемого товара' src='images/id.png' alt='Цена'/><br>
				<input type="reset" name="set_filter" value="Сбросить"/>
				</form>
			</td>
		</tr>
<!--		<tr><td colspan="3" width="100%" style="text-align: center;" ><input type="reset" name="set_filter" value="Сбросить"/></td></tr>-->
	</table>


<!-- Подключаем FOOTER_MAIN -->
<?php include ("blocks/footer_main.php");

//UPDATE shops SET shop='Энергия' WHERE shop='Электрика для электрика' AND gruppa='Сантехника';
//UPDATE shops SET gruppa='Инструмент' WHERE name='Сверло';
//UPDATE `shops` SET gruppa='Инструмент' WHERE name='Сверло'
//UPDATE shops SET gruppa='Сантехника' WHERE shop='Энергия Коряжма' AND gruppa='Стройматериалы';
//UPDATE store SET town_eng='Koryazhma' WHERE town='Коряжма';
//UPDATE `store` SET `town_eng` = 'Koryazhma' WHERE `store`.`id_store` = 1;
?>
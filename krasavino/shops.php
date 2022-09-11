<?php 
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='shops'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
?>
<form name='form' action='shops.php' method='post'>
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
		<tr class="tablehead"><td><em><?php echo $myrow1['h1'] ?></em></td></tr>
		<tr valign="top" class="tablehead">
			<td>
				<select name='shop_search' size='7'>
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

// Закрыли объект с магазинами
$result->close();
?>
				</select><br>
				<input id='check' type='submit' value='Посмотреть товары в магазине' src='images/shop.png' alt='Товары в магазине'/>
			</td>
		</tr>
	</table>
</form>

<table id="inventory" width="99%" class="realty">
                  
	<colgroup> <!-- Задание ширины и стилей для колонок таблицы -->
		<col class="id" /> <!-- Задание ширины и стилей для одной из колонок таблицы -->
		<col class="date" />
		<col class="characteristic" />
		<col class="item" />
		<col class="trade" />
		<col class="price" />
	</colgroup>
                  
	<tr class="alt"> <!-- Строка таблицы -->
		<th scope="col">ID</th> <!-- Заголовочная ячейка таблицы -->
		<th scope="col">Дата покупки</th>
		<th scope="col">Наименование товара</th>
		<th scope="col">Количество</th>
		<th scope="col">Цена, руб.</th>
		<th scope="col">Стоимость, руб.</th>
	</tr>

<?php
// Вычислитель
$shop_search = '';
if (isset($_POST['shop_search'])) {$shop_search = $_POST['shop_search'];}

// Выборка в цикле всех существующих групп
$result2 = mysqli_query($db, "SELECT * FROM shops ORDER BY gruppa");
$myrow2 = mysqli_fetch_array($result2);
$gruppa='';
$sum_itog = 0;
$count_itog = 0;
	do
	{
		if ($myrow2['gruppa'] != $gruppa)
		{	
				
// Выборка ТОП-5 товаров в каждой из категорий, отсортированных по убыванию даты (показаны самые свежие) и по алфавиту наименований товаров
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='$myrow2[gruppa]' AND shop='$shop_search' ORDER BY name, characteristic, date DESC"); //
$myrow = mysqli_fetch_array($result);

// Проверка наличия товаров в категории для необходимости печати подзаголовка категории
		if (!isset($myrow['shops_id'])) {'<script language="javascript">document.getElementsByClassName("sub").style.display="none";<script>';}
		else
		{
			printf ("<tr class='sub'><td colspan='7'>%s</td></tr>", $myrow2['gruppa']);

// Печать полосатых строк таблицы								
			$even=true;

// Начало цикла печати товаров в категории         
			do
			{
				printf  ("<tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
									  <td><a href='form.php?shops_id=%s'>%s</a></td>
									  <td>%s</td>
									  <td>%s %s</td>
									  <td>%s %s</td>
									  <td>%s</td>
									  <td>%s</td>
									  
									</tr>", $myrow['shops_id'], $myrow['shops_id'] ,$myrow['date'], $myrow['name'], $myrow['characteristic'],
									$myrow['quantity'], $myrow['item'], $myrow['price'], $myrow['amount']);

									$even=!$even;
			}

// Окончание цикла печати товаров в категории
		while ($myrow = mysqli_fetch_array($result));
		}

// Выборка всех товаров в категории для подсчета сумм
$result3 = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='$myrow2[gruppa]' AND shop='$shop_search'");
$myrow3 = mysqli_fetch_array($result3);

// Начало цикла вычисления суммы в категории
		$sum = 0;
		$count = 0;
		do
		{
			$sum += $myrow3['amount'];
			$count += 1;
		}
// Окончание цикла вычисления суммы в категории
		while ($myrow3 = mysqli_fetch_array($result3));

// Печать итоговой суммы
		$sum_itog += $sum;
		if ($sum == 0) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}
		else
		{
			printf  ("<tr class='absent'><td colspan='5'></td><td class='itog'>%s руб.</td></tr>", $sum);
			$count_itog += $count;
		}
// Окончание цикла категорий
		$gruppa = $myrow2['gruppa'];
		}
	}
// Заголовок таблицы 
	while ($myrow2 = mysqli_fetch_array($result2));
	
// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result->close();
$result3->close();
$db->close();

// Заголовок таблицы
	printf  ("<caption name='tops' id='tops'> 
		<h1>Всего в магазине <em>%s</em> оставлено: <em>%s руб.</em>(<em>%s</em> наименований товаров!)</h1>
	</caption>", $shop_search, $sum_itog, $count_itog); // inventory
?>
</table> <!-- inventory -->

<!-- Подключаем FOOTER_MAIN -->
<?php include ("blocks/footer_main.php"); ?>
<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='shop'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
?>

 <!-- TABLE inventory -->
<table id='inventory' width='99%' class='realty'>
                  
	<colgroup> <!-- Задание ширины и стилей для колонок таблицы -->
		<col class="id" /> <!-- Задание ширины и стилей для одной из колонок таблицы -->
		<col class="date" />
		<col class="shop" />
		<col class="address" />
		<col class="characteristic" />
		<col class="item" />
		<col class="trade" />
		<col class="price" />
	</colgroup>
                  
	<tr class="alt"> <!-- Строка таблицы -->
		<th scope="col">ID</th> <!-- Заголовочная ячейка таблицы -->
		<th scope="col">Дата покупки</th>
		<th scope="col">Магазин</th>
		<th scope="col">Адрес</th>
		<th scope="col">Наименование товара</th>
		<th scope="col">Количество</th>
		<th scope="col">Цена, руб.</th>
		<th scope="col">Стоимость, руб.</th>
	</tr>
                    
<?php
// Выборка в цикле всех существующих категорий
$result2 = mysqli_query($db, "SELECT * FROM shops ORDER BY gruppa");
$myrow2 = mysqli_fetch_array($result2);
$gruppa='';
$sum_itog = 0;
	do
	{
		if ($myrow2['gruppa'] != $gruppa)
		{	
				
// Выборка ТОП-5 товаров в каждой из категорий, отсортированных по убыванию даты (показаны самые свежие) и по алфавиту наименований товаров
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='$myrow2[gruppa]' ORDER BY date DESC, name LIMIT 5");
$myrow = mysqli_fetch_array($result);

// Проверка наличия товаров в группе для необходимости печати подзаголовка категории
		if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
		else
		{
			printf ("<tr class='sub'><td colspan='8'>%s</td></tr>", $myrow2['gruppa']);

// Печать полосатых строк таблицы								
			$even=true;

// Начало цикла печати товаров в категории          
			do
			{
// Выборка параметров магазинов (город - town, адрес - adress, id_store) на основании предыдущей выборки - $myrow
$result5 = mysqli_query($db, "SELECT * FROM store WHERE shop='$myrow[shop]'");
$myrow5 = mysqli_fetch_array($result5);
				
				printf  ("<tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
							<td class='id'><a href='form.php?id=%s'>%s</a></td>
							<td class='date'>%s</td>
							<td class='shop'>%s</td>
							<td class='address'>%s, %s, %s</td>
							<td class='characteristic'>%s %s</td>
							<td class='item'>%s %s</td>
							<td class='trade'>%s</td>
							<td class='price'>%s</td>
						</tr>",$myrow['id'], $myrow['id'], $myrow['date'], $myrow['shop'], $myrow5['town'], $myrow5['street'], $myrow5['house'],
								$myrow['name'], $myrow['characteristic'], $myrow['quantity'], $myrow['item'], $myrow['price'], $myrow['amount']); 
				
				$even=!$even;
			}

// Окончание цикла печати товаров в категории
		while ($myrow = mysqli_fetch_array($result));
		}

// Выборка всех товаров в категории для подсчета сумм
$result3 = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='$myrow2[gruppa]'");
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
		$count_itog += $count;
		printf  ("<tr><td colspan='7'></td><td class='itog'>%s руб.</td></tr>", $sum);

// Окончание цикла категорий
		$gruppa = $myrow2['gruppa'];
		}
	}
	while ($myrow2 = mysqli_fetch_array($result2));

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result->close(); // Товары внутри категорий - отсортированные по дате и лимитированные
$result1->close(); // Титулы, заголовки из таблицы 'settings'
$result2->close(); // Категории, отсортированные по алфавиту
$result3->close(); // Товары внутри категорий - без сортировки и лимитов
$result5->close(); // Адреса магазинов из таблицы 'store'
$db->close(); // Закрываем базу данных


// Заголовок таблицы
	printf  ("<caption>
		<h1>%s <em>%s</em> составляют:</br><em>%s руб.</em>(<em>%s</em> наименований товаров!)</h1>
	</caption>
                   
</table>", $myrow1['h1'], $myrow1['h2'], $sum_itog, $count_itog); // inventory

// Подключаем FOOTER_MAIN
include ("blocks/footer_main.php");
?>
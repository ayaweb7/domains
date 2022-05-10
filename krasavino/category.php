<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Подключаем HEADER
include ("blocks/header_admin.php");

// 
$gruppa = $_GET['gruppa'];
?>

<!-- TABLE inventory -->
<table id="inventory" width="99%" class="realty">
                  
	<colgroup> <!-- Задание ширины и стилей для колонок таблицы -->
		<col id="id" /> <!-- Задание ширины и стилей для одной из колонок таблицы -->
		<col id="date" />
		<col id="shop" />
		<col id="address" />
		<col id="characteristic" />
		<col id="item" />
		<col id="trade" />
		<col id="price" />
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
// Выборка в цикле товаров выбранной категории
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='$gruppa' ORDER BY name, characteristic");
$myrow = mysqli_fetch_array($result);

// Проверка наличия товаров в группе для необходимости печати подзаголовка выбранной категории
		if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
		else
		{

// Печать полосатых строк таблицы								
			$even=true;

// Начало цикла вычисления суммы и печати товаров в категории
			$sum = 0;
			$count = 0;
			do
			{
				$sum += $myrow['amount'];
				$count += 1;
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
						</tr>  ",$myrow['id'], $myrow['id'], $myrow['date'], $myrow['shop'], $myrow5['town'], $myrow5['street'], $myrow5['house'],
								$myrow['name'], $myrow['characteristic'], $myrow['quantity'], $myrow['item'], $myrow['price'], $myrow['amount']); 
				
				$even=!$even;
			}
// Окончание цикла вычисления суммы и печати товаров в категории
			while ($myrow = mysqli_fetch_array($result));
		}

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result->close(); // Товары внутри категорий - отсортированные по наименованию
$result5->close(); // Адреса магазинов из таблицы 'store'
$db->close(); // Закрываем базу данных

// Заголовок таблицы
	printf  ("<tr><td colspan='7' style='border: none;'></td><td class='itog'>%s</td></tr>


	<caption>
		<h1><em>%s:</em> израсходовано <em>%s руб.</em>(<em>%s</em> наименований товаров!)</h1>
	</caption>
                   
</table>" , $sum , $gruppa, $sum, $count); // inventory

// Подключаем FOOTER_MAIN
include ("blocks/footer_main.php");
?>
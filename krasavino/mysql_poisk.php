<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='mysql_poisk'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
?>

<!-- TABLE inventory -->
<table id="inventory" width="99%" class="realty">
                  
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
// Вычислитель
//if (isset($_POST['shop_search'])) {$search = $_POST['shop_search']; $query = " AND shop = '$search'"; $mess_1 = 'Вы искали товары купленные в магазине '; $mess_2 = '.';}
if (isset($_POST['date_search'])) {$names = $search = $_POST['date_search']; $query = " AND date = '$search'"; $mess_1 = 'Товары, купленные '; $mess_2 = '.';}
if (isset($_POST['price_search'])) {$names = $search = $_POST['price_search']; $query = " AND price = '$search'"; $mess_1 = 'Найдены товары по цене '; $mess_2 = ' руб.';}
if (isset($_POST['month_search'])) {$names = $search = $_POST['month_search']; $query = " AND date BETWEEN '" . $_POST['month_search'] . "-01' AND '" . $_POST['month_search'] . "-31'"; $mess_1 = 'Товары, купленные '; $mess_2 = '.';}

//echo $_POST['name_search'] . '<br>';
//echo $search . '<br>';
//echo $query;

// Выборка в цикле всех существующих категорий
$result2 = mysqli_query($db, "SELECT gruppa FROM shops ORDER BY gruppa");
$myrow2 = mysqli_fetch_array($result2);
$gruppa='';
$sum_itog = 0;
$count_itog = 0;
	do
	{
		if ($myrow2['gruppa'] != $gruppa)
		{	

// Вычисления переменных при множественном выборе
// NAME_SEARCH
if(isset($_POST['name_search']))
{
	$search = $_POST['name_search'];
	$mess_1 = 'Вы искали товары с названием: ';
	$mess_2 = '.';
	if(!isset($search))
	{
		echo("<p>Вы не выбрали ни одного наименования!</p>\n");
	}
	else
	{
		$nSearch = count($search);
		$query =' AND ';
		$names = '';
		for($i=0; $i < $nSearch; $i++)
		{
//			echo($search[$i] . " ");
			$names .= $search[$i]; 
			$query .= "name = '$search[$i]'";
			if($i+1 < $nSearch) {$query .= " OR gruppa='$myrow2[gruppa]' AND "; $names .= ', ';}
		}
	}
}

// SHOP_SEARCH
if(isset($_POST['shop_search']))
{
	$search = $_POST['shop_search'];
	$mess_1 = 'Вы искали товары купленные в магазинах: ';
	$mess_2 = '.';
	if(!isset($search))
	{
		echo("<p>Вы не выбрали ни одного магазина!</p>\n");
	}
	else
	{
		$nSearch = count($search);
		$query =' AND ';
		$names = '';
		for($i=0; $i < $nSearch; $i++)
		{
//			echo($search[$i] . " ");
			$names .= $search[$i]; 
			$query .= "shop = '$search[$i]'";
			if($i+1 < $nSearch) {$query .= " OR gruppa='$myrow2[gruppa]' AND "; $names .= ', ';}
		}
	}
}
				
// Выборка ТОП-5 товаров в каждой из категорий, отсортированных по убыванию даты (показаны самые свежие) и по алфавиту наименований товаров
$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='$myrow2[gruppa]'" . $query . " ORDER BY name, characteristic, date DESC"); //AND $arg='$search'


//$result = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='$myrow2[gruppa]' AND $arg" . $price_op . "'$search' ORDER BY name, characteristic, date DESC"); //AND $arg='$search'
// SELECT * FROM `shops` WHERE `name`='Болт' OR `name`='Гайка'

$myrow = mysqli_fetch_array($result);

// Проверка наличия товаров в категории для необходимости печати подзаголовка категории
		if (!isset($myrow['shops_id'])) {'<script language="javascript">document.getElementsByClassName("sub").style.display="none";<script>';}
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
							<td class='id'><a href='form.php?shops_id=%s'>%s</a></td>
							<td class='date'>%s</td>
							<td class='shop'>%s</td>
							<td class='address'>%s, %s, %s</td>
							<td class='characteristic'>%s %s</td>
							<td class='item'>%s %s</td>
							<td class='trade'>%s</td>
							<td class='price'>%s</td>
						</tr>  ",$myrow['shops_id'], $myrow['shops_id'], $myrow['date'], $myrow['shop'], $myrow5['town'], $myrow5['street'], $myrow5['house'],
								$myrow['name'], $myrow['characteristic'], $myrow['quantity'], $myrow['item'], $myrow['price'], $myrow['amount']); 
				
				$even=!$even;
			}

// Окончание цикла печати товаров в категории
		while ($myrow = mysqli_fetch_array($result));
		}

// Выборка всех товаров в категории для подсчета сумм
$result3 = mysqli_query($db, "SELECT * FROM shops WHERE gruppa='$myrow2[gruppa]'" . $query);
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
			printf  ("<tr class='absent'><td colspan='7'></td><td class='itog'>%s руб.</td></tr>", $sum);
			$count_itog += $count;
		}
// Окончание цикла категорий
		$gruppa = $myrow2['gruppa'];
		}
	}
	while ($myrow2 = mysqli_fetch_array($result2));
	
// Заголовок таблицы
// Если по запросу никаких данных не обнаружено
if (!isset($result)) {
	printf  ("<caption name='tops' id='tops'> 
		<h1>Товары с запрошенными данными: <em>%s</em> не найдены!<br> Измените условия поиска</h1>
	</caption>
</table>", $names);
	"<script language='javascript'>document.getElementById('inventory').style.display = 'none';<script>";
	}
else {
// 	$result->close(); Печать таблицы Товары внутри категорий - отсортированные по наименованию и характеристикам
// 	$result5->close(); Адреса магазинов из таблицы 'store'

	printf  ("<caption name='tops' id='tops'> 
		<h1>%s<em>%s%s </em><br>Общая стоимость: <em>%s руб.</em>(<em>%s</em> наименований товаров!)</h1>
	</caption>
</table>", $mess_1, $names, $mess_2, $sum_itog, $count_itog); // inventory
}
// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //


// $result->close(); Товары внутри категорий - отсортированные по наименованию и характеристикам
$result1->close(); // Титулы, заголовки из таблицы 'settings'
$result2->close(); // Категории, отсортированные по алфавиту
$result3->close(); // Товары внутри категорий - без сортировки
//$result5->close(); // Адреса магазинов из таблицы 'store'
$db->close(); // Закрываем базу данных

// Подключаем FOOTER_SEARCH
include ("blocks/footer_search.php");
?>
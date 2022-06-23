<?php
// Callback function for Y-scale to get 1000 separator on labels - Функция обратного вызова для шкалы Y, чтобы получить разделитель 1000 на метках
function separator1000($aVal) {
    return number_format($aVal);
}
// 
// Функция добавляет символ рубля перед значением суммы
function separator1000_usd($aVal) {
    return number_format($aVal).' р.';
}

// Получить год
if (isset($_POST['acct_yr'])) {$acct_yr = $_POST['acct_yr'];}
if ($acct_yr != 'Все годы') {
	$where_year = "WHERE YEAR(date)='$acct_yr'";
	$total_title = "Распределение покупок за $acct_yr год по месяцам";
} else {
	$where_year = '';
	$total_title = 'Общее распределение покупок по месяцам за все годы';
}

//-------------------------------------------------------------
// Объявление переменных
//-------------------------------------------------------------
// Overall width of graphs - Общая высота и ширина графиков
$w = 950; $h = 700; 
// Left and right margin for each graph - Левое и правое поле для каждого графика
$lm = 80; $rm = 80;
// Определение расчитываемых значений: количество покупок (левый график) и сумма денежных затрат (правый график)
$select = array("num_rows", "sum");
// Цвета шрифтов для левого и правого графиков
$font_color = array("blue", "red");
// Цвета столбиков для левого и правого графиков
$fill_color = array("lightblue", "lightred");
// Отступы от левого края общего поля для каждого графика
$shift = array(0, 900);
// Заголовки для левого и правого графиков
$title = array("Количество покупок", "Денежные затраты");
// Форма вывода для денежных затрат (согласно функций)
$label = array("", "separator1000");
$format = array("", "separator1000_usd");
// Перевод числовых значений месяцев в русские названия
$months = array (1=>'Январь', 2=>'Февраль', 3=>'Март', 4=>'Апрель', 5=>'Май', 6=>'Июнь', 
				7=>'Июль', 8=>'Август', 9=>'Сентябрь', 10=>'Октябрь', 11=>'Ноябрь', 12=>'Декабрь');
// Выборка значений для левого и правого графиков
$sql_select = array("SELECT count(*) as $select[0], MONTH(date) as month FROM shops $where_year GROUP BY month ORDER BY month",
			"SELECT SUM(amount) as $select[1], MONTH(date) as month FROM shops $where_year GROUP BY month ORDER BY month");

//-------------------------------------------------------------
// Код для построения графика
//-------------------------------------------------------------
for ($i = 0; $i <= 1; ++$i)
{
	
	$sql[$i] = mysqli_query($db, $sql_select[$i]);
	while($row[$i] = mysqli_fetch_array($sql[$i]))
	{
		$data[$i][] = $row[$i][$select[$i]];
		$leg[$i][] = $months[$row[$i]['month']];
	}
	
	$graph[$i] = new Graph($w, $h, "auto"); // Создаем экземпляр класса графика, задаем параметры изображения:
	$graph[$i]->SetScale('textlin'); // Установить стиль шкалы, ось X и ось Y
	// Установить расстояние между сгенерированным графиком и краем холста, порядок слева, справа, вверх и вниз
	$graph[$i]->SetMargin($lm, $rm, 40, 120);
	//$graph[$i]->SetMarginColor('green');
	$graph[$i]->SetBackgroundGradient('lightblue', 'pink'); // Установить цвет фона холста, различные цвета будут иметь эффект градиента
	// Значение отсрочки — это процент дополнительной шкалы значение, которое мы добавляем. Указание 50 означает, что мы добавляем 50%
	// максимальное значение
	$graph[$i]->yaxis->scale->SetGrace(5);
	// Стандартный график оси Y
	$graph[$i]->yaxis->SetColor($font_color[$i]); // Цвет шкалы делений
	$graph[$i]->yaxis->SetLabelFormatCallback($label[$i]); // Определяем формат для ПРАВОЙ оси Y

	// Create the bar plots - Создаем гистограммы
	$bplot[$i] = new BarPlot($data[$i]); // Создать прямоугольный объект I - количество покупок
	$graph[$i]->Add($bplot[$i]);

	$bplot[$i]->SetFillColor($fill_color[$i]); // Установить цвет диаграммы столбца
	$bplot[$i]->SetShadow(gray); // Установить тень столбца
	$bplot[$i]->value->Show(); // Настраиваем значения, отображаемые над каждым баром
	$bplot[$i]->value->SetFormat('%d'); // Показать отформатированные продажи товаров в столбчатой ​​диаграмме
	// Необходимо использовать шрифты TTF, если мы хотим, чтобы текст располагался под произвольным углом
	$bplot[$i]->value->SetFont(FF_ARIAL, FS_BOLD, 10);
	$bplot[$i]->value->SetAngle(60);
	$bplot[$i]->value->SetColor($font_color[$i]);
	$bplot[$i]->value->SetFormatCallback($format[$i]);

	//Даем имя графику и осям:
	$graph[$i]->title->Set($title[$i]); // Создать заголовок
	$graph[$i]->xaxis->SetTickLabels($leg[$i]); // Установить ось X (абсцисс) из наименований категорий
	$graph[$i]->xaxis->SetFont(FF_ARIAL, FS_BOLDIT, 10); // Шрифт наименований категорий
	$graph[$i]->xaxis->SetLabelAngle(45); // и поворачиваем наименования на 30 градусов

	//Устанавливаем шрифты для заголовка графика и его осей:
	// Установить шрифт заголовка на «Bold», SetFont (x, x, x), первый параметр - это шрифт, второй параметр - это шрифт, а третий - Размер шрифта
	$graph[$i]->title->SetFont(FF_ARIAL, FS_BOLD, 14); 
}

//-------------------------------------------------------------
//  Создаем мультиграф
//-------------------------------------------------------------
$mgraph = new MGraph();
// Установить расстояние между сгенерированным графиком и краем холста, порядок слева, справа, вверх и вниз
$mgraph->SetMargin(2,2,50,5);

// Рамка вокруг мультиграфа
$mgraph->SetFrame(true,'gray', 5);
$mgraph->title->Set($total_title); // Создать заголовок
$mgraph->title->SetFont(FF_ARIAL, FS_BOLD, 20);
$mgraph->Add($graph[0], $shift[0], 0);
$mgraph->Add($graph[1], $shift[1], 0);
$mgraph->Stroke();
?>
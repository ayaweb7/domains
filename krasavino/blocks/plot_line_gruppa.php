<?php
// Callback function for Y-scale to get 1000 separator on labels - Функция обратного вызова для шкалы Y, чтобы получить разделитель 1000 на метках
function separator1000($aVal) {
    return number_format($aVal);
}
// 
// Функция добавляет символ рубля перед значением суммы
function separator1000_usd($aVal) {
    return number_format($aVal).' ₽';
}

if (isset($_POST['acct_yr'])) {$acct_yr = $_POST['acct_yr'];}
//$acct_yr = $_POST['acct_yr'];                            // Получите год
//$start_mth = $_GET['start_mth'];                      // Получите начальный месяц
//$end_mth = $_GET['end_mth'];                         // Получить конец месяца
$choose = $_POST['view'];                       // Получить тип графики
/**/
if ($acct_yr != '') {
	$where_year = "WHERE YEAR(date)='$acct_yr'";
	$total_title = "Распределение покупок за $acct_yr год по категориям";
} else {
	$where_year = '';
	$total_title = 'Общее распределение покупок по категориям за все годы';
}


//-------------------------------------------------------------
// Переменные
//-------------------------------------------------------------
// Overall width of graphs - Общая высота и ширина графиков
$w = 950; $h = 700; 
// Left and right margin for each graph - Левое и правое поле для каждого графика
$lm=80; $rm=80;
$select = array("num_rows", "sum");
$font_color = array("blue", "red");
//$fill_color = array("lightblue", "lightred");
$shift = array(0, 900);
$title = array("Количество покупок", "Денежные затраты");
$label = array("", "separator1000");
$format = array("", "separator1000_usd");
//$months = array (1=>'Январь', 2=>'Февраль', 3=>'Март', 4=>'Апрель', 5=>'Май', 6=>'Июнь', 
//				7=>'Июль', 8=>'Август', 9=>'Сентябрь', 10=>'Октябрь', 11=>'Ноябрь', 12=>'Декабрь');
//$years = array("2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022");
//$colors_lines = array("yellow", "lightgreen", "green", "lightblue", "blue", "lightred", "red", "olive", "purple", "navy");
$gruppa = array(1=>"Авто", 2=>"Бытовая техника", 3=>"Ветряк", 4=>"Дерево", 5=>"Инструмент", 6=>"Коммуналка", 7=>"Лакокрасочные", 8=>"Мебель",
				9=>"Посуда", 10=>"Расходники", 11=>"Сад", 12=>"Сантехника", 13=>"Стройматериалы", 14=>"Текстиль", 15=>"Химия", 16=>"Электрика");

$years = array(
//array('year' => 2013, 'color_line' => 'black', 'mark' => MARK_STAR),
//array('year' => 2014, 'color_line' => 'yellow', 'mark' => MARK_STAR),
//array("year" => 2015, "color_line" => "black", 'mark' => MARK_STAR),
//array('year' => 2016, 'color_line' => 'green', 'mark' => MARK_STAR),
//array('year' => 2017, 'color_line' => 'blue', 'mark' => MARK_SQUARE),
//array("year" => 2018, "color_line" => "yellow", 'mark' => MARK_SQUARE),
//array('year' => 2019, 'color_line' => 'black', 'mark' => MARK_UTRIANGLE)//,
array('year' => 2020, 'color_line' => 'blue', 'mark' => MARK_DIAMOND),
//array('year' => 2021, 'color_line' => 'red', 'mark' => MARK_SQUARE),
//array("year" => 2022, "color_line" => "black", 'mark' => MARK_FILLEDCIRCLE)
);
$count_year = count($years);

//echo $temp_year;
/*
for ($j = 0; $j < $count_year; $j++) {
print('YEAR - ' . $years[$j]['year'] . '& COLOR - ' . $years[$j]['color_line']);
echo"<br>";
}
*/


//for ($j = 0 ; $j < 2 ; ++$j)
//echo "$j: $sql[$j]<br>";

//$sql_count = mysqli_query($db, "SELECT count(*) as num_rows, gruppa FROM shops GROUP BY gruppa ORDER BY num_rows DESC") or die(mysqli_error());
/*
while($row_count = mysqli_fetch_array($sql_count))
{
	$data_count[] = $row_count['num_rows'];
	$leg_count[] = $row_count['gruppa'];
}
*/
/**/
//$count = count($metrix[$counter]);
for ($i = 0; $i <= 1; ++$i) {
	
	$graph[$i] = new Graph($w, $h, "auto"); // Создаем экземпляр класса графика, задаем параметры изображения:
	$graph[$i]->SetScale('textlin'); // Установить стиль шкалы, ось X и ось Y
	// Установить расстояние между сгенерированным графиком и краем холста, порядок слева, справа, вверх и вниз
	$graph[$i]->SetMargin($lm, $rm, 40, 120);
	//$graph->SetMarginColor('green');
	$graph[$i]->SetBackgroundGradient('lightblue', 'pink'); // Установить цвет фона холста, различные цвета будут иметь эффект градиента
	// Значение отсрочки — это процент дополнительной шкалы значение, которое мы добавляем. Указание 50 означает, что мы добавляем 50%
	// максимальное значение
	$graph[$i]->yaxis->scale->SetGrace(5);
	// Стандартный график оси Y
	$graph[$i]->yaxis->SetColor($font_color[0]); // Цвет шкалы делений
	$graph[$i]->yaxis->SetLabelFormatCallback($label[0]); // Определяем формат для ПРАВОЙ оси Y
	
	// Включить сетку для X и Y
	$graph[$i]->xgrid->Show();
	//$graph[$i]->xgrid->SetColor('gray@0.5');
	//$graph[$i]->ygrid->SetColor('gray@0.5');
	
	// Формат блока легенды
	$graph[$i]->legend->SetColor('navy');
	$graph[$i]->legend->SetFillColor('white');
	$graph[$i]->legend->SetLineWeight(1);
	$graph[$i]->legend->SetFont(FF_ARIAL, FS_NORMAL, 12);
	$graph[$i]->legend->SetShadow('gray@0.4',3);
	$graph[$i]->legend->SetAbsPos(85, 50, 'left', 'top');

	// Create the bar plots - Создаем гистограммы
	for ($j = 0; $j < $count_year; $j++) {
		$temp_year = $years[$j]['year'];
		$temp_color = $years[$j]['color_line'];
		$temp_mark = $years[$j]['mark'];
		
		$sql_select[$j] = array("SELECT count(*) as $select[0], gruppa FROM shops WHERE YEAR(date)=$temp_year GROUP BY gruppa ORDER BY gruppa",
			"SELECT SUM(amount) as $select[1], gruppa FROM shops WHERE YEAR(date)=$temp_year GROUP BY gruppa ORDER BY gruppa");
				
		$sql[$j] = mysqli_query($db, $sql_select[$j][$i]);
		while($row[$j] = mysqli_fetch_array($sql[$j])) {
			$data[$j][] = $row[$j][$select[$i]];
			$leg[] = $row[$j]['gruppa'];

		}
		$lplot[$j] = new LinePlot($data[$j]); // Создать прямоугольный объект I - количество покупок
		
		$lplot[$j]->SetColor($temp_color);
		$lplot[$j]->SetWeight(2);   // Two pixel wide
		//$lplot[$j]->mark->SetType($temp_mark);
		//$lplot[$j]->mark->SetColor($temp_color);
		//$lplot[$j]->SetColor($temp_color);
		//$lplot->mark->SetFillColor($temp_color);
		 
		
		$lplot[$j]->value->SetFont(FF_ARIAL, FS_BOLD, 10);
		$lplot[$j]->value->SetColor($temp_color);
		
		//$lplot->value->SetFormat('(%d)');
		$lplot[$j]->value->Show();
		$lplot[$j]->value->SetColor($temp_color);
		$lplot[$j]->value->SetFormat('%d'); // Показать отформатированные продажи товаров в столбчатой ​​диаграмме
		$lplot[$j]->value->SetFormatCallback($format[0]);
		$lplot[$j]->SetLegend($temp_year);
		$graph[$i]->Add($lplot[$j]);
}
	
	//Даем имя графику и осям:
	$graph[$i]->title->Set($title[$i]); // Создать подзаголовок
	$graph[$i]->title->SetColor($font_color[$i]); // Цвет подзаголовка
	$graph[$i]->xaxis->SetTickLabels($leg); // Установить ось X (абсцисс) из наименований категорий
	$graph[$i]->xaxis->SetFont(FF_ARIAL, FS_BOLDIT, 10); // Шрифт наименований категорий
	$graph[$i]->xaxis->SetLabelAngle(45); // и поворачиваем наименования на 30 градусов

	//Устанавливаем шрифты для заголовка графика и его осей:
	// Установить шрифт заголовка на «Bold», SetFont (x, x, x), первый параметр - это шрифт, второй параметр - это шрифт, а третий - Размер шрифта
	$graph[$i]->title->SetFont(FF_ARIAL, FS_BOLD, 14); 
	//$graph->Stroke();
}

//-------------------------------------------------------------
//  Создаем мультиграф
//-------------------------------------------------------------
/**/
$mgraph = new MGraph();
// Установить расстояние между сгенерированным графиком и краем холста, порядок слева, справа, вверх и вниз
$mgraph->SetMargin(2,2,50,5);

// Рамка вокруг мультиграфа
$mgraph->SetFrame(true,'gray', 5);
$mgraph->title->Set($total_title); // Создать заголовок
$mgraph->title->SetFont(FF_ARIAL, FS_BOLD, 20);
//$mgraph->title->SetMargin(0,10,30,30);
//$mgraph->title->SetColor('green');
$mgraph->Add($graph[0], $shift[0], 0);
$mgraph->Add($graph[1], $shift[1], 0);
$mgraph->Stroke();

?>
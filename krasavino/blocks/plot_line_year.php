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
$choose = $_POST['view'];                        // Получить тип графики
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
$fill_color = array("lightblue", "lightred");
$shift = array(0, 900);
$title = array("Количество покупок", "Денежные затраты");
$label = array("", "separator1000");
$format = array("", "separator1000_usd");
//$months = array (1=>'Январь', 2=>'Февраль', 3=>'Март', 4=>'Апрель', 5=>'Май', 6=>'Июнь', 
//				7=>'Июль', 8=>'Август', 9=>'Сентябрь', 10=>'Октябрь', 11=>'Ноябрь', 12=>'Декабрь');
$gruppa_array = array('Авто'=>'Авто', 'Бытовая техника'=>'Бытовая техника', 'Ветряк'=>'Ветряк', 'Дерево'=>'Дерево',
						'Инструмент'=>'Инструмент', 'Коммуналка'=>'Коммуналка', 'Лакокрасочные'=>'Лакокрасочные',
						'Мебель'=>'Мебель', 'Посуда'=>'Посуда', 'Расходники'=>'Расходники', 'Сад'=>'Сад', 'Сантехника'=>'Сантехника',
						'Стройматериалы'=>'Стройматериалы', 'Текстиль'=>'Текстиль', 'Химия'=>'Химия', 'Электрика'=>'Электрика');
$gruppa_array1 = array('Авто', 'Бытовая техника', 'Ветряк', 'Дерево', 'Инструмент', 'Коммуналка', 'Лакокрасочные', 'Мебель',
					 'Посуда', 'Расходники', 'Сад', 'Сантехника', 'Стройматериалы', 'Текстиль', 'Химия', 'Электрика');
$total_sql = array("SELECT count(*) as $select[0], gruppa FROM shops GROUP BY gruppa ORDER BY gruppa",
			"SELECT SUM(amount) as $select[1], gruppa FROM shops GROUP BY gruppa ORDER BY gruppa");
$year_sql = array("SELECT count(*) as $select[0], gruppa FROM shops WHERE YEAR(date)='$acct_yr' GROUP BY gruppa ORDER BY gruppa",
			"SELECT SUM(amount) as $select[1], gruppa FROM shops WHERE YEAR(date)='$acct_yr' GROUP BY gruppa ORDER BY gruppa");

$count = count($gruppa_array1);
/*
$count = count($gruppa_array1);
for($j=0;$j<$count;$j++){
print $gruppa_array1[$j];
}
print $gruppa_array1[3];
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


for ($i = 0; $i <= 1; ++$i)
{
/*	
// Суммарные данные по категориям за все годы
	$total_sql[$i] = mysqli_query($db, $total_sql[$i]);
	while($total_row[$i] = mysqli_fetch_array($total_sql[$i]))
	{
		$total_data[$i][] = $total_row[$i][$select[$i]];
//		$leg[$i][] = $total_row[$i]['gruppa'];
		$leg[$i][] = $gruppa_array[$total_row[$i]['gruppa']];
	}
// Данные по категориям за выбранный год
	$year_sql[$i] = mysqli_query($db, $year_sql[$i]);
	while($year_row[$i] = mysqli_fetch_array($year_sql[$i]))
	{
		$year_data[$i][] = $year_row[$i][$select[$i]];
//		$leg[$i][] = $year_row[$i]['gruppa'];
		$leg[$i][] = $gruppa_array[$year_row[$i]['gruppa']];
		
	}	
*/
// Суммарные данные по категориям за все годы
	$total_sql[$i] = mysqli_query($db, $total_sql[$i]);
// Данные по категориям за выбранный год
	$year_sql[$i] = mysqli_query($db, $year_sql[$i]);		
	
	while($total_row[$i] = mysqli_fetch_array($total_sql[$i])) {
		
		$total_data[$i][] = $total_row[$i][$select[$i]];
//		$leg[$i][] = $total_row[$i]['gruppa'];
//		$leg[$i][] = $gruppa_array[$total_row[$i]['gruppa']];
//		$leg[$i][] = $gruppa_array[$total_row[$i]['gruppa']];
//		for($j=0;$j<$count;$j++){
//			print $total_row[0]['gruppa'][$j];
//		}
//		echo $total_row[0]['gruppa'];
		
		$leg[$i] = $gruppa_array1;
//		$leg[$i][] = $gruppa_array1[$j];
//	}
	}	
	//	while($year_row[$i] = mysqli_fetch_array($year_sql[$i])) {
		for($j=0;$j<$count;$j++){	
			$year_row[$i][$j] = mysqli_fetch_array($year_sql[$i]);
	//		echo $year_row[3][0]['gruppa'];
	//		$year_data[$i][] = $year_row[$i][$select[$i]];
	//		if ($gruppa_array[$year_row[$i]['gruppa']] != $gruppa_array[$total_row[$i]['gruppa']]) {
	//		if ($year_row[$i['gruppa']] == $total_row[$i['gruppa']]) {
			if ($gruppa_array1[1] != "Дерево") {
	//		if ($year_row[$i]['gruppa'] == $leg[$i]) {
	//		if (!$year_row[$i]['gruppa']) {	
				$year_data[$i][] = $year_row[$i][$j][$select[$i]];
	//			$year_data[$i][] = 0;
	//			$leg[$i][] = $gruppa_array[$year_row[$i]['gruppa']];
	//			continue;
	//			break;
	//		}
	//		elseif ($year_row[$i]['gruppa'] == $total_row[$i]['gruppa']) {	
	//			$year_data[$i][] = $year_row[$i][$select[$i]];
	//			$year_data[$i][] = 0;
	//			$leg[$i][] = $gruppa_array[$year_row[$i]['gruppa']];
	//			continue;
	//			break;
	//		}
	//		$year_data[$i][] = $year_row[$i][$select[$i]];
	//		$year_data[$i][] = 0;
	//	}
			} else {
	//			$year_data[$i][] = $year_row[$i][$select[$i]];
				$year_data[$i][] = 0;
	//			break;
				
			}
		}		
			
			
			
	//		$leg[$i][] = $gruppa_array[$total_row[$i]['gruppa']];
	//		$year_data[$i][] = 0;
	//		continue;
			
	//		break;
	//		continue;
	//		$leg[$i][] = $year_row[$i]['gruppa'];
	//		$leg[$i][] = $gruppa_array[$year_row[$i]['gruppa']];
			
	//	}
		
//	}

	

// Создадим график и укажем масштаб для оси Y
	$graph[$i] = new Graph($w, $h, "auto"); // Создаем экземпляр класса графика, задаем параметры изображения:
	$graph[$i]->SetScale('textlin'); // Установить стиль шкалы, ось X и ось Y
// Установить расстояние между сгенерированным графиком и краем холста, порядок слева, справа, вверх и вниз
	$graph[$i]->SetMargin($lm, $rm, 40, 120);
	//$graph[$i]->SetMarginColor('green');
	$graph[$i]->SetBackgroundGradient('lightblue', 'pink'); // Установить цвет фона холста, различные цвета будут иметь эффект градиента
// Значение отсрочки — это процент дополнительной шкалы значение, которое мы добавляем. Указание 50 означает, что мы добавляем 50%
// максимальное значение
	$graph[$i]->yaxis->scale->SetGrace(5);
	// Настраиваем цвет оси Y
	$graph[$i]->yaxis->SetColor($font_color[$i]); // Цвет шкалы делений
	$graph[$i]->yaxis->SetLabelFormatCallback($label[$i]); // Определяем формат для ПРАВОЙ оси Y
	
// Включить сетку для X и Y
	$graph[$i]->xgrid->Show();
	
// Формат блока легенды
	$graph[$i]->legend->SetColor('navy');
	$graph[$i]->legend->SetFillColor('white');
	$graph[$i]->legend->SetLineWeight(1);
	$graph[$i]->legend->SetFont(FF_ARIAL, FS_NORMAL, 12);
	$graph[$i]->legend->SetShadow('gray@0.4',3);
	$graph[$i]->legend->SetAbsPos(85, 50, 'left', 'top');


// ------------------- Создаем линию для общего графика -------------------
	$total_line[$i] = new LinePlot($total_data[$i]);
	$graph[$i]->Add($total_line[$i]);
// Задаем цвет для общего графика
	$total_line[$i]->SetColor('red'); //$font_color[$i]
// Настраиваем значения, отображаемые над каждой точкой
	$total_line[$i]->value->Show();
	$total_line[$i]->value->SetFormat('%d'); // Показать отформатированные продажи товаров на графике
// Необходимо использовать шрифты TTF, если мы хотим, чтобы текст располагался под произвольным углом
	$total_line[$i]->value->SetFont(FF_ARIAL, FS_BOLD, 10);
	$total_line[$i]->value->SetAngle(60);
	$total_line[$i]->value->SetColor('red'); //$font_color[$i]
	$total_line[$i]->value->SetFormatCallback($format[$i]);
	$total_line[$i]->SetLegend('Итого');

/**/	
// ------------------- Добавляем линию для графика по году на общий график -------------------
	$year_line[$i] = new LinePlot($year_data[$i]);
	$graph[$i]->Add($year_line[$i]);
// Задаем цвет для графика по году
	$year_line[$i]->SetColor('blue');
// Настраиваем значения, отображаемые над каждой точкой
	$year_line[$i]->value->Show();
	$year_line[$i]->value->SetFormat('%d'); // Показать отформатированные продажи товаров на графике
// Необходимо использовать шрифты TTF, если мы хотим, чтобы текст располагался под произвольным углом
	$year_line[$i]->value->SetFont(FF_ARIAL, FS_BOLD, 10);
	$year_line[$i]->value->SetAngle(60);
	$year_line[$i]->value->SetColor('blue'); //$font_color[$i]
	$year_line[$i]->value->SetFormatCallback($format[$i]);
	$year_line[$i]->SetLegend($acct_yr);

//Даем имя графику и осям:
	$graph[$i]->title->Set($title[$i]); // Создать заголовок
	$graph[$i]->title->SetColor($font_color[$i]); // Цвет подзаголовка
	$graph[$i]->xaxis->SetTickLabels($leg[$i]); // Установить ось X (абсцисс) из наименований категорий
	$graph[$i]->xaxis->SetFont(FF_ARIAL, FS_BOLDIT, 10); // Шрифт наименований категорий
	$graph[$i]->xaxis->SetLabelAngle(45); // и поворачиваем наименования на 30 градусов

//Устанавливаем шрифты для заголовка графика и его осей:
// Установить шрифт заголовка на «Bold», SetFont (x, x, x), первый параметр - это шрифт, второй параметр - это шрифт, а третий - Размер шрифта
	$graph[$i]->title->SetFont(FF_ARIAL, FS_BOLD, 14); 

//	$graph[$i]->Stroke();
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
//$mgraph->title->SetMargin(0,10,30,30);
//$mgraph->title->SetColor('green');
$mgraph->Add($graph[0], $shift[0], 0);
$mgraph->Add($graph[1], $shift[1], 0);
$mgraph->Stroke();
?>
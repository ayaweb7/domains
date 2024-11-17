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
// Подзаголовок для значений и процентное значение
$labels = array("2013\n(%.1f%%)", "2014\n(%.1f%%)", "2015\n(%.1f%%)", "2016\n(%.1f%%)", "2017\n(%.1f%%)", "2018\n(%.1f%%)",
                "2019\n(%.1f%%)", "2020\n(%.1f%%)", "2021\n(%.1f%%)", "2022\n(%.1f%%)", "2023\n(%.1f%%)", "2024\n(%.1f%%)");
// Выборка значений для левого и правого графиков
$sql_select = array("SELECT count(*) as $select[0], YEAR(date) as year FROM shops GROUP BY year ORDER BY year",
			"SELECT SUM(amount) as $select[1], YEAR(date) as year FROM shops GROUP BY year ORDER BY year");

//-------------------------------------------------------------
// Код для построения графика
//-------------------------------------------------------------
for ($i = 0; $i <= 1; ++$i)
{
	
	$sql[$i] = mysqli_query($db, $sql_select[$i]);
	while($row[$i] = mysqli_fetch_array($sql[$i]))
	{
		$data[$i][] = $row[$i][$select[$i]];
		$leg[$i][] = $row[$i]['year'];
	}
	
	$graph[$i] = new PieGraph($w, $h, "auto"); // Создаем экземпляр класса графика, задаем параметры изображения:
	$graph[$i]->SetShadow();
	// Установить расстояние между сгенерированным графиком и краем холста, порядок слева, справа, вверх и вниз
	$graph[$i]->SetMargin($lm, $rm, 40, 120);
	//$graph[$i]->SetMarginColor('green');
	$graph[$i]->SetBackgroundGradient('lightblue', 'pink'); // Установить цвет фона холста, различные цвета будут иметь эффект градиента

	// Create the bar plots - Создаем гистограммы
	$pplot[$i] = new PiePlot($data[$i]); // Создать прямоугольный объект I - количество покупок
	// Взорвать все кусочки
	//$pplot[$i]->ExplodeAll(20);
	// Взорвать первый кусочек
	$pplot[$i]->ExplodeSlice(1);
	
	// Отрегулируйте размер и положение графика
	$pplot[$i]->SetCenter(0.9, 0.1);
	$pplot[$i]->SetSize(0.35);
	
	// Включите и установите политику для направляющих линий. Выровняйте метки по вертикали
	$pplot[$i]->SetGuideLines(true,false);
	$pplot[$i]->SetGuideLinesAdjust(1.7);
	
	// Настройте метки, которые будут отображаться
	$pplot[$i]->SetLabels($labels);
	
	// Этот метод корректирует положение меток. Это дается как доли радиуса пирога. Значение < 1 поместит центр метки внутрь круговой диаграммы, а значение >= 1 выведет центр метки за пределы круговой диаграммы. По умолчанию метка расположена на расстоянии 0,5 в середине каждого среза.
	$pplot[$i]->SetLabelPos(0.8);
	
	// Настройте форматы меток и то, какое значение мы хотим отображать (абсолютное) или процентное значение.
	$pplot[$i]->SetLabelType(PIE_VALUE_PER);
	$pplot[$i]->value->Show();
	$pplot[$i]->value->SetFont(FF_ARIAL, FS_NORMAL, 11);
	$pplot[$i]->value->SetColor($font_color[$i]);

	$graph[$i]->Add($pplot[$i]);
	
	// Set A title for the plot
	$graph[$i]->title->Set($title[$i]); // Создать заголовок
	$graph[$i]->title->SetFont(FF_VERDANA, FS_BOLD, 14);
	$graph[$i]->title->SetColor($font_color[$i]);
}

//-------------------------------------------------------------
//  Создаем мультиграф
//-------------------------------------------------------------
$mgraph = new MGraph();
// Установить расстояние между сгенерированным графиком и краем холста, порядок слева, справа, вверх и вниз
$mgraph->SetMargin(2,2,50,5);

// Рамка вокруг мультиграфа
$mgraph->SetFrame(true,'gray', 5);
$mgraph->title->Set('Распределение покупок по годам'); // Создать заголовок
$mgraph->title->SetFont(FF_ARIAL, FS_BOLD, 20);
$mgraph->Add($graph[0], $shift[0], 0);
$mgraph->Add($graph[1], $shift[1], 0);
$mgraph->Stroke();
?>
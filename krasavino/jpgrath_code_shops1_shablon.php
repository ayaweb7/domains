<?php // content="text/plain; charset=utf-8"

require_once ('../jpgraph/jpgraph.php');
require_once ('../jpgraph/jpgraph_bar.php');
require_once ('../jpgraph/jpgraph_utils.inc.php');
require_once ('../jpgraph/jpgraph_mgraph.php');

// Соединяемся с базой данных
require_once 'blocks/date_base.php';
// Подключаем HEADER
//include ("blocks/header_admin.php");

// Callback function for Y-scale to get 1000 separator on labels - Функция обратного вызова для шкалы Y, чтобы получить разделитель 1000 на метках
function separator1000($aVal) {
    return number_format($aVal);
}
// 
// Функция добавляет символ рубля перед значением суммы
function separator1000_usd($aVal) {
    return number_format($aVal).' ₽';
}

// Overall width of graphs - Общая высота и ширина графиков
$w = 950; $h = 700; 
// Left and right margin for each graph - Левое и правое поле для каждого графика
$lm=80; $rm=80;

//-------------------------------------------------------------
// Выбираем данные для анализа
//-------------------------------------------------------------
// I Выборка: количество покупок, сгруппированное по категориям
//-------------------------------------------------------------
$sql_count = mysqli_query($db, "SELECT count(*) as num_rows, gruppa FROM shops GROUP BY gruppa ORDER BY num_rows DESC") or die(mysqli_error());
while($row_count = mysqli_fetch_array($sql_count))
{
	$data_count[] = $row_count['num_rows'];
	$leg_count[] = $row_count['gruppa'];
}

$graph_count = new Graph($w, $h, "auto"); // Создаем экземпляр класса графика, задаем параметры изображения:
$graph_count->SetScale('textlin'); // Установить стиль шкалы, ось X и ось Y
// Установить расстояние между сгенерированным графиком и краем холста, порядок слева, справа, вверх и вниз
$graph_count->SetMargin($lm, $rm, 60, 120);
$graph_count->SetMarginColor('white');
//$graph_count->SetFrame(false);
//$graph_count->SetBox(true);
//$graph_count->xgrid->Show();
$graph_count->SetBackgroundGradient('lightblue', 'pink'); // Установить цвет фона холста, различные цвета будут иметь эффект градиента
// Значение отсрочки — это процент дополнительной шкалы значение, которое мы добавляем. Указание 50 означает, что мы добавляем 50%
// максимальное значение
$graph_count->yaxis->scale->SetGrace(5);
//$graph_count->xaxis->SetLabelFormatString('My',true);
//$graph_count->xaxis->SetPos('max');
//$graph_count->xaxis->HideLabels();
//$graph_count->xaxis->SetTickSide(SIDE_DOWN);
// Стандартный график оси Y
//$graph_count->yaxis->title->Set("Количество покупок");
$graph_count->yaxis->SetColor('blue'); // Цвет шкалы делений
//$graph_count->yaxis->title->SetColor('blue');
//$graph_count->yaxis->title->SetFont(FF_ARIAL, FS_BOLD, 10);

// Create the bar plots - Создаем гистограммы
$bplot_count = new BarPlot($data_count); // Создать прямоугольный объект I - количество покупок
//$b1 = new BarPlot($datay2,$datax);
$graph_count->Add($bplot_count);

$bplot_count->SetFillColor('lightblue'); // Установить цвет диаграммы столбца
$bplot_count->value->Show(); // Настраиваем значения, отображаемые над каждым баром
$bplot_count->value->SetFormat('%d'); // Показать отформатированные продажи товаров в столбчатой ​​диаграмме
// Необходимо использовать шрифты TTF, если мы хотим, чтобы текст располагался под произвольным углом
$bplot_count->value->SetFont(FF_ARIAL, FS_BOLD, 10);
$bplot_count->value->SetAngle(60);
$bplot_count->value->SetColor('blue');
//$b1->SetFillColor('teal');
//$b1->SetColor('teal:1.2');

//Даем имя графику и осям:
$graph_count->title->Set("Количество покупок по категориям"); // Создать заголовок
$graph_count->xaxis->SetTickLabels($leg_count); // Установить ось X (абсцисс) из наименований категорий
$graph_count->xaxis->SetLabelAngle(60); // и поворачиваем наименования на 30 градусов
//$graph_count->xaxis->title->Set("Категории товаров");

//Устанавливаем шрифты для заголовка графика и его осей:
// Установить шрифт заголовка на «Bold», SetFont (x, x, x), первый параметр - это шрифт, второй параметр - это шрифт, а третий - Размер шрифта
$graph_count->title->SetFont(FF_ARIAL, FS_BOLD, 18); 
//$graph_count->xaxis->title->SetFont(FF_ARIAL, FS_BOLD, 10); // Установить шрифт оси X


//-------------------------------------------------------------
// II Выборка: расходы на покупки в категориях
//-------------------------------------------------------------
$sql_amount = mysqli_query($db, "SELECT SUM(amount) as sum, gruppa FROM shops GROUP BY gruppa ORDER BY sum DESC") or die(mysqli_error());
while($row_amount = mysqli_fetch_array($sql_amount))
{
	$data_amount[] = $row_amount['sum'];
	$leg_amount[] = $row_amount['gruppa'];
}

$graph_amount = new Graph($w, $h, "auto"); // Создаем экземпляр класса графика, задаем параметры изображения:
$graph_amount->SetScale('textlin'); // Установить стиль шкалы, ось X и ось Y
// Установить расстояние между сгенерированным графиком и краем холста, порядок слева, справа, вверх и вниз
$graph_amount->SetMargin($lm, $rm, 60, 120);
$graph_amount->SetMarginColor('red');
//$graph_amount->SetFrame(false);
//$graph_amount->SetBox(true);
//$graph_amount->xgrid->Show();
$graph_amount->SetBackgroundGradient('lightblue', 'pink'); // Установить цвет фона холста, различные цвета будут иметь эффект градиента
// Значение отсрочки — это процент дополнительной шкалы значение, которое мы добавляем. Указание 50 означает, что мы добавляем 50%
// максимальное значение
$graph_amount->yaxis->scale->SetGrace(5);
//$graph_amount->xaxis->SetLabelFormatString('My',true);
//$graph_amount->xaxis->SetPos('max');
//$graph_amount->xaxis->HideLabels();
//$graph_amount->xaxis->SetTickSide(SIDE_DOWN);
// Стандартный график оси Y
//$graph_amount->yaxis->title->Set("Стоимость покупок");
$graph_amount->yaxis->SetColor('red'); // Цвет шкалы делений
//$graph_amount->yaxis->title->SetColor('red');
//$graph_amount->yaxis->title->SetFont(FF_ARIAL, FS_BOLD, 10);
$graph_amount->yaxis->SetLabelFormatCallback('separator1000'); // Определяем формат для ПРАВОЙ оси Y

// Create the bar plots - Создаем гистограммы
$bplot_amount = new BarPlot($data_amount); // Создать прямоугольный объект I - количество покупок
//$b1 = new BarPlot($datay2,$datax);
$graph_amount->Add($bplot_amount);

$bplot_amount->SetFillColor('lightred'); // Установить цвет диаграммы столбца
$bplot_amount->value->Show(); // Настраиваем значения, отображаемые над каждым баром
$bplot_amount->value->SetFormat('%d'); // Показать отформатированные продажи товаров в столбчатой ​​диаграмме
// Необходимо использовать шрифты TTF, если мы хотим, чтобы текст располагался под произвольным углом
$bplot_amount->value->SetFont(FF_ARIAL, FS_BOLD, 10);
$bplot_amount->value->SetAngle(60);
$bplot_amount->value->SetColor('red');
$bplot_amount->value->SetFormatCallback('separator1000_usd');
//$b1->SetFillColor('teal');
//$b1->SetColor('teal:1.2');


//Даем имя графику и осям:
$graph_amount->title->Set("Расходы на товары по категориям"); // Создать заголовок
$graph_amount->xaxis->SetTickLabels($leg_amount); // Установить ось X (абсцисс) из наименований категорий
$graph_amount->xaxis->SetLabelAngle(60); // и поворачиваем наименования на 30 градусов
//$graph_amount->xaxis->title->Set("Категории товаров");

//Устанавливаем шрифты для заголовка графика и его осей:
// Установить шрифт заголовка на «Bold», SetFont (x, x, x), первый параметр - это шрифт, второй параметр - это шрифт, а третий - Размер шрифта
$graph_amount->title->SetFont(FF_ARIAL, FS_BOLD, 18); 
//$graph_amount->xaxis->title->SetFont(FF_ARIAL, FS_BOLD, 12); // Установить шрифт оси X


//-------------------------------------------------------------
//  Создаем мультиграф
//-------------------------------------------------------------
$mgraph = new MGraph();
$mgraph->SetMargin(2,2,2,2);
$mgraph->SetFrame(true,'darkgray',2);
$mgraph->Add($graph_count);
$mgraph->Add($graph_amount, 900, 0);
$mgraph->Stroke();



// Создаем график. Эти два вызова всегда требуются
// Create the graph. These two calls are always required
// Создаем экземпляр класса графика, задаем параметры изображения:
// ширина, высота, название файла в кеше, время хранения изображения в кеше, указываем, выводить ли изображение при вызове функции Stroke (true)
// или только создать и хранить в кеше (false):
//$graph = new Graph(950, $h, "auto"); // Создать размер объекта canvas

// Устанавливаем масштабы для всех осей
//$graph->SetScale('textlin'); // Установить стиль шкалы, ось X и ось Y
//$graph->SetYScale(0,'int');
//$graph->SetYScale(1,'int');
//$graph->yaxis->scale->SetGrace(20);

// Установить расстояние между сгенерированным графиком и краем холста, порядок слева, справа, вверх и вниз
//$graph->img->SetMargin($lm, $rm, 60, 120);
//$graph->SetShadow(); // Создать тень холста
//$graph->SetMarginColor('lightblue'); // Установить цвет фона холста на голубой [Неверная настройка цвета]
//$graph->SetBackgroundGradient('lightblue', 'pink'); // Установить цвет фона холста, различные цвета будут иметь эффект градиента

// Добавляем изящество вверху, чтобы масштаб не конец точно на максимальном значении.
// Значение отсрочки — это процент дополнительной шкалы значение, которое мы добавляем. Указание 50 означает, что мы добавляем 50%
// максимальное значение
//$graph->yaxis->scale->SetGrace(5);



// Create the bar plots - Создаем гистограммы
//$bplot_count = new BarPlot($data_count); // Создать прямоугольный объект I - количество покупок
//$bplot_amount = new BarPlot($data_amount); // Создать прямоугольный объект II - расходы на покупки

// Добавить диаграмму столбца к изображению - в случае одного графика
//$graph->Add($bplot_count);
//$graph->Add($bplot_amount);

// Create the grouped bar plot - Создаем сгруппированный столбчатый график
//$gbplot = new GroupBarPlot(array($bplot_count, $bplot_amount));
//$gbplot = new GroupBarPlot(array($bplot_count));
//$gbplot->SetWidth(0.7);

//$gbplot->SetLegends(array("Количество покупок", "Стоимость покупок"));
//$gbplot->legend->SetFont(FF_SIMSUN, FS_NORMAL); // Установить шрифт легенды
 
// ...and add it to the graPH - ...и добавляем его в graPH
//$graph->Add($gbplot); // Добавить диаграмму столбца к изображению
//$graph->Add($bplot_count);
//$graph->AddY(0, $bplot_amount);



/*
// Задаем методы изменения дизайна каждого графика
// I - количество покупок
$bplot_count->SetFillColor('blue'); // Установить цвет диаграммы столбца
//$bplot_count->SetShadow();
$bplot_count->value->Show(); // Настраиваем значения, отображаемые над каждым баром
$bplot_count->value->SetFormat('%d'); // Показать отформатированные продажи товаров в столбчатой ​​диаграмме
// Необходимо использовать шрифты TTF, если мы хотим, чтобы текст располагался под произвольным углом
$bplot_count->value->SetFont(FF_ARIAL, FS_BOLD);
$bplot_count->value->SetAngle(60);
$bplot_count->value->SetColor('blue');
//$bplot_count->SetLegend('Покупки');
// Стандартный график оси Y
$graph->yaxis->title->Set("Количество покупок");
$graph->yaxis->SetColor('blue'); // Цвет шкалы делений
$graph->yaxis->title->SetColor('blue');
$graph->yaxis->title->SetFont(FF_ARIAL, FS_BOLD, 10);
$graph->legend->SetPos(0.1, 0.1, 'left', 'top');
*/
/*
// II - расходы на покупки
$bplot_amount->SetFillColor('red'); // Установить цвет диаграммы столбца
//$bplot_amount->SetShadow();
$bplot_amount->value->Show(); // Настраиваем значения, отображаемые над каждым баром
// Необходимо использовать шрифты TTF, если мы хотим, чтобы текст располагался под произвольным углом
$bplot_amount->value->SetFont(FF_ARIAL, FS_NORMAL, 10);
$bplot_amount->value->SetAngle(60);
$bplot_amount->value->SetColor('red');
$bplot_amount->value->SetFormatCallback('separator1000_usd');
//$bplot_amount->SetLegend('Расходы');
*/
//Первый график с несколькими осями Y
/*
$graph->yaxis->title->Set('Расходы на покупки');
$graph->yaxis->SetColor('red'); // Цвет шкалы делений
$graph->yaxis->title->SetFont(FF_ARIAL, FS_NORMAL, 10); // Шрифт шкалы делений
$graph->yaxis->title->SetColor('red'); // Цвет наименования оси
$graph->yaxis->SetLabelFormatCallback('separator1000'); // Определяем формат для ПРАВОЙ оси Y
*/
/*
//Даем имя графику и осям:
$graph->title->Set("Расходы на товары по категориям"); // Создать заголовок
$graph->xaxis->SetTickLabels($leg_amount); // Установить ось X (абсцисс) из наименований категорий
//$graph->xaxis->SetTickLabels($leg_count); // Установить ось X (абсцисс) из наименований категорий
$graph->xaxis->SetLabelAngle(90); // и поворачиваем наименования на 30 градусов
$graph->xaxis->title->Set("Категории товаров");

//Устанавливаем шрифты для заголовка графика и его осей:
// Установить шрифт заголовка на «Bold», SetFont (x, x, x), первый параметр - это шрифт, второй параметр - это шрифт, а третий - Размер шрифта
$graph->title->SetFont(FF_ARIAL, FS_BOLD, 20); 
$graph->xaxis->title->SetFont(FF_ARIAL, FS_BOLD, 12); // Установить шрифт оси X

 
// Display the graph - Показать график
$graph->Stroke(); // Выходное изображение

*/
//printf ("<a onclick='javascript: history.back(); return falshe;' title='НАЗАД на ввод'><img src='images/sbros.png' id='send'/></a>");
// Подключаем FOOTER_MAIN
//include ("blocks/footer_main.php");
?>

<!--<button id='button'>Нажми меня</button>-->
<!---->


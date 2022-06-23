<?php // content="text/plain; charset=utf-8"

require_once ('../jpgraph/jpgraph.php');
require_once ('../jpgraph/jpgraph_bar.php');


// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Callback function for Y-scale to get 1000 separator on labels - Функция обратного вызова для шкалы Y, чтобы получить разделитель 1000 на метках
function separator1000($aVal) {
    return number_format($aVal);
}
// 
// Функция добавляет символ рубля перед значением суммы
function separator1000_usd($aVal) {
    return '₽'.number_format($aVal);
}

// Выбираем данные для анализа
// I Выборка: количество покупок, сгруппированное по категориям
$sql_count = mysqli_query($db, "SELECT count(*) as num_rows, gruppa FROM shops GROUP BY gruppa") or die(mysqli_error());
while($row_count = mysqli_fetch_array($sql_count))
{
	$data_count[] = $row_count['num_rows'];
	$leg[] = $row_count['gruppa'];
}

// II Выборка: расходы на покупки в категориях
$sql_amount = mysqli_query($db, "SELECT gruppa, SUM(amount) as sum FROM shops GROUP BY gruppa") or die(mysqli_error());
while($row_amount = mysqli_fetch_array($sql_amount))
{
	$data_amount[] = $row_amount['sum'];
	$leg[] = $row_amount['gruppa'];
}

// Создаем график. Эти два вызова всегда требуются
// Create the graph. These two calls are always required
// Создаем экземпляр класса графика, задаем параметры изображения:
// ширина, высота, название файла в кеше, время хранения изображения в кеше, указываем, выводить ли изображение при вызове функции Stroke (true)
// или только создать и хранить в кеше (false):
$graph = new Graph(1150,750,"auto"); // Создать размер объекта canvas

// Устанавливаем масштабы для всех осей
$graph->SetScale('textlin'); // Установить стиль шкалы, ось X и ось Y
$graph->SetYScale(0,'int');
//$graph->SetYScale(1,'int');
//$graph->yaxis->scale->SetGrace(20);

// Установить расстояние между сгенерированным графиком и краем холста, порядок слева, справа, вверх и вниз
$graph->img->SetMargin(80,80,60,90);
$graph->SetShadow(); // Создать тень холста
//$graph->SetMarginColor('lightblue'); // Установить цвет фона холста на голубой [Неверная настройка цвета]
$graph->SetBackgroundGradient('lightblue', 'pink'); // Установить цвет фона холста, различные цвета будут иметь эффект градиента

// Добавляем изящество вверху, чтобы масштаб не конец точно на максимальном значении.
// Значение отсрочки — это процент дополнительной шкалы значение, которое мы добавляем. Указание 50 означает, что мы добавляем 50%
// максимальное значение
$graph->yaxis->scale->SetGrace(5);



// Create the bar plots - Создаем гистограммы
$bplot_count = new BarPlot($data_count); // Создать прямоугольный объект I - количество покупок
$bplot_amount = new BarPlot($data_amount); // Создать прямоугольный объект II - расходы на покупки

// Добавить диаграмму столбца к изображению - в случае одного графика
//$graph->Add($bplot_amount);

// Create the grouped bar plot - Создаем сгруппированный столбчатый график
//$gbplot = new GroupBarPlot(array($bplot_count, $bplot_amount));
$gbplot = new GroupBarPlot(array($bplot_count));
$gbplot->SetWidth(0.7);

//$gbplot->SetLegends(array("Количество покупок", "Стоимость покупок"));
//$gbplot->legend->SetFont(FF_SIMSUN, FS_NORMAL); // Установить шрифт легенды
 
// ...and add it to the graPH - ...и добавляем его в graPH
$graph->Add($gbplot); // Добавить диаграмму столбца к изображению
//$graph->Add($bplot_count);
$graph->AddY(0, $bplot_amount);



/**/
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
$bplot_count->SetLegend('Покупки');
// Стандартный график оси Y
$graph->yaxis->title->Set("Количество покупок");
$graph->yaxis->SetColor('blue'); // Цвет шкалы делений
$graph->yaxis->title->SetColor('blue');
$graph->yaxis->title->SetFont(FF_ARIAL, FS_BOLD, 10);
$graph->legend->SetPos(0.1, 0.1, 'left', 'top');

/**/
// II - расходы на покупки
$bplot_amount->SetFillColor('red'); // Установить цвет диаграммы столбца
//$bplot_amount->SetShadow();
$bplot_amount->value->Show(); // Настраиваем значения, отображаемые над каждым баром
// Необходимо использовать шрифты TTF, если мы хотим, чтобы текст располагался под произвольным углом
$bplot_amount->value->SetFont(FF_ARIAL, FS_NORMAL, 10);
$bplot_amount->value->SetAngle(60);
$bplot_amount->value->SetColor('red');
$bplot_amount->value->SetFormatCallback('separator1000_usd');
$bplot_amount->SetLegend('Расходы');
//Первый график с несколькими осями Y
/**/
$graph->ynaxis[0]->title->Set('Расходы на покупки');
$graph->ynaxis[0]->SetColor('red'); // Цвет шкалы делений
$graph->ynaxis[0]->title->SetFont(FF_ARIAL, FS_NORMAL, 10); // Шрифт шкалы делений
$graph->ynaxis[0]->title->SetColor('red'); // Цвет наименования оси
$graph->ynaxis[0]->SetLabelFormatCallback('separator1000'); // Определяем формат для ПРАВОЙ оси Y


//Даем имя графику и осям:
$graph->title->Set("Продажи товаров по категориям"); // Создать заголовок
$graph->xaxis->SetTickLabels($leg); // Установить ось X (абсцисс) из наименований категорий
$graph->xaxis->SetLabelAngle(90); // и поворачиваем наименования на 30 градусов
$graph->xaxis->title->Set("Категории товаров");

//Устанавливаем шрифты для заголовка графика и его осей:
// Установить шрифт заголовка на «Bold», SetFont (x, x, x), первый параметр - это шрифт, второй параметр - это шрифт, а третий - Размер шрифта
$graph->title->SetFont(FF_ARIAL, FS_BOLD, 20); 
$graph->xaxis->title->SetFont(FF_ARIAL, FS_BOLD, 12); // Установить шрифт оси X

 
// Display the graph - Показать график
$graph->Stroke(); // Выходное изображение



/*
$data1y=array(12,8,19,3,10,5);
$data2y=array(8,2,11,7,14,4);
 
// Create the graph. These two calls are always required
$graph = new Graph(310,200);    
$graph->SetScale("textlin");
 
$graph->SetShadow();
$graph->img->SetMargin(40,30,20,40);
 
// Create the bar plots
$b1plot = new BarPlot($data1y);
$b1plot->SetFillColor("orange");
$b2plot = new BarPlot($data2y);
$b2plot->SetFillColor("blue");
 
// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot,$b2plot));
 
// ...and add it to the graPH
$graph->Add($gbplot);
 
$graph->title->Set("Example 21");
$graph->xaxis->title->Set("X-title");
$graph->yaxis->title->Set("Y-title");


 
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
 
// Display the graph
$graph->Stroke();
*/


/*
// Grouped bar plots - Сгруппированные гистограммы
$data1y=array(12,8,19,3,10,5);
$data2y=array(8,2,11,7,14,4);
 
// Create the graph. These two calls are always required - Создаем график. Эти два вызова всегда требуются
$graph = new Graph(310,200);    
$graph->SetScale("textlin");
 
$graph->SetShadow();
$graph->img->SetMargin(40,30,20,40);
 
// Create the bar plots - Создаем гистограммы
$b1plot = new BarPlot($data1y);
$b1plot->SetFillColor("orange");
$b2plot = new BarPlot($data2y);
$b2plot->SetFillColor("blue");
 
// Create the grouped bar plot - Создаем сгруппированный столбчатый график
$gbplot = new GroupBarPlot(array($b1plot,$b2plot));
 
// ...and add it to the graPH - ...и добавляем его в graPH
$graph->Add($gbplot);
 
$graph->title->Set("Example 21");
$graph->xaxis->title->Set("X-title");
$graph->yaxis->title->Set("Y-title");
 
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
 
// Display the graph - Показать график
$graph->Stroke();
*/

printf ("<a onclick='javascript: history.back(); return falshe;' title='НАЗАД на ввод'><img src='images/sbros.png' id='send'/></a>");
?>

<!--<button id='button'>Нажми меня</button>-->
<!---->


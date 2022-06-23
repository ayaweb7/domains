<?php // content="text/plain; charset=utf-8"
require_once ('../jpgraph/jpgraph.php');
/*
require_once ('../jpgraph/jpgraph_bar.php');

$data1y=array(47,80,40,116);
$data2y=array(61,30,82,105);
$data3y=array(115,50,70,93);


// Create the graph. These two calls are always required
$graph = new Graph(350,200,'auto');
$graph->SetScale("textlin");
//$graph->SetMarginColor('white');
//$graph->SetFrame(true,'#B3BCCB', 1);

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->yaxis->SetTickPositions(array(0,30,60,90,120,150), array(15,45,75,105,135));
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('A','B','C','D'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($data1y);
$b2plot = new BarPlot($data2y);
$b3plot = new BarPlot($data3y);

// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot));
// ...and add it to the graPH
$graph->Add($gbplot);


$b1plot->SetColor("white");
$b1plot->SetFillColor("#cc1111");

$b2plot->SetColor("white");
$b2plot->SetFillColor("#11cccc");

$b3plot->SetColor("white");
$b3plot->SetFillColor("#1111cc");

$graph->title->Set("Bar Plots");

// Display the graph
$graph->Stroke();
*/


// Line
/*
//require_once ('../jpgraph/jpgraph.php');
require_once ('../jpgraph/jpgraph_line.php');

$datay1 = array(20,15,23,15);
$datay2 = array(12,9,42,8);
$datay3 = array(5,17,32,24);

// Setup the graph
$graph = new Graph(300,250);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Filled Y-grid');
$graph->SetBox(false);

$graph->SetMargin(40,20,36,63);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array('A','B','C','D'));
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Line 1');

// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->SetLegend('Line 2');

// Create the third line
$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#FF1493");
$p3->SetLegend('Line 3');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();
*/


//Для наглядной демонстрации возможностей библиотеки создадим простейший линейный график.
//Подключаем JPGraph:
require_once ('../jpgraph/jpgraph.php');
//include "jpgraph.php";

//Подключаем расширение, ответственное за создание линейных графиков:
require_once ('../jpgraph/jpgraph_line.php');
//include "jpgraph_line.php";

//Задаем некоторые массивы значений, которые необходимо будет вывести на граф (массив значений абсцисс опционален, его можно не задавать):
$ydata = array(1, 7, 3, 5, 11, 10, 7);
$xdata = array(0, 1, 2, 3, 4, 5, 6);

//Создаем экземпляр класса графика, задаем параметры изображения: ширина, высота, название файла в кеше, время хранения изображения в кеше, указываем, выводить ли изображение при вызове функции Stroke (true) или только создать и хранить в кеше (false):
$graph = new Graph(300, 200, «auto», 10, true);

//Указываем, какие оси использовать:
$graph->SetScale("textlin");

//Создаем экземпляр класса линейного графика, передадим ему нужные значения:
$lineplot = new LinePlot($ydata, $xdata);

//Задаем цвет кривой на графике — он может быть задан как псевдонимом цвета, так и значением вида #xxxxxx:
$lineplot->SetColor("forestgreen");

//Выводим кривую на график:
$graph->Add($lineplot);

//Даем графику имя:
$graph->title->Set("My Example");

//Если есть необходимость давать название на русском языке, то необходимо использовать TTF-шрифты с поддержкой русского языка, например arial. Укажем, какой шрифт и какое оформление (обычное FS_NORMAL, жирный шрифт FS_BOLD и так далее) использовать:
$graph->title->SetFont(FF_ARIAL, FS_NORMAL);
$graph->xaxis->title->SetFont(FF_VERDANA, FS_BOLD);
$graph->yaxis->title->SetFont(FF_TIMES, FS_ITALIC);

//Назовем оси:
$graph->xaxis->title->Set("Ось X");
$graph->yaxis->title->Set("Ось Y");

//Для наглядности выделим их цветом:
$graph->xaxis->SetColor("#BB0000");
$graph->yaxis->SetColor("#BB0000");

//Сделаем кривую на графике толщиной в три пиксела:
$lineplot->SetWeight(3);

//Обозначим точки звездочками, задав тип маркера:
$lineplot->mark->SetType(MARK_STAR);

//Выведем значения над каждой из точек:
$lineplot->value->Show();

//Фон графика зальем градиентом:
$graph->SetBackgroundGradient("ivory", «yellow»);

//И в качестве финального штриха добавим эффект тени от всего изображения:
$graph->SetShadow();

//Выдаем получившееся изображение в браузер (в случае если при создании объекта graph последний параметр был false, изображение будет сохранено в кеше, но не выдано в браузер):
$graph->Stroke();
?>

<div id="output">
<!--<button id="button">Нажми меня</button>-->
<a onclick='javascript: history.back(); return falshe;' title="НАЗАД на ввод"><img src="images/sbros.png" id="send"/></a>
</div>

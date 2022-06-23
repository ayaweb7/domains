<?php // content="text/plain; charset=utf-8"

require_once ('../jpgraph/jpgraph.php');
require_once ('../jpgraph/jpgraph_line.php');
require_once ('../jpgraph/jpgraph_bar.php');
require_once ('../jpgraph/jpgraph_pie.php');
require_once ('../jpgraph/jpgraph_pie3d.php');
require_once ('../jpgraph/jpgraph_utils.inc.php');
require_once ('../jpgraph/jpgraph_mgraph.php');

// Соединяемся с базой данных
require_once 'blocks/date_base.php';
// Подключаем HEADER
//include ("blocks/header_admin.php");

 
//$conn = mysql_connect("localhost", "root", "woxiangnileyali");         // Подключиться к базе данных
 
//$acct_yr = $_GET['acct_yr'];                            // Получите год
//$start_mth = $_GET['start_mth'];                      // Получите начальный месяц
//$end_mth = $_GET['end_mth'];                         // Получить конец месяца
$choose = $_POST['graph'];                        // Получить тип графики

$start = "$acct_yr-$start_mth-01";
$end = "$acct_yr-$end_mth-31";

//echo $acct_yr . '-'. $start_mth . '<br>';
//echo "SELECT date, amount FROM shops WHERE date BETWEEN $acct_yr . '-' . $start_mth . '-01' AND $acct_yr . '-' . $end_mth . '-31'" . '<br>';
//echo "SELECT date, amount FROM shops WHERE date BETWEEN $start AND $end";



//$rs_prod = mysqli_query($db, "SELECT amount, date FROM shops WHERE date BETWEEN $start AND $end") or die(mysqli_error());

$sql_amount = mysqli_query($db, "SELECT SUM(amount) as sum, gruppa FROM shops GROUP BY gruppa ORDER BY sum DESC") or die(mysqli_error());
while($row_amount = mysqli_fetch_array($sql_amount))
{
	$data_amount[] = $row_amount['sum'];
	$leg_amount[] = $row_amount['gruppa'];
}


//mysql_select_db("test", $conn);                                // выполненный SQL, Получите коммерческую ценность
//$query_rs_prod = "SELECT acct_mth, amount FROM traffic WHERE acct_yr = '$acct_yr' and acct_mth between '$start_mth' and '$end_mth'";
//$rs_prod = mysql_query($query_rs_prod, $conn) or die(mysql_error());
//$row_rs_prod = mysqli_fetch_assoc($rs_prod);
//$totalRows_rs_prod = mysqli_num_rows($rs_prod);
 /*
$data = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);                   // Инициализировать массив

$acct_mth = $row_rs_prod['date'];
list($year, $month, $day) = explode("-", $acct_mth);
var_dump($year, $month, $day);
*

//do                                                                                                                                                                            // Цикл для установки значения каждого месяца
while($row_rs_prod = mysqli_fetch_array($rs_prod));
{
$acct_mth = $row_rs_prod['date'];
list($year, $month, $day) = explode("-", $acct_mth);
//var_dump($year, $month, $day);
$i = (int)$month-1;
$data[$i] = $row_rs_prod['amount'];
}
/
 
/*
while($row_rs_prod = mysqli_fetch_array($rs_prod))
{
	$data[] = $row_rs_prod['amount'];
	$amount[] = $row_rs_prod['amount'];
}
*/ 
switch($choose)
{
       case 1:
	   /*
              $graph = new Graph(400,300);                                               // Создать новый Graph Объект
              $graph->SetScale("textlin");                                             // Установить стиль масштаба
              $graph->img->SetMargin(30,30,80,30);                     // Установить границы диаграммы
              $graph->title->SetFont(FF_ARIAL,FS_BOLD);                                                 // Установить шрифт
              $graph->title->Set("CDN Запрос трафика ");  // Установить заголовок диаграммы
              $lineplot=new LinePlot($data_amount);
              $lineplot->SetLegend("Line");
              $lineplot->SetColor("red");
              $graph->Add($lineplot);
		*/
              // Подключаем линейный график
			  include ("line_plot.php");
			  break;
       case 2:
        /*
			  $graph = new Graph(400,300);    
              $graph->SetScale("textlin");         
              $graph->SetShadow();         
              $graph->img->SetMargin(40,30,20,40);
              $barplot = new BarPlot($data_amount);                                                      // Создайте BarPlot Объект
              $barplot->SetFillColor('blue');                                                        // Установить цвет
              $barplot->value->Show();                                                                           // Установить номер дисплея
              $graph->Add($barplot);                                                          // Добавьте столбчатую диаграмму к изображению            
              $graph->title->Set("CDN Запрос трафика ");                                     // Установить заголовок и X-Y Название оси
              $graph->xaxis->title->Set(" месяц ");
			  $graph->xaxis->SetTickLabels($leg_amount);
              $graph->yaxis->title->Set(" течь количество (Gbits)");
              $graph->title->SetFont(FF_ARIAL,FS_BOLD);                                                 // Установить шрифт
              $graph->yaxis->title->SetFont(FF_ARIAL,FS_BOLD);
              $graph->xaxis->title->SetFont(FF_ARIAL,FS_BOLD);
		*/
              include ("bar_plot.php");
			  break;
       case 3:
        /*      
			  $graph = new PieGraph(400,300);
              $graph->SetShadow();
              $graph->title->Set("CDN Запрос трафика ");
              $graph->title->SetFont(FF_ARIAL,FS_BOLD);
              $pieplot = new PiePlot($data_amount);
              $pieplot->SetLegends($gDateLocale->GetShortMonth());          // Установить легенду
              $graph->Add($pieplot);
        */      
			  include ("pie_plot.php");
			  break;
       case 4:
        /*      
			  $graph = new PieGraph(400,300);
              $graph->SetShadow();
              $graph->title->Set("CDN Запрос трафика ");
              $graph->title->SetFont(FF_ARIAL,FS_BOLD);
              $pieplot = new PiePlot3D($data_amount);                                                          // Создайте PiePlot3D Объект
              $pieplot->SetCenter(0.4);                                                               // Установите положение центра круговой диаграммы
              $pieplot->SetLegends($gDateLocale->GetShortMonth());          // Установить легенду
              $graph->Add($pieplot);
        */      
			  include ("pie3D_plot.php");
			  break;
       default:
              echo "graph Ошибка параметра ";
              exit;
}
$graph->Stroke();
?>


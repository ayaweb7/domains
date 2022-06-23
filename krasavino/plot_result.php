<?php
 // content="text/plain; charset=utf-8"

require_once ('../jpgraph/jpgraph.php');
require_once ('../jpgraph/jpgraph_line.php');
require_once ('../jpgraph/jpgraph_bar.php');
require_once ('../jpgraph/jpgraph_pie.php');
require_once ('../jpgraph/jpgraph_pie3d.php');
require_once ('../jpgraph/jpgraph_utils.inc.php');
require_once ('../jpgraph/jpgraph_mgraph.php');

// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Получить тип графика
$choose = $_POST['view'];

switch($choose)
{
	case 1:
		include ('blocks/plot_bar_gruppa.php');
		break;
	case 2:
		include ('blocks/plot_bar_month.php');
		break;
	case 3:
		include ('blocks/plot_bar_year.php');
		break;
	case 4:
		include ('blocks/plot_pie_year.php');
		break;
	case 5:
		include ('blocks/plot_bar_shop.php');
		break;
	case 6:
		include ('blocks/plot_bar_town.php');
		break;
	case 7:
		include ('blocks/plot_bar_good.php');
		break;
/*
	case 7:
		include ('blocks/plot_line_gruppa.php');
		break;
	case 8:
		include ('blocks/plot_line_town.php');
		break;
	case 9:
		include ('blocks/plot_line_shop.php');
		break;	
	case 10:
		include ('blocks/plot_line_year.php');
		break;
*/
	default:
		echo "<h1>Ошибки в параметрах графика!</h1>";
		exit;
}
$graph->Stroke();
?>


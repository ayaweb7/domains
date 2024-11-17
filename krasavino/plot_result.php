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
if ($_POST['name'] == 'Товар не выбран' AND (!isset($_GET['gruppaSelected']))) { // надо сделать отрицание !!!!!!!!!!!
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
	
} elseif ($_POST['name'] != 'Товар не выбран' AND (!isset($_GET['gruppaSelected']))) {
	$name = $_POST['name'];
	include ('blocks/plot_bar_name.php');
} else {
	include ('blocks/plot_bar_category.php');
}

	
/*	
} elseif ($_POST['name'] == 'Товар не выбран' AND $_POST['gruppa'] != 'Не выбрана') {
	$gruppa = $_POST['gruppa'];
	$name = $_POST['name'];
	include ('blocks/plot_bar_category.php');
} elseif ($_POST['name'] != 'Товар не выбран' AND $_POST['gruppa'] != 'Не выбрана') {
	echo "<h1>ИЛИ Категория ИЛИ Наименование!</h1>";
	include ('plot_search1.php');
}
*/

$graph->Stroke();
?>


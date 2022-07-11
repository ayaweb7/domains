<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='plot_python'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");

// Получить тип графика
$choose = $_POST['view'];
$acct_yr = $_POST['acct_yr'];
/*
//		if (isset($_POST['acct_yr'])) {$acct_yr = $_POST['acct_yr'];}
if ($acct_yr != "все годы") {
//			$where_year = "WHERE YEAR(date)='$acct_yr'";
	$suptitle = "Распределение покупок за $acct_yr год по категориям";
} else {
//			$where_year = '';
	$suptitle = "Общее распределение покупок по категориям за $acct_yr";
}
//		shell_exec("C:\Python310\python.exe blocks/python/python_category.py '$acct_yr' '$suptitle'");
*/

switch($choose)
{
	case 1:
		// Получить год
		$command = escapeshellcmd("C:\Python310\python.exe blocks/python/python_category.py $acct_yr"); //
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
$output =  system($command);
echo $output;


?>
<div><img src='blocks/python/plots/hist.png' title='hist'></div>

<?php
// Подключаем FOOTER_SEARCH
include ("blocks/footer_search.php");

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result1->close(); // Титулы, заголовки из таблицы 'settings'
$db->close(); // Закрываем базу данных
?>
<?php
//phpinfo();
// Соединяемся с базой данных
//require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
//mysqli_query($db, "SET NAMES 'UTF8'");
//$result = mysqli_query($db, "SELECT * FROM shops");
//$myrow = mysqli_fetch_array($result);

/*
echo '</br>';
$output = shell_exec('C:\Python310\python.exe python_script_8.py');
echo $output;
echo '</br>';
*/
/*
$resss = shell_exec("C:\Python310\python.exe python_script_8.py '19' 'але' '03' '27' 2>&1");
echo $resss;
*/
/*
$value = array(1,2,3,4);
$json = json_encode($value);
passthru("JSON=$json C:\Python310\python.exe python_script_7.py");
*/

/*
// как использовать PHP. отладчики и как использовать ведение журнала.


//$pythonScript = "D:\father\Programs\OSPanel\domains\krasavino\python_script.py";
$pythonScript = "D:/father/Programs/OSPanel/domains/krasavino/python_script_3.py";
//$pythonScript = "D:\father\Programs\OSPanel\domains\krasavino\python_script_3.py";
$python = "C:\Python310\python.exe";
$cmd = array($python, $pythonScript, escapeshellarg(json_encode($data)));
$cmdText = implode(' ', $cmd);

echo "Running command: " . $cmdText . "\n";
$result = shell_exec($cmdText);

echo "Got the following result:\n";
echo $result;

$resultData = json_decode($result, true);

echo "The result was transformed into:\n";
var_dump($resultData);
// end

echo '</br>';


// Execute the python script with the JSON data
$result = shell_exec('python D:\father\Programs\OSPanel\domains\krasavino\python_script_5.py' . escapeshellarg(json_encode($data)));
//echo file_get_contents ('D:\father\Programs\OSPanel\domains\krasavino\python_script.py');

echo '</br>';

// Decode the result
$resultData = json_decode($result, true);

// This will contain: array('status' => 'Yes!')
var_dump($resultData);

echo '</br>';

$data = array('as', 'df', 'gh');

    // Execute the python script with the JSON data

$temp = json_encode($data);
$result1= shell_exec('C:\Program Files\python.exe python_script_3.py' . "'" . $temp . "'");

echo "result1 - " . $result1;

$message = exec("D:\father\Programs\OSPanel\domains\krasavino\python_script_3.py 2>&1");
print_r($message);
*/

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
//$result->close(); // Товары внутри категорий - отсортированные по дате и лимитированные
//$result1->close(); // Титулы, заголовки из таблицы 'settings'
//$result2->close(); // Категории, отсортированные по алфавиту
//$result3->close(); // Товары внутри категорий - без сортировки и лимитов
//$result5->close(); // Адреса магазинов из таблицы 'store'
//$db->close(); // Закрываем базу данных







/*
Подключаем JPGraph (внимание, директория,
содержащая файл jpgraph.php должна присутствовать
в INCLUDE_PATH, иначе нужно указывать путь до неё)
*/
//require_once('../jpgraph/jpgraph.php');
/*
Подключаем расширение, ответственное за
создание линейных графиков:
*/
/*
require_once('../jpgraph/jpgraph_line.php');

// Создадим немного данных для визуализации:
$ydata = array(6, 3, 8, 5, 15, 16, 19);

/*
Массив значений абсцисс опционален, 
его можно не задавать
*/
//$xdata = array(0, 1, 2, 3, 4, 5, 6);

/*
Создаем экземпляр класса графика, задаем параметры
изображения: ширина, высота, название файла в кеше,
время хранения изображения в кеше, указываем, выводить
ли изображение при вызове функции Stroke (true)
или только создать и хранить в кеше (false):
*/
//$graph = new Graph(400, 300, 'auto', 10, true);

// Указываем, какие оси использовать:
//$graph->SetScale('textlin');

/*
Создаем экземпляр класса линейного графика, передадим
ему нужные значения:
*/
//$lineplot = new LinePlot($ydata, $xdata);

// Задаём цвет кривой
//$lineplot->SetColor('forestgreen');

// Присоединяем кривую к графику:
//$graph->Add($lineplot);

// Даем графику имя:
//$graph->title->Set('Простой график');

/*
Если планируете использовать кириллицу, то необходимо 
использовать TTF-шрифты, которые её поддерживают,
например arial.

$graph->title->SetFont(FF_ARIAL, FS_NORMAL);
$graph->xaxis->title->SetFont(FF_VERDANA, FS_ITALIC);
$graph->yaxis->title->SetFont(FF_TIMES, FS_BOLD);
*/
/*
// Назовем оси:
$graph->xaxis->title->Set('Время');
$graph->yaxis->title->Set('Деньги');

// Выделим оси цветом:
$graph->xaxis->SetColor('#СС0000');
$graph->yaxis->SetColor('#СС0000');

// Зададим толщину кривой:
$lineplot->SetWeight(3);

// Обозначим точки звездочками, задав тип маркера:
$lineplot->mark->SetType(MARK_FILLEDCIRCLE);

// Выведем значения над каждой из точек:
$lineplot->value->Show();

// Фон графика зальем градиентом:
$graph->SetBackgroundGradient('ivory', 'orange');

// Придадим графику тень:
$graph->SetShadow(4);


Выведем получившееся изображение в браузер (в случае если
при создании объекта graph последний параметр был false, 
изображение будет сохранено в кеше, но не выдано в браузер)
*/

//$graph->Stroke();

/*
# Столбчатая диаграмма

	// Подключаем файл с классами для работы со столбиками
	require_once('../jpgraph/jpgraph_bar.php');

	// Создаём один столбик
	$bplot = new BarPlot($xdata);

	$bplot->SetLegend('Инвестиции');

	// Создаём второй столбик
	$bplot2 = new BarPlot($ydata);
	$bplot2->SetLegend('Прибыль');

	// Объединяем столбики
	$accbplot = new AccBarPlot(array($bplot, $bplot2));
	$accbplot->SetColor('darkgray');
	$accbplot->SetWeight(1);

	// Присоединяем столбики к графику:
	$graph->Add($accbplot);
*/

# круговой диаграммы.

	require_once ('../jpgraph/jpgraph.php');
	require_once ('../jpgraph/jpgraph_pie.php');
	require_once ('../jpgraph/jpgraph_pie3d.php');

	// Статистика использования браузеров в процентах
	$data = array(29, 21, 18, 18, 4, 10);
	$legends = array(
    'Crome',
    'IE', 
    'Firefox', 
    'Opera', 
    'Safari', 
    'Другие'
);

	// Создаём график
	$graph = new PieGraph(600, 450);
	$graph->SetShadow();

	// Заголовок графика
	$graph->title->Set('Статистика браузеров 2012');
	$graph->title->SetFont(FF_VERDANA, FS_BOLD, 14); 

	// Расположение "Легенды" (в процентах/100)
	$graph->legend->Pos(0.1, 0.2);

	// Создаём круговую диаграмму 3D
	$p1 = new PiePlot3d($data);

	// Центр круга (в процентах/100)
	$p1->SetCenter(0.45, 0.5);

	// Угол наклона диаграммы
	$p1->SetAngle(30);

	// Шрифт для подписей
	$p1->value->SetFont(FF_ARIAL, FS_NORMAL, 12);

	// Подписи для сегментов диаграммы
	$p1->SetLegends($legends);

	// Присоединяем диаграмму к графику

	$graph->Add($p1);
	// Выводим график

	$graph->Stroke();

?>

<div id="output">
<!--<button id="button">Нажми меня</button>-->
<a onclick='javascript: history.back(); return falshe;' title="НАЗАД на ввод"><img src="images/sbros.png" id="send"/></a>
</div>

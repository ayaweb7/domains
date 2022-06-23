<html>
<html>    
    <head>
        <!--<meta http-equiv="content-type" content="text/html; charset=windows-1251" />-->
		
        <title>Графики</title> 
    </head>
 
<body>
<h1>Привет из ПиЭйчПи</h1>
<!--
<form action="python_code.php" method="post">
	<input type="text" name="text" size="10" value="abcdef"/>
	<input class="inputbuttonflat" type="submit" name="set_filter" value="Отправить данные" style="margin-left:20px;"/>
</form>
-->


<?php
//phpinfo();
// Соединяемся с базой данных
//require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
//mysqli_query($db, "SET NAMES 'UTF8'");
//$result = mysqli_query($db, "SELECT * FROM shops");
//$myrow = mysqli_fetch_array($result);

/**/
echo '</br>';
$output = shell_exec('C:\Python310\python.exe python_script_8.py');
echo $output;
echo '</br>';

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


?>

<div id="output">
<!--<button id="button">Нажми меня</button>-->
<a onclick='javascript: history.back(); return falshe;' title="НАЗАД на ввод"><img src="images/sbros.png" id="send"/></a>
</div>

</body>
</html>
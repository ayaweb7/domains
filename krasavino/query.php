<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='query'");
$myrow1 = mysqli_fetch_array($result1);

// Выборка из таблицы 'query' для определения номеров запросов
$result3 = mysqli_query($db, "SELECT MAX(query_id) FROM query");
$myrow3 = mysqli_fetch_array($result3);
$number = $myrow3[0] + 1;

// Подключаем HEADER
include ("blocks/header_admin.php");
// Подключаем TABLES_BD
include ("blocks/tables_bd.php");
		
if (isset($_POST['request'])) {$request = $_POST['request'];}
?>
<!---->

<form name="form" action="query.php" method="post"><!-- onSubmit="return validateSearch(this)"-->

<!--divBig-->
<div id='divBig' class='flexBig'><!--divBig - #ccc-->
	<div id='divTop' class='flexTitle'><!--SELECT * FROM query LIMIT 5divTop -  style='background-color: lightgreen;'-->
		<?php // echo $myrow1['h1'] . ": " . $myrow1['h2'] ?>
		<?php printf("<h1>%s: <em>%s</em></h1>", $myrow1['h1'], $myrow1['h2']); ?>
	</div><!--divTop-->

<!--divLarge-->	
	<div id='divLarge' class='flexTitle'><!--divLarge - style='background-color: navy;' -->

<!--divMiddle_1-->
		<div id='divMiddle' class='flexMiddle'><!--divMiddle_1 - style='background-color: brown;' -->

<!--divQuery-->
			<div id='divQuery' class='flexSmall'><!--divCharacteristic - style='background-color: blue;' -->
				<div class='blockInput'>
					<span>Пишем запрос</span>
					<!--<input type="text" name="query" size="40" value=""/>-->
					<textarea name="request" cols="100" rows="10"><?php echo $request; ?></textarea>
				</div>
			</div><!--divQuery-->

<!--divOperator-->
			<div id='divOperator' class='flexSmall'>
				<div class='blockInput'><!---->
					<span>Надо записать запрос в базу?</span>
					<div class='blockButton'>
						<input type='radio' id='yes' name='query_operator' value='yes' /><!-- onClick=\"hiddenBlock('divShop')\"-->
						<label for='yes'>ДА</label>
						
						<input type='radio' id='no' name='query_operator' value='no' checked />
						<label for='no'>НЕТ</label>
					</div>
				</div>
			</div><!--divOperator-->

<!--divComment-->
			<div id='divComment' class='flexSmall'><!--divCharacteristic - style='background-color: blue;' -->
				<div class='blockInput'>
					<span>Если хотите сохранить запрос - можно написать комментарий</span>
					<input type="text" name="comment" size="50" value="<?php echo 'Select № ' .$number; ?>"/>
				</div>
			</div><!--divComment-->

		</div><!--divMiddle_1-->
		
<!--divMiddle_1-->
		<div id='divMiddle' class='flexMiddle'><!--divMiddle_1 - style='background-color: brown;' -->		
<!--divSelects-->
			<div id='divSelects' class='flexSmall'><!--divCharacteristic - style='background-color: blue;' -->
				<div class='blockInput'>
					<?php include ("blocks/tables_query.php"); ?>
				</div>
			</div><!--divSelects-->			
		</div><!--divMiddle_2-->

	</div><!--divLarge-->

<!--divBottom'-->	
	<div id='divBottom' class='flexTitle'><!-- style='background-color: #f9910f;'-->
		<input class='inputSubmit' type='submit' name='set_filter' value='SELECT' />
		<input class='inputSubmit' type="reset" name="set_filter" value="сброс"/>

<!-- HIDDEN -->
		<input type="hidden" name="query_time" value="<?php echo (new DateTime())->format('Y-m-d H:i:s'); ?>"/>
		<!--<input type="hidden" name="comment" value="<?php echo 'Выборка № ' .$number; ?>"/>-->
	</div><!--divBottom'-->

</div><!--divBig-->
</form>




<?php
/*
//if (isset($_POST['query'])) {$query = $_POST['query'];}
if (isset($_POST['time_query']) && isset($_POST['request']))
{
	$time_query = $_POST['time_query'];
	$request = $_POST['request'];
	echo $myrow3[0]. " & " .$request. " & " .$time_query. "<br>";
}
*/
// ЗАКОММЕНТИРОВАТЬ !!!
//echo $query. ";<br>";

if (isset($_POST['request']))
{
	$operator = $_POST['query_operator'];
	$request = $_POST['request'];
	$request_type = strtoupper(explode(" ", $request)[0]);
	
	echo $request. "<br>";
//	echo $request_type. "<br>";
	if ($result = mysqli_query($db, $request))
	{
		if ($request_type != 'SELECT')
		{
			printf("<h6 style='font: 2em bold Georgia, \"Times New Roman\", Times, serif; color: #19910f;' align='center'>Это был DELETE или UPDATE! Операция прошла УСПЕШНО!!!</h6>");

		} else {	
			$myrow = mysqli_fetch_array($result);
			/* Подсчёт количества столбцов в результирующем наборе */
			$num = mysqli_num_fields($result);
//			echo "<br>myrow[1]:" . $myrow[1] . ", num: " . $num . "!!!!<br>";

			echo "<table id='inventory' class='realty'><tr class='alt'>"; // width='99%
			foreach ($myrow as $key => $value) {
				if (is_string($key)) {
					printf("<th>%s</th>", $key);
				}
			}

			$result = mysqli_query($db, $request);
			// Печать полосатых строк таблицы								
			$even=true;
			do
			{
			//	printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>\n", $myrow[0], $myrow[1], $myrow[2]);
				echo "<tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>";
				for ($i = 0; $i < $num; ++$i)
				{
					printf("<td>%s</td>", $row[$i]);
				}
				echo "</tr>";
				$even=!$even;
			}
			while ($row = mysqli_fetch_row($result));
			echo "</table>\n";
			printf("<h6  style='font: 2em bold Georgia, \"Times New Roman\", Times, serif; color: #19910f;' align='center'>Это был SELECT!</h6>");
		}
	/**/	
		if ($operator == "yes")
		{
	//		if (isset($_POST['query_id'])) {$query_id = $_POST['query_id'];}
			$query_time = $_POST['query_time'];
			$request = $_POST['request'];
			$comment = $_POST['comment'];
			$query_id = (int) $query_id;

			$query = "INSERT INTO query (query_id, query_time, request, comment) VALUES ('$query_id', '$query_time', '$request', '$comment')";

// Проверка на ошибки при вводе в базу
			if ($result2 = mysqli_query($db, $query)) {
//			echo "Ваш запрос УДАЧНО сохранился!";
				printf("<h6  style='font: 2em bold Georgia, \"Times New Roman\", Times, serif; color: #19910f;' align='center'>Ваш запрос УДАЧНО сохранился!</h6>");
			} else {
			  echo "НЕудачное сохранение запроса - ERROR: " . $query . "<br>" . mysqli_error($db);
//				  printf("<h6 style='font: 3em bold Georgia, \"Times New Roman\", Times, serif; color: #e50000;' align='center'>НЕудачное сохранение запроса - ERROR: </h6>") . $query . "<br>" . mysqli_error($db);
			}
		} else {
//		echo "Вы решили НЕ сохранять запрос!";
			printf("<h6 style='font: 3em bold Georgia, \"Times New Roman\", Times, serif; color: #e50000;' align='center'>Вы решили НЕ сохранять запрос!</h6>");
		}
	} else {
		printf("<h6 style='font: 3em bold Georgia, \"Times New Roman\", Times, serif; color: #e50000;' align='center'>ОШИБКА в запросе! Повнимательнее!!!</h6>");
	}
	
//	$result->close(); // Закрыть создание строки запроса на странице 'query'
} else {
//	echo "Извините, запрос ПОКА не был сделан!";
	printf("<h6 style='font: 3em bold Georgia, \"Times New Roman\", Times, serif; color: #e50000;' align='center'>Запрос ПОКА не был сделан!</h6>");
}

/*
// Вычислитель
if (isset($_POST['request']))
{
//	$request = $comment = "";

	if (isset($_POST['query_id'])) {$query_id = $_POST['query_id'];}
	if (isset($_POST['time_query'])) {$time_query = $_POST['time_query'];}
	if (isset($_POST['request'])) {$request = $_POST['request'];}
	if (isset($_POST['comment'])) {$comment = $_POST['comment'];}

	$query_id = (int) $query_id;

	$query = "INSERT INTO query (query_id, time_query, request, comment) VALUES ('$query_id', '$time_query', '$request', '$comment')";

	// Проверка на ошибки при вводе в базу
	if ($result2 = mysqli_query($db, $query)) {
		echo "Удачный ввод";
	} else {
		  echo "НЕудачный ввод - Error: " . $query . "<br>" . mysqli_error($db);
	}

	// Сообщение о результате ввода в базу
	if ($result2 == 'true') {
	print <<<HERE
	<h6  style='font: 2em bold Georgia, "Times New Roman", Times, serif; color: #19910f;' align="center"></h6> <!--$myrow1[h1]-->
	HERE;
	}
	else {
	print <<<HERE
	<h6  style='font: 3em bold Georgia, "Times New Roman", Times, serif; color: #e50000;' align="center"></h6> <!--$myrow1[h2]-->
	HERE;
	}
	
//	$result2->close(); // Закрыть проверочные данные о сохранении запроса в БД 'query'
}
else
{
	echo "Введите свой запрос";
}
*/
// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
// $result->close(); Создание строки запроса на странице 'query'
$result1->close(); // Титулы, заголовки из таблицы 'settings'
$db->close(); // Закрываем базу данных

// Подключаем FOOTER_SEARCH
include ("blocks/footer_search.php");
?>
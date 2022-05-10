<!-- TABLE inventory -->
<div class="select">
<p class="alt">Выбор товара или услуги из списка</p>

<?php
	
// Выборка существующих страниц
$result = mysqli_query($db, "SELECT * FROM goods ORDER BY good");
$myrow = mysqli_fetch_array($result);
	
	do
	{
		printf  ("<p class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
					<a href='good_form_update.php?good=%s'>%s</a>
				</p>  ",$myrow['good'], $myrow['good']); 
				
		$even=!$even;
	}

// Окончание цикла печати товаров в категории
	while ($myrow = mysqli_fetch_array($result));

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result->close(); // Товары - отсортированные по наименованию
//$result1->close(); // Титулы, заголовки из таблицы 'pages'
$db->close(); // Закрываем базу данных
?>
</div>
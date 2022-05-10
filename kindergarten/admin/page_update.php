<!-- TABLE inventory -->
<div class="select">
<p class="alt">Название страницы</p>

<?php
	
// Выборка существующих страниц
$result = mysqli_query($db, "SELECT * FROM pages ORDER BY name");
$myrow = mysqli_fetch_array($result);
	
	do
	{
		printf  ("<p class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
					<a href='page_form_update.php?name=%s'>%s</a> - %s
				</p>  ",$myrow['name'], $myrow['name'], $myrow['page']); 
				
		$even=!$even;
	}

// Окончание цикла печати товаров в категории
	while ($myrow = mysqli_fetch_array($result));

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result->close(); // Страницы - отсортированные по наименованию и характеристикам
//$result1->close(); // Титулы, заголовки из таблицы 'pages'
$db->close(); // Закрываем базу данных
?>
</div>
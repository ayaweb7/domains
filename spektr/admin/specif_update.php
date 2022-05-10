<!-- TABLE inventory -->
<div class="select">
<p class="alt">Выбор товара или услуги из списка</p>

<?php
	
// Выборка существующих страниц
$result = mysqli_query($db, "SELECT * FROM specif ORDER BY name, depth");
$myrow = mysqli_fetch_array($result);
	
	do
	{
		printf  ("<p class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
					<a href='specif_form_update.php?id=%s'>%s</a> - %s * %s * %s, %s - <span class='color-price pb-3'>%s</span> ₽
				</p>  ",$myrow['id'], $myrow['name'], $myrow['lenght_mat'], $myrow['depth'], $myrow['width'], $myrow['material'], $myrow['price']); 
				
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
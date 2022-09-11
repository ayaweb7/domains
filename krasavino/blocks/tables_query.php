<table id="inventory" width="99%" class="realty">
	<tr class='alt'><th>id</th><th>request</th></tr>

<?php
// Выборка параметров магазинов (город - town, адрес - adress, id_store) на основании предыдущей выборки - $myrow
$result5 = mysqli_query($db, "SELECT * FROM query ORDER BY query_id DESC LIMIT 5");
$myrow5 = mysqli_fetch_array($result5);
// Печать полосатых строк таблицы								
			$even=true;

// Начало цикла печати товаров в категории          
			do
			{

				
				printf  ("<tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
							<td>%s</td>
							<td><span>%s</span><br><textarea cols='50' rows='5'>%s</textarea></td>
						</tr>  ", $myrow5['query_id'], $myrow5['comment'], $myrow5['request']); 
				
				$even=!$even;
			}

// Окончание цикла печати товаров в категории
		while ($myrow5 = mysqli_fetch_array($result5));
?>

</table>
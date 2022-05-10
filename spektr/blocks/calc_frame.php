
	<div id='initial' class=''>
		<h2>Онлайн калькулятор деревянного сруба</h2>
		<form name='form' action='result_frame.php' method='post'>
	
<!-- BUILDING & MATERIALS & METHODS -->
		<div class='flexSmall'>
			<div class='blockInput'>
				<span>материал</span>
				<select name='material' size='3'>
<?php
// Выборка из таблицы 'specif' всех характеристик из материала '$material'
		$result5 = mysqli_query($db, "SELECT * FROM specif WHERE name='Срубы' ORDER BY material DESC");
		$myrow5 = mysqli_fetch_array($result5);
		$name = $myrow5['material'];

				printf("<option value='%s' selected>%s</option>",$myrow5['material'], $myrow5['material']);

										
		do {
			if ($myrow5['material'] != $name) {	
				
				printf("<option value='%s'>%s</option>",$myrow5['material'], $myrow5['material']);
				$name = $myrow5['material'];
			}
		}
			while ($myrow5 = mysqli_fetch_array($result5));
?>
				</select>
				
			</div>

			<div class='blockInput'>
				<span>строение</span>
				<select name='building' size='3'>
					<option value='дом' selected>Дом</option>
					<option value='баня'>Баня</option>
				</select>
			</div>
		</div><!--flexSmall-->

<!-- DIMENSIONS -->		
		<div class='flexSmall'><!--flexSmall-->
			<div class='blockInput'>
				<span>Длина<br>сруба</span>
				<select name='length' size='3'>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option selected>8</option>
					<option>9</option>
					<option>10</option>
				</select>	
			</div>
			<div class='blockInput'>
				<span>Ширина<br>сруба</span>
				<select name='width' size='3'>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option selected>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
				</select>
			</div>
			<div class='blockInput'>
				<span>Высота<br>сруба</span>
				<select name='height' size='3'>
					<option>2</option>
					<option>2.5</option>
					<option>3</option>
					<option selected>3.5</option>
					<option>4</option>
					<option>4.5</option>
					<option>5</option>
				</select>
			</div>
			<div class='blockInput'>
				<span>Длина<br>перегородок</span>
				<select name='partition' size='3'>
					<option selected>0</option>
<?php
	for($i = 3; $i <= 21; $i++ )
		printf("<option>%s</option>", $i);
?>
				</select>
			</div>
		</div><!--flexSmall-->

<!-- SUBMIT -->
		<div id='' class='text-center mt-3'>
			<input class='inputSubmit btn btn-primary px-4 me-md-2' type="submit" name="submit" id="submit" value="Расчитать сруб" />
		</div><!--flexSmall-->
		</form>
	</div><!-- initial -->

<?php
// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result5->close(); // Материалы, отсортированные в обратном алфавите для выборки
?>
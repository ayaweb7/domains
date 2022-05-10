<form name='form' action='mysql_specif_insert.php' method='post'>

<!-- NAME & GABARITE -->
	<div class='flexSmall'>
		<div class='blockInput'>Наименование товара<em>*</em>
			<select name='name' size='10'>
<?php
// Выборка в цикле всех существующих наименований товаров
$result = mysqli_query($db, "SELECT * FROM goods ORDER BY good");
$myrow = mysqli_fetch_array($result);
	$good='';
	do
	{
		if ($myrow['good'] != $good)
		{	
			printf  ("<option>%s</option>",$myrow['good']);
			$good = $myrow['good'];
		}
	}
	while ($myrow = mysqli_fetch_array($result));

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result->close(); // Товары, отсортированные по алфавиту
?>
			</select><br>
		</div>

<!-- Характеристики для пиломатериалов -->
		<div class='blockInput'>
			<div>Цифровые параметры - для товаров</div>
			
			<div>
				<label>Габариты - длина<br>
					<input type="text" name="lenght_mat" id="lenght_mat" size="10" value="0.0" />
				</label>
			</div>
			<div>
				<label>Габариты - толщина <em>*</em><br>
					<input type="text" name="depth" id="depth" size="10" value="20" />
				</label>
			</div>
			<div>
				<label>Габариты - ширина <em>*</em><br>
					<input type="text" name="width" id="width" size="10" value="80" />
				</label>
			</div>
			<div>
				<label>Единица измерения<br>
					<select name='item' size='5'>
						<option>шт.</option>
						<option>кг.</option>
						<option selected>пог.м.</option>
						<option>кв.м.</option>
						<option>куб.м.</option>
					</select>
				</label>
			</div>
		</div>
		
<!-- Характеристики для теплиц -->
		<div class='blockInput'>
			<div>Характеристики теплиц</div>
			
			<div>
				<label>Габариты - длина<br>
					<input type="text" name="lenght" id="lenght" size="10" value="0" />
				</label>
			</div>
			<div>
				<label>Поликарбонат<br>
					<input type="text" name="carbonat" id="carbonat" size="10" value="0" />
				</label>
			</div>
			<div>
				<label>Фундамент_100<br>
					<input type="text" name="fund_100" id="fund_100" size="10" value="0" />
				</label>
			</div>
			
			<div>
				<label>Фундамент_150<br>
					<input type="text" name="fund_150" id="fund_150" size="10" value="0" />
				</label>
			</div>
			<div>
				<label>Сборка<br>
					<input type="text" name="sborka" id="sborka" size="10" value="0" />
				</label>
			</div>
		</div>
		
<!-- Характеристики для услуг (срубы, заборы) -->		
		<div class='blockInput'>
			<div>Словесные характеристики - для услуг</div>
			
			<div>
				<label>Описание материала<br>
					<input type="text" name="material" id="material" size="40" value="Строганая доска" />
				</label>
			</div>
			<div>
				<label>Перечень услуг<br>
					<textarea name="list" id="list" cols="40" rows="4">Материал + работа</textarea>
				</label>
			</div>
			<div>
				<label>ЦЕНА <em>*</em><br>
					<input type="text" name="price" id="price" size="10" value="100" />
				</label>
			</div>
		</div>
		
	</div><!--flexSmall-->


<!-- SUBMIT -->
	<div class='flexSmall'>
		<input class='inputSubmit' type="submit" name="submit" id="submit" value="Занести в базу" />
		<input class='inputReset' type="reset" name="set_filter" value="Сброс" />
	</div><!--flexSmall-->

<!-- HIDDEN -->
	<input type="hidden" name="date" value="<?php echo (new DateTime())->format('Y-m-d'); ?>"></input>
</form>
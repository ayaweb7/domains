<form name='form' action='mysql_page_insert.php' method='post'>

<!-- NAME & PAGE -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Название страницы по-русски - name <em>*</em><br>
				<input type="text" name="name" id="name" size="80" value="" />
			</label>
		</div>
		<div class='blockInput'>
			<label>Страница - page <em>*</em><br>
				<input type="text" name="page" id="page" size="50" value="" />
			</label>
		</div>
	</div>

<!-- MARKER & MENU -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Маркер категории страницы - marker <em>*</em><br>
				<label><input type="radio" name="marker" value="index">Начальный</label><br>
				<label><input type="radio" name="marker" value="page">Меню</label><br>
				<label><input type="radio" name="marker" value="service" checked="checked">Служебный</label><br>
				<label><input type="radio" name="marker" value="site">Сайт</label>
			</label>
		</div>
		<div class='blockInput'>
			<label>Пункты меню - menu<br>
				<input type="text" name="menu" id="menu" size="50" value="" />
			</label>
		</div>
	</div>


<!-- TITLE & OFFER -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Основное предложение - offer <br>
				<input type="text" name="offer" id="offer" size="70" value="" />
			</label>
		</div>
		<div class='blockInput'>
			<label>Заголовок страницы на ярлыке - title <em>*</em><br>
				<input type="text" name="title" id="title" size="70" value="" />
			</label>
		</div>
	</div>

<!-- EXTRA -->
	<div class='flexSmall'>
		<label>Дополнительное предложение к офферу - extra <br>
			<textarea name="extra" id="extra" cols="100" rows="2">
			</textarea>
		</label>
	</div>

	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Краткое описание страницы для поисковых систем - description<br>
				<textarea name="description" id="description" cols="70" rows="5"></textarea>
			</label>
		</div>

		<div class='blockInput'>
			<label>Ключевые слова для поиска - keywords <br>
				<textarea name="keywords" id="keywords" cols="70" rows="5"></textarea>
			</label>
		</div>
	</div>

<!-- H1 --- H2  -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Основной заголовок на странице - h1<br>
				<input type="text" name="h1" id="h1" size="70" value="" />
			</label>
		</div>

		<div class='blockInput'>
			<label>Подзаголовок на странице - h2<br>
				<input type="text" name="h2" id="h2" size="70" value="" />
			</label>
		</div>
	</div>


	<div class='flexSmall'>
		<label>Текст на странице - word<br>
			<textarea name="word" id="word" cols="100" rows="5">Какой-то длинный текст о товарах или услугах</textarea>
		</label>
	</div>

<!-- PHOTO -->			
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Подпись под фотографией - photo_alt <br>
				<input type="text" name="photo_alt" id="photo_alt" size="50" value="" />
			</label>
		</div>
		<div class='blockInput'>
			<label>Имя файла с фотографией - photo_name <br>
				<input type="text" name="photo_name" id="photo_name" size="50" value="" />
			</label>
		</div>
	</div>

<!-- SUBMIT -->
	<div class='flexSmall'>
		<input class='inputSubmit' type="submit" name="submit" id="submit" value="Занести в базу" />
		<input class='inputReset' type="reset" name="set_filter" value="Сброс" />
	</div>

<!-- HIDDEN -->
	<input type="hidden" name="date" value="<?php echo (new DateTime())->format('Y-m-d'); ?>"></input>
</form>
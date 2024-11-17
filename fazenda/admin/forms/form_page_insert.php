<form method='post'>

<!-- NAME & URL -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Название страницы по-русски - name <em>*</em><br>
				<input type="text" name="name" size="80" placeholder="Например: Ввод новых данных для ..." value="<?= $name?>">
			</label>
		</div>
		<div class='blockInput'>
			<label>Адрес страницы - url <em>*</em><br>
				<input type="text" name="url" size="50" placeholder="Например: page_insert" value="<?= $url?>">
			</label>
		</div>
	</div>


<!-- MARKER & MENU & TITLE-->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Маркер категории страницы - marker <em>*</em><br>
				<label><input type="radio" name="marker" value="index">Основной сайт</label><br>
				<label><input type="radio" name="marker" value="admin" checked="checked">Администратор</label><br>
				<label><input type="radio" name="marker" value="statistic">Статистика</label><br>
				<label><input type="radio" name="marker" value="service">Служебные или сервисные страницы</label><br>
			</label>
		</div>
		<div class='blockInput'>
			<label>Заголовок страницы на ярлыке - title <em>*</em><br>
				<input type="text" name="title" size="50" placeholder="Например: Новая страница" value="<?= $title?>">
			</label>
			<br>
			<label>Пункт в меню навигации - menu <em>*</em><br>
				<input type="text" name="menu" size="50" placeholder="Например: <em>Новая</em> страница" value="<?= $menu?>">
			</label>
		</div>
	</div>


<!-- H1 --- H2  -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Основной заголовок на странице - h1<br>
				<input type="text" name="h1" size="70" placeholder="Например: Введите данные" value="<?= $h1?>">
			</label>
		</div>

		<div class='blockInput'>
			<label>Подзаголовок на странице - h2<br>
				<input type="text" name="h2" size="70" placeholder="Например: о новой покупке" value="<?= $h2?>">
			</label>
		</div>
	</div>


<!-- PHOTO -->			
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Подпись под фотографией - photo_alt <br>
				<input type="text" name="photo_alt" size="80" placeholder="Например: Вид на дом в первоначальном состоянии" value="<?= $photo_alt?>">
			</label>
		</div>
		<div class='blockInput'>
			<label>Имя файла с фотографией - photo_name <br>
				<input type="text" name="photo_name" size="50" placeholder="Например: house_007" value="<?= $photo_name?>">
			</label>
		</div>
	</div>

<!-- SUBMIT -->
	<div class='flexSmall'>
		<input class='inputSubmit' type="submit" name="submit" value="Занести в базу" />
		<input class='inputReset' type="reset" name="set_filter" value="Сброс">
	</div>

<!-- HIDDEN -->
	<input type="hidden" name="page_date" value="<?php echo (new DateTime())->format('Y-m-d'); ?>">
</form>
<form method='post'>

<!-- NAME --- TITLE --- URL -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Название страницы по-русски (для меню) - name <em>*</em><br>
				<input type="text" name="name" size="40" placeholder="Например: Новая страница" value="<?= $name?>">
			</label>
		</div>
		<div class='blockInput'>
			<label>Заголовок страницы на ярлыке - titer <em>*</em><br>
				<input type="text" name="titer" size="40" placeholder="Например: Страничка" value="<?= $title?>">
			</label>
		</div>
		<div class='blockInput'>
			<label>Адрес страницы - link <em>*</em><br>
				<input type="text" name="link" size="40" placeholder="Например: page_insert" value="<?= $url?>">
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

<!-- MARKER --- PARENT_ID -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Маркер категории страницы - marker <em>*</em><br>
				<label><input type="radio" name="marker" value="index">Основной сайт</label><br>
				<label><input type="radio" name="marker" value="admin" checked="checked">Администратор</label><br>
				<label><input type="radio" name="marker" value="statistic">Статистика</label><br>
				<label><input type="radio" name="marker" value="service">Служебные или сервисные страницы</label><br>
			</label>
		</div>
		<div class='blockInput'><!--Имя родителя - parent_id-->
			<select name='parent_id' size='5'>
				<option value="3" selected>Покупки</option>
				<option value="4">Услуги</option>
				<option value="5">Страницы</option>
				<option value="6">Магазины</option>
				<option value="7">Города</option>
				<option value="8">Статистика</option>
				<option value="9">Фотографии</option>
				<option value="77">Служебная</option>
			</select><br>
		</div>
	</div>


<!-- SUBMIT -->
	<div class='flexSmall'>
		<input class='inputSubmit' type="submit" name="submit" value="Занести в базу" />
		<input class='inputReset' type="reset" name="set_filter" value="Сброс">
	</div>

<!-- HIDDEN -->
	<input type="hidden" name="menu_date" value="<?php echo (new DateTime())->format('Y-m-d'); ?>">
</form>
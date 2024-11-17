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

<!-- SUBMIT -->
	<div class='flexSmall'>
		<input class='inputSubmit' type="submit" name="submit" value="Занести в базу" />
		<input class='inputReset' type="reset" name="set_filter" value="Сброс">
	</div>

<!-- HIDDEN -->
	<input type="hidden" name="menu_date" value="<?php echo (new DateTime())->format('Y-m-d'); ?>">
</form>
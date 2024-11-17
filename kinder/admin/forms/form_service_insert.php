<form method='post'>

<!-- SERV_NAME --- PERFORMER -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Выполненная услуга - serv_name <em>*</em><br>
				<textarea name='serv_name' cols='100' rows='3' placeholder='Например: Уборка территории: ...'><?= $serv_name?></textarea>
			</label>
		</div>
		<div class='blockInput'>
			<label>Исполнитель услуги - performer <em>*</em><br>
				<input type='text' name='performer' size='50' placeholder='Например: Николай, Елена' value='<?= $performer?>'>
			</label>
		</div>
	</div>


<!-- SERV_QUANTITY --- SERV_ITEM --- SERV_PRICE --- SERV_AMOUNT --- SERV_DATE -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Количество - serv_quantity<br>
				<input type='text' name='serv_quantity' size='20' placeholder='Например: 100' value='<?php echo ($serv_quantity) ? $serv_quantity : 0; ?>'>
			</label>
		</div>
		<div class='blockInput'>
			<label>Единица измерения - serv_item<br>
				<input type='text' name='serv_item' size='20' placeholder='Например: кв.м.' value='<?= $serv_item?>'>
			</label>
		</div>
		<div class='blockInput'>
			<label>Цена - serv_price<br>
				<input type='text' name='serv_price' size='20' placeholder='Например: 10' value='<?php echo ($serv_price) ? $serv_price : 0; ?>'>
			</label>
		</div>
		<div class='blockInput'>
			<label>Стоимость - serv_amount<br>
				<input type='text' name='serv_amount' size='20' placeholder='Например: 1000' value='<?php echo ($serv_amount) ? $serv_amount : 0; ?>'>
			</label>
		</div>
		<div class='blockInput'>
			<label>Дата - serv_date <em>*</em><br>
				<input type='date' name='serv_date' value='<?php echo (new DateTime())->format('Y-m-d'); ?>'>
			</label>
		</div>
	</div>

<!-- STORE_ID --- TOWN_ID -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Организация - store_id <em>*</em><br>
				<select name='store_id' size='5'>
					<option value="4" selected>Артеевы</option>
				</select><br>
			</label>
		</div>
		<div class='blockInput'>
			<label>Город исполнителя - town_id <em>*</em><br>
				<select name='town_id' size='5'>
					<option value='5' selected>Красавино</option>
<?php
//session_start(); //Запускаем сессии
//include_once "header.php"; //Подключаем header сайта

include_once "class/SelectTown.php"; //Подключаем класс Выборка городов из базы данных - SelectTown

$town = new SelectTown();
$menu_arr = $town->getMenu();
foreach ($menu_arr as $menu) { //Обходим список категорий
    printf("<option value='" .$menu->town_id . "'>" . $menu->town_ru . "</option>"); //Выводим список на экран
}
?>
				</select><br>
			</label>
		</div>
	</div>


<!-- SUBMIT -->
	<div class='flexSmall'>
		<input class='inputSubmit' type='submit' name='submit' value='Занести в базу' />
		<input class='inputReset' type='reset' name='set_filter' value='Сброс'>
	</div>

<!-- HIDDEN -->
	<input type='hidden' name='input_date' value="<?php echo (new DateTime())->format('Y-m-d'); ?>">
</form>
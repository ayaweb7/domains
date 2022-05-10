<form name='form' action='mysql_good_insert.php' method='post'>

<!-- GOOD & CATEGORY -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Маркер категории страницы <em>*</em><br>
				<label><input type="radio" name="marker" value="good" checked="checked">Товары</label><br>
				<label><input type="radio" name="marker" value="service">Услуги</label><br>
			</label>
		</div>
		<div class='blockInput'>
			<label>Категория товаров или услуг <em>*</em><br>
				<select name='category' size='4'>
					<option selected>Пиломатериалы</option>
					<option>Стройматериалы</option>
					<option>Услуги</option>
					<option>Элементы лестниц</option>
				</select>
			</label>
		</div>
		<div class='blockInput'>
			<label>Наименование товара или услуги <em>*</em><br>
				<input type="text" name="good" id="good" size="30" value="" />
			</label>
		</div>
		<div class='blockInput'>
			<label>Имя файла с фотографией<br>(английскими буквами)<br>
				<input type="text" name="photo" id="photo" size="30" value="" />
			</label>
		</div>
	</div><!--flexSmall-->

<!-- DESCRIPTION -- KEYWORDS ---  -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Краткое описание страницы для поисковых систем - description<br>
				<textarea name="description" id="description" cols="70" rows="5">Купить ЧТО-ТО, строительные услуги в Коряжме</textarea>
			</label>
		</div>

		<div class='blockInput'>
			<label>Ключевые слова для поиска - keywords <br>
				<textarea name="keywords" id="keywords" cols="70" rows="5">Купить ЧТО-ТО в Коряжме, ЧТО-ТО на заказ</textarea>
			</label>
		</div>
	</div><!--flexSmall-->

<!-- P1 --- P2  -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>I - Первый абзац на странице - p1<br>
				<textarea name="p1" id="p1" cols="70" rows="5"></textarea>
			</label>
		</div>

		<div class='blockInput'>
			<label>II - Второй абзац на странице - p2<br>
				<textarea name="p2" id="p2" cols="70" rows="5"></textarea>
			</label>
		</div>
	</div><!--flexSmall-->

<!-- P3 -->
	<div class='flexSmall'>
		<label>III - Третий абзац на странице - p3<br>
			<textarea name="p3" id="p3" cols="100" rows="5"></textarea>
		</label>
	</div><!--flexSmall-->

<!-- TABLE_SPECIFICATION_TITLE - ROW_1 -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>name_title<br>
				<input type="text" name="name_title" id="name_title" size="20" value="Сечение, мм." />
			</label>
		</div>
		<div class='blockInput'>
			<label>size_title<br>
				<input type="text" name="size_title" id="size_title" size="30" value="Количество в 1 куб.м. при длине:" />
			</label>
		</div>
		
		<div class='blockInput'>||<br>||</div>
		
		<div class='blockInput'>
			<label>size_1<br>
				<input type="text" name="size_1" id="size_1" size="20" value="4.3" />
			</label>
		</div>
		<div class='blockInput'>
			<label>size_2<br>
				<input type="text" name="size_2" id="size_2" size="20" value="5.2" />
			</label>
		</div>
		<div class='blockInput'>
			<label>size_3<br>
				<input type="text" name="size_3" id="size_3" size="20" value="6.1" />
			</label>
		</div>
	</div><!--flexSmall-->

<!-- GABARITE -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Заголовок_1<br>
				<input type="text" name="title_g1" id="title_g1" size="20" value="Толщина:" />
			</label>
		</div>
		<div class='blockInput'>
			<label>Габарит_1<br>
				<input type="text" name="g1" id="g1" size="15" value="" />
			</label>
		</div>
		
		<div class='blockInput'>||<br>||</div>
		
		<div class='blockInput'>
			<label>Заголовок_2<br>
				<input type="text" name="title_g2" id="title_g2" size="20" value="Ширина:" />
			</label>
		</div>
		<div class='blockInput'>
			<label>Габарит_2<br>
				<input type="text" name="g2" id="g2" size="15" value="" />
			</label>
		</div>
		
		<div class='blockInput'>||<br>||</div>
		
		<div class='blockInput'>
			<label>Заголовок_3<br>
				<input type="text" name="title_g3" id="title_g3" size="20" value="Длина:" />
			</label>
		</div>
		<div class='blockInput'>
			<label>Габарит_3<br>
				<input type="text" name="g3" id="g3" size="15" value="" />
			</label>
		</div>
	</div><!--flexSmall-->

<!-- TABLE_SPECIFICATION_PRICE_TITLE - ROW_1 -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>толщина - deptp<br>
				<input type="text" name="depth" id="depth" size="20" value="толщина" />
			</label>
		</div>
		<div class='blockInput'>
			<label>ширина - width<br>
				<input type="text" name="width" id="width" size="20" value="ширина" />
			</label>
		</div>

		<div class='blockInput'>||<br>||</div>

		<div class='blockInput'>
			<label>1 Подзаголовок цена 1<br>
				<input type="text" name="price_title_1" id="price_title_1" size="20" value="1 пог.м." />
			</label>
		</div>
		<div class='blockInput'>
			<label>2 Подзаголовок цена 2<br>
				<input type="text" name="price_title_1" id="price_title_1" size="20" value="1 куб.м." />
			</label>
		</div>
	</div><!--flexSmall-->


<!-- PRICE -- ITEM -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Заголовок_цена<br>
				<input type="text" name="title_price" id="title_price" size="20" value="Цена:" />
			</label>
		</div>
		<div class='blockInput'>
			<label>Цена, руб.<br>
				<input type="text" name="price" id="price" size="15" value="" />
			</label>
		</div>
		
		<div class='blockInput'>
			<label>Единица измерения<br>
				<select name='item' size='5'>
					<option selected>шт.</option>
					<option>кг.</option>
					<option selected>пог.м.</option>
					<option>кв.м.</option>
					<option>куб.м.</option>
				</select>
			</label>
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
<!--divBig-->
<div id='divBig' class='flexBig'><!--divBig - #ccc-->
	<div id='divTop' class='flexTitle'>​Логическая модель базы данных<!--divTop - -->
		<?php //echo $myrow1['h1'] . " " . $myrow1['h2'] ?>
	</div><!--divTop-->

<!--divLarge-->	
	<div id='divLarge' class='flexTitle'><!--divLarge - -->

<!--divMiddle_1-->
		<div id='divMiddle' class='flexMiddle'><!--divMiddle_1 - -->

<!--divShops-->			
			<div id='divTown' class='flexSmall'><!--divTown - -->
				<div id='town_select' class='blockInput'><!---->
					<table id="inventory" class='realty'>
						<tr class='alt'><th colspan='4'>shops</th></tr>
						<tr><td>shops_id</td><td>int(5)</td><td> ID покупки</td></tr>
						<tr><td>date</td><td>date</td><td>Дата покупки</td></tr>
						<tr><td>shop</td><td>varchar(50)</td><td>Магазин</td></tr>
						<tr><td>gruppa</td><td>varchar(30)</td><td>Категория</td></tr>
						<tr><td>name</td><td>varchar(50)</td><td>Наименование</td></tr>
						<tr><td>characteristic</td><td>varchar(150)</td><td>Характеристики</td></tr>
						<tr><td>quantity</td><td>int(5)</td><td>Количество</td></tr>
						<tr><td>item</td><td>varchar(30)</td><td>Единицы</td></tr>
						<tr><td>price</td><td>decimal(7,2)</td><td>Цена</td></tr>
						<tr><td>amount</td><td>decimal(7,2)</td><td>Стоимость</td></tr>
						<tr><td>store_id</td><td>int(3)</td><td>ID магазина</td></tr>
					</table>
				</div>
				<div id='town_select' class='blockInput'><!---->
					<table id="inventory" class='realty'>
						<tr class='alt'><th colspan='4'>store</th></tr>
						<tr><td>store_id</td><td>int(5)</td><td> ID магазина</td></tr>
						<tr><td>shop</td><td>varchar(50)</td><td>Магазин</td></tr>
						<tr><td>street</td><td>varchar(50)</td><td>Улица</td></tr>
						<tr><td>house</td><td>varchar(20)</td><td>Дом</td></tr>
						<tr><td>phone</td><td>varchar(250)</td><td>Контакты</td></tr>
						<tr><td>town</td><td>varchar(30)</td><td>Город</td></tr>
						<tr><td>town_eng</td><td>varchar(30)</td><td>Town</td></tr>
						<tr><td>locality_id</td><td>int(3)</td><td>ID города</td></tr>
						<tr><td>date_store</td><td>date</td><td>Дата ввода</td></tr>
					</table>
				</div>
			</div><!--divShops-->

		</div><!--divMiddle_1-->

<!--divMiddle_2-->		
		<div id='divMiddle' class='flexMiddle'><!--divMiddle_2 - -->

<!--divName-->
			<div id='divName' class='flexSmall'><!--divName - -->
				<div id='town_select' class='blockInput'><!---->
					<table id="inventory" class='realty'>
						<tr class='alt'><th colspan='4'>settings</th></tr>
						<tr><td>settings_id</td><td>int(4)</td><td> ID страницы</td></tr>
						<tr><td>page</td><td>varchar(30)</td><td>Страница</td></tr>
						<tr><td>title</td><td>varchar(30)</td><td>Титул</td></tr>
						<tr><td>h1</td><td>varchar(100)</td><td>Заголовок 1</td></tr>
						<tr><td>h2</td><td>varchar(100)</td><td>Заголовок 2</td></tr>
					</table>
					<table id="inventory" class='realty'>
						<tr class='alt'><th colspan='4'>locality</th></tr>
						<tr><td>locality_id</td><td>int(3)</td><td> ID города</td></tr>
						<tr><td>town</td><td>varchar(50)</td><td>Город</td></tr>
						<tr><td>code</td><td>varchar(20)</td><td>Код города</td></tr>
					</table>
				</div>
				<div id='town_select' class='blockInput'><!---->
					<table id="inventory" class='realty'>
						<tr class='alt'><th colspan='4'>query</th></tr>
						<tr><td>query_id</td><td>int(5)</td><td> ID запроса</td></tr>
						<tr><td>query_time</td><td>datetime</td><td>Время запроса</td></tr>
						<tr><td>request</td><td>text</td><td>Запрос</td></tr>
						<tr><td>comment</td><td>varchar(50)</td><td>Комментарий</td></tr>
					</table>
					<table id="inventory" class='realty'>
						<tr class='alt'><th colspan='4'>photos</th></tr>
						<tr><td>photos_id</td><td>int(5)</td><td> ID фото</td></tr>
						<tr><td>number</td><td>int(3)</td><td>Номер</td></tr>
						<tr><td>date_photo</td><td>varchar(20)</td><td>Дата словами</td></tr>
						<tr><td>date</td><td>date</td><td>Дата</td></tr>
						<tr><td>notes</td><td>varchar(100)</td><td>Примечание</td></tr>
					</table>
				</div>
			</div><!--divName-->

		</div><!--divMiddle_2-->
	</div><!--divLarge-->
</div><!--divBig-->
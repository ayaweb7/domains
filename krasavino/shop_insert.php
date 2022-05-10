<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='shop_insert'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
?>

<form action="mysql_shop_insert.php" method="post" onSubmit="return validateShop(this)"><!-- name="form"-->
	<table cellspacing="0" cellpadding="1" width="50%" class="tableborder">
	<caption>
		<h1 style="text-align: center; font-size: 2em; color: #00843e; font-weight: bold; padding-bottom: 2%;"><?php echo $myrow1['h1'] ?></h1>
	</caption>
        <tr>
			<td valign="top" width="100%">
				<table width="100%" cellpadding="3">
					<tr>
<!-- MANUAL -->
						<td valign="top" width="25%">
							<div><b>ОБЩИЕ</b></div>
							<table align="center" width="100%">
<!-- DATE -->
								<tr>
									<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дата покупки</span><br/>
<!--									<input type="text" name="date" style="color: red; size="10" value="2021.01.08" />-->
								<input type='date' name='date' value='2021.02.08'>
									</td>
<!-- GRUPPA -->                                
									<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Категория</span><br/>
										<select name='gruppa' size='7'>
<?php	
										$result = mysqli_query($db, "SELECT * FROM shops ORDER BY gruppa");
										$myrow = mysqli_fetch_array($result);
										$gruppa='';
										do {
											if ($myrow['gruppa'] != $gruppa) {	
												printf  ("<option>%s</option>",$myrow['gruppa']);
												$gruppa = $myrow['gruppa'];
											}
										}
										while ($myrow = mysqli_fetch_array($result));
// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result->close(); // Товары внутри категорий - отсортированные по дате и лимитированные
?>
										</select>
									</td>
<!-- SHOP -->                              
									<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Магазин</span><br/>
										<select name='shop' size='7'>
<?php	
										$result2 = mysqli_query($db, "SELECT * FROM store ORDER BY shop");
										$myrow2 = mysqli_fetch_array($result2);
										$shop='';
										do {
											if ($myrow2['shop'] != $shop) {	
												printf  ("<option>%s</option>",$myrow2['shop']);
												$shop = $myrow2['shop'];
											}
										}
										while ($myrow2 = mysqli_fetch_array($result2));
// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result2->close(); // Товары внутри категорий - отсортированные по дате и лимитированные
?>
										</select>
									</td>
								</tr>
							</table><!-- ОБЩИЕ -->
						</td>
<!-- MAIN -->               
						<td valign="top" width="50%">
						<div><b>ОСНОВНЫЕ</b></div>
							<table align="center" width="100%">
<!-- NAME -->
								<tr>
									<td colspan="4" valign="top"><span style="width:60px; padding-left:4px;">Наименование</span><br/>
									<input type="text" name="name" size="20" value=""/>
								</td></tr>
<!-- CHARACTERISTIC -->
								<tr>
									<td colspan="4" valign="top"><span style="width:60px; padding-left:4px;">Характеристики</span><br/>
									<input type="text" name="characteristic" size="80" value=""/>
								</td></tr>
<!--ITEM - QUANTITY -->	                              
								<tr>
									<td valign="top"><span style="width:60px; padding-left:4px;">Количество</span><br/>
									<input type="text" name="quantity" size="10" value=""/>
									</td>

									<td valign="top"><span style="width:60px; padding-left:4px;">Единицы измерения</span><br/>
										<select name='item' size='1'>
											<option></option>
											<option>кг.</option>
											<option>кв.м.</option>
											<option>кВт/ч</option>
											<option>куб.м.</option>
											<option>л.</option>
											<option>м.</option>
											<option selected>шт.</option>
										</select>
									</td>
<!-- PRICE --- AMOUNT -->
									<td valign="top"><span style="width:60px; padding-left:4px;">Цена</span><br/>
									<input type="text" name="price" size="10" value=""/>
									</td>

									<td valign="top"><span style="width:60px; padding-left:4px;">Стоимость</span><br/>
									<input type="text" name="amount" size="10" value=""/>
									</td>
								</tr>
							</table> <!-- ОСНОВНЫЕ -->
						</td>
					</tr>
				</table>

<input class='inputSubmit' type='submit' name='set_filter' value='Загрузить новый товар в базу'/>
<!--<input type="reset" name="set_filter" value="Сбросить"/>-->

			</td>
		</tr>
	</table>
</form>

<?php
// Подключаем FOOTER_SEARCH
include ("blocks/footer_search.php");
?>
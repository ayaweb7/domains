<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='store_insert'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
?>

<form action="mysql_store_insert.php" method="post" onSubmit="return validateStore(this)"><!-- name="form"-->
	<table cellspacing="0" cellpadding="1" align="center" width="70%" class="tableborder">
	<caption>
		<h1 style="text-align: center; font-size: 2em; color: #00843e; font-weight: bold; padding-bottom: 2%;"><?php echo $myrow1['h1'] ?></h1>
	</caption>
        <tr>
			<td valign="top" width="100%">
				<table width="100%">
					<tr>
<!-- ОБЩИЕ -->
						<td valign="top" width="32%">
							<div><b>ОБЩИЕ</b></div>
							<table align="center" width="100%">
<!-- DATE -->
								<tr>
<!--									<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дата ввода</span><br/>
									<input type="text" name="date" style="color: red; size="10" value="2021.01.08" />
								<input type='date' name='date_store' value=''>
									</td>-->
<!-- TOWN -->                              
									<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Город</span><br/>
										<select name='town' size='7'>
<?php	
										$result = mysqli_query($db, "SELECT * FROM store ORDER BY town");
										$myrow = mysqli_fetch_array($result);
										$town='';
										do {
											if ($myrow['town'] != $town) {	
												printf  ("<option>%s</option>",$myrow['town']);
												$town = $myrow['town'];
											}
										}
										while ($myrow = mysqli_fetch_array($result));
// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result->close(); // Товары внутри категорий - отсортированные по дате и лимитированные
?>
										</select>
									</td>
								</tr>
							</table> <!-- ОБЩИЕ -->
						</td> <!-- ОБЩИЕ -->
<!-- ОСНОВНЫЕ -->               
						<td valign="top" width="65%">
						<div><b>ОСНОВНЫЕ</b></div>
							<table align="center" width="100%">
<!-- SHOP -->
								<tr>
									<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Магазин</span><br/>
									<input type="text" name="shop" size="30" value=""/>
								</td></tr>
<!-- STREET -->
								<tr>
									<td valign="top"><span style="width:60px; padding-left:4px;">Улица</span><br/>
									<input type="text" name="street" size="40" value=""/>
									</td>
<!-- HOUSE -->
									<td valign="top"><span style="width:60px; padding-left:4px;">Дом</span><br/>
									<input type="text" name="house" size="10" value=""/>
									</td>
								</tr>
<!-- PHONE -->
								<tr>
									<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Контактная информация, телефон</span><br/>
									<input type="text" name="phone" size="60" value=""/>
									</td></tr>
							</table> <!-- ОСНОВНЫЕ -->
						</td> <!-- ОСНОВНЫЕ -->
					</tr>
				</table>

<!-- SUBMIT -->
<input class="inputbuttonflat" type="submit" name="set_filter" value="Отправить данные" style="margin-left:20px;"/>
<input type="reset" name="set_filter" value="Сбросить"/>

<!-- HIDDEN -->
<input type="hidden" name="date_store" value="<?php echo (new DateTime())->format('Y-m-d'); ?>"/>
			</td>
		</tr>
	</table>
</form>

<?php
// Подключаем FOOTER_MAIN
include ("blocks/footer_store.php");
?>
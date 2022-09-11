<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='form_store_update'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");

//if (isset($_GET['id_store'])) {$id_store=$_GET['id_store'];}

//if (isset($_POST['id_store'])) {$id_store = $_POST['id_store'];}
//if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['shop_search'])) {$shop_search = $_POST['shop_search'];}
//if (isset($_POST['town'])) {$town = $_POST['town'];}
//if (isset($_POST['street'])) {$street = $_POST['street'];}
//if (isset($_POST['house'])) {$house = $_POST['house'];}
//if (isset($_POST['phone'])) {$phone = $_POST['phone'];}

$result = mysqli_query($db, "SELECT * FROM store WHERE shop='$shop_search'");
$myrow = mysqli_fetch_array($result);
?>

<form action="mysql_store_update.php" method="post" onSubmit="return validateStore(this)">
	<table cellspacing="0" cellpadding="1" align="center" width="70%" class="tableborder">
	<caption>
		<h1 style="text-align: center; font-size: 2em; color: #00843e; font-weight: bold; padding-bottom: 2%;">
		<?php echo $myrow1['h1']  ?><span style="width:60px; padding-left:4px; color: #D01E1E; text-decoration: none;"><?php echo $myrow['shop'] ?></span>
		</h1>
	</caption>
        <tr>
			<td valign="top" width="100%">
				<table width="100%">
					<tr>
<!-- ОБЩИЕ -->
						<td valign="top" width="25%">
							<div><b>ОБЩИЕ</b></div>
							<table align="center" width="100%">
<!-- DATE -->
								<tr>
<!--									<td valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Дата: </span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>
										<input type="text" name="date_store" size="10" value="<?php echo $myrow['date_store'] ?>"/>
									</td>-->
<!-- TOWN -->                              
									<td valign="top"><span style="width:60px; padding-left:4px;">Город:</span><br><br>
										<span style="width:60px; padding-left:4px; color: #D01E1E; text-decoration: none;"><?php echo $myrow['town'] ?></span>
									</td>
<!-- SHOP -->
									<td valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Магазин:</span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>
										<input type="text" name="shop" size="30" value="<?php echo $myrow['shop'] ?>"/>
									</td>
<!-- STREET -->									
									<td valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Улица:</span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>
										<input type="text" name="street" size="40" value="<?php echo $myrow['street'] ?>"/>
									</td>
<!-- HOUSE -->									
									<td valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Номер дома:</span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>
										<input type="text" name="house" size="10" value="<?php echo $myrow['house'] ?>"/>
									</td>
								</tr>
<!-- PHONE -->								
								<tr>
									<td colspan="5" valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Контактная информация, телефон:</span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>
										<input type="text" name="phone" size="60" value="<?php echo $myrow['phone'] ?>"/>
									</td>
								</tr>
								<tr><td><input name="store_id" type="hidden" value="<?php echo $myrow['store_id'] ?>"/></td></tr>
							</table> <!-- ОБЩИЕ -->
						</td> <!-- ОБЩИЕ -->
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
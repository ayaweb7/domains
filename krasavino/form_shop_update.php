<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='shop_form_update'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");

if (isset($_GET['shops_id'])) {$shops_id=$_GET['shops_id'];}
if (isset($_POST['id_update'])) {$shops_id = $update = $_POST['id_update']; $arg = 'shops_id'; $mess_1 = 'ID товара: '; $mess_2 = '.';}

//if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['shop'])) {$shop = $_POST['shop'];}
if (isset($_POST['gruppa'])) {$gruppa = $_POST['gruppa'];}
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['characteristic'])) {$characteristic = $_POST['characteristic'];}
if (isset($_POST['quantity'])) {$quantity = $_POST['quantity'];}
if (isset($_POST['item'])) {$item = $_POST['item'];}
if (isset($_POST['price'])) {$price = $_POST['price'];}
if (isset($_POST['amount'])) {$amount = $_POST['amount'];}

$result = mysqli_query($db, "SELECT * FROM shops WHERE shops_id='$shops_id'");
$myrow = mysqli_fetch_array($result);
?>

<form action="mysql_shop_update.php" method="post" onSubmit="return validateShop(this)">
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
									<td colspan="2" valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Дата: </span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>
										<input type="text" name="date" size="10" value="<?php echo $myrow['date'] ?>"/>
									</td>
<!-- GRUPPA -->                                
									<td colspan="2" valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Категория: </span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>
										<input type="text" name="gruppa" size="15" value="<?php echo $myrow['gruppa'] ?>"/>
									</td>
<!-- SHOP -->                              
									<td colspan="2" valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Магазин: </span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>									
										<input type="text" name="shop" size="30" value="<?php echo $myrow['shop'] ?>"/>
									</td>
								</tr>
<!-- NAME -->
								<tr>
									<td></td>
									<td colspan="3" valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Наименование: </span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>									
									<input type="text" name="name" size="30" value="<?php echo $myrow['name'] ?>"/>
									</td>
									<td></td>
								</tr>								
							</table><!-- ОБЩИЕ -->
						</td>
<!-- MAIN -->               
						<td valign="top" width="50%">
						<div><b>ОСНОВНЫЕ</b></div>
							<table align="center" width="100%">
<!-- CHARACTERISTIC -->
								<tr>
									<td colspan="4" valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Характеристики: </span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>									
									<input type="text" name="characteristic" size="80" value="<?php echo $myrow['characteristic'] ?>"/>
								</td></tr>
<!-- QUANTITY -->
								<tr>
									<td valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Количество: </span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>									
									<input type="text" name="quantity" size="10" value="<?php echo $myrow['quantity'] ?>" style="text-align: center;"/>
									</td>
<!-- ITEM -->
									<td valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Единицы измерения: </span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>									
										<input type="text" name="item" size="10" value="<?php echo $myrow['item'] ?>" style="text-align: center;"/>
									</td>
<!-- PRICE -->
									<td valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Цена: </span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>									
									<input type="text" name="price" size="10" value="<?php echo $myrow['price'] ?>" style="text-align: center;"/>
									</td>
<!-- AMOUNT -->
									<td valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Стоимость: </span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>									
									<input type="text" name="amount" size="10" value="<?php echo $myrow['amount'] ?>" style="text-align: center;"/>
									</td>
								</tr>
								<tr><td><input name="shops_id" type="hidden" value="<?php echo $myrow['shops_id'] ?>"/></td></tr>
							</table> <!-- ОСНОВНЫЕ -->
						</td>
					</tr>
				</table>

<input class="inputbuttonflat" type="submit" name="set_filter" value="Отправить данные" style="margin-left:20px;"/>
<input type="reset" name="set_filter" value="Сбросить"/>

			</td>
		</tr>
	</table>

</form>

<?php
// Подключаем FOOTER_SEARCH
include ("blocks/footer_search.php");
?>
<?php 
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='store_update'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
?>
<form name='form' action='form_store_update.php' method='post'>
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
		<tr class="tablehead"><td><em><?php echo $myrow1['h1'] ?></em></td></tr>
		<tr valign="top" class="tablehead">
			<td>
				<select name='shop_search' size='7'>
<?php
// Выборка в цикле всех существующих магазинов
$result = mysqli_query($db, "SELECT * FROM store ORDER BY shop");
$myrow = mysqli_fetch_array($result);
	$shop='';
	do
	{
		if ($myrow['shop'] != $shop)
		{	
			printf  ("<option>%s</option>",$myrow['shop']);
			$shop = $myrow['shop'];
		}
	}
	while ($myrow = mysqli_fetch_array($result));

// Закрыли объект с магазинами
$result->close();
?>
				</select><br>
				<input id='check' type='submit' value='Войти в форму для изменения информации о магазине' src='images/shop.png' alt='Товары в магазине'/>
			</td>
		</tr>
	</table>
</form>

<!-- Подключаем FOOTER_MAIN -->
<?php include ("blocks/footer_store.php"); ?>
<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='form_photo_update'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");

if (isset($_POST['number'])) {$number=$_POST['number'];}

$result = mysqli_query($db, "SELECT * FROM photos WHERE number='$number'");
$myrow = mysqli_fetch_array($result);
?>

<form action="mysql_photo_update.php" method="post" onSubmit="return validateShop(this)">
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
<!-- NUMBER -->
								<tr>
									<td colspan="2" valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Номер фотографии: </span><br><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>
										<input type="text" name="number" size="5" value="<?php echo $myrow['number'] ?>"/>
									</td>
<!-- DATE_PHOTO -->                                
									<td colspan="2" valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Дата фотографии: </span><br><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>
										<input type="text" name="date_photo" size="15" value="<?php echo $myrow['date_photo'] ?>"/>
									</td>
<!-- DATE -->                              
									<td colspan="2" valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Дата в формате даты: </span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>									
										<input type="text" name="date" size="10" value="<?php echo $myrow['date'] ?>"/>
									</td>
								
<!-- NOTES -->
									<td colspan="3" valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Описание фотографии: </span><br><br><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>									
									<input type="text" name="notes" size="50" value="<?php echo $myrow['notes'] ?>"/>
									</td>
									<td><input name="photos_id" type="hidden" value="<?php echo $myrow['photos_id'] ?>"/></td>
								</tr>								
							</table><!-- ОБЩИЕ -->
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
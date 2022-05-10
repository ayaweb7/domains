<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='form_settings_update'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");

if (isset($_GET['id'])) {$id=$_GET['id'];}

if (isset($_POST['id'])) {$id = $_POST['id'];}
//if (isset($_POST['page'])) {$page = $_POST['page'];}
//if (isset($_POST['title'])) {$title = $_POST['title'];}
//if (isset($_POST['h1'])) {$h1 = $_POST['h1'];}
//if (isset($_POST['h2'])) {$h2 = $_POST['h2'];}

$result = mysqli_query($db, "SELECT * FROM settings WHERE id='$id'");
$myrow = mysqli_fetch_array($result);
?>

<form name='form' action='mysql_settings_update.php' method='post'>
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder"><!--  id="inventory" -->
	<caption>
		<h1 style="text-align: center; font-size: 2em; color: #00843e; font-weight: bold; padding-bottom: 2%;">
		<?php echo $myrow1['h1']  ?><span style="width:60px; padding-left:4px; color: #D01E1E; text-decoration: none;"><?php echo $myrow['page'] ?></span>
		</h1>
	</caption>
    	<tr>
			<td valign="top" width="100%">
				<table width="100%" cellpadding="3">
					<tr>
						<td valign="top" width="20%">
							<table class="adm" align="center" width="100%">
<!-- TITLE -->
								<tr>
									<td valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">TITLE: </span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>
										<input type="text" name="title" size="30" value="<?php echo $myrow['title'] ?>"/>
									</td>
<!-- H1 -->
									<td valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">H1: </span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>
										<input type="text" name="h1" size="60" value="<?php echo $myrow['h1'] ?>"/>
									</td>
								</tr>
<?php?>                            
								<tr>
<!-- ID -->
									<td valign="top"><input name="id" type="hidden" value="<?php echo $myrow['id'] ?>"/></td>
<!-- H2 -->
									<td valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">H2: </span><br>
																<span style="font-size: 1em; font-style: italic;">изменить на</span><br>
										<input type="text" name="h2" size="60" value="<?php echo $myrow['h2'] ?>"/>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>

<input class="inputbuttonflat" type="submit" name="set_filter" value="Сохранить изменения" style="margin-left:20px;"/>
<input type="reset" name="set_filter" value="Сбросить"/>

<br/><br/></td>
		</tr>
	</table>
</form>

<?php
// Подключаем FOOTER_MAIN
include ("blocks/footer_store.php");
?>
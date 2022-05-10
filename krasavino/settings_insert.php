<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='settings_insert'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
?>
<form name="form" action="mysql_settings_insert.php" method="post">
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	<caption>
		<h1 style="text-align: center; font-size: 2em; color: #00843e; font-weight: bold; padding-bottom: 2%;"><?php echo $myrow1['h1'] ?></h1>
	</caption>
		<tr>
			<td valign="top" width="100%">
				<table width="100%" cellpadding="3">
					<tr>
<!-- MANUAL -->
						<td valign="top" width="32%">
							<div><b>ОБЩИЕ</b></div>
							<table align="center" width="100%">
<!-- PAGE -->
								<tr>
								  <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Название страницы (page)</span><br/>
									  <input type="text" name="page" style="color: red;" size="20" autofocus value=""/>
								</td></tr>
<!-- TITLE -->                                
								<tr>
								  <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Заголовок страницы (title)</span><br/>
									  <input type="text" name="title" size="20" value=""/>
								</td></tr>
							</table>
						</td>		
<!-- GLOBAL -->               
						<td valign="top" width="65%">
							<div><b>ОСНОВНЫЕ</b></div>
							<table align="center" width="100%">
<!-- H1 -->	                              
								<tr>
								  <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Заголовок h1</span><br/>
									  <input type="text" name="h1" size="60" value=""/>
								</td></tr>
<!-- H2 -->
								<tr>
								  <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Заголовок h2</span><br/>
									  <input type="text" name="h2" size="60" value=""/>
								</td></tr>
                            
							</table>
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
// Подключаем FOOTER_MAIN
include ("blocks/footer_store.php");
?>
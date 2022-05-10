<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='store_insert'");
$myrow1 = mysqli_fetch_array($result1);

if (isset($_GET['id'])) {$id=$_GET['id'];}

//$result = mysqli_query($db, "SELECT * FROM shops");
//$myrow = mysqli_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link href="css/screen.css" type="text/css" rel="stylesheet" />
	<title><?php echo $myrow1['title'] ?></title>
</head>

<body>
<!-- Подключаем HEADER -->
		<?php include ("header_admin.php"); ?>

<form name="form" action="mysql_store_insert.php" method="post">
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	<tr>
 	      <td class="tablehead"><?php echo $myrow1['h1'] ?></td>
    	</tr>
        
        <tr>
          <td valign="top" width="100%">
          
            <table width="100%" cellpadding="3">
                <tr>
<!-- MANUAL -->
                    <td valign="top" width="32%">
                        <table align="center" width="100%">
		<!-- DATE -->
							<tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дата ввода информации (date)</span><br/>
		<!--				          <input type="text" name="date" style="color: red; size=10" value="<?php echo date('d.m.Y'); ?>" /> -->
		<!--				          <input type="text" name="date" style="color: red; size=10" value="<?php echo date('timestamp'); ?>" /> --> 
								  <input type="text" name="date" style="color: red; size=10" value="<?php echo date('Y-m-d'); ?>" />
                            </td></tr>
						
		<!-- TOWN -->                              
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Город (town)</span><br/>
								<select name='town' size='1'>
									<option>Великий Устюг</option>
									<option>Вологда</option>
									<option>Вычегодский</option>
									<option>Екатеринбург</option>
									<option>Китай</option>
									<option>Коряжма</option>
									<option selected>Котлас</option>
									<option>Красавино</option>
									<option>Москва</option>
									<option>Приводино</option>
									<option>С-Петербург</option>
									<option>Сыктывкар</option>
									<option>Челябинск</option>
									<option>Эжва</option>
									<option>Ядриха</option>
								</select>
							</td></tr>
		<!-- NAME STORE-->
							<tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Наименование магазина(shop)</span><br/>
						          <input type="text" name="shop" size="30" value=""/>
                            </td></tr>
					
					</table></td>

					<td valign="top" width="65%">
						<table align="center" width="100%">	
		
		<!-- STREET -->
							<tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Адрес магазина - улица (street)</span><br/>
						          <input type="text" name="street" size="40" value=""/>
                            </td></tr>

		<!-- HOUSE -->
							<tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Адрес магазина - дом (house)</span><br/>
						          <input type="text" name="house" size="10" value=""/>
                            </td></tr>

		<!-- PHONE -->
							<tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Телефон магазина (phone)</span><br/>
						          <input type="text" name="phone" size="40" value=""/>
                            </td></tr>						
        
		<!-- ID_LOCALITY -->
							<tr>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">ID_LOCALITY</span><br/>
						          <select name='id_locality' size='1'>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option selected>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
									<option>13</option>
									<option>14</option>
									<option>15</option>
								</select>
                            </td></tr>	
						</table></td></tr>
	</table>  
                    
                

<input class="inputbuttonflat" type="submit" name="set_filter" value="Отправить данные" style="margin-left:20px;"/>
<input type="reset" name="set_filter" value="Сбросить"/>

</td></tr>

</table>

	</form>

<!-- Подключаем FOOTER -->
		<?php// include ("footer.php"); ?>

</body>
</html>
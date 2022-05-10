<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='search'");
$myrow1 = mysqli_fetch_array($result1);

if (isset($_GET['id'])) {$id=$_GET['id'];}

$result = mysqli_query($db, "SELECT * FROM shops");
$myrow = mysqli_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link href="css/screen.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="js/town_script_adm.js"></script>
	<title><?php echo $myrow1['title'] ?></title>
</head>

<body>
<!-- Подключаем HEADER -->
		<?php include ("header_admin.php"); ?>

<form name="form" action="mysql_search.php" method="post">
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	<tr>
 	      <td class="tablehead"><?php echo $myrow1['h1'] . " " . $myrow1['h2'] ?></td>
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
								<td colspan="3" valign="top"><span style="width:60px; padding-left:4px;">Дата покупки (date)</span><br/>
						          <input type="text" name="date" style="color: red;" size="20" value="2013.12.23" />
								</td>
								<td colspan="3" valign="top"><span style="width:40px; padding-left:4px;">Дата покупки ДО (date_to)</span><br/>
						          <input type="text" name="date_to" style="color: blue;" size="20" value="2020.12.30" />
								</td>
								<td colspan="3" valign="top"><span style="width:60px; padding-left:4px;">Критерии поиска</span><br/>
									<select name='operation_date' size='1'>
										<option>=</option>
										<option>!=</option>
										<option selected>BETWEEN</option>
									</select>
								</td>
							</tr>
						
		<!-- GRUPPA -->                                
                            <tr>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Категория (gruppa)</span><br/>
									<select name='gruppa' size='1'>
										<option></option>
								<?php	
									$result = mysqli_query($db, "SELECT * FROM shops ORDER BY gruppa");
									$myrow = mysqli_fetch_array($result);
									$gruppa=' ';
									do {
									if ($myrow['gruppa'] != $gruppa) {	
				
										printf  ("	<option>%s</option>",$myrow['gruppa']);
										$gruppa = $myrow['gruppa'];
										}
									}
										while ($myrow = mysqli_fetch_array($result));
								?>
									</select>
								</td>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Критерии поиска</span><br/>
									<select name='operation_gruppa' size='1'>
										<option>=</option>
										<option>!=</option>
									</select>
								</td>
							</tr>
		<!-- TOWN -->
		
		
                            <tr>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Город (town)</span><br/>
									<select name='town' size='1' onchange='selectTown();'>
										<option></option>
								<?php	
										$result2 = mysqli_query($db, "SELECT * FROM locality ORDER BY town");
										$myrow2 = mysqli_fetch_array($result2);
										$town='';
										
										do {
											if ($myrow2['town'] != $town) {	
				
												printf  ("<option value='%s'>%s</option>",$myrow2['code'], $myrow2['town']);
												$town = $myrow2['town'];
											}
										}
												while ($myrow2 = mysqli_fetch_array($result2));
									?>
							
									</select>
									
									<?php
									if (isset($_GET['town'])) 
										{
											$townSelected = $_GET['town'];
											echo $townSelected;
										}
								
										else
										{
											echo '<script type="text/javascript">';
											echo 'document.location.href="' . $_SERVER['REQUEST_URI'] . '?town=" + townSelected';
											echo '</script>';
											echo $_GET['town'];
											$townSelected = $_GET['town'];	
										}
									?>
								</td>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Критерии поиска</span><br/>
									<select name='operation_town' size='1'>
										<option>=</option>
										<option>!=</option>
									</select>
								</td>
							</tr>
					</td>
							
		<!-- SHOP -->                              
                            <tr>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Магазин (shop)</span><br/>
									<select id='<?php echo $townSelected ?>' style='display: none;' name='shop' size='1' onchange='checkAll(this.form);'>
										<option></option>
									<?php	
										$result3 = mysqli_query($db, "SELECT * FROM store WHERE town = $town ORDER BY shop ");
										$myrow3 = mysqli_fetch_array($result2);
										$shop=' ';

										do {
											if ($myrow3['shop'] != $shop) {	
				
												printf  ("<option>%s</option>",$myrow3['shop']);
												$shop = $myrow3['shop'];
											}
										}
												while ($myrow3 = mysqli_fetch_array($result3));
										
									?>
									</select>
								</td>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Критерии поиска</span><br/>
									<select id='<?php echo $town ?>' style='display: none;' name='operation_shop' size='1'>
										<option>=</option>
										<option>!=</option>
									</select>
								</td>
							</tr>
                         
                    </table></td>
                
<!-- GLOBAL -->               
                   <td valign="top" width="65%">
                    <table align="center" width="100%">
		<!-- NAME -->
							<tr>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Наименование (name)</span><br/>
									<select name='name' size='1'>
										<option></option>
									<?php	
										$result2 = mysqli_query($db, "SELECT * FROM shops ORDER BY name");
										$myrow2 = mysqli_fetch_array($result2);
										$name=' ';

										do {
											if ($myrow2['name'] != $name) {	
				
												printf  ("<option>%s</option>",$myrow2['name']);
												$name = $myrow2['name'];
											}
										}
												while ($myrow2 = mysqli_fetch_array($result2));
												
									?>
									</select>
								</td>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Критерии поиска</span><br/>
									<select name='operation_name' size='1'>
										<option>=</option>
										<option>!=</option>
									</select>
								</td>
							</tr>
							
		<!-- CHARACTERISTIC -->
							<tr>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Характеристики (characteristic)</span><br/>
						          <input type="text" name="characteristic" size="40" value=""/>
								</td>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Критерии поиска</span><br/>
									<select name='operation_characteristic' size='1'>
										<option>LIKE</option>
									</select>
								</td>
							</tr>
							
		<!-- PRICE --> 
							<tr>
								<td valign="top"><span style="width:40px; padding-left:4px;">Цена (price)</span><br/>
						          <input type="text" name="price" size="10" value=""/>
								</td>
								<td valign="top"><span style="width:40px; padding-left:4px;">Цена ДО (price_to)</span><br/>
						          <input type="text" name="price_to" style="color: blue;" size="10" value="" />
								</td>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Критерии поиска</span><br/>
									<select name='operation_price' size='1'>
										<option>=</option>
										<option>!=</option>
										<option>></option>
										<option>>=</option>
										<option><</option>
										<option><=</option>
										<option>BETWEEN</option>
									</select>
								</td>
							</tr>
							
                          
					</table></td>
				</tr>
			</table>

<input class="inputbuttonflat" type="submit" name="set_filter" value="Создать поиск" style="margin-left:20px;"/>
<input type="reset" name="set_filter" value="Сбросить"/>
<!-- <a href="#" target="_blank"><img src="images/send2.png" id="send"/></a><a href="#" target="_blank"><img src="images/esc2.png" id="send"/></a> -->

</td></tr>

<!--
<tr><td width="50%" >
 <a href="shop.php" title="Вернуться в блок администратора"><img src="images/send2.png" id="send"/></a>&nbsp;
 <a href="shop.php" title="Вернуться в блок администратора"><img src="images/esc2.png" id="send"/></a>
</td></tr>           
-->

</table>

	</form>

<!-- Подключаем FOOTER -->
		<?php include ("footer.php"); ?>
		
<!-- RADIO button -->
<!-- 
<form>
  <fieldset>
    <legend>Please select your preferred contact method:</legend>
    <div>
      <input type="radio" id="contactChoice1"
       name="contact" value="email" checked>
      <label for="contactChoice1">Email</label>

      <input type="radio" id="contactChoice2"
       name="contact" value="phone">
      <label for="contactChoice2">Phone</label>

      <input type="radio" id="contactChoice3"
       name="contact" value="mail">
      <label for="contactChoice3">Mail</label>
    </div>
    <div>
      <button type="submit">Submit</button>
    </div>
  </fieldset>
</form>
 -->
</body>
</html>
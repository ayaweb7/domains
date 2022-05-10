<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='name_form_update'");
$myrow1 = mysqli_fetch_array($result1);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $myrow1['title'] ?></title>
<link href="css/screen.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/praga_script_adm.js"></script>
<!-- <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" /> -->

</head>

<body>
<!-- Подключаем HEADER -->
		<?php include ("header_admin.php"); ?>

<div>

<?php
if (isset($_GET['id'])) {$id=$_GET['id'];}

if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['town'])) {$town = $_POST['town'];}
if (isset($_POST['adress'])) {$adress = $_POST['adress'];}
if (isset($_POST['shop'])) {$shop = $_POST['shop'];}
if (isset($_POST['gruppa'])) {$gruppa = $_POST['gruppa'];}
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['characteristic'])) {$characteristic = $_POST['characteristic'];}
if (isset($_POST['quantity'])) {$quantity = $_POST['quantity'];}
if (isset($_POST['item'])) {$item = $_POST['item'];}
if (isset($_POST['price'])) {$price = $_POST['price'];}
if (isset($_POST['amount'])) {$amount = $_POST['amount'];}

$db = mysqli_connect("localhost","nikart","arteeva12");
mysqli_select_db($db, "agency");

$result = mysqli_query($db, "SELECT * FROM shops WHERE id='$id'");
$myrow = mysqli_fetch_array($result);

print <<<HERE
<form name='form' action='mysql_shop_update.php' method='post'>
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	
        <tr>
          <td valign="top" width="100%">
          
            <table width="100%" cellpadding="3">
                <tr>
                        <td valign="top" width="20%">
                          
                            <table class="adm" align="center" width="100%">
                            
                            <caption> <!-- Заголовок таблицы -->
						      <h1 style='font-size: 2em;' align="center">№ <em>$myrow[id]</em> - <em style='color: #19910f;'>$myrow[name] $myrow[characteristic]</em> (группа $myrow[gruppa])</br><span style='color: #e50000;'>$myrow[quantity]</span> $myrow[item] по <span style='color: #e50000;'>$myrow[price]</span> руб., всего <span style='color: #e50000;'>$myrow[amount]</span> руб.</br> Куплено в магазине <em style='color: #e50000;'>$myrow[shop]</em> по адресу: $myrow[adress]</br> Дата покупки: <em style='color: #8b0000;'>$myrow[date].</em></h1>
                            </caption>
                              
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">ДАТА </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="date" size="10" value="$myrow[date]"/></td>
                              <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">НАИМЕНОВАНИЕ </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
    						      <input type="text" name="name" size="25" value="$myrow[name]"/></td>
                            </tr>
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">КАТЕГОРИЯ </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="gruppa" size="20" value="$myrow[gruppa]"/></td>
                              <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">ХАРАКТЕРИСТИКА </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="characteristic" size="70" value="$myrow[characteristic]" autofocus/></td>
                            </tr>
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">ГОРОД </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="town" size="20" value="$myrow[town]"/></td>
                              <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">КОЛИЧЕСТВО </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="quantity" size="10" value="$myrow[quantity]"/></td>
							  <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">ЕДИНИЦА ИЗМЕРЕНИЯ </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="item" size="7" value="$myrow[item]"/></td>
                            </tr>
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">АДРЕС </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="adress" size="20" value="$myrow[adress]"/></td>
                              <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">ЦЕНА </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="price" size="10" value="$myrow[price]"/></td>
							  <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">СТОИМОСТЬ </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="amount" size="10" value="$myrow[amount]"/></td>
                            </tr>
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">МАГАЗИН </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="shop" size="20" value="$myrow[shop]"/>
                            </td></tr> 
                            
                            <tr><td><input name="id" type="hidden" value="$myrow[id]"/></td></tr>
                            
                        </table></td>
                        

                        </tr></table>

<input class="inputbuttonflat" type="submit" name="set_filter" value="Сохранить изменения" style="margin-left:20px;"/>
<input type="reset" name="set_filter" value="Сбросить"/>

<br/><br/></td></tr></table>

	</form>

HERE;

?>

</div>

<!-- Подключаем FOOTER -->
		<?php include ("footer_update.php"); ?>

</body>
</html>
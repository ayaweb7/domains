<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='shop_id_store_update'");
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
if (isset($_GET['id_store'])) {$id_store=$_GET['id_store'];}

if (isset($_POST['id_store'])) {$id_store = $_POST['id_store'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['town'])) {$town = $_POST['town'];}
if (isset($_POST['adress'])) {$adress = $_POST['adress'];}
if (isset($_POST['shop'])) {$shop = $_POST['shop'];}
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}

$db = mysqli_connect("localhost","nikart","arteeva12");
mysqli_select_db($db, "agency");

$result = mysqli_query($db, "SELECT * FROM store WHERE shop='$shop'");
$myrow = mysqli_fetch_array($result);

//SELECT * FROM shops LEFT JOIN store ON shops.shop = store.shop ORDER BY `shops`.`id_store`, `shops`.`shop` ASC

print <<<HERE
<form name='form' action='mysql_store_shop_update.php' method='post'>
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	
        <tr>
          <td valign="top" width="100%">
          
            <table width="100%" cellpadding="3">
                <tr>
                        <td valign="top" width="20%">
                          
                            <table class="adm" align="center" width="100%">
                            
                                                          
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">ID_STORE </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="id_store" size="5" value="$myrow[id_store]"/></td>
                              <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">МАГАЗИН </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
    						      <input type="text" name="shop" size="25" value="$myrow[shop]"/></td>
                            </tr>
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">ДАТА </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="date" size="10" value="$myrow[date]"/></td>
                              <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">АДРЕС </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="adress" size="70" value="$myrow[adress]" autofocus/></td>
                            </tr>
                            
                            <tr>
							  <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">ГОРОД </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="town" size="20" value="$myrow[town]"/></td>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">ТЕЛЕФОН </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="phone" size="20" value="$myrow[phone]"/></td>
                            </tr>
                            
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
		<?php //include ("footer_update.php"); ?>

</body>
</html>
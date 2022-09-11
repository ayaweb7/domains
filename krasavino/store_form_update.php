<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='store_form_update'");
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
if (isset($_GET['store_id'])) {$store_id=$_GET['store_id'];}

if (isset($_POST['store_id'])) {$store_id = $_POST['store_id'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['town'])) {$town = $_POST['town'];}
if (isset($_POST['id_locality'])) {$id_locality = $_POST['id_locality'];}
if (isset($_POST['street'])) {$street = $_POST['street'];}
if (isset($_POST['house'])) {$house = $_POST['house'];}
if (isset($_POST['shop'])) {$shop = $_POST['shop'];}
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}

$db = mysqli_connect("localhost","nikart","arteeva12");
mysqli_select_db($db, "agency");

$result = mysqli_query($db, "SELECT * FROM store WHERE store_id='$store_id'");
$myrow = mysqli_fetch_array($result);

print <<<HERE
<form name='form' action='mysql_store_update.php' method='post'>
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	
        <tr>
          <td valign="top" width="100%">
          
            <table width="100%" cellpadding="3">
                <tr>
                        <td valign="top" width="20%">
                          
                            <table class="adm" align="center" width="100%">
                            
                                                          
                            <tr>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">ДАТА </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="date" size="10" value="$myrow[date]"/></td>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">МАГАЗИН </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
    						      <input type="text" name="shop" size="25" value="$myrow[shop]"/></td>
                            </tr>
                            
                            <tr>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">ГОРОД </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="town" size="20" value="$myrow[town]"/></td>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">АДРЕС - улица </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="street" size="70" value="$myrow[street]" autofocus/></td>
                            </tr>
                            
                            <tr>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">ТЕЛЕФОН </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="phone" size="20" value="$myrow[phone]"/></td>
								<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">АДРЕС - дом </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="house" size="70" value="$myrow[house]" autofocus/></td>
                            </tr>
                            
                            <tr><td><input name="store_id" type="hidden" value="$myrow[store_id]"/></td></tr>
                            
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
		<?php// include ("footer_update.php"); ?>

</body>
</html>
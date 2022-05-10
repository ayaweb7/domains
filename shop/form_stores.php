<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='form_stores'");
$myrow1 = mysqli_fetch_array($result1);

$result = mysqli_query($db, "SELECT * FROM store WHERE id_store='$id_store'");
$myrow = mysqli_fetch_array($result);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $myrow1['title'] ?></title>
<!-- <title><?php echo $myrow[shop] ?></title> -->
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

include ("date_base.php"); /* Соединяемся с базой данных */
//$db = mysqli_connect("localhost","nikart","arteeva12");
//mysqli_select_db($db, "agency");

$result = mysqli_query($db, "SELECT * FROM store WHERE id_store='$id_store'");
$myrow = mysqli_fetch_array($result);

print <<<HERE
<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	
        <tr>
          <td valign="top" width="100%">
          
            <table width="100%" cellpadding="3">
                <tr>
                        <td valign="top" width="20%">
                          
                            <table class="adm" align="center" width="100%">
                            
                            <caption> <!-- Заголовок таблицы -->
						      <h1 style='font-size: 2em;' align="center">№ <em style='color: #e50000;'>$myrow[id_store]</em> - магазин <em style='color: #19910f;'>$myrow[shop]</em> (город <em style='color: #19910f;'>$myrow[town]</em>)</br>адрес: <span style='color: #e50000;'> $myrow[adress]</span></br> телефон: $myrow[phone]</h1>
                            </caption>
                              
                            
							</table></td>
                        

                        </tr></table>

<br/><br/></td></tr></table>

HERE;

?>
<table width="100%" cellpadding="0" cellspacing="0">
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td width="32%">
			<a href="#" title="На товары"><img src="images/tovar.png" id="send"/></a>
		</td>
		<td width="32%">
			<a href="stores.php" title="На магазин"><img src="images/shop.png" id="send"/></a>
		</td>
		<td width="32%" >
			<a href="#" title="На дату"><img src="images/date.png" id="send"/></a>
		</td>
</td></tr></table>
</div>

</body>
</html>
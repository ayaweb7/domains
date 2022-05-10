<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='form'");
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
if (isset($_POST['id_store'])) {$id_store = $_POST['id_store'];}

include ("date_base.php"); /* Соединяемся с базой данных */
//$db = mysqli_connect("localhost","nikart","arteeva12");
//mysqli_select_db($db, "agency");

$result = mysqli_query($db, "SELECT * FROM shops WHERE id='$id'");
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
						      <h1 style='font-size: 2em;' align="center">№ <em>$myrow[id]</em> - <em style='color: #19910f;'>$myrow[name] $myrow[characteristic]</em> (группа $myrow[gruppa])</br><span style='color: #e50000;'>$myrow[quantity]</span> $myrow[item] по <span style='color: #e50000;'>$myrow[price]</span> руб., всего <span style='color: #e50000;'>$myrow[amount]</span> руб.</br> Куплено в магазине <em style='color: #e50000;'>$myrow[shop]</em> по адресу: $myrow[adress] (№ <em style='color: #19910f;'>$myrow[id_store]</em>)</br> Дата покупки: <em style='color: #8b0000;'>$myrow[date].</em></h1>
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
			<a href="names.php" title="На товары"><img src="images/tovar.png" id="send"/></a>
		</td>
		<td width="32%">
			<a href="shops.php" title="На магазин"><img src="images/shop.png" id="send"/></a>
		</td>
		<td width="32%" >
			<a href="dates.php" title="На дату"><img src="images/date.png" id="send"/></a>
		</td>
</td></tr></table>
</div>

</body>
</html>
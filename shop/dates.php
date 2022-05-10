<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='dates'");
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
	<title><?php echo $myrow1['title'] ?></title>
</head>

<body>
<!-- Подключаем HEADER -->
		<?php include ("header_admin.php"); ?>

<form name="form" action="mysql_dates.php" method="post">
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	<tr>
 	      <td class="tablehead"><?php echo $myrow1['h1']." ".$myrow1['h2'] ?></td>
    	</tr>
        <tr>
          <td colspan="2" valign="top" class="tablehead">
			<input type="text" name="date" size="10" align="center" value="2020.09.14" autofocus />
		</td></tr><br/></table>
		
<div align="center">
<input class="inputbuttonflat" type="submit" name="set_filter" value="ПОКАЗАТЬ ТОВАРЫ" style="margin-left:20px;"/>
</div>

	</form>

</body>
</html>
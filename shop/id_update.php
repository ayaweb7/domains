<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='id_update'");
$myrow1 = mysqli_fetch_array($result1);

if (isset($_GET['id'])) {$id=$_GET['id'];}

$result = mysqli_query($db, "SELECT * FROM shops");
$myrow = mysqli_fetch_array($result);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="nikart" content="The Sabotage Rebellion" />
    <link href="css/screen.css" type="text/css" rel="stylesheet" />
	<title><?php echo $myrow1['title'] ?></title>
</head>

<body>
<!-- Подключаем HEADER -->
		<?php include ("header_admin.php"); ?>

<!-- Подключаем FORMA_FIRM_SQL_REDACT.PHP -->
		<?php include ("id_form_update.php"); ?>
    
</div> <!-- info -->    
    

<!-- Конец кода INDEX -->  

</body>
</html>
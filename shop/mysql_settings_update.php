<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='mysql_settings_update'");
$myrow1 = mysqli_fetch_array($result1);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="css/screen.css" type="text/css" rel="stylesheet" />
<title><?php echo $myrow1['title'] ?></title>
</head>

<body>
<!-- Подключаем HEADER -->
		<?php include ("header_admin.php"); ?>

<?php
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['page'])) {$page = $_POST['page'];}
if (isset($_POST['title'])) {$title = $_POST['title'];}
if (isset($_POST['meta_d'])) {$meta_d = $_POST['meta_d'];}
if (isset($_POST['meta_k'])) {$meta_k = $_POST['meta_k'];}
if (isset($_POST['h1'])) {$h1 = $_POST['h1'];}
if (isset($_POST['h2'])) {$h2 = $_POST['h2'];}

$db = mysqli_connect("localhost","nikart","arteeva12");
mysqli_select_db($db, "agency");

$result = mysqli_query($db, "UPDATE settings SET title='$title',meta_d='$meta_d',meta_k='$meta_k',h1='$h1',h2='$h2' WHERE id='$id'");

if ($result == 'true')
{
print <<<HERE
<h6  style='font: 2em bold Georgia, "Times New Roman", Times, serif; color: #19910f;' align="center">$myrow1[h1]</h6>
HERE;
}
else
{
print <<<HERE
<h6  style='font: 3em bold Georgia, "Times New Roman", Times, serif; color: #e50000;' align="center">$myrow1[h2]</h6>
HERE;
}

?>
<p align="center"><a href="settings_update.php" title="Вернуться на список страниц"><img src="images/tovar.png" id="send"/></a></p>
</body>
</html>
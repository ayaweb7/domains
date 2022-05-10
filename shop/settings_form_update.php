<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='settings_form_update'");
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
if (isset($_POST['page'])) {$page = $_POST['page'];}
if (isset($_POST['title'])) {$title = $_POST['title'];}
if (isset($_POST['meta_d'])) {$meta_d = $_POST['meta_d'];}
if (isset($_POST['meta_k'])) {$meta_k = $_POST['meta_k'];}
if (isset($_POST['h1'])) {$h1 = $_POST['h1'];}
if (isset($_POST['h2'])) {$h2 = $_POST['h2'];}

$db = mysqli_connect("localhost","nikart","arteeva12");
mysqli_select_db($db, "agency");

$result = mysqli_query($db, "SELECT * FROM settings WHERE id='$id'");
$myrow = mysqli_fetch_array($result);

print <<<HERE
<form name='form' action='mysql_settings_update.php' method='post'>
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	
        <tr>
          <td valign="top" width="100%">
          
            <table width="100%" cellpadding="3">
                <tr>
                        <td valign="top" width="20%">
                          
                            <table class="adm" align="center" width="100%">
                            
                            <caption> <!-- Заголовок таблицы -->
						      <h1 style='font-size: 2em;' align="center";>Будет изменена страница: <em style='color: #e50000;'>$myrow[page]</em></h1></br>
                            </caption>
                              
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">TITLE </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="title" size="20" value="$myrow[title]" autofocus/></td>
                              <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">META_D </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
    						      <input type="text" name="meta_d" size="60" value="$myrow[meta_d]"/></td>
                            </tr>
                            
                            <tr>
						      <td colspan="2" valign="top"></td>
                              <td colspan="2" valign="top"><span style="width:40px; padding-left:4px;">META_K </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="meta_k" size="60" value="$myrow[meta_k]"/></td>
                            </tr>
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">H1 </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="h1" size="40" value="$myrow[h1]"/></td>
                              <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">H2 </span><span style="padding-left:4px; font-style: italic;">изменить на:</span><br/>
						          <input type="text" name="h2" size="40" value="$myrow[h2]"/></td>
                            </tr>
                            
                            
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
		<?php include ("footer.php"); ?>

</body>
</html>
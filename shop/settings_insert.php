<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='settings_insert'");
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

<form name="form" action="mysql_settings_insert.php" method="post">
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	<tr>
 	      <td class="tablehead"><?php echo $myrow1['h1'] ?></td>
    	</tr>
        
        <tr>
          <td valign="top" width="100%">
          
            <table width="100%" cellpadding="3">
                <tr>
<!-- MANUAL -->
                    <td valign="top" width="32%">
                          <div><b>ОБЩИЕ</b></div>
                            
                        <table align="center" width="100%">
		<!-- PAGE -->
							<tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Название страницы (page)</span><br/>
						          <input type="text" name="page" style="color: red;" size="20" autofocus value=""/>
                            </td></tr>
						
		<!-- TITLE -->                                
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Заголовок страницы (title)</span><br/>
						          <input type="text" name="title" size="20" value=""/>
                            </td></tr>
						</table></td>		
                
<!-- GLOBAL -->               
                   <td valign="top" width="65%">
                    <div><b>ОСНОВНЫЕ</b></div>
                        <table align="center" width="100%">
		<!-- META_D -->
							<tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Основные сведения (meta_d)</span><br/>
						          <input type="text" name="meta_d" size="80" value="Товары для дома и дачи"/>
                            </td></tr>
		<!-- META_K -->
							<tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Ключевые слова (meta_k)</span><br/>
						          <input type="text" name="meta_k" size="80" value="Товар, магазин"/>
                            </td></tr>
		<!-- H1 -->	                              
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Заголовок 1 (h1)</span><br/>
						          <input type="text" name="h1" size="60" value=""/>
                            </td></tr>
		<!-- H2 -->
							<tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Заголовок 2 (h2)</span><br/>
						          <input type="text" name="h2" size="60" value=""/>
                            </td></tr>
                            
                        </table></td></tr>
	</table>

<input class="inputbuttonflat" type="submit" name="set_filter" value="Отправить данные" style="margin-left:20px;"/>
<input type="reset" name="set_filter" value="Сбросить"/>
<!-- <a href="#" target="_blank"><img src="images/send2.png" id="send"/></a><a href="#" target="_blank"><img src="images/esc2.png" id="send"/></a> -->

</td></tr>


</table>

	</form>

<!-- Подключаем FOOTER -->
		<?php include ("footer.php"); ?>

</body>
</html>
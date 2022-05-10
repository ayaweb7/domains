<?php
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
mysql_query('SET NAMES utf8');
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='user_insert'",$db);

$myrow = mysql_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="nikart" content="<?php echo $myrow['meta_k'] ?>" />
    <link href="../css/form.css" type="text/css" rel="stylesheet" />
	<title><?php echo $myrow['title'] ?></title>
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

</head>

<body>
<form name="form1" action="user_insert.php" method="post">
<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
<tr>


<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Оплата (pay)</span><br/>
	<select name='pay' size='1'>
        <option>0</option>
        <option>100</option>
        <option>200</option>
        <option>300</option>
        <option>400</option>
        <option>500</option>
        <option>600</option>
        <option>700</option>
        <option>800</option>
        <option>900</option>
        <option>1000</option>
        <option>1100</option>
        <option>1200</option>
    </select></td>


<td>
<input class="inputbuttonflat" type="submit" name="set_filter" value="Определить пользователя" style="margin-left:20px;"/>
</td>

</tr>
</table>
</form>



<form name="form" action="mysql_user_insert.php" method="post">
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	<tr>
 	      <td class="tablehead">Ввод различных данных пльзователей</td>
    	</tr>
        
        <tr>
          <td valign="top" width="100%">
          
            <table width="100%" cellpadding="3">
                <tr>
<!-- ОБЩИЕ -->
<?php

if (isset($_POST['pay'])){$pay = $_POST['pay'];	}
if ($pay == 100) {$k = 1;}
else if ($pay == 200) {$k = 2;}
else if ($pay == 300) {$k = 3;}
else if ($pay == 400) {$k = 4;}
else if ($pay == 500) {$k = 5;}
else if ($pay == 600) {$k = 6;}
else if ($pay == 700) {$k = 7;}
else if ($pay == 800) {$k = 8;}
else if ($pay == 900) {$k = 9;}
else if ($pay == 1000) {$k = 10;}
else if ($pay == 1100) {$k = 11;}
else if ($pay == 1200) {$k = 12;}
else $k = 0;
 
//include ("blocks/date_base.php"); /* Соединяемся с базой данных */

//$result = mysql_query("SELECT id,improved,wall,type FROM houses WHERE street ='$street1' AND house ='$house1'",$db);

//$myrow = mysql_fetch_array($result);


?>

                        <td valign="top" width="32%">
                          <div><b>ОСНОВНЫЕ</b></div>
                            
                            <table align="center" width="100%">
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дата регистрации (data_reg)</span><br/>
						          <input type="text" name="data_reg" size="20" value="<?php echo date('Y-m-d H:i:s');?>" />
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дата оплаты (data_pay)</span><br/>
						          <input type="text" name="data_pay" size="20" value="<?php echo date('Y-m-d H:i:s');?>"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Последняя дата (data_last)</span><br/>
						          <input type="text" name="data_last" size="20" value="<?php echo date("Y-m-d", mktime(date("H"), date("i"), date("s"), date("m")+$k, date("d"), date("Y")));?>"/>
                              </td></tr>
                             
                                
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Логин (login)</span><br/>
						          <input type="text" name="login" size="40" value=""/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Пароль (pass)</span><br/>
						          <input type="text" name="pass" size="40" value=""/>
                              </td></tr>
                             
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Электронная почта (email)</span><br/>
						          <input type="text" name="email" size="40" value=""/>
                              </td></tr>
                             
                             <input type="hidden" type="text" name="pay" size="40" value="<?php echo $pay ?>"/>
                             
                                                
                            
                        </table></td>



                
 <!-- ОСНОВНЫЕ -->               
                   <td valign="top" width="32%">
                    <div><b>СПРАВОЧНЫЕ</b></div>

                        <table align="center" width="100%">
                                
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Регион (area)</span><br/>
						          <input type="text" name="area" size="40" value=""/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">IP-адрес (ip)</span><br/>
						          <input type="text" name="ip" size="40" value=""/>
                              </td></tr>
                             
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Количество посещений (qt)</span><br/>
						          <input type="text" name="qt" size="40" value=""/>
                              </td></tr>
                             
                             <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дата последнего посещения (data_vizit)</span><br/>
						          <input type="text" name="data_vizit" size="20" value=""/>
                              </td></tr>
                                                
                            
                        </table></td></tr></table>

<input class="inputbuttonflat" type="submit" name="set_filter" value="Зарегистировать пользователя" style="margin-left:20px;"/>
<input type="reset" name="set_filter" value="Сбросить"/>

<br/><br/></td></tr></table>

	</form>
 <p><a href="index_admin.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>   
</body>
</html>
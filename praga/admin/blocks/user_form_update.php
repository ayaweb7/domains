<div>
<?php
if (isset($_POST['id'])){$id = $_POST['id'];	}
if (!isset($id))
{
$result = mysql_query("SELECT id,login FROM user", $db);
$myrow = mysql_fetch_array($result);

do {
 printf ("<form name='form' action='user_update.php' method='post'>
 <input type='text' name='id' size='2' value='%s' />
        <input type='submit' value='%s' style='margin-left:20px;'/></form>", $myrow["id"],$myrow["login"]);
}
while ($myrow = mysql_fetch_array($result));
}

else
{
$result = mysql_query("SELECT * FROM user WHERE id='$id'", $db);
$myrow = mysql_fetch_array($result);

print <<<HERE
<form name='form1' action='mysql_user_update.php' method='post'>




<table width="100%" cellpadding="3">
                <tr>
<!-- ОБЩИЕ -->


                        <td valign="top" width="32%">
                          <div><b>ОСНОВНЫЕ</b></div>
                            
                            <table align="center" width="100%">
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дата регистрации (data_reg)</span><br/>
						          <input type="text" name="data_reg" size="20" value="$myrow[data_reg]" />
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дата оплаты (data_pay)</span><br/>
						          <input type="text" name="data_pay" size="20" value="$myrow[data_pay]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Последняя дата (data_last)</span><br/>
						          <input type="text" name="data_last" size="20" value="$myrow[data_last]"/>
                              </td></tr>
                             
                                
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Логин (login)</span><br/>
						          <input type="text" name="login" size="40" value="$myrow[login]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Пароль (pass)</span><br/>
						          <input type="text" name="pass" size="40" value="$myrow[pass]"/>
                              </td></tr>
                             
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Электронная почта (email)</span><br/>
						          <input type="text" name="email" size="40" value="$myrow[email]"/>
                              </td></tr>
                             
                             
                             
                                                
                            
                        </table></td>



                
 <!-- ОСНОВНЫЕ -->               
                   <td valign="top" width="32%">
                    <div><b>СПРАВОЧНЫЕ</b></div>

                        <table align="center" width="100%">
                                
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Регион (area)</span><br/>
						          <input type="text" name="area" size="40" value="$myrow[area]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">IP-адрес (ip)</span><br/>
						          <input type="text" name="ip" size="40" value="$myrow[ip]"/>
                              </td></tr>
                             
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Количество посещений (qt)</span><br/>
						          <input type="text" name="qt" size="40" value="$myrow[qt]"/>
                              </td></tr>
                             
                             <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дата последнего посещения (data_vizit)</span><br/>
						          <input type="text" name="data_vizit" size="20" value="$myrow[data_vizit]"/>
                              </td></tr>
                                                
                            
                        </table></td></tr></table>



<p><input name='id' type='hidden' value='$myrow[id]'/></p>

<p><label>
<input type="submit" name="submit" id="submit" value="Обновить базу страниц" />
</label></p>

</form>
<p><a href="index_admin.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>
<p><a href="user_update.php" title="Вернуться в список">Вернуться в список <em>пользователей</em></a></p>
HERE;
}
?>

</div>
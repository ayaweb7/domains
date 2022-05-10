<div>
<?php
mysql_query('SET NAMES utf8');
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['title'])){$title = $_POST['title'];	}
if (!isset($id))
{
$result = mysql_query("SELECT * FROM agency ORDER BY title", $db);
$myrow = mysql_fetch_array($result);


do {
 printf ("<form name='form' action='agency_update.php' method='post'>
 <input type='text' name='id' size='3' value='%s' />
        <input type='submit' value='%s' style='margin-left:20px;'/></form>", $myrow["id"],$myrow["title"]);
}
while ($myrow = mysql_fetch_array($result));

}

else
{


$result1 = mysql_query("SELECT * FROM agency WHERE id='$id'");
$myrow1 = mysql_fetch_array($result1);

print <<<HERE

<form name="form" action="mysql_agency_update.php" method="post">
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	        
        <tr>
          <td valign="top" width="100%">
          
            <table width="100%" cellpadding="3">
                <tr>
<!-- ОСНОВНЫЕ -->
                        <td valign="top" width="100%">
                          <div><b>ОСНОВНЫЕ</b></div>
                            
                            <table align="center" width="100%">
                                
                                                          
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Название агентства (title)</span><br/>
                                <input type="text" name="title" id="title" size="30" value="$myrow1[title]" />
                             </td></tr>
                           
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Полное название (full)</span><br/>
						        <input type="text" name="full" id="full" size="80" value="$myrow1[full]"/>
                            </td></tr>
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Улица (street)</span><br/>
                                <input type="text" name="street" id="street" size="40" value="$myrow1[street]" />
                             </td></tr>
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дом (house)</span><br/>
                                 <input type="text" name="house" id="house" size="10" value="$myrow1[house]"/>
                             </td></tr>
                             
                             <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Офис (office)</span><br/>
						        <input type="text" name="office" id="office" size="80" value="$myrow1[office]"/>
                             </td></tr>
                            
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дополнительный офис (add_office)</span><br/>
						          <input type="text" name="add_office" id="add_office" size="80" value="$myrow1[add_office]"/>
                             </td></tr> 
                            
                             
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Телефон № 1 (phone1)</span><br/>
						          <input type="text" name="phone1" id="phone1" size="40" value="$myrow1[phone1]"/>
                             </td></tr>
                           
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Телефон № 2 (phone2)</span><br/>
						          <input type="text" name="phone2" id="phone2" size="40" value="$myrow1[phone2]"/>
                              </td></tr>                                
                                                          
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Телефон № 3 (phone3)</span><br/>
						          <input type="text" name="phone3" id="phone3" size="40" value="$myrow1[phone3]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Телефон № 4 (phone4)</span><br/>
						          <input type="text" name="phone4" id="phone4" size="40" value="$myrow1[phone4]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Телефон № 5 (phone5)</span><br/>
						          <input type="text" name="phone5" id="phone5" size="40" value="$myrow1[phone5]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Электронная почта (email)</span><br/>
						          <input type="text" name="email" id="email" size="40" value="$myrow1[email]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Скайп (skype)</span><br/>
						          <input type="text" name="skype" id="skype" size="40" value="$myrow1[skype]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Интернет (www)</span><br/>
						          <input type="text" name="www" id="www" size="40" value="$myrow1[www]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Руководитель (chief)</span><br/>
						          <input type="text" name="chief" id="chief" size="40" value="$myrow1[chief]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Фамилия Имя Отчество (name)</span><br/>
						          <input type="text" name="name" id="name" size="80" value="$myrow1[name]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Время работы (working)</span><br/>
						          <input type="text" name="working" id="working" size="80" value="$myrow1[working]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Фотография офиса (photo)</span><br/>
						          <input type="text" name="photo" id="photo" size="20" value="$myrow1[photo]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Услуги (services)</span><br/>
						          <textarea name="services" id="services" cols="100" rows="5">$myrow1[services]</textarea>
                             </td></tr>
                             
                             <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Примечание (note)</span><br/>
						          <textarea name="note" id="note" cols="100" rows="5">$myrow1[note]</textarea>
                             </td></tr>
                            
                              
                              
                              <tr><td><input name='id' type='hidden' value='$myrow1[id]'/></td></tr>
                            
                            
                        </table></td></tr></table>

<input class="inputbuttonflat" type="submit" name="set_filter" value="Обновить агентство" style="margin-left:20px;"/>

<br/><br/></td></tr></table>

	</form>
<p><a href="index_adm.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>
<p><a href="agency_update.php" title="Вернуться в список">Вернуться в список <em>агентств</em></a></p>
HERE;
}
?>

</div>
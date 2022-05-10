<div>
<?php
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['street'])){$street = $_POST['street'];	}
if (isset($_POST['house'])){$house = $_POST['house'];	}
if (!isset($id))
{
$result = mysql_query("SELECT id,street,house,wall,type FROM houses ORDER BY street, house", $db);
$myrow = mysql_fetch_array($result);


do {
 printf ("<form name='form' action='house_update.php' method='post'>
 <input type='text' name='id' size='3' value='%s' />
        <input type='submit' value='%s, %s' style='margin-left:20px;'/></form>", $myrow["id"],$myrow["street"],$myrow["house"]);
}
while ($myrow = mysql_fetch_array($result));

}

else
{


$result1 = mysql_query("SELECT * FROM houses WHERE id='$id'");
$myrow1 = mysql_fetch_array($result1);

print <<<HERE

<form name="form" action="mysql_house_update.php" method="post">
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	        
        <tr>
          <td valign="top" width="100%">
          
            <table width="100%" cellpadding="3">
                <tr>
<!-- ОСНОВНЫЕ -->
                        <td valign="top" width="20%">
                          <div><b>ОСНОВНЫЕ</b></div>
                            
                            <table align="center" width="100%">
                                
                                                          
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Основная улица (street)</span><br/>
                                <input type="text" name="street" id="street" size="15" value="$myrow1[street]" />
                             </td></tr>
                           
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Основной дом (house)</span><br/>
						        <input type="text" name="house" id="house" size="5" value="$myrow1[house]"/>
                            </td></tr>
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Тип (type)</span><br/>
                                <input type="text" name="type" id="type" size="15" value="$myrow1[type]" />
                             </td></tr>
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Стены 1 (wall)</span><br/>
                                 <input type="text" name="wall" id="wall" size="15" value="$myrow1[wall]"/>
                             </td></tr>
                             
                             <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Стены 2 (walls)</span><br/>
						        <input type="text" name="walls" id="walls" size="15" value="$myrow1[walls]"/>
                             </td></tr>
                            
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Планировка (improved)</span><br/>
						          <input type="text" name="improved" id="improved" size="15" value="$myrow1[improved]"/>
                             </td></tr> 
                            
                             <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Этажность (floors)</span><br/>
						          <input type="text" name="floors" id="floors" size="5" value="$myrow1[floors]"/>
                             </td></tr>
                             
                            
                        </table></td>
                
 <!-- ДОПОЛНИТЕЛЬНЫЕ -->               
                   <td valign="top" width="49%">
                    <div><b>ДОПОЛНИТЕЛЬНЫЕ</b></div>

                        <table align="center" width="100%">
                            
                          <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дополнительная улица (street_dop)</span><br/>
						          <input type="text" name="street_dop" id="street_dop" size="30" value="$myrow1[street_dop]"/>
                             </td></tr>
                           
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дополнительный дом (house_dop)</span><br/>
						          <input type="text" name="house_dop" id="house_dop" size="5" value="$myrow1[house_dop]"/>
                              </td></tr>                                
                                                          
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Фотография 1 (photo1)</span><br/>
						          <input type="text" name="photo1" id="photo1" size="30" value="$myrow1[photo1]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Фотография 2 (photo2)</span><br/>
						          <input type="text" name="photo2" id="photo2" size="30" value="$myrow1[photo2]"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Для ориентации (orientation)</span><br/>
						          <input type="text" name="orientation" id="orientation" size="80" value="$myrow1[orientation]"/>
                              </td></tr>
                              
                              <tr><td><input name='id' type='hidden' value='$myrow1[id]'/></td></tr>
                              
                        </table></td>
                        

                        </tr></table>

<input class="inputbuttonflat" type="submit" name="set_filter" value="Обновить данные по дому" style="margin-left:20px;"/>

<br/><br/></td></tr></table>

	</form>
<p><a href="index_adm.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>
<p><a href="house_update.php" title="Вернуться в список">Вернуться в список <em>домов</em></a></p>
HERE;
}
?>

</div>
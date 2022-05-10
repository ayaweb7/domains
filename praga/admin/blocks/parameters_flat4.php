<tr><td colspan="8" style="border: none;">
<div id="parameters">
<form name="form" action="flat_4.php" method="post">
    <table cellspacing="0" cellpadding="1" width="100%">
    	<tr>
 	      <td class="tablehead" colspan="6">Выбор недвижимости по параметрам</td>
    	</tr>
        
        <tr>
 	      <td colspan="6"><input type="submit" value="Выборка данных / Показать все варианты"/></td> 
    	</tr>
        
        <tr>
        
 	      <td width="35%" valign="top" style="text-align: right"><span style="width:60px; padding-left:4px;">Выбор улицы</span>
           <td width="15%"><select name='street_one' id='street_one' size='1'>
                                  <option></option>
                                  <option>Архангельская</option>
                                  <option>Глейха</option>
                                  <option>Гоголя</option>
                                  <option>Дыбцына</option>
                                  <option>Кирова</option>
                                  <option>Космонавтов</option>
                                  <option>Кутузова</option>
                                  <option>Ленина</option>
                                  <option>Лермонтова</option>
                                  <option>Ломоносова</option>
                                  <option>Набережная</option>
                                  <option>Пушкина</option>
                                  <option>Сафьяна</option>
                                  <option>Советская</option>
                                  <option>Театральная</option>
                                  </select>
            </td>
           </td>

         
          
          <td width="20%" valign="top" style="text-align: left">
           <select name='floor_dop' size='1'>
                                  <option></option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                  <option>Кроме 1 и 5</option>
                                  <option>Кроме 1</option>
                                  <option>Кроме 5</option>
                                  </select>
            <td colspan="2" style="text-align: left;"><span style="width:60px; padding-left:4px;">Введите этаж</span></td>       
           </td>
          
          
    	</tr>
        
        <tr>
        
 	      <td width="35%" valign="top" style="text-align: right"><span style="width:60px; padding-left:4px;">Добавить улицу</span>
           <td width="15%" width="16%"><select name='street_two' size='1'>
                                  <option></option>
                                  <option>Архангельская</option>
                                  <option>Глейха</option>
                                  <option>Гоголя</option>
                                  <option>Дыбцына</option>
                                  <option>Кирова</option>
                                  <option>Космонавтов</option>
                                  <option>Кутузова</option>
                                  <option>Ленина</option>
                                  <option>Лермонтова</option>
                                  <option>Ломоносова</option>
                                  <option>Набережная</option>
                                  <option>Пушкина</option>
                                  <option>Сафьяна</option>
                                  <option>Советская</option>
                                  <option>Театральная</option>
                                  </select>
            </td>
           </td>
          
          <td width="20%" valign="top" style="text-align: left">
           <select name='firm_dop' size='1'>
                                  <option></option>
<?php 
$result = mysql_query("SELECT title FROM agency ORDER BY title", $db);
$myrow = mysql_fetch_array($result);
                    
do {
printf  ("<option>%s</option>  ", $myrow['title']);

}
while ($myrow = mysql_fetch_array($result));
?>

                                  </select>
            <td colspan="2" style="text-align: left;"><span style="width:60px; padding-left:4px; text-align: left;">Введите агентство</span></td>       
           </td>
          
    	</tr>
        
        <tr>
        
 	      <td width="35%" valign="top" style="text-align: right"><span style="width:60px; padding-left:4px;">Добавить улицу</span>
           <td width="15%"><select name='street_free' size='1'>
                                  <option></option>
                                  <option>Архангельская</option>
                                  <option>Глейха</option>
                                  <option>Гоголя</option>
                                  <option>Дыбцына</option>
                                  <option>Кирова</option>
                                  <option>Космонавтов</option>
                                  <option>Кутузова</option>
                                  <option>Ленина</option>
                                  <option>Лермонтова</option>
                                  <option>Ломоносова</option>
                                  <option>Набережная</option>
                                  <option>Пушкина</option>
                                  <option>Сафьяна</option>
                                  <option>Советская</option>
                                  <option>Театральная</option>
                                  </select>
           </td>        
           </td>
          
          <td width="20%" valign="top" style="text-align: left">
           <select name='price_dop' size='1'>
                                  <option></option>
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
                                  <option>1250</option>
                                  <option>1300</option>
                                  <option>1350</option>
                                  <option>1400</option>
                                  <option>1450</option>
                                  <option>1500</option>
                                  <option>1550</option>
                                  <option>1600</option>
                                  <option>1650</option>
                                  <option>1700</option>
                                  <option>1750</option>
                                  <option>1800</option>
                                  <option>1850</option>
                                  <option>1900</option>
                                  <option>1950</option>
                                  <option>2000</option>
                                  <option>2300</option>
                                  <option>2500</option>
                                  <option>2700</option>
                                  <option>3000</option>
                                  </select>
            <td colspan="2" style="text-align: left;"><span style="width:60px; padding-left:4px; text-align: left;">Цена меньше или равна (тыс. руб.)</span></td>       
           </td>
          
    	</tr>
        
        
        
     </table>
</form>
</div> <!-- parameters -->
</td></tr>
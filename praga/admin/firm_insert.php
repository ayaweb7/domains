<?php
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
mysql_query('SET NAMES utf8');
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='firm_insert'",$db);

$myrow = mysql_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="nikart" content="The Sabotage Rebellion" />
    <link href="../css/form.css" type="text/css" rel="stylesheet" />
	<title>Заполнение базы данных</title>
</head>

<body>
<form name="form1" action="firm_insert.php" method="post">
<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
<tr>

<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дом (house)</span><br/>
<input type="text" name="house1" size="10" value="" autofocus />
</td>

<td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Улица (street)</span><br/>

						          <select name='street1' size='1' >
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
                                  <option>Матросова</option>
                                  <option>Набережная</option>
                                  <option>Пушкина</option>
                                  <option>Сафьяна</option>
                                  <option>Советская</option>
                                  <option>Театральная</option>
                                  <option></option>
                                  </select>
                             </td>


<td>
<input class="inputbuttonflat" type="submit" name="set_filter" value="Определить планировку" style="margin-left:20px;"/>
</td>

</tr>
</table>
</form>

<form name="form" action="mysql_firm_insert.php" method="post">
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	<tr>
 	      <td class="tablehead">Ввод недвижимости различных фирм г.Коряжмы в одну базу данных</td>
    	</tr>
        
        <tr>
          <td valign="top" width="100%">
          
            <table width="100%" cellpadding="3">
                <tr>
<!-- ОБЩИЕ -->
                        <td valign="top" width="32%">
                          <div><b>ОБЩИЕ</b></div>
                            
                            <table align="center" width="100%">
                                
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Фирма (firm)</span><br/>
                                <select name='firm' size='1'>

<?php 
$result = mysql_query("SELECT title FROM agency ORDER BY title", $db);
$myrow = mysql_fetch_array($result);
                    
do {
printf  ("<option>%s</option>  ", $myrow['title']);

}
while ($myrow = mysql_fetch_array($result));
?>
                                  <option></option>
                                  </select>
                             </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Область (area)</span><br/>

						          <select name='area' size='1'>
                                  <option>Архангельская</option>
                                  <option>Вологодская</option>
                                  <option>другое</option>
                                  <option></option>
                                  </select>
                             </td></tr>
                             
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Район (region)</span><br/>

						          <select name='region' size='1'>
                                  <option>Котласский</option>
                                  <option>В-Тоемский</option>
                                  <option>В-Устюгский</option>
                                  <option>Вилегодский</option>
                                  <option>Красноборский</option>
                                  <option>другое</option>
                                  <option></option>
                                  </select>
                             </td></tr>
                             
                             <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Город (town)</span><br/>

						          <select name='town' size='1'>
                                  <option>г.Коряжма</option>
                                  <option>г.Великий Устюг</option>
                                  <option>с.Ильинско-Подомское</option>
                                  <option>г.Котлас</option>
                                  <option>г.C-Петербург</option>
                                  <option>п.Вычегодский</option>
                                  <option>п.Борки</option>
                                  <option>ст.Виледь</option>
                                  <option>д.Вондокурье</option>
                                  <option>д.Гаева Гора</option>
                                  <option>п.Григорово</option>
                                  <option>п.Двинской</option>
                                  <option>д.Кошкино</option>
                                  <option>д.Куимиха</option>
                                  <option>д.Мокрая Горка</option>
                                  <option>ст.Низовка</option>
                                  <option>д.Сведомково</option>
                                  <option>п.Черёмуха</option>
                                  <option>другое</option>
                                  <option></option>
                                  </select>
                             </td></tr>
                             
                             <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Категория (category)</span><br/>

						          <select name='category' size='1'>
                                  <option>жилая</option>
                                  <option>загородная</option>
                                  <option>коммерческая</option>
                                  <option>другое</option>
                                  <option></option>
                                  </select>
                             </td></tr>
                             
                             <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Сделка (trade)</span><br/>

						          <select name='trade' size='1'>
                                  <option>продажа</option>
                                  <option>обмен</option>
                                  <option>аренда</option>
                                  <option>без построек</option>
                                  <option></option>
                                  </select>
                             </td></tr>
                            
                            


<?php
if (isset($_POST['street1'])){$street1 = $_POST['street1'];	}
if (isset($_POST['house1'])){$house1 = $_POST['house1'];	}
 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */

$result = mysql_query("SELECT id,improved,wall,type FROM houses WHERE street ='$street1' AND house ='$house1'",$db);

$myrow = mysql_fetch_array($result);


?>                   
                            
                        </table></td>
                
 <!-- ОСНОВНЫЕ -->               
                   <td valign="top" width="32%">
                    <div><b>ОСНОВНЫЕ</b></div>

                        <table align="center" width="100%">
                            
                                                          
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Общая площадь, кв.м. (square)</span><br/>
						          <input type="text" name="square" size="10" value=""/>
                              </td></tr>
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Количество комнат (rooms)</span><br/>

						          <select name='rooms' size='1'>
                                  <option>1</option>
                                  <option>2</option>
								  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                  <option></option>
                                  </select>
                             </td></tr>
                              
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Балкон (balcony)</span><br/>

						          <select name='balcony' size='1'>
                                  <option>балкон</option>
                                  <option>без балкона</option>
                                  <option>лоджия</option>
                                  <option>2 лоджии</option>
                                  <option></option>
                                  </select>
                             </td></tr>
                             
                             <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Этаж (floor)</span><br/>

						          <select name='floor' size='1'>
                                  <option>1</option>
                                  <option>2</option>
								  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                  <option>6</option>
                                  <option>7</option>
                                  <option>8</option>
                                  <option>9</option>
                                  <option>10</option>
                                  <option>11</option>
                                  <option>12</option>
                                  <option></option>
                                  </select>
                             </td></tr>
                              
                              
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Цена, руб. (price)</span><br/>
						          <input type="text" name="price" size="10" value=""/>
                              </td></tr>
                            
                        </table></td>
                        
<!-- СЛУЖЕБНЫЕ -->                        
                        
                        <td valign="top" width="32%">
                          <div><b>СЛУЖЕБНЫЕ</b></div>
                            
                            <table align="center" width="100%">
                                
                             
                             
                             <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Заявка на продажу (price)</span><br/>
						          <input type="text" name="application" style="color: red;" size="10" value="2013-12-13"/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Примечание (note)</span><br/>
						          <input type="text" name="note" size="20" value=""/>
                              </td></tr>
                              
                              <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Улица (street)</span><br/>
						          <input type="text" name="street" style="color: red;" size="15" value="<?php echo $street1 ?>" />
                              </td></tr>
                            
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дом (house)</span><br/>
						          <input type="text" name="house" style="color: red;" size="15" value="<?php echo $house1?>" />
                              </td></tr>
                             
                             <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Стены (wall)</span><br/>
                                <input type="text" name="wall" style="color: green;" size="15" value="<?php echo $myrow['wall'] ?>"/>
                                  
                             </td></tr>
                              
                             <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Улучшение (improved)</span><br/>
						          <input type="text" name="improved" style="color: green;" size="15" value="<?php echo $myrow['improved'] ?>"/>
                             </td></tr>
                            
                             <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Тип (type)</span><br/>
						          <input type="text" name="type" style="color: green;" size="15" value="<?php echo $myrow['type'] ?>"/>
                             </td></tr>
                             
                        </table></td></tr></table>

<input class="inputbuttonflat" type="submit" name="set_filter" value="Отправить данные" style="margin-left:20px;"/>
<input type="reset" name="set_filter" value="Сбросить"/>

<br/><br/></td></tr></table>

	</form>
 <p><a href="index_admin.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>   
</body>
</html>
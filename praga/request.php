<form name='form' action='request_email.php' method='post'>
	<table cellspacing='0' cellpadding='1' width='100%' class='tableborder'>
    	<tr>
 	      <td class='tablehead' align="center">Подать заявку</td>
    	</tr>
        
        <tr>
          <td valign='top' width='100%'>
          
            <table width='100%' cellpadding='2'>
                <tr>
<!-- ОБЩИЕ -->
                        <td valign='top' align="center">
                          <div><b>Заполнить форму</b></div>
                            
                            <table align='center' width='100%'>
<!-- Цель -->                                
                              <tr id='aim'>
						      <td colspan='2' valign='top'><span style='width:60px; padding-left:4px;'>Цель сделки (aim)</span><br/>

						          <select name='aim' size='1' onchange='aimSelect(this.form)'>
                                  <option value=''></option>
                                  <option value='sell'>продать</option>
                                  <option value='buy'>купить</option>
                                  <option value='get'>сдать</option>
                                  <option value='rent'>снять</option>
                                  <option value='swap'>обмен</option>
                                  <option value='other'>другое</option>
                                  </select>
                                  </td>
                                  
<script>
    function aimSelect(f) {
    var otherAim = document.getElementById('otherAim');
     n = f.aim.selectedIndex
     if(f.aim.options[n].value == 'sell' || f.aim.options[n].value == 'buy' || f.aim.options[n].value == 'get' || f.aim.options[n].value == 'rent') {
        otherAim.style.display = 'none';
        type.style.display = 'inline';
        region.style.display = 'inline';
        street.style.display = 'inline';
        house.style.display = 'inline';
        square.style.display = 'inline';
        balcony.style.display = 'inline';
        wall.style.display = 'inline';
        improved.style.display = 'inline';
        floor.style.display = 'inline';
        price.style.display = 'inline';
        repair.style.display = 'inline';
        }
        else if (f.aim.options[n].value == 'swap') {
            otherAim.style.display = 'inline';
            type.style.display = 'none';
            region.style.display = 'none';
            street.style.display = 'none';
            house.style.display = 'none';
            square.style.display = 'none';
            balcony.style.display = 'none';
            wall.style.display = 'none';
            improved.style.display = 'none';
            floor.style.display = 'none';
            price.style.display = 'none';
            repair.style.display = 'none';
        }
        else if (f.aim.options[n].value == 'other' || f.aim.options[n].value == '') {
            otherAim.style.display = 'inline';
            type.style.display = 'none';
            region.style.display = 'none';
            street.style.display = 'none';
            house.style.display = 'none';
            square.style.display = 'none';
            balcony.style.display = 'none';
            wall.style.display = 'none';
            improved.style.display = 'none';
            floor.style.display = 'none';
            price.style.display = 'none';
            repair.style.display = 'none';
        }
            
    }
  </script>                            
                             <td id='otherAim' style='display: none;'><span style='width:60px; padding-left:4px;'>Укажите Ваш интерес (OtherAim)</span><br/>
						          <textarea name='otherAim' rows='3' cols='35'></textarea>
                              </td>
                              </tr>
                              
                              <div id='sell' style='display: none;'></div> <!-- sell -->

<!-- Вид недвижимости -->
                            <tr id='type' style='display: none;'>
						      <td colspan='2' valign='top'><span style='width:60px; padding-left:4px;'>Вид недвижимости (type)</span><br/>

						          <select name='type' size='1' onchange='typeSelect(this.form)'>
                                  <option>1-комнатная квартира</option>
                                  <option>2-х комнатная квартира</option>
                                  <option>3-х комнатная квартира</option>
                                  <option>4-х комнатная квартира</option>
                                  <option>секция</option>
                                  <option>гостинка</option>
                                  <option>частный сектор</option>
                                  <option>дача</option>
                                  <option>дом</option>
                                  <option>участок</option>
                                  <option value='other'>другое</option>
                                  </select>
                             </td>
                             
<script>
    function typeSelect(f) {
    var otherType = document.getElementById('otherType');
     n = f.type.selectedIndex
     if(f.type.options[n].value == 'other') {
    otherType.style.display = 'inline';
        }
    else {
    otherType.style.display = 'none';
    
    }
    }
  </script>                            
                             <td id='otherType' style='display: none;'><span style='width:60px; padding-left:4px;'>Укажите вид Вашей недвижимости (otherType)</span><br/>
						          <input type='text' name='otherType' size='45' value=''/>
                              </td>
                              </tr>

<!-- Регион -->
                              <tr id='region' style='display: none;'>
						      <td colspan='2' valign='top'><span style='width:60px; padding-left:4px;'>Район (region)</span><br/>

						          <select name='region' size='1' onchange='regionSelect(this.form)'>
                                  <option>Коряжма</option>
                                  <option>Котлас</option>
                                  <option>загород</option>
                                  <option value='other'>другой город</option>
                                  </select>
                             </td>

<script>
    function regionSelect(f) {
    var otherRegion = document.getElementById('otherRegion');
     n = f.region.selectedIndex
     if(f.region.options[n].value == 'other') {
    otherRegion.style.display = 'inline';
        }
    else {
    otherRegion.style.display = 'none';
    
    }
    }
  </script>                            
                             <td id='otherRegion' style='display: none;'><span style='width:60px; padding-left:4px;'>Укажите место нахождения Вашей недвижимости (otherRegion)</span><br/>
						          <input type='text' name='otherRegion' size='45' value=''/>
                              </td>
                              </tr>
                                                           
<!-- Улица -->
                            <tr id='street' style='display: none;'>
						      <td colspan='2' valign='top'><span style='width:60px; padding-left:4px;'>Улица (street)</span><br/>

						          <select name='street' size='1' onchange="streetSelect(this.form)">
                                  <option></option>
                                  <option>Архангельская</option>
                                  <option>Восточная</option>
                                  <option>Глейха</option>
                                  <option>Гоголя</option>
                                  <option>Дыбцына</option>
                                  <option>Зелёная</option>
                                  <option>Кирова</option>
                                  <option>Космонавтов</option>
                                  <option>Кутузова</option>
                                  <option>Ленина</option>
                                  <option>Лермонтова</option>
                                  <option>Ломоносова</option>
                                  <option>Набережная</option>
                                  <option>Пушкина</option>
                                  <option>Сафьяна</option>
                                  <option>Свердлова</option>
                                  <option>Советская</option>
                                  <option>Театральная</option>
                                  <option>Чапаева</option>
                                  <option>Черёмуха</option>
                                  <option>Черёмуха (до переезда)</option>
                                  <option value='other'>другая улица</option>
                                  </select>
                             </td>
<script>
    function streetSelect(f) {
    var otherStreet = document.getElementById('otherStreet');
     n = f.street.selectedIndex
     if(f.street.options[n].value == 'other') {
    otherStreet.style.display = 'inline';
        }
    else {
    otherStreet.style.display = 'none';
    
    }
    }
  </script>                            
                             <td id='otherStreet' style='display: none;'><span style='width:60px; padding-left:4px;'>Ваша улица: (otherStreet)</span><br/>
						          <input type='text' name='otherStreet' size='45' value=''/>
                              </td>                             
                             </tr>
                             

<!-- Дом -->
                            <tr id='house' style='display: none;'>
						      <td colspan='2' valign='top'><span style='width:60px; padding-left:4px;'>№ дома (необязательно) (house)</span><br/>
						          <input type='text' name='house' size='10' value=''/>
                              </td></tr>

<!-- Характеристики -->
                            <tr id='square' style='display: none;'>
						      <td colspan='2' valign='top'><span style='width:60px; padding-left:4px;'>Площадь, кв.м. (square)</span><br/>
						          <input type='text' name='square' size='10' value=''/>
                              </td></tr>  
                              
                            <tr id='balcony' style='display: none;'>
						      <td colspan='2' valign='top'><span style='width:60px; padding-left:4px;'>Балкон (balcony)</span><br/>

						          <select name='balcony' size='1'>
                                  <option></option>
                                  <option>балкон</option>
                                  <option>без балкона</option>
                                  <option>лоджия</option>
                                  </select>
                             </td></tr>
                             
                             <tr id='wall' style='display: none;'>
						      <td colspan='2' valign='top'><span style='width:60px; padding-left:4px;'>Стены (wall)</span><br/>

						          <select name='wall' size='1'>
                                  <option></option>
                                  <option>кирпич</option>
                                  <option>панель</option>
                                  <option>дерево</option>
                                  </select>
                             </td></tr>
                              
                             <tr id='improved' style='display: none;'>
						      <td colspan='2' valign='top'><span style='width:60px; padding-left:4px;'>Улучшение (improved)</span><br/>

						          <select name='improved' size='1' onchange='improvedSelect(this.form)'>
                                  <option></option>
                                  <option>сталинская</option>
                                  <option>улучшенная</option>
								  <option>комната в квартире</option>
                                  <option>душ</option>
                                  <option value='other'>другое</option>
                                  </select>
                             </td>
<script>
    function improvedSelect(f) {
    var otherImproved = document.getElementById('otherImproved');
     n = f.improved.selectedIndex
     if(f.improved.options[n].value == 'other') {
    otherImproved.style.display = 'inline';
        }
    else {
    otherImproved.style.display = 'none';
    
    }
    }
  </script>                            
                             <td id='otherImproved' style='display: none;'><span style='width:60px; padding-left:4px;'>Ваше улучшение: (otherImproved)</span><br/>
						          <input type='text' name='otherImproved' size='45' value=''/>
                              </td>
                              </tr>
                              
                              <tr id='repair' style='display: none;'>
						      <td colspan='2' valign='top'><span style='width:60px; padding-left:4px;'>Ремонт (repair)</span><br/>

						          <select name='repair' size='1'>
                                  <option></option>
                                  <option>не важно</option>
                                  <option>без ремонта</option>
                                  <option>нужен ремонт</option>
                                  <option>ремонт сделан</option>
                                  <option>евроремонт</option>
                                  </select>
                             </td></tr>
                             
                             <tr id='floor' style='display: none;'>
						      <td colspan='2' valign='top'><span style='width:60px; padding-left:4px;'>Этаж (floor)</span><br/>

						          <select name='floor' size='1'>
                                  <option></option>
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
                                  <option>Выше 12</option>
                                  </select>
                             </td></tr>

<!-- Цена -->
                            <tr id='price' style='display: none;'>
						      <td colspan='2' valign='top'><span style='width:60px; padding-left:4px;'>Цена (price)</span><br/>
						          <input type='text' name='price' size='10' value=''/>
                              </td></tr>
                             
                            
                        </table></td></tr>
                
 
                        
<!-- ДЛЯ СВЯЗИ -->                        
                        <tr>
                        <td valign='top' align='center'>
                          <div style='margin-top: 10px;'><b>СЛУЖЕБНЫЕ</b></div>
                            
                            <table align='center' width='100%'>
                                
                                <tr id='name'>
						      <td colspan='2' valign='top' align='center'><span style='width:60px; padding-left:4px;'>Имя (name)</span>
						          <input type='text' name='name' size='10' value=''/>
                              </td></tr>
                                
                                <tr id='lastname'>
						      <td colspan='2' valign='top' align='center'><span style='width:60px; padding-left:4px;'>Фамилия (lastname)</span>
						          <input type='text' name='lastname' size='10' value=''/>
                              </td></tr>
                             
                             <tr id='email'>
						      <td colspan='2' valign='top' align='center'><span style='width:60px; padding-left:4px;'>Адрес электронной почты (email)</span>
						          <input type='text' name='email' size='10' value='@'/>
                              </td></tr>
                              
                              <tr id='phone'>
						      <td colspan='2' valign='top' align='center'><span style='width:60px; padding-left:4px;'>Телефон (phone)</span>
						          <input type='text' name='phone' size='10' value='+7'/>
                              </td></tr>
                              
                              <tr id='mode'>
						      <td colspan='2' valign='top' align='center'><span style='width:60px; padding-left:4px;'>Укажите другой способ для связи с Вами (mode)</span>
						          <input type='text' name='mode' size='10' value=''/>
                              </td></tr>
                             
                            
                        </table></td></tr></table>

<input class='inputbuttonflat' type='submit' name='set_filter' value='Отправить данные' style='margin-left:20px;'/>
<input type='reset' value='Сбросить'/>

<br/><br/></td></tr></table>

	</form>
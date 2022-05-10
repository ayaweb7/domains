<?php


include ("blocks/date_base.php"); /* Соединяемся с базой данных */
//mysql_query('SET NAMES utf8');
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='index_adm'",$db);
$myrow = mysql_fetch_array($result);


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $myrow['title'] ?></title>
<meta name="keywords" content="<?php echo $myrow['meta_k'] ?>" />
<meta name="description" content="<?php echo $myrow['meta_d'] ?>" />
<link href="css/screen.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/praga_script_adm.js"></script>
<script type="text/javascript" src="http://4geo.ru/maps/js/4geoAPI.js" ></script>
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

</head>

<body id="index_adm">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header_adm.php"); ?>

<!-- Начало кода INDEX -->

<?php
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='index_adm'",$db);
$myrow = mysql_fetch_array($result);
?>
<div id="info">
    <h1><?php echo $myrow['h1'] ?></h1>
    <h2>В данном разделе Вам доступно:</h2>
    <h3 class="h31">Просмотр недвижимости Коряжмы <em>по категориям,</em> выборка по интересующим <em>критериям,</em> просмотр и распечатка на бумажном носителе.</h3>
    <p><img src="images/buttonDownActive.png" height="2%" width="2%" /></p>
    <h3 class="h32">Вы можете просмотреть подробную характеристику продаваемой недвижимости <em>с комментариями</em> продавца и <em>фотографиями</em> домов.</h3>
    <p><img src="images/buttonDownActive.png" height="3%" width="3%" /></p>
    <h3 class="h33">Вы можете узнать какую недвижимость продаёт конкретное <em>агентство</em> и узнать как найти его и связаться со специалистами этого агентства.</h3>
    <p><img src="images/buttonDownActive.png" height="4%" width="4%" /></p>
    <h3 class="h34">И наконец вы можете просто сориентироваться <em>в городе Коряжма.</em> К Вашим услугам карта города Коряжма и фотографии домов.</h3>
    <p><img src="images/buttonDownActive.png" height="5%" width="5%" /></p>
    <h1>Определение основных характеристик домов <em>по Коряжме</em></h1>
    <h2>Введите название <span>улицы</span>, затем номер <span>дома</span> и нажмите кнопку</h2>
</div> <!-- info -->    
<div id="realties">
        
<form name="form" action="house.php" method="POST">        
<table id="inventory" class="">
  <tr>
  <td width="15%">&nbsp;</td>
  <td id="street"><em>Улица:</em>
        <select name='street' size='1' onchange='vybor(this.form)'>
             <option></option>
             <option value='Архангельская'>Архангельская</option>
             <option value='Глейха'>Глейха</option>
             <option value='Гоголя'>Гоголя</option>
             <option value='Дыбцына'>Дыбцына</option>
             <option value='Кирова'>Кирова</option>
             <option value='Космонавтов'>Космонавтов</option>
             <option value='Кутузова'>Кутузова</option>
             <option value='Ленина'>Ленина</option>
             <option value='Лермонтова'>Лермонтова</option>
             <option value='Ломоносова'>Ломоносова</option>
             <option value='Матросова'>Матросова</option>
             <option value='Набережная'>Набережная</option>
             <option value='Пушкина'>Пушкина</option>
             <option value='Сафьяна'>Сафьяна</option>
             <option value='Советская'>Советская</option>
             <option value='Театральная'>Театральная</option>
        </select>
   </td>

    
   <td id="house_Ar" style='display: none;'><em>№ дома</em>:
        <select name='house_Ar' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>1</option>
             <option>3</option>
             <option>3-а</option>
             <option>5</option>
             <option>5-а</option>
             <option>5-б</option>
             <option>7</option>
             <option>9</option>
             <option>9-а</option>
             <option>9-б</option>
             <option>9-в</option>
             <option>11</option>
             <option>11-а</option>
             <option>11-б</option>
             <option>13</option>
             <option>15</option>
             <option>19</option>
             <option>21</option>
             <option>23</option>
             <option>25</option>
             <option>27</option>
             <option>27-а</option>
             <option>27-б</option>
             <option>29</option>
             <option>29-а</option>
             <option>29-б</option>
             <option>29-в</option>
             <option>31</option>
             <option>31-а</option>
             <option>31-б</option>
             <option>33</option>
         </select>
   </td>
   
   <td id="house_Gl" style='display: none;'><em>№ дома</em>:
        <select name='house_Gl' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>18</option>
             <option>18-а</option>
             <option>22</option>
        </select>
   </td>
   
   <td id="house_Go" style='display: none;'><em>№ дома</em>:
        <select name='house_Go' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>2</option>
             <option>4</option>
             <option>6</option>
             <option>7</option>
             <option>8</option>
             <option>10</option>
             <option>12</option>
             <option>14</option>
             <option>14-а</option>
             <option>18</option>
             <option>18-а</option>
             <option>20</option>
             <option>24</option>
        </select>
   </td>
   
   <td id="house_Dy" style='display: none;'><em>№ дома</em>:
        <select name='house_Dy' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>2</option>
             <option>3</option>
             <option>4</option>
             <option>5</option>
             <option>8</option>
             <option>10</option>
             <option>12</option>
             <option>14</option>
             <option>16</option>
        </select>
   </td>
   
   <td id="house_Ki" style='display: none;'><em>№ дома</em>:
        <select name='house_Ki' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>3</option>
             <option>5</option>
             <option>7-а</option>
             <option>9</option>
             <option>11</option>
             <option>12</option>
             <option>14</option>
             <option>15</option>
             <option>16</option>
             <option>17</option>
             <option>18</option>
             <option>19</option>
             <option>23</option>
             <option>25</option>
             <option>26</option>
             <option>27</option>
             <option>27-б</option>
             <option>29</option>
             <option>31</option>
         </select>
   </td>
   
   <td id="house_Ko" style='display: none;'><em>№ дома</em>:
        <select name='house_Ko' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>2</option>
             <option>4</option>
             <option>6</option>
             <option>10</option>
             <option>10-а</option>
        </select>
   </td>
   
   <td id="house_Ku" style='display: none;'><em>№ дома</em>:
        <select name='house_Ku' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>1</option>
             <option>2</option>
             <option>3</option>
             <option>5</option>
             <option>6</option>
             <option>7</option>
             <option>8</option>
             <option>9</option>
             <option>10</option>
             <option>11</option>
             <option>12</option>
             <option>13</option>
             <option>14</option>
             <option>15</option>
             <option>16</option>
             <option>17</option>
             <option>18</option>
         </select>
   </td>
   
   <td id="house_Ln" style='display: none;'><em>№ дома</em>:
        <select name='house_Ln' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>1</option>
             <option>2</option>
             <option>4</option>
             <option>5</option>
             <option>6</option>
             <option>7</option>
             <option>10</option>
             <option>11</option>
             <option>12</option>
             <option>13</option>
             <option>14</option>
             <option>15</option>
             <option>16</option>
             <option>18</option>
             <option>18-а</option>
             <option>19</option>
             <option>20</option>
             <option>20-а</option>
             <option>21</option>
             <option>22</option>
             <option>22-а</option>
             <option>24</option>
             <option>25</option>
             <option>27</option>
             <option>28</option>
             <option>30</option>
             <option>32</option>
             <option>32-а</option>
             <option>33</option>
             <option>34</option>
             <option>36</option>
             <option>36-а</option>
             <option>38</option>
             <option>39</option>
             <option>41-а</option>
             <option>41-б</option>
             <option>43</option>
             <option>43-а</option>
             <option>44</option>
             <option>45</option>
             <option>45-а</option>
             <option>45-б</option>
             <option>46</option>
             <option>47</option>
             <option>47-а</option>
             <option>48</option>
             <option>49</option>
             <option>49-а</option>
             <option>51</option>
         </select>
   </td>
   
   <td id="house_Lr" style='display: none;'><em>№ дома</em>:
        <select name='house_Lr' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>1</option>
             <option>2</option>
             <option>3</option>
             <option>4</option>
             <option>5</option>
             <option>7</option>
             <option>9</option>
             <option>10</option>
             <option>11</option>
             <option>12</option>
             <option>13</option>
             <option>14</option>
             <option>15</option>
             <option>16</option>
             <option>17</option>
             <option>20</option>
             <option>21</option>
             <option>23</option>
         </select>
   </td>

   <td id="house_Lo" style='display: none;'><em>№ дома</em>:
        <select name='house_Lo' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>1</option>
             <option>3</option>
             <option>3-а</option>
             <option>3-б</option>
             <option>3-в</option>
             <option>3-г</option>
             <option>5-в</option>
             <option>6</option>
             <option>7</option>
             <option>7-а</option>
             <option>7-б</option>
             <option>7-в</option>
             <option>8</option>
             <option>9</option>
             <option>9-а</option>
             <option>9-б</option>
             <option>10-а</option>
             <option>12</option>
             <option>14</option>
        </select>
   </td>

   <td id="house_Ma" style='display: none;'><em>№ дома</em>:
        <select name='house_Ma' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>9</option>
             <option>11</option>
             <option>13</option>
             <option>15</option>
         </select>
   </td>

   <td id="house_Na" style='display: none;'><em>№ дома</em>:
        <select name='house_Na' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>3</option>
             <option>5</option>
             <option>6</option>
             <option>7</option>
             <option>8</option>
             <option>9</option>
             <option>10</option>
             <option>11</option>
             <option>12</option>
             <option>13</option>
             <option>14</option>
             <option>18</option>
             <option>20</option>
             <option>24</option>
             <option>26</option>
             <option>30</option>
             <option>36</option>
             <option>36-а</option>
             <option>38</option>
             <option>40</option>
             <option>42</option>
             <option>42-а</option>
             <option>44</option>
             <option>46</option>
             <option>46-а</option>
             <option>48</option>
             <option>50</option>
             <option>52</option>
             <option>54</option>
             <option>54-а</option>
             <option>56</option>
         </select>
   </td>

   <td id="house_Pu" style='display: none;'><em>№ дома</em>:
        <select name='house_Pu' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>1</option>
             <option>2</option>
             <option>3</option>
             <option>4</option>
             <option>5</option>
             <option>6</option>
             <option>8</option>
             <option>9</option>
             <option>12</option>
             <option>12-а</option>
             <option>13</option>
             <option>15</option>
             <option>16</option>
             <option>17</option>
             <option>17-а</option>
             <option>18</option>
        </select>
   </td>

   <td id="house_Sa" style='display: none;'><em>№ дома</em>:
        <select name='house_Sa' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>2-а</option>
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
             <option>13</option>
             <option>15</option>
             <option>17</option>
             <option>19</option>
       </select>
   </td>

   <td id="house_So" style='display: none;'><em>№ дома</em>:
        <select name='house_So' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>2-а</option>
             <option>4</option>
             <option>5</option>
             <option>5-а</option>
             <option>5-б</option>
             <option>6</option>
             <option>6-а</option>
             <option>6-б</option>
             <option>6-в</option>
             <option>7</option>
             <option>7-а</option>
             <option>7-б</option>
             <option>8</option>
             <option>9</option>
             <option>11</option>
             <option>12</option>
             <option>12-а</option>
             <option>12-б</option>
             <option>13</option>
             <option>13-а</option>
             <option>14</option>
             <option>15</option>
             <option>15-а</option>
             <option>15-б</option>
             <option>15-в</option>
             <option>17</option>
             <option>17-а</option>
             <option>17-б</option>
      </select>
   </td>

   <td id="house_Te" style='display: none;'><em>№ дома</em>:
        <select name='house_Te' size='1' onchange='checkAll(this.form)'>
             <option value='0'></option>
             <option>1</option>
             <option>2</option>
             <option>3</option>
             <option>4</option>
             <option>5</option>
             <option>6</option>
             <option>7</option>
             <option>8</option>
             <option>9</option>
             <option>12</option>
             <option>14</option>
             <option>15</option>
             <option>16</option>
             <option>17</option>
             <option>18</option>
       </select>
   </td>
   
   <td id="button" style='display: none;'>
        <input id="submit" type="submit" name="" value="Посмотреть на дом" style="margin-left:20px;" disabled/>
   </td>
   <td width="15%">&nbsp;</td> 
    
  </tr>
</table> <!-- inventory -->
</form>
</div> <!-- realties -->

<!-- Конец кода RENTING -->  
    
    

<!-- Конец кода INDEX -->  


</body>
</html>
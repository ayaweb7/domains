<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='shop_insert'");
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

<form name="form" action="mysql_shop_insert.php" method="post">
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
		<!-- DATE -->
							<tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Дата покупки (date)</span><br/>
						          <input type="text" name="date" style="color: red; size="10" value="2020.12.30" />
                            </td></tr>
						
		<!-- GRUPPA -->                                
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Категория (gruppa)</span><br/>
                                <select name='gruppa' size='1'>
<?php	
								$result = mysqli_query($db, "SELECT * FROM shops ORDER BY gruppa");
								$myrow = mysqli_fetch_array($result);
								$shop=' ';
								do {
								if ($myrow['gruppa'] != $gruppa) {	
			
									printf  ("	<option>%s</option>",$myrow['gruppa']);
									$gruppa = $myrow['gruppa'];
									}
								}
									while ($myrow = mysqli_fetch_array($result));

?>

								</select>
							</td></tr>
							
		<!-- SHOP -->                              
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Магазин (shop)</span><br/>
								<select name='shop' size='1'>
									<?php	
									$result2 = mysqli_query($db, "SELECT * FROM store ORDER BY shop");
									$myrow2 = mysqli_fetch_array($result2);
									$shop=' ';

									do {
										if ($myrow2['shop'] != $shop) {	
			
											printf  ("<option selected>%s</option>",$myrow2['shop']);
											$shop = $myrow2['shop'];
										}
									}
											while ($myrow2 = mysqli_fetch_array($result2));

									?>
								</select>
                            </td></tr>
							
							
		<!-- TOWN -->                              
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Город (town)</span><br/>
							  <?php	
									$result3 = mysqli_query($db, "SELECT town FROM store WHERE shop='Яр'");
									$myrow3 = mysqli_fetch_array($result3);
									$town=' ';

									do {
										if ($myrow3['town'] != $town) {	
			
											printf  ("<input type='text' name='town' size='20' value='$s' />",$myrow3['town']);
											$town = $myrow3['town'];
										}
									}
											while ($myrow3 = mysqli_fetch_array($result3));

									?>
								
							</td></tr>
		<!-- ADRESS -->                              
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Адрес (adress)</span><br/>
								<select name='adress' size='1'>
									<option>Архангельская, 2</option>
									<option>АЗС №2</option>
									<option>АЗС №220</option>
									<option>Архангельская, 4</option>
									<option>Архангельская, 8</option>
									<option>Архангельская, 12</option>
									<option>Архангельская, 13</option>
									<option>Болтинское шоссе, 8</option>
									<option>Бумажников, 55</option>
									<option>Виноградова, 87</option>
									<option>Военных курсантов</option>
									<option>Володарского, 8</option>
									<option>Володарского, 11</option>
									<option>Володарского, 21</option>
									<option>Гагарина, 39</option>
									<option>Гагарина, 41</option>
									<option>Гагарина, 45</option>
									<option>Гледенская, 61</option>
									<option>д. Наледино</option>
									<option>Дыбцына, 3-а</option>
									<option>Дыбцына, 17</option>
									<option>Дыбцына, 28</option>
									<option>Internet</option>
									<option>Кирова, 1</option>
									<option selected>Кирова, 14-а</option>
									<option>Кирова, 23</option>
									<option>Кирова, 27-б</option>
									<option>Кирова, 60</option>
									<option>Кирова, 98-а</option>
									<option>Кооперативная, 4</option>
									<option>Кооперативная, 15</option>
									<option>Космонавтов, 4</option>
									<option>Красная, 44</option>
									<option>Красная, 110</option>
									<option>Красноармейская, 70</option>
									<option>Ленина, 20</option>
									<option>Ленина, 34</option>
									<option>Ленина, 58</option>
									<option>Ленина, 86</option>
									<option>Ленина, 176</option>
									<option>Ленина, 180-а</option>
									<option>Лермонтова, 24</option>
									<option>Лермонтова, 30</option>
									<option>Магистральное шоссе, 13</option>
									<option>Маяковского, 6</option>
									<option>Маяковского, 11</option>
									<option>Первомайская, 25</option>
									<option>Преображенского, 28</option>
									<option>промзона</option>
									<option>Пугачёва, 22</option>
									<option>Пушкина, 15</option>
									<option>Революции, 6</option>
									<option>Складская, 10</option>
									<option>Складская, 21</option>
									<option>Советская, 5</option>
									<option>Советская, 13</option>
									<option>Советский пр-т, 95</option>
									<option>Советский пр-т, 98</option>
									<option>Советский пр-т, 149-б</option>
									<option>Советский пр-т, 162-а</option>
									<option>Строителей, 7</option>
									<option>Строителей, 53</option>
									<option>Транспортная, 2</option>
									<option>Транспортная, 8</option>
									<option>Универ. Набережная, 36-296</option>
									<option>Хабарова, 20</option>
									<option>Черняховского, 86</option>
									<option>Чиркова, 5</option>
									<option>Энгельса, 20</option>
								</select>
							</td></tr>                             
		<!-- SHOP -->                              
                            <tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Магазин (shop)</span><br/>
								<select name='#' size='1'>
									<option>AliExpress</option>
									<option>19 Дюймов</option>
									<option>220-volt.ru</option>
									<option>Husqvarna</option>
									<option>АВИТО</option>
									<option>Автозапчасти</option>
									<option>Авторазборка</option>
									<option>АкваДом</option>
									<option>Аквамарин</option>
									<option>Альбион</option>
									<option>База Металлопроката</option>
									<option>Баранка</option>
									<option>Бобёр</option>
									<option>Буратино</option>
									<option>Ваша Сантехника</option>
									<option>Велес</option>
									<option>Грета</option>
									<option>Ёлки-палки</option>
									<option>Добрострой</option>
									<option>Домовой</option>
									<option>Зубр</option>
									<option>Инструмент</option>
									<option>Интерьер-Мебель</option>
									<option>Каскад</option>
									<option>Книги</option>
									<option>Лазурь</option>
									<option>Лес и Дом</option>
									<option>Магазин Крепежа</option>
									<option>Магазин на Складской</option>
									<option>Мастер-Про</option>
									<option>Мебельная фурнитура</option>
									<option>МегаСтрой</option>
									<option>Металлолом</option>
									<option>Метизы</option>
									<option>Минерал Групп</option>
									<option>Минимакс Двина</option>
									<option>Мир Замков</option>
									<option>Мир Крепежа</option>
									<option>Мира Инструмент</option>
									<option>Мир Кафеля</option>
									<option>МКРЕП</option>
									<option>Нефтяная топливная компания</option>
									<option>Окна VEKA</option>
									<option>Пилорама</option>
									<option>Подшипники</option>
									<option selected>Реал Маркет</option>
									<option>Rozetki.ru</option>
									<option>РосНефть</option>
									<option>СантехМир</option>
									<option>Светофор</option>
									<option>Сима-Ленд</option>
									<option>Сириус</option>
									<option>Сияние</option>
									<option>Строитель</option>
									<option>СтройБери</option>
									<option>Стройка</option>
									<option>Стройматериалы</option>
									<option>СтройМир</option>
									<option>СтройРынок</option>
									<option>СтройСити</option>
									<option>Техника-Электрика</option>
									<option>Тёплый Дом</option>
									<option>ТоргСервис</option>
									<option>УстюгГаз</option>
									<option>Хозяюшка</option>
									<option>ФлораЦентр</option>
									<option>Форсаж</option>
									<option>Центр Сантехники</option>
									<option>Чёрный Кот</option>
									<option>Электрика</option>
									<option>ЭлектроМаркет</option>
									<option>Энергия</option>
									<option>Яр</option>
								</select>
                            </td></tr>                             
                          
                    </table></td>
                
<!-- GLOBAL -->               
                   <td valign="top" width="65%">
                    <div><b>ОСНОВНЫЕ</b></div>
                        <table align="center" width="100%">
		<!-- NAME -->
							<tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Наименование (name)</span><br/>
						          <input type="text" name="name" size="20" value=""/>
                            </td></tr>
		<!-- CHARACTERISTIC -->
							<tr>
						      <td colspan="2" valign="top"><span style="width:60px; padding-left:4px;">Характеристики (characteristic)</span><br/>
						          <input type="text" name="characteristic" size="80" value=""/>
                            </td></tr>
	<!--ITEM - QUANTITY -->	                              
                            <tr>
							  <td valign="top"><span style="width:60px; padding-left:4px;">Количество (quantity)</span><br/>
						        <input type="text" name="quantity" size="10" value=""/>
							  </td>
							  <td valign="top"><span style="width:60px; padding-left:4px;">Единица измерения (item)</span><br/>
								<select name='item' size='1'>
									<option></option>
									<option>кг.</option>
									<option>кв.м.</option>
									<option>куб.м.</option>
									<option>л.</option>
									<option>м.</option>
									<option selected>шт.</option>
								</select>
							</td></tr>
	<!-- PRICE --- AMOUNT --- ID_STORE-->
							<tr>
						      <td valign="top"><span style="width:60px; padding-left:4px;">Цена (price)</span><br/>
						          <input type="text" name="price" size="10" value=""/>
                            </td>
							
							<td valign="top"><span style="width:60px; padding-left:4px;">Стоимость (amount)</span><br/>
						          <input type="text" name="amount" size="10" value=""/>
                            </td>
							
							<td valign="top"><span style="width:60px; padding-left:4px;">ID_STORE</span><br/>
						          <input type="text" name="id_store" size="10" value=""/>
                            </td></tr>
                            
                        </table></td></tr>
	</table>

<input class="inputbuttonflat" type="submit" name="set_filter" value="Отправить данные" style="margin-left:20px;"/>
<input type="reset" name="set_filter" value="Сбросить"/>
<!-- <a href="#" target="_blank"><img src="images/send2.png" id="send"/></a><a href="#" target="_blank"><img src="images/esc2.png" id="send"/></a> -->

</td></tr>

<!--
<tr><td width="50%" >
 <a href="shop.php" title="Вернуться в блок администратора"><img src="images/send2.png" id="send"/></a>&nbsp;
 <a href="shop.php" title="Вернуться в блок администратора"><img src="images/esc2.png" id="send"/></a>
</td></tr>           
-->

</table>

	</form>

<!-- Подключаем FOOTER -->
		<?php include ("footer.php"); ?>

</body>
</html>
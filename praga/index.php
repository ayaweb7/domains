<!-- praga_tab -->
<?php 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
mysql_query('SET NAMES utf8');
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='index'",$db);

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
<script type="text/javascript" src="js/praga_script.js"></script>
<script type="text/javascript" src="http://4geo.ru/maps/js/4geoAPI.js" ></script>
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
</head>

<body id="index">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header.php"); ?>

<!-- Начало кода INDEX -->

<div id="info">
    <h1><?php echo $myrow['h1'] ?></h1>
    <h2><?php echo $myrow['h2'] ?></h2>
    <div>
        <img id="photoPraga" src="images/photo_praga.jpg" alt="Фото АН ПРАГА"/>
    </div>
    <h3>Адрес:</h3>
    <p>г.Коряжма, ул.Пушкина, д.15</p>
    <h3>Контакты:</h3>
    <table border="0" cellspacing="0" cellpadding="0" align="center" width="38%">
<tr>
	<td rowspan="4" class="phone" width="15%"></td>
	<td>8-921-241-15-76</td>
</tr>
<tr>
	<td>8-911-565-72-25</td>
</tr>
<tr>
	<td>8-81850-3-05-77</td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td rowspan="2" class="post" width="15%"></td>
	<td>praga.koryazhma@yandex.ru</td>
</tr>
<tr>
	<td>anz1969dg@rambler.ru</td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td class="skype" width="15%" height="50"></td>
	<td style="vertical-align: middle;">alexandrzemtsov</td>
</tr>
</table>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <h3>График работы:</h3>
    <ul>
	<li>Пн: 10:00 - 20:00</li>
	<li>Вт: 10:00 - 20:00</li>
	<li>Ср: 10:00 - 20:00</li>
	<li>Чт: 10:00 - 20:00</li>
	<li>Пт: 10:00 - 20:00</li>
	<li>Сб: 11:00 - 17:00</li>
	<li class="last">Вс: по записи </li>
</ul>
    <h3>Юридическая информация:</h3>
    <p><em>Краткое наименование: </em>АГЕНТСТВО НЕДВИЖИМОСТИ ПРАГА</p>
    <p><em>Полное юридическое наименование: </em>Общество с ограниченной ответственностью "Агентство недвижимости ПРАГА"</p>
    <p><em>Юридический адрес: </em>165651, Архангельская область, г.Коряжма, ул.Пушкина, д.15</p>
    <p><em>Руководитель: </em>Директор Земцов Александр Николаевич</p>
    <p><em>ИНН: </em>2905010320</p>
    <p><em>ОГРН: </em>1092905000352</p>
    <p><em>ОКПО: </em>88529168</p>
    <p><em>ОКВЭД: </em>70.3 (Предоставление посреднических услуг, связанных с недвижимым имуществом)</p>
    <p><em>ОКАТО: </em>11408 (Архангельская область, Города областного подчинения Архангельской области /, Коряжма)</p>
    <p><em>Дата внесения в реестр: </em>06.07.2009</p>
    <h3>Виды деятельности:</h3>
    <ul>
	<li>Помощь при оформлении сделок купли-продажи имущества.</li>
	<li>Помощь в приватизации имущества.</li>
	<li>Помощь при оформлении ипотеки.</li>
	<li>Вступление в наследство.</li>
	<li>Срочный выкуп квартир.</li>
	<li>Независимая оценка.</li>
    <li>Юридические услуги.</li>
</div> <!-- info -->    
    
    <input id="show" type="button" value="Показать на карте" onclick="showMap();" />
    <div id="mapFrame" style="width:100%; height:30em; margin: 15px auto; display: none;"></div>

	<script type="text/javascript">

    
<!-- Задание начальных параметров для карты -->
var options = {
town: 'Коряжма', street: 'Пушкина', building: '15'
};
<!-- Инициализировать карту -->
var map = new geoAPI.maps.Map(document.getElementById('mapFrame'), options);

<!-- Создание маркера по адресу -->
var marker = new geoAPI.maps.Marker({
town: 'Коряжма', street: 'Пушкина', building: '15'
});
<!-- Размещение маркера на карте -->
marker.setMap(map);
</script>

<!-- Конец кода INDEX -->  


<!-- Подключаем ACTIVITIES -->
		<?php include ("blocks/activities.php"); ?>

<!-- Подключаем EXTRA -->
		<?php include ("blocks/extra.php"); ?>



<!-- Подключаем FOOTER -->
		<?php include ("blocks/footer.php"); ?>

</body>
</html>
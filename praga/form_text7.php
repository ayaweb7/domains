<?php 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
mysql_query('SET NAMES utf8');
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2 FROM settings WHERE page='form_text'",$db);

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


<!-- Начало кода VALUATION -->
<body id="form_text">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header.php"); ?>

<!-- Начало кода REALTIES -->

    <div id="realties">
<h1>Форма документа</h1>
<h2>Образец</h2>
<div id="statement">
<p class="where">Мировому судье, судебного участка № _ города Коряжма Архангельской области 165650, Архангельская область, город Коряжма,  ул.Дыбцына, д.1.</p>
<p class="where"><em>Истец:</em> Барыкина Светлана Максимовна, зарегистрирована по адресу: город Коряжма, ул.Кирова, д.28, кв.77;<br />контактный телефон: 8-921-777-77-77.</p>
<p class="where"><em>Ответчик:</em> Барыкин Михаил Петрович, зарегистрирован по адресу: город Коряжма, ул.Советская, д.30, кв.18;<br />контактный телефон: 8 905-777-77-77.</p>
<p class="where">цена иска: _____ рублей.</p>
<p class="where">государственная пошлина: _____ рублей.</p>
<p class="topic">Исковое заявление<br />о взыскании алиментов на ребенка (детей)</p>
<p class="abzac">« __ » _______ 20__ года между мной Барыкиной Светланой Максимовной (далее по тексту – Истец), и Барыкиным Михаилом Петровичем (далее по тексту – Ответчик) был зарегистрирован брак.</p>
<p class="abzac">С « __ » _______ 20__ года по « __ » _______ 20__ года мы проживали вместе и вели совместное хозяйство.</p>
<p class="abzac">От нашего брака родился(ись) ребенок (дети): _____________________________________ <strong>(Ф.И.О. и даты рождения детей)</strong>.</p>
<p class="abzac">Ребенок (дети) находится(ятся) на иждивении у Истца, Ответчик материальной помощи на его (их) содержание не оказывает. Ответчик другого ребенка (детей) не имеет, удержаний по исполнительным документам с него не производится.</p>
<p class="abzac">На основании изложенного, руководствуясь ст. 80, 81 СК РФ</p>
<p class="topic1">прошу:</p>
<p class="abzac">Взыскать с Ответчика в пользу Истца алименты на:  _________________ <strong>(Ф.И.О. и даты рождения детей)</strong> в размере ________ части всех видов заработка ежемесячно, начиная с даты подачи заявления (указать) до его (их) совершеннолетия.</p>
<p class="app">Приложение:</p>
<ol>
<li>копия искового заявления;</li>
<li>копия свидетельства о заключении брака (свидетельство о расторжении брака, если брак расторгнут);</li>
<li>квитанция об оплате государственной пошлины;</li>
<li>копия свидетельства о рождении ребенка (детей);</li>
<li>справка с места работы Ответчика о размере зарплаты и об удержаниях;</li>
<li>справка жилищных органов о нахождении ребенка (детей) на иждивении Истца;</li>
</ol>
<p class="sign">« ____ » ______________  20__ года<em>.........................</em>/ Барыкина С.М. /</p>
</div> <!-- statement --> 


    
        </div> <!-- realties -->    
	

<!-- Подключаем ACTIVITIES -->
		<?php include ("blocks/activities.php"); ?>


<!-- Подключаем FOOTER -->
		<?php include ("blocks/footer.php"); ?>

</body>
</html>
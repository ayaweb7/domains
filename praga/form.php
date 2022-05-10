<?php 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
//mysql_query('SET NAMES utf8');
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2 FROM settings WHERE page='form'",$db);

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
<body id="form">

<!-- Подключаем HEADER -->
		<?php include ("blocks/header.php"); ?>

<!-- Начало кода REALTIES -->

    <div id="realties">
<h1><?php echo $myrow['h1'] ?></h1>
<?php
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2 FROM settings WHERE page='form'",$db);
$myrow = mysql_fetch_array($result);

?>

<table id="inventory" width="99%" class="form">
    <caption> <!-- Заголовок таблицы -->
        <h2><?php echo $myrow['h2'] ?></h2>
    </caption>
<?php
$result1 = mysql_query("SELECT * FROM form WHERE type='Арбитраж' ORDER BY title",$db);
$myrow1 = mysql_fetch_array($result1);

if (!isset($myrow1['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}
else {
printf ("<tr class='absent'><td><h3>Арбитраж</h3></td></tr><tr class='absent'><td><ul>");

$even=true;                    
do {
printf ("<li class='absent' style='background-color:".($even?'white':'#eaeaea')."'><a href='form_text.php?id=%s'>%s</a></li>",$myrow1['id'],$myrow1['title']);
$even=!$even;
}
while ($myrow1 = mysql_fetch_array($result1));
}
printf ("</ul></td></tr>");





$result1 = mysql_query("SELECT * FROM form WHERE type='Брачно-семейные дела' ORDER BY title",$db);
$myrow1 = mysql_fetch_array($result1);

if (!isset($myrow1['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}
else {
printf ("<tr class='absent'><td><h3>Брачно-семейные дела</h3></td></tr><tr class='absent'><td><ul>");

$even=true;                    
do {
printf ("<li class='absent' style='background-color:".($even?'white':'#eaeaea')."'><a href='form_text.php?id=%s'>%s</a></li>",$myrow1['id'],$myrow1['title']);
$even=!$even;
}
while ($myrow1 = mysql_fetch_array($result1));
}
printf ("</ul></td></tr>");







$result1 = mysql_query("SELECT * FROM form WHERE type='Взыскание долга' ORDER BY title",$db);
$myrow1 = mysql_fetch_array($result1);

if (!isset($myrow1['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}
else {
printf ("<tr class='absent'><td><h3>Взыскание долга</h3></td></tr><tr class='absent'><td><ul>");

$even=true;                    
do {
printf ("<li class='absent' style='background-color:".($even?'white':'#eaeaea')."'><a href='form_text.php?id=%s'>%s</a></li>",$myrow1['id'],$myrow1['title']);
$even=!$even;
}
while ($myrow1 = mysql_fetch_array($result1));
}
printf ("</ul></td></tr>");





$result1 = mysql_query("SELECT * FROM form WHERE type='Возмещение морального вреда' ORDER BY title",$db);
$myrow1 = mysql_fetch_array($result1);

if (!isset($myrow1['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}
else {
printf ("<tr class='absent'><td><h3>Возмещение морального вреда</h3></td></tr><tr class='absent'><td><ul>");

$even=true;                    
do {
printf ("<li class='absent' style='background-color:".($even?'white':'#eaeaea')."'><a href='form_text.php?id=%s'>%s</a></li>",$myrow1['id'],$myrow1['title']);
$even=!$even;
}
while ($myrow1 = mysql_fetch_array($result1));
}
printf ("</ul></td></tr>");






$result1 = mysql_query("SELECT * FROM form WHERE type='Дела о ДТП' ORDER BY title",$db);
$myrow1 = mysql_fetch_array($result1);

if (!isset($myrow1['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}
else {
printf ("<tr class='absent'><td><h3>Дела о ДТП</h3></td></tr><tr class='absent'><td><ul>");

$even=true;                    
do {
printf ("<li class='absent' style='background-color:".($even?'white':'#eaeaea')."'><a href='form_text.php?id=%s'>%s</a></li>",$myrow1['id'],$myrow1['title']);
$even=!$even;
}
while ($myrow1 = mysql_fetch_array($result1));
}
printf ("</ul></td></tr>");





$result1 = mysql_query("SELECT * FROM form WHERE type='Жилищные споры' ORDER BY title",$db);
$myrow1 = mysql_fetch_array($result1);

if (!isset($myrow1['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}
else {
printf ("<tr class='absent'><td><h3>Жилищные споры</h3></td></tr><tr class='absent'><td><ul>");

$even=true;                    
do {
printf ("<li class='absent' style='background-color:".($even?'white':'#eaeaea')."'><a href='form_text.php?id=%s'>%s</a></li>",$myrow1['id'],$myrow1['title']);
$even=!$even;
}
while ($myrow1 = mysql_fetch_array($result1));
}
printf ("</ul></td></tr>");






$result1 = mysql_query("SELECT * FROM form WHERE type='Защита прав потребителей' ORDER BY title",$db);
$myrow1 = mysql_fetch_array($result1);

if (!isset($myrow1['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}
else {
printf ("<tr class='absent'><td><h3>Защита прав потребителей</h3></td></tr><tr class='absent'><td><ul>");

$even=true;                    
do {
printf ("<li class='absent' style='background-color:".($even?'white':'#eaeaea')."'><a href='form_text.php?id=%s'>%s</a></li>",$myrow1['id'],$myrow1['title']);
$even=!$even;
}
while ($myrow1 = mysql_fetch_array($result1));
}
printf ("</ul></td></tr>");






$result1 = mysql_query("SELECT * FROM form WHERE type='Земельные споры' ORDER BY title",$db);
$myrow1 = mysql_fetch_array($result1);

if (!isset($myrow1['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}
else {
printf ("<tr class='absent'><td><h3>Земельные споры</h3></td></tr><tr class='absent'><td><ul>");

$even=true;                    
do {
printf ("<li class='absent' style='background-color:".($even?'white':'#eaeaea')."'><a href='form_text.php?id=%s'>%s</a></li>",$myrow1['id'],$myrow1['title']);
$even=!$even;
}
while ($myrow1 = mysql_fetch_array($result1));
}
printf ("</ul></td></tr>");






$result1 = mysql_query("SELECT * FROM form WHERE type='Наследственные дела' ORDER BY title",$db);
$myrow1 = mysql_fetch_array($result1);

if (!isset($myrow1['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}
else {
printf ("<tr class='absent'><td><h3>Наследственные дела</h3></td></tr><tr class='absent'><td><ul>");

$even=true;                    
do {
printf ("<li class='absent' style='background-color:".($even?'white':'#eaeaea')."'><a href='form_text.php?id=%s'>%s</a></li>",$myrow1['id'],$myrow1['title']);
$even=!$even;
}
while ($myrow1 = mysql_fetch_array($result1));
}
printf ("</ul></td></tr>");







$result1 = mysql_query("SELECT * FROM form WHERE type='Сделки с недвижимостью' ORDER BY title",$db);
$myrow1 = mysql_fetch_array($result1);

if (!isset($myrow1['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}
else {
printf ("<tr class='absent'><td><h3>Сделки с недвижимостью</h3></td></tr><tr class='absent'><td><ul>");

$even=true;                    
do {
printf ("<li class='absent' style='background-color:".($even?'white':'#eaeaea')."'><a href='form_text.php?id=%s'>%s</a></li>",$myrow1['id'],$myrow1['title']);
$even=!$even;
}
while ($myrow1 = mysql_fetch_array($result1));
}
printf ("</ul></td></tr>");






$result1 = mysql_query("SELECT * FROM form WHERE type='Трудовые споры' ORDER BY title",$db);
$myrow1 = mysql_fetch_array($result1);

if (!isset($myrow1['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}
else {
printf ("<tr class='absent'><td><h3>Трудовые споры</h3></td></tr><tr class='absent'><td><ul>");

$even=true;                    
do {
printf ("<li class='absent' style='background-color:".($even?'white':'#eaeaea')."'><a href='form_text.php?id=%s'>%s</a></li>",$myrow1['id'],$myrow1['title']);
$even=!$even;
}
while ($myrow1 = mysql_fetch_array($result1));
}
printf ("</ul></td></tr>");






$result1 = mysql_query("SELECT * FROM form WHERE type='Юридические факты' ORDER BY title",$db);
$myrow1 = mysql_fetch_array($result1);

if (!isset($myrow1['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}
else {
printf ("<tr class='absent'><td><h3>Юридические факты</h3></td></tr><tr class='absent'><td><ul>");

$even=true;                    
do {
printf ("<li class='absent' style='background-color:".($even?'white':'#eaeaea')."'><a href='form_text.php?id=%s'>%s</a></li>",$myrow1['id'],$myrow1['title']);
$even=!$even;
}
while ($myrow1 = mysql_fetch_array($result1));
}
printf ("</ul></td></tr>");

?>    

    
</table> <!-- inventory -->    
    
        </div> <!-- realties -->    
	

<!-- Подключаем ACTIVITIES -->
		<?php include ("blocks/activities.php"); ?>


<!-- Подключаем FOOTER -->
		<?php include ("blocks/footer.php"); ?>

</body>
</html>
<?php
//include ("lock.php"); /* Пароль в админскую часть */ 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
//mysql_query('SET NAMES utf8');
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='short'",$db);

$myrow = mysql_fetch_array($result);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $myrow['title'] ?></title>
<meta name="keywords" content="<?php echo $myrow['meta_k'] ?>" />
<meta name="description" content="<?php echo $myrow['meta_d'] ?>" />

<link rel="stylesheet" type="text/css" href="css/screen.css" />
<link rel="alternate stylesheet" type="text/css" href="css/print_screen.css" title="print_screen" />
<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="for_IE.css"><![endif]-->
<script type="text/javascript" src="../js/praga_script.js"></script>

<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

</head>

<body id="short">


<!-- Подключаем HEADER -->
		<?php include ("blocks/header_adm.php"); ?>


<!-- Начало кода REALTIES -->
<?php
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='short'",$db);

$myrow = mysql_fetch_array($result);
?>

    <div id="realties">
        <h1><?php echo $myrow['h1'] ?></h1>
        
    <table id="inventory" width="99%" class="realty short">
        <caption> <!-- Заголовок таблицы -->
           <h2>Агентства недвижимости города Коряжма</h2>
        </caption>

                  <tr class="input"><td colspan="7">
                  <input class="back" type="button" value="назад" onclick="setActiveStyleSheet('screen'); return false;" />
                  <input class="print" type="button" value="версия для печати" onclick="setActiveStyleSheet('print_screen'); return false;" />
                  <input type="button" value="печать" onclick="printit()" />
                  </td></tr>
        
        <colgroup> <!-- Задание ширины и стилей для колонок таблицы -->
            <col id="agency" />
            <col id="addr" /> <!-- Задание ширины и стилей для одной из колонок таблицы -->
            <col id="office" />
       </colgroup>

        <tr class="alt"> <!-- Строка таблицы -->
            <th scope="col">Агентство</th>
            <th scope="col">Адрес</th> <!-- Заголовочная ячейка таблицы -->
            <th scope="col">Офис</th>
        </tr>
                 
<?php 
$result = mysql_query("SELECT * FROM agency ORDER BY title", $db);

$myrow = mysql_fetch_array($result);
$even=true;                    
do {
printf  ("          <tr style='background-color:".($even?'white':'#eaeaea')."'>
                      <td style='text-align: left;'><a href='full.php?id=%s'>%s</a></td>
                      <td>%s, %s</td>
                      <td>%s</td>
                    </tr>  ", $myrow['id'],$myrow['title'],$myrow['street'],$myrow['house'],$myrow['office']); 
$even=!$even;
}
while ($myrow = mysql_fetch_array($result));                    
?>

                  <tr class="input"><td colspan="7">
                  <input class="back" type="button" value="назад" onclick="setActiveStyleSheet('screen'); return false;" />
                  <input class="print" type="button" value="версия для печати" onclick="setActiveStyleSheet('print_screen'); return false;" />
                  <input type="button" value="печать" onclick="printit()" />
                  </td></tr>
                    
             </table> <!-- inventory -->
                
        </div> <!-- realties -->

<!-- Конец кода REALTIES -->


<!-- Подключаем EXTRA -->
		<?php include ("blocks/extra.php"); ?>

  


</body>
</html>
<?php
//include ("lock.php"); /* Пароль в админскую часть */ 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
//mysql_query('SET NAMES utf8');
if (isset($_GET['id'])) {$id=$_GET['id'];}
$result1 = mysql_query("SELECT * FROM agency WHERE id='$id'", $db);
$myrow1 = mysql_fetch_array($result1);

$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='full'",$db);
$myrow = mysql_fetch_array($result);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $myrow1['title'] ?> <?php echo $myrow['title'] ?></title>
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

<body id="full">


<!-- Подключаем HEADER -->
		<?php include ("blocks/header_adm.php"); ?>



<!-- Начало кода REALTIES -->
<?php
if (isset($_GET['id'])) {$id=$_GET['id'];}
$result = mysql_query("SELECT title,meta_d,meta_k,h1,h2,date,month FROM settings WHERE page='full'",$db);
$myrow = mysql_fetch_array($result);

$result1 = mysql_query("SELECT * FROM agency WHERE id='$id'", $db);
$myrow1 = mysql_fetch_array($result1);
?>

    <div id="realties">
        <h1><?php echo $myrow['h1'] ?><br /><em><?php echo $myrow1['title'] ?></em></h1>
        
    
    <table id="inventory" width="99%" class="realty full">
        <caption> <!-- Заголовок таблицы -->
           <h2><?php echo $myrow['h2'] ?></h2>
        </caption>

                  <tr class="input"><td colspan="7">
                  <input class="back" type="button" value="назад" onclick="setActiveStyleSheet('screen'); return false;" />
                  <input class="print" type="button" value="версия для печати" onclick="setActiveStyleSheet('print_screen'); return false;" />
                  <input type="button" value="печать" onclick="printit()" />
                  </td></tr>
        
        <colgroup>  <!-- Задание ширины и стилей для колонок таблицы --> 
            <col id="topic" />
            <col id="sense" />  <!-- Задание ширины и стилей для одной из колонок таблицы  -->
        </colgroup>

<tr class="odd">
    <td class="topic"><p>Полное наименование</p></td>
    <td class="sense"><p><em><?php echo $myrow1['full'] ?></em></p></td>
</tr>


<tr class="even">
    <td class="topic"><p>Адрес</p></td>
    <td class="sense"><p>ул.<?php echo $myrow1['street'] ?>, д.<?php echo $myrow1['house'] ?></p></td>
</tr>

<tr class="odd">
    <td class="topic"><p>Офис</p></td>
    <td class="sense"><p><?php echo $myrow1['office'] ?></p></td>
</tr>

<tr class="even">
    <td class="topic"><p>Дополнительный офис</p></td>
    <td class="sense"><p><?php echo $myrow1['add_office'] ?></p></td>
</tr>

<tr class="odd">
    <td class="topic"><p>Телефоны</p></td>
    <td class="sense"><p><?php echo $myrow1['phone1'] ?> <?php echo $myrow1['phone2'] ?><br /><?php echo $myrow1['phone3'] ?> <?php echo $myrow1['phone4'] ?><br /><?php echo $myrow1['phone5'] ?></p></td>
</tr>

<tr class="even">
    <td class="topic"><p>Электронная почта</p></td>
    <td class="sense"><p><?php echo $myrow1['email'] ?></p></td>
</tr>

<tr class="odd">
    <td class="topic"><p>Скайп</p></td>
    <td class="sense"><p><?php echo $myrow1['skype'] ?></p></td>
</tr>

<tr class="even">
    <td class="topic"><p>Интернет</p></td>
    <td class="sense"><p><?php echo $myrow1['www'] ?></p></td>
</tr>

<tr class="odd">
    <td class="topic"><p>Руководитель, сотрудники</p></td>
    <td class="sense"><p><?php echo $myrow1['chief'] ?></p></td>
</tr>

<tr class="even">
    <td class="topic"><p>Имена</p></td>
    <td class="sense"><p><?php echo $myrow1['name'] ?></p></td>
</tr>

<tr class="odd">
    <td class="topic"><p>Рабочее время</p></td>
    <td class="sense"><p><?php echo $myrow1['working'] ?></p></td>
</tr>

<tr class="even">
    <td class="topic"><p>Услуги</p></td>
    <td class="sense"><?php echo $myrow1['services'] ?></td>
</tr>

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
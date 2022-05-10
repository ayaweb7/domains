<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Обработчик файлов</title>
</head>

<body>
<?php
include ("lock.php"); /* Пароль в админскую часть */
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['type'])) {$type = $_POST['type'];}
if (isset($_POST['title'])) {$title = $_POST['title'];}
if (isset($_POST['link'])) {$link = $_POST['link'];}
if (isset($_POST['download'])) {$download = $_POST['download'];}
if (isset($_POST['summary'])) {$summary = $_POST['summary'];}
if (isset($_POST['text'])) {$text = $_POST['text'];}


include ("blocks/date_base.php"); /* Соединяемся с базой данных */
mysql_query('SET NAMES utf8');
if (empty($_FILES["fupload"]["tmp_name"])) {
    exit ("<script language=javascript>alert('МЫ ЗАБЫЛИ ПРИКРЕПИТЬ ТЕКСТОВЫЙ ФАЙЛ');</script>");
}
else {
$result1 = mysql_query("INSERT INTO form (id,type,title,link,download,summary,text) VALUES ('$id','$type','$title','$link','$download','$summary','$text')");
if ($result1 == 'true')
{
echo ("<script language=javascript>alert('Введена новая страница');</script>");
}
else
{
exit ("<script language=javascript>alert('У нас проблемы ! ! !');</script>");
}



$result = mysql_query("SELECT * FROM form ORDER BY id DESC LIMIT 1",$db);
$myrow = mysql_fetch_array($result);

// Скрипт для загрузки файла документа для последующего скачивания
if($_FILES["fupload"]["size"] > 1024*3*1024)
   {
     echo ("Размер файла превышает три мегабайта");
     exit;
   }
if(!empty($_FILES["fupload"]["tmp_name"])) //,
//     "c:/temp/".$_FILES["filename"]["name"]))
//     "../files/".$_FILES["filename"]["name"]))
   {

$item=$myrow[id]+1;
$path="../files/";
$filename= "document" . $item. ".doc";
$size=$_FILES["fupload"]["size"];
$type=$_FILES["fupload"]["type"];
$source=$_FILES["fupload"]["tmp_name"];
$target=$path . $filename;
copy($source, $target);
    
     echo "ФАЙЛ УСПЕШНО ЗАГРУЖЕН <br /><br />";
     echo "Характеристики файла: <br />";
     echo "Имя файла: " . $filename;
     echo "<br />Размер файла: " . $size . " байт";
     echo "<br />Каталог для загрузки: " . $target;
     echo "<br />Тип файла: " . $type;
} else {
   echo ("<script language=javascript>alert('Ошибка загрузки файла');</script>");
   }
}

?>
<p><a href="index_adm.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>
<p><a href="files_insert.php" title="Назад на загрузку файла">Назад <em>на загрузку файла</em></a></p>

</body>
</html>
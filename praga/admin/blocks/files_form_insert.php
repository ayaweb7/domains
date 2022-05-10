<div>

<form name='form' action='mysql_files_insert.php' method='post' enctype="multipart/form-data">

<p><label>Введите тип документа (type) <br />
<select name='type' size='1' >                                
  <option>Арбитраж</option>
  <option>Брачно-семейные дела</option>
  <option>Взыскание долга</option>
  <option>Возмещение морального вреда</option>
  <option>Дела о ДТП</option>
  <option>Жилищные споры</option>
  <option>Защита прав потребителей</option>
  <option>Земельные споры</option>
  <option>Наследственные дела</option>
  <option>Сделки с недвижимостью</option>
  <option>Трудовые споры</option>
  <option>Юридические факты</option>
</select></label></p>

<p><label>Введите наименование документа - title <br />
<input type="text" name="title" id="title" size="100" value="" />
</label></p>
<?php 
include ("blocks/date_base.php"); /* Соединяемся с базой данных */
//mysql_query('SET NAMES utf8');

$result = mysql_query("SELECT * FROM form ORDER BY id DESC LIMIT 1",$db);
$myrow = mysql_fetch_array($result);

$item=$myrow[id]+1;
?>
<p><label>Ссылка для загрузки - link <br />
<input type="text" name="link" id="link" size="100" value="files/document<?php echo $item ?>.doc" />
</label></p>

<p><label>Файл для закачки - download <br />
<input type="text" name="download" id="download" size="100" value="files/document<?php echo $item ?>.doc" />
</label></p>

<p><label>Выберите файл, который нужно загрузить на сервер - filename <br />
<input type="file" name="fupload" id="fupload" size="90" value="" />
</label></p>

<p><label>Краткое содержание документа - summary <br />
<textarea name="summary" id="summary" cols="100" rows="4">

</textarea>
</label></p>

<p><label>Введите полный текст документа - text<br />
<textarea name="text" id="text" cols="100" rows="15"></textarea>
</label></p>


<p><label>
<input type="submit" name="submit" id="submit" value="Загрузить файл на сервер" />
</label></p>

</form>

</div>

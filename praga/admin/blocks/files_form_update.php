<div>
<?php
if (isset($_POST['id'])){$id = $_POST['id'];	}
if (!isset($id))
{
$result = mysql_query("SELECT id,title FROM form", $db);
$myrow = mysql_fetch_array($result);

do {
 printf ("<form name='form' action='files_update.php' method='post'>
 <input type='submit' name='id' size='3' value='%s' /> %s</form>", $myrow["id"],$myrow["title"]);
}
while ($myrow = mysql_fetch_array($result));
}

else
{
$result = mysql_query("SELECT * FROM form WHERE id='$id'", $db);
$myrow = mysql_fetch_array($result);

print <<<HERE
<form name='form1' action='mysql_files_update.php' method='post'>

<p><label>Введите тип документа - type <br />
<input type="text" name="type" id="type" size="100" value="$myrow[type]" />
</label></p>

<p><label>Введите наименование документа - title <br />
<input type="text" name="title" id="title" size="100" value="$myrow[title]" />
</label></p>


<p><label>Ссылка для загрузки - link <br />
<input type="text" name="link" id="link" size="100" value="$myrow[link]" />
</label></p>

<p><label>Файл для закачки - download <br />
<input type="text" name="download" id="download" size="100" value="$myrow[download]" />
</label></p>

<p><label>Краткое содержание документа - summary <br />
<textarea name="summary" id="summary" cols="100" rows="4">
$myrow[summary]</textarea>
</label></p>

<p><label>Введите полный текст документа - text<br />
<textarea name="text" id="text" cols="100" rows="15">$myrow[text]</textarea>
</label></p>

<p><input name='id' type='hidden' value='$myrow[id]'/></p>

<p><label>
<input type="submit" name="submit" id="submit" value="Изменить документ НА САЙТЕ" />
</label></p>


</form>
<p><a href="index_adm.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>
<p><a href="files_update.php" title="Вернуться в список">Вернуться в список <em>страниц</em></a></p>
HERE;
}
?>

</div>
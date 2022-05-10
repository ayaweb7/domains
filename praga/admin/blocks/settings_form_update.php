<div>
<?php
if (isset($_POST['id'])){$id = $_POST['id'];	}
if (!isset($id))
{
$result = mysql_query("SELECT id,page,title FROM settings", $db);
$myrow = mysql_fetch_array($result);

do {
 printf ("<form name='form' action='settings_update.php' method='post'>
 <input type='text' name='id' size='2' value='%s' />
        <input type='submit' value='%s' style='margin-left:20px;'/> %s</form>", $myrow["id"],$myrow["page"],$myrow["title"]);
}
while ($myrow = mysql_fetch_array($result));
}

else
{
$result = mysql_query("SELECT * FROM settings WHERE id='$id'", $db);
$myrow = mysql_fetch_array($result);

print <<<HERE
<form name='form1' action='mysql_settings_update.php' method='post'>

<p><label>Введите название страницы - page <br />
<input type="text" name="page" id="page" size="20" value="$myrow[page]" />
</label></p>

<p><label>Заголовок - title <br />
<input type="text" name="title" id="title" size="115" value="$myrow[title]" />
</label></p>

<p><label>Введите краткое описание страницы description для поисковых систем - meta_d <br />
<textarea name="meta_d" id="meta_d" cols="100" rows="2">$myrow[meta_d]</textarea>
</label></p>

<p><label>Введите ключевые слова для поиска - meta_k <br />
<textarea name="meta_k" id="meta_k" cols="100" rows="2">$myrow[meta_k]</textarea>
</label></p>

<p><label>Введите заголовок - h1 - для страницы<br />
<input type="text" name="h1" id="h1" size="115" value="$myrow[h1]" />
</label></p>

<p><label>Введите заголовок - h2 - для страницы<br />
<input type="text" name="h2" id="h2" size="115" value="$myrow[h2]" />

</label></p>

<p><label>Введите дату - date <br />
<input type="text" name="date" id="date" size="20" value="$myrow[date]" />
</label></p>

<p><label>Введите месяц - month в формате<br />
<input type="text" name="month" id="month" size="20" value="$myrow[month]" />
</label></p>

<p><label>Введите полный текст страницы - text<br />
<textarea name="text" id="text" cols="100" rows="5">$myrow[text]</textarea>
</label></p>

<p><input name='id' type='hidden' value='$myrow[id]'/></p>

<p><label>
<input type="submit" name="submit" id="submit" value="Обновить базу страниц" />
</label></p>

</form>
<p><a href="index_adm.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>
<p><a href="settings_update.php" title="Вернуться в список">Вернуться в список <em>страниц</em></a></p>
HERE;
}
?>

</div>
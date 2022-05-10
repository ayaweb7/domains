<div>
<?php
if (isset($_POST['id'])){$id = $_POST['id'];	}
if (!isset($id))
{
$result = mysql_query("SELECT id,ads,phone,price FROM ads ORDER BY id", $db);
$myrow = mysql_fetch_array($result);

do {
 printf ("<form name='form' action='ads_update.php' method='post'>
 <input type='text' name='id' size='3' value='%s' />
        <input type='submit' value='%s' style='margin-left:20px;'/> %s, %s</form>", $myrow["id"],$myrow["phone"],$myrow["ads"],$myrow["price"]);
}
while ($myrow = mysql_fetch_array($result));
}

else
{
$result = mysql_query("SELECT * FROM ads WHERE id='$id'", $db);
$myrow = mysql_fetch_array($result);

print <<<HERE
<form name='form1' action='mysql_ads_update.php' method='post'>

<p><label>Вид сделки (trade) <br />
<input type="text" name="trade" id="trade" size="20" value="$myrow[trade]" />
</label></p>

<p><label>Ввод текста объявления (ads) <br />
<textarea name="ads" id="ads" cols="100" rows="2">$myrow[ads]</textarea>
</label></p>

<p><label>Цена (price)<br />
<input type="text" name="price" id="price" size="50" value="$myrow[price]" />
</label></p>

<p><label>Контактное лицо - продавец или посредник (name) <br />
<input type="text" name="name" id="name" size="50" value="$myrow[name]" />

</label></p>

<p><label>Телефон продавца или посредника (phone) <br />
<input type="text" name="phone" id="phone" size="50" value="$myrow[phone]" />
</label></p>

<p><label>Источник публикации - газета (paper) <br />
<input type="text" name="paper" id="paper" size="50" value="$myrow[paper]" />
</label></p>

<p><label>Дата публикации (date) <br />
<input type="text" name="date" id="date" size="50" value="$myrow[date]" />
</label></p>

<p><input name='id' type='hidden' value='$myrow[id]'/></p>

<p><label>
<input type="submit" name="submit" id="submit" value="Обновить базу страниц" />
</label></p>

</form>
<p><a href="index_adm.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>
<p><a href="ads_update.php" title="Вернуться в список">Вернуться в список <em>частных объявлений</em></a></p>
HERE;
}
?>

</div>
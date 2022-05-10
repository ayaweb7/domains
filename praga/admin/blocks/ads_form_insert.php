<div>

<form name='form' action='mysql_ads_insert.php' method='post'>

<p><label>Вид сделки (trade) <br />
<select name='trade' size='1' >                                
  <option>Продаётся</option>
  <option>Куплю</option>
  <option>Меняю</option>
  <option>Сдаётся</option>
  <option>Сниму</option>
  <option>Ещё вариант</option>
  <option></option>
</select></label></p>

<p><label>Ввод текста объявления (ads) <br />
<textarea name="ads" id="ads" cols="100" rows="4">
1- 1,5- 2-х 3-х 4-х комнатная квартира
</textarea></label></p>

<p><label>Цена (price)<br />
<input type="text" name="price" id="price" size="70" value="2000 тыс.руб." />
</label></p>

<p><label>Контактное лицо - продавец или посредник (name) <br />
<input type="text" name="name" id="name" size="50" value="" />
</label></p>

<p><label>Телефон продавца или посредника (phone) <br />
<input type="text" name="phone" id="phone" size="50" value="8-818-50-" />
</label></p>

<p><label>Источник публикации - газета (paper) <br />
<select name='paper' size='1' >                                
  <option>Инфо-Проспект</option>
  <option>Юг Севера</option>
  <option>Ещё вариант</option>
  <option></option>
</select></label></p>

<p><label>Дата публикации (date) <br />
<input type="text" name="date" id="date" size="10" value="2013-11-08" />
</label></p>

<p><label>
<input type="submit" name="submit" id="submit" value="Новое объявление" />
</label></p>

</form>

</div>

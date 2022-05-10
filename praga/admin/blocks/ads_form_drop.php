<div>

<?php
if (isset($_POST['id'])){$id = $_POST['id'];	}
if (!isset($id))
{	 
    $result = mysql_query("SELECT id,ads,phone,trade,price FROM ads ORDER BY id", $db);
    $myrow = mysql_fetch_array($result);

    

do {
 printf ("<form name='form' action='ads_drop.php' method='post'>
 <input type='text' name='id' size='3' value='%s' />
        <input type='submit' value='%s' style='margin-left:20px;'/> %s, %s</form>", $myrow["id"],$myrow["phone"],$myrow["ads"],$myrow["price"]);
}
while ($myrow = mysql_fetch_array($result));
}

else
{
$result = mysql_query("SELECT * FROM ads WHERE id=$id", $db);
$myrow = mysql_fetch_array($result);

print <<<HERE
<form name='form' action='mysql_ads_drop.php' method='post'>
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	
        <tr>
          <td valign="top" width="100%">
          
            <table width="100%" cellpadding="3">
                <tr>
                        <td valign="top" width="20%">
                          
                            <table class="adm" align="center" width="100%">
                            
                            <tr>
						      <td>№ <em>$myrow[id]</em> - продавец <em>$myrow[name],</em> телефон: <em>$myrow[phone];</em> <br />газета: <em>$myrow[paper],</em> Дата публикации: <em>$myrow[date].</em> <br /><br /> <span>$myrow[trade] $myrow[ads], $myrow[price]</span></td>
                            </tr>
                            
                            <tr><td><input name="id" type="hidden" value="$myrow[id]"/></td></tr>
                            
                        </table></td>
                        

                        </tr></table>

<input class="inputbuttonflat" type="submit" name="set_filter" value="Удалить объявление" style="margin-left:20px;"/>

<br/><br/></td></tr></table>

	</form>

<p><a href="index_adm.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>
<p><a href="ads_drop.php" title="Список объявлений">Вернуться <em> в  список</em> объявлений</a></p>
HERE;
}
?>

</div>

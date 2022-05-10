<div>

<?php
if (isset($_POST['id'])){$id = $_POST['id'];	}
if (!isset($id))
{	 
    $result = mysql_query("SELECT id,street,house,square,balcony,wall,floor,trade,price,note FROM flats_firm", $db);
    $myrow = mysql_fetch_array($result);

    

 printf ("<form name='form' action='firm_drop.php' method='post'>
<table align='center' width='100%'>
  <tr>
	<td colspan='2' valign='top'><span style='width:60px; padding-left:4px;'>ID:</span>
		<input type='text' name='id' size='5' value='' autofocus />
        <input type='submit' value='Показать данные' style='margin-left:20px;'/>
</td></tr></table></form>",$myrow["id"],$myrow["street"]);
}

else
{
$result = mysql_query("SELECT * FROM flats_firm WHERE id=$id", $db);
$myrow = mysql_fetch_array($result);

print <<<HERE
<form name='form' action='mysql_firm_drop.php' method='post'>
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	
        <tr>
          <td valign="top" width="100%">
          
            <table width="100%" cellpadding="3">
                <tr>
                        <td valign="top" width="20%">
                          
                            <table class="adm" align="center" width="100%">
                            
                            <tr>
						      <td>№ <em>$myrow[id]</em> - <em>$myrow[rooms]</em>-комнатная $myrow[type] на <span>$myrow[street], $myrow[house],</span> площадь - <em>$myrow[square]</em> кв.м., <em>$myrow[floor]-й</em> этаж, цена - <em>$myrow[price]</em> тысяч рублей - <em>$myrow[firm]</em></td>
                            </tr>
                            
                            <tr><td><input name="id" type="hidden" value="$myrow[id]"/></td></tr>
                            
                        </table></td>
                        

                        </tr></table>

<input class="inputbuttonflat" type="submit" name="set_filter" value="Удалить квартиру" style="margin-left:20px;" autofocus />

<br/><br/></td></tr></table>

	</form>

<p><a href="index_adm.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>
<p><a href="firm_drop.php" title="ID">Ввод <em>ID</em></a></p>
HERE;
}
?>

</div>

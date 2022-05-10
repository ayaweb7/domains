<div>

<?php
if (isset($_POST['id'])){$id = $_POST['id'];	}
if (!isset($id))
{	 
    $result = mysql_query("SELECT id,street,house FROM houses ORDER BY street, house", $db);
    $myrow = mysql_fetch_array($result);

    

do {
 printf ("<form name='form' action='house_drop.php' method='post'>
 <input type='text' name='id' size='3' value='%s' />
        <input type='submit' value='%s, %s' style='margin-left:20px;'/></form>", $myrow["id"],$myrow["street"],$myrow["house"]);
}
while ($myrow = mysql_fetch_array($result));
}

else
{
$result = mysql_query("SELECT * FROM houses WHERE id=$id", $db);
$myrow = mysql_fetch_array($result);

print <<<HERE
<form name='form' action='mysql_house_drop.php' method='post'>
	<table cellspacing="0" cellpadding="1" width="100%" class="tableborder">
    	
        <tr>
          <td valign="top" width="100%">
          
            <table width="100%" cellpadding="3">
                <tr>
                        <td valign="top" width="20%">
                          
                            <table align="center" width="100%">
                            
                            <tr>
						      <td>№ $myrow[id] - на $myrow[street], $myrow[house] ( $myrow[orientation] )</td>
                            </tr>
                            
                            <tr><td><input name="id" type="hidden" value="$myrow[id]"/></td></tr>
                            
                        </table></td>
                        

                        </tr></table>

<input class="inputbuttonflat" type="submit" name="set_filter" value="Удалить дом" style="margin-left:20px;"/>

<br/><br/></td></tr></table>

	</form>

<p><a href="index_adm.php" title="Вернуться в блок администратора">Вернуться в блок <em>администратора</em></a></p>
<p><a href="house_drop.php" title="ID">Вернуться <em> в  список</em></a></p>
HERE;
}
?>

</div>

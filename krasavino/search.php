<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='search'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_admin.php");
		
if (isset($_GET['townSelected'])) {
	$townSelected = $_GET['townSelected'];
	$where = "WHERE town='$townSelected'";
} else {
	$where = "";
}
?>
<!---->

<form name="form" action="mysql_search.php" method="post"><!-- onSubmit="return validateSearch(this)"-->

<!--divBig-->
<div id='divBig' class='flexBig'><!--divBig - #ccc-->
	<div id='divTop' class='flexTitle'><!--divTop -  style='background-color: lightgreen;'-->
		<?php echo $myrow1['h1'] . " " . $myrow1['h2'] ?>
	</div><!--divTop-->

<!--divLarge-->	
	<div id='divLarge' class='flexTitle'><!--divLarge - style='background-color: navy;' -->

<!--divMiddle_1-->
		<div id='divMiddle' class='flexMiddle'><!--divMiddle_1 - style='background-color: brown;' -->

<!--divTown-->			
			<div id='divTown' class='flexSmall'><!--divTown - style='background-color: olive;' -->
			
				<div id='town_select' class='blockInput'><!---->
					<span id='town_hidden'>Выбран город: <em style='color: red;'> <?php echo $townSelected; ?></em></span>
					<select id='town' name='town' size='1' onchange='selectTown();'><!---->
						<option selected></option>

<?php

		$result2 = mysqli_query($db, "SELECT * FROM locality ORDER BY town");
		$myrow2 = mysqli_fetch_array($result2);
		$town='';
										
		do {
			if ($myrow2['town'] != $town) {	
				
				printf  ("<option value='%s'>%s</option>",$myrow2['town'], $myrow2['town']);
				$town = $myrow2['town'];
			}
		}
			while ($myrow2 = mysqli_fetch_array($result2));
			

?>
					</select>

				</div>
				<div class='blockInput'>
					<span>Критерии поиска</span><!---->
					<div class='blockButton'>
<!--						<input type='radio' id='searchShop' onClick="showTwoBlocks('divShop', 'town_hidden', 'town_show')" />-->
<!--						<label for='searchShop'>Выбор магазина</label>-->
						
						<input type='radio' id='townEquals' name='town_operator' value='=' checked /><!-- onClick="hiddenBlock('divShop')"-->
						<label for='townEquals'>Равно</label>
						
						<input type='radio' id='townNotEquals' name='town_operator' value='!=' />
						<label for='townNotEquals'>НЕ равно</label>
					</div>
				</div>
			</div><!--divTown-->

<!--divShop-->
<?php?>
			<div id='divShop' class='flexSmall'><!--divShop - style='background-color: purple;' -->
				<div class='blockInput'>
					<input type='hidden' name='townSelected' value="<?php echo $townSelected ?>" />
					<span>Магазины в городе <em style='color: red;'><?php echo $townSelected; ?></em></span>
					<select name='shop' size='1'><!---->
						<option></option>
<?php	

		$result3 = mysqli_query($db, "SELECT * FROM store $where ORDER BY shop");
		$myrow3 = mysqli_fetch_array($result3);
		$shop='';
										
		do {
			
			if ($myrow3['shop'] != $shop) {	
				
				printf  ("<option>%s</option>", $myrow3['shop']);
				$shop = $myrow3['shop'];
			}
		}
			while ($myrow3 = mysqli_fetch_array($result3));
?>
					</select>
				</div>
				<div class='blockInput'>
					<span>Критерии поиска</span><!---->
					<div class='blockButton'>
						<input type='radio' id='shopEquals' name='shop_operator' value='=' checked />
						<label for='shopEquals'>Равно</label>
						
						<input type='radio' id='shopNotEquals' name='shop_operator' value='!=' />
						<label for='shopNotEquals'>НЕ равно</label>
					</div>
				</div>
			</div><!--divShop-->

<!--divData-->
			<div id='divData' class='flexSmall'><!--divData - style='background-color: aqua;' -->
				<div class='blockInput'>
					<span>Дата покупки (ОТ)</span>
					<input type='date' name='date' style="color: red;" value=''>
				</div>
				<div id='date_hidden' class='blockInput'><!-- class='blockInput hidden'-->
					<span>Дата покупки (ДО)</span>
					<input type='date' name='date_to' style="color: blue;">
<!--					<input type="text" name="date_to" style="color: blue;" size="10" value="2020.12.30" />-->
				</div>
				<div class='blockInput'>
					<span>Критерии поиска</span><!--divData - aqua-->
					<div class='blockButton'>
						<input type='radio' id='dateEquals' name='date_operator' value='=' onClick="hiddenBlock('date_hidden')" checked />
						<label for='dateEquals' style="float: left;">Равно</label>
						
						<input type='radio' id='dateNotEquals' name='date_operator' value='!=' onClick="hiddenBlock('date_hidden')" />
						<label for='dateNotEquals' style="float: left;">НЕ равно</label>
					
						<input type="radio" id="dateBetween" name="date_operator" value="BETWEEN" onClick="showBlock('date_hidden')" />
						<label for="dateBetween" style="float: left;">Между</label><!--showDiv('hidden')-->
					</div>
				</div>
			</div><!--divData-->

<!--divCategory-->			
			<div id='divCategory' class='flexSmall'><!--divCategory - style='background-color: lime;' -->
				<div class='blockInput'>
					<span>Категории</span>
					<select name='gruppa' size='1'>
						<option></option>
<?php	
		$result = mysqli_query($db, "SELECT * FROM shops ORDER BY gruppa");
		$myrow = mysqli_fetch_array($result);
		$gruppa=' ';
		do {
			if ($myrow['gruppa'] != $gruppa) {	
							
				printf  ("	<option>%s</option>",$myrow['gruppa']);
				$gruppa = $myrow['gruppa'];
			}
		}
			while ($myrow = mysqli_fetch_array($result));
?>
					</select>
				</div>
				<div class='blockInput'>
					<span>Критерии поиска</span><!---->
					<div class='blockButton'>
						<input type='radio' id='gruppaEquals' name='gruppa_operator' value='=' checked />
						<label for='gruppaEquals'>Равно</label>
						
						<input type='radio' id='gruppaNotEquals' name='gruppa_operator' value='!=' />
						<label for='gruppaNotEquals'>НЕ равно</label>
					</div>
				</div>
			</div><!--divCategory-->
		</div><!--divMiddle_1-->

<!--divMiddle_2-->		
		<div id='divMiddle' class='flexMiddle'><!--divMiddle_2 - style='background-color: #f1919f;' -->

<!--divName-->
			<div id='divName' class='flexSmall'><!--divName - style='background-color: red;' -->
				<div class='blockInput'>
					<span>Наименование</span>
					<select name='name' size='1'><!---->
						<option></option>
<?php	
		$result4 = mysqli_query($db, "SELECT * FROM shops ORDER BY name");
		$myrow4 = mysqli_fetch_array($result4);
		$name='';
										
		do {
			if ($myrow4['name'] != $name) {	
				
				printf  ("<option>%s</option>", $myrow4['name']);
				$name = $myrow4['name'];
			}
		}
			while ($myrow4 = mysqli_fetch_array($result4));
?>
					</select>
				</div>
				<div class='blockInput'>
					<span>Критерии поиска</span><!---->
					<div class='blockButton'>
						<input type='radio' id='nameEquals' name='name_operator' value='=' checked />
						<label for='nameEquals'>Равно</label>
						
						<input type='radio' id='nameNotEquals' name='name_operator' value='!=' />
						<label for='nameNotEquals'>НЕ равно</label>
					</div>
				</div>
			</div><!--divName-->

<!--divCharacteristic-->
			<div id='divCharacteristic' class='flexSmall'><!--divCharacteristic - style='background-color: blue;' -->
				<div class='blockInput'>
					<span>Описание товара</span>
					<input type="text" name="characteristic" size="40" value=""/>
				</div>
			</div><!--divCharacteristic-->

<!--divPrice-->
			<div id='divPrice' class='flexSmall'><!--divPrice - style='background-color: green;' -->
				<div class='blockInput'>
					<span>Цена (ОТ)</span>
					<input type="text" name="price" size="7" value="" />
				</div>
				<div id='price_hidden' class='blockInput'><!---->
					<span>Цена (ДО)</span>
					<input type='text' name='price_to' size="7" value="" / >
<!--					<input type="text" name="date_to" style="color: blue;" size="10" value="2020.12.30" />-->
				</div>
				<div class='blockInput'>
					<span>Критерии поиска</span><!---->
					<div class='blockButton'>
						<input type='radio' id='priceEquals' name='price_operator' value='=' onclick="hiddenBlock('price_hidden')" checked />
						<label for='priceEquals'>Равно</label>
						
						<input type='radio' id='priceNotEquals' name='price_operator' value='!=' onclick="hiddenBlock('price_hidden')" />
						<label for='priceNotEquals'>НЕ равно</label>
						
						<input type='radio' id='priceMore' name='price_operator' value='>=' onclick="hiddenBlock('price_hidden')" />
						<label for='priceMore'>>=</label>
						
						<input type='radio' id='priceLess' name='price_operator' value='<=' onclick="hiddenBlock('price_hidden')" />
						<label for='priceLess'><=</label>
						
						<input type='radio' id='priceBetween' name='price_operator' value='BETWEEN' onclick="showBlock('price_hidden')" />
						<label for='priceBetween'>Между</label>
					</div>
				</div>
			</div><!--divPrice-->

<!--divNone-->
<!--d			<div id='divNone' class='flexSmall'>ivNone - style='background-color: yellow;' -->
<!--			</div>divNone-->
		</div><!--divMiddle-->
	</div><!--divLarge-->

<!--divBottom'-->	
	<div id='divBottom' class='flexTitle'><!-- style='background-color: #f9910f;'-->
		<input class='inputSubmit' type='submit' name='set_filter' value='ВЫБОРКА' />
		<input class='inputSubmit' type="reset" name="set_filter" value="сброс"/>
	</div><!--divBottom'-->

</div><!--divBig-->
</form>

<?php
//if (isset($_GET['townSelected'])) {$townSelected = $_GET['townSelected']; echo $townSelected;}
//else {echo 'BAD';}

// Подключаем FOOTER_SEARCH
include ("blocks/footer_search.php");

//SELECT * FROM 'store' WHERE town='Вологда' ORDER BY shop;
?>
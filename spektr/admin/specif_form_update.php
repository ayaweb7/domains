<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'pages' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM pages WHERE page='specif_form_update'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_adm.php");
//echo "good = " . $good ;
?>

<!-- Начало кода INDEX -->
<div id="info">
	<h1><?php echo $myrow1['h1'] ?></h1>
	<?php printf ("<h2>%s</h2>", $myrow1['h2']); ?>


<?php
if (isset($_GET['id'])) {$id=$_GET['id'];}

if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['depth'])) {$depth = $_POST['depth'];}
if (isset($_POST['width'])) {$width = $_POST['width'];}
if (isset($_POST['lenght_mat'])) {$lenght_mat = $_POST['lenght_mat'];}
if (isset($_POST['lenght'])) {$lenght = $_POST['lenght'];}
if (isset($_POST['carbonat'])) {$carbonat = $_POST['carbonat'];}
if (isset($_POST['fund_100'])) {$fund_100 = $_POST['fund_100'];}
if (isset($_POST['fund_150'])) {$fund_150 = $_POST['fund_150'];}
if (isset($_POST['sborka'])) {$sborka = $_POST['sborka'];}
if (isset($_POST['price'])) {$price = $_POST['price'];}
if (isset($_POST['material'])) {$material = $_POST['material'];}
if (isset($_POST['list'])) {$list = $_POST['list'];}
if (isset($_POST['item'])) {$item = $_POST['item'];}
$id = (int) $id;


$result = mysqli_query($db, "SELECT * FROM specif WHERE id='$id'");
$myrow = mysqli_fetch_array($result);
?>

<h1 class="comment">
	Вы собираетесь внести изменения в товар:<br> <span><?php echo $myrow['name'] . ' - ' . $myrow['depth'] . ' * ' . $myrow['width'] . ' - ' . $myrow['material'] ?></span>
</h1>
<form name='form' action='mysql_specif_update.php' method='post'>

<!-- NAME & GABARITE -->
	<div class='flexSmall'>

<!-- Характеристики для пиломатериалов -->
		<div class='blockInput'>
			<div>Цифровые параметры - для товаров</div>
			
			<div>
				<label>Габариты - длина<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
					<input type="text" name="lenght_mat" id="lenght_mat" size="10" value="<?php echo $myrow['lenght_mat'] ?>" />
				</label>
			</div>
			<div>
				<label>Габариты - толщина <em>*</em><br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
					<input type="text" name="depth" id="depth" size="10" value="<?php echo $myrow['depth'] ?>" />
				</label>
			</div>
			<div>
				<label>Габариты - ширина <em>*</em><br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
					<input type="text" name="width" id="width" size="10" value="<?php echo $myrow['width'] ?>" />
				</label>
			</div>
			<div>
				<label>Единица измерения<br>
					<select name='item' size='5'>
						<option>шт.</option>
						<option>кг.</option>
						<option selected>пог.м.</option>
						<option>кв.м.</option>
						<option>куб.м.</option>
					</select>
				</label>
			</div>
		</div>

<!-- Характеристики для теплиц -->
		<div class='blockInput'>
			<div>Характеристики теплиц</div>
			
			<div>
				<label>Габариты - длина<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
					<input type="text" name="lenght" id="lenght" size="10" value="<?php echo $myrow['lenght'] ?>" />
				</label>
			</div>
			<div>
				<label>Поликарбонат<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
					<input type="text" name="carbonat" id="carbonat" size="10" value="<?php echo $myrow['carbonat'] ?>" />
				</label>
			</div>
			<div>
				<label>Фундамент_100<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
					<input type="text" name="fund_100" id="fund_100" size="10" value="<?php echo $myrow['fund_100'] ?>" />
				</label>
			</div>
			
			<div>
				<label>Фундамент_150<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
					<input type="text" name="fund_150" id="fund_150" size="10" value="<?php echo $myrow['fund_150'] ?>" />
				</label>
			</div>
			<div>
				<label>Сборка<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
					<input type="text" name="sborka" id="sborka" size="10" value="<?php echo $myrow['sborka'] ?>" />
				</label>
			</div>
		</div>

		
<!-- Характеристики для услуг (срубы, заборы) -->		
		<div class='blockInput'>
			<div>Словесные характеристики - для услуг</div>
			
			<div>
				<label>Описание материала <em>*</em><br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
					<input type="text" name="material" id="material" size="40" value="<?php echo $myrow['material'] ?>" />
				</label>
			</div>
			<div>
				<label>Перечень услуг <em>*</em><br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
					<textarea name="list" id="list" cols="40" rows="4"><?php echo $myrow['list'] ?></textarea>
				</label>
			</div>
			<div>
				<label>ЦЕНА <em>*</em><br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
					<input type="text" name="price" id="price" size="10" value="<?php echo $myrow['price'] ?>" />
				</label>
			</div>			
		</div>
	</div>
<!-- SUBMIT -->
	<div class='flexSmall'>
		<input class='inputSubmit' type="submit" name="submit" id="submit" value="Занести в базу" />
		<input class='inputReset' type="reset" name="set_filter" value="Сброс" />
	</div>

<!--HIDDEN-->
	<input type="hidden" name="date" value="<?php echo (new DateTime())->format('Y-m-d'); ?>"></input>
	<input name="id" type="hidden" value="<?php echo $myrow['id'] ?>"/>
	<input name="name" type="hidden" value="<?php echo $myrow['name'] ?>"/>
</form>

<!-- Подключаем FOOTER -->
		<?php include ("blocks/footer_adm.php"); ?>
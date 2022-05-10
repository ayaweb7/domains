<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'pages' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM pages WHERE page='page_form_update'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_adm.php");
?>

<!-- Начало кода INDEX -->
<div id="info">
	<h1><?php echo $myrow1['h1'] ?></h1>
	<?php printf ("<h2>%s</h2>", $myrow1['h2']); ?>


<?php
if (isset($_GET['name'])) {$name=$_GET['name'];}

if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['page'])) {$page = $_POST['page'];}
if (isset($_POST['title'])) {$title = $_POST['title'];}
if (isset($_POST['offer'])) {$offer = $_POST['offer'];}
if (isset($_POST['extra'])) {$extra = $_POST['extra'];}
if (isset($_POST['h1'])) {$h1 = $_POST['h1'];}
if (isset($_POST['h2'])) {$h2 = $_POST['h2'];}
if (isset($_POST['keywords'])) {$keywords = $_POST['keywords'];}
if (isset($_POST['description'])) {$description = $_POST['description'];}
if (isset($_POST['word'])) {$word = $_POST['word'];}
if (isset($_POST['photo_alt'])) {$photo_alt = $_POST['photo_alt'];}
if (isset($_POST['photo_name'])) {$photo_name = $_POST['photo_name'];}

$result = mysqli_query($db, "SELECT * FROM pages WHERE name='$name'");
$myrow = mysqli_fetch_array($result);
?>

<h1 class="comment">
	Вы собираетесь внести изменения на странице: <span><?php echo $myrow['page'] ?></span> <br><span>"<?php echo $myrow['name'] ?>"</span>
</h1>
<form name='form' action='mysql_page_update.php' method='post'>

<!-- MARKER & MENU
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Маркер категории страницы - marker <em>*</em><br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
				<label><input type="radio" name="marker" value="index">Начальный</label><br>
				<label><input type="radio" name="marker" value="page">Меню</label><br>
				<label><input type="radio" name="marker" value="service" checked="checked">Служебный</label><br>
				<label><input type="radio" name="marker" value="site">Сайт</label>
			</label>
		</div>
		<div class='blockInput'>
			<label>Пункты меню - menu<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
				<input type="text" name="menu" id="menu" size="50" value="<?php echo $myrow['menu'] ?>" />
			</label>
		</div>
	</div>
 -->

<!-- TITLE & OFFER -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Основное предложение - offer<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
				<input type="text" name="offer" id="offer" size="70" value="<?php echo $myrow['offer'] ?>" />
			</label>
		</div>
		<div class='blockInput'>
			<label>Заголовок страницы на ярлыке - title <em>*</em><br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
				<input type="text" name="title" id="title" size="70" value="<?php echo $myrow['title'] ?>" />
			</label>
		</div>
	</div>

<!-- EXTRA -->
	<div class='flexSmall'>
		<label>Дополнительное предложение к офферу - extra<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
			<textarea name="extra" id="extra" cols="100" rows="2"><?php echo $myrow['extra'] ?></textarea>
		</label>
	</div>

	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Краткое описание страницы для поисковых систем - description<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
				<textarea name="description" id="description" cols="70" rows="5"><?php echo $myrow['description'] ?></textarea>
			</label>
		</div>

		<div class='blockInput'>
			<label>Ключевые слова для поиска - keywords<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
				<textarea name="keywords" id="keywords" cols="70" rows="5"><?php echo $myrow['keywords'] ?></textarea>
			</label>
		</div>
	</div>

<!-- H1 --- H2  -->
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Основной заголовок на странице - h1<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
				<input type="text" name="h1" id="h1" size="70" value="<?php echo $myrow['h1'] ?>" />
			</label>
		</div>

		<div class='blockInput'>
			<label>Подзаголовок на странице - h2<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
				<input type="text" name="h2" id="h2" size="70" value="<?php echo $myrow['h2'] ?>" />
			</label>
		</div>
	</div>


	<div class='flexSmall'>
		<label>Текст на странице - word<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
			<textarea name="word" id="word" cols="100" rows="5"><?php echo $myrow['word'] ?></textarea>
		</label>
	</div>

<!-- PHOTO -->			
	<div class='flexSmall'>
		<div class='blockInput'>
			<label>Подпись под фотографией - photo_alt<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
				<input type="text" name="photo_alt" id="photo_alt" size="50" value="<?php echo $myrow['photo_alt'] ?>" />
			</label>
		</div>
		<div class='blockInput'>
			<label>Имя файла с фотографией - photo_name<br><span style="font-size: 1em; font-style: italic;">изменить на</span><br>
				<input type="text" name="photo_name" id="photo_name" size="50" value="<?php echo $myrow['photo_name'] ?>" />
			</label>
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
	<input name="page" type="hidden" value="<?php echo $myrow['page'] ?>"/>
</form>

<!-- Подключаем FOOTER -->
		<?php include ("blocks/footer_adm.php"); ?>
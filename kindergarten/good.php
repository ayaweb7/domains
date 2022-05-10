<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';
session_start();

// Выборка из таблицы 'pages' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM pages WHERE page='good'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header.php");

// Выборка из таблицы 'goods' всех характеристик товара '$good'
$result2 = mysqli_query($db, "SELECT * FROM goods WHERE good='$good'");
$myrow2 = mysqli_fetch_array($result2);
$_SESSION['keywords'] = $myrow2['keywords'];
$_SESSION['description'] = $myrow2['description'];
?>



<div class="container">
	<div class="flex-nowrap justify-content-between align-items-center"><!--row flex-nowrap justify-content-between align-items-center-->
		<div class="text-center container px-4 my-4"><!---->
			
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class='breadcrumb-item'><a href='index.php'>Главная</a></li>
					<!--<li class="breadcrumb-item"><a href="catalog.php">Каталог</a></li>-->
					<li class="breadcrumb-item"><a href="<?php echo 'category.php?category=' . $myrow2['category']; ?>"><?php echo $myrow2['category'] ?></a></li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo $myrow2['good'] ?></li>
				</ol>
			</nav>
			<h1 class="blog-header-logo pb-2 border-bottom text-center test-custom col-md-12" href="#"><?php echo $good; ?></h1>
		</div><!--container-->

<!--goods-->
		<div class="row g-5">
			<div class="col-md-8">
				<div class="col-md-6 col-sm-6 leftimg">
					<a href="<?php echo 'img/origin/' . $myrow2['photo'] . '.jpg'; ?>" title='Оригинал фото' target='_blank'>
						<img class='d-block mx-lg-auto img-fluid img-thumbnail' src="<?php echo 'img/objects/' . $myrow2['photo'] . '.jpg'; ?>" alt='<?php echo $myrow2['good']; ?>' width='264' height='191'>
					</a>
				</div><!--col-md-6-->
				<p>
					<p><strong><?php echo $myrow2['title_g1'] ?></strong> <?php echo $myrow2['g1']; ?></p>
					<p><strong><?php echo $myrow2['title_g2'] ?></strong> <?php echo $myrow2['g2']; ?></p>
					<p><strong><?php echo $myrow2['title_g3'] ?></strong> <?php echo $myrow2['g3']; ?></p>
					<p class="color-price pb-3"><strong><?php echo $myrow2['title_price'] ?></strong> <?php echo $myrow2['price'] . " " . $myrow2['item']; ?></p>
					<p><?php echo $myrow2['good']; ?> продаётся оптом и в розницу в магазине "Спектр" по адресу:<br><strong class="fst-italic"> Архангельская область, г.Коряжма, ул.Советская, д.17 (цокольный этаж со стороны ул.Архангельской).</strong></p>
					<p><?php echo $myrow2['p1']; ?></p>
					<p><?php echo $myrow2['p2']; ?></p>
					<p><?php echo $myrow2['p3']; ?></p>
					<p>Сделать заказ прямо на нашем сайте можно нажав на кнопку <a href="#modal">"Сделать заявку"</a><br> Вы также можете оформить заказ и доставку по телефону: <a class="" href="tel:+79210752656" > +7 (921) 075-26-56</a>, нажав на кнопку <a class="" href="tel:+79210752656" >"Позвонить"</a> или <a href="#modal">"Заказать звонок"</a>.</p>
				</p>
<?php
// Подключаем кнопки обратной связи
include ("blocks/order_call_921.php");
?>			
			</div><!--col-md-8-->

<?php
// Подключаем accordion
include ("blocks/accordion.php");
?>			
		</div><!--row-->

	</div><!--flex-nowrap-->
</div><!--container-->

<?php


// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
// $result->close(); Товары внутри категорий - отсортированные по дате и лимитированные
//$result2->close(); // все характеристики товара '$good' - без сортировки и лимитов
//$result3->close(); // Категории, отсортированные по алфавиту для аккордеона
$result4->close(); // Товары внутри категории, отсортированные по алфавиту для аккордеона
$result1->close(); // Страницы - без сортировки и лимитов
$db->close(); // Закрываем базу данных

// Подключаем FOOTER
include ("blocks/footer.php");



?>
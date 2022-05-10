<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';
session_start();

// Выборка из таблицы 'pages' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM pages WHERE page='result_frame'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header.php");
?>



<div class="container">
	<div class="flex-nowrap justify-content-between align-items-center"><!--row flex-nowrap justify-content-between align-items-center-->
		<div class="text-center container px-4 my-4"><!---->
			
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class='breadcrumb-item'><a href='index.php'>Главная</a></li>
					<!--<li class="breadcrumb-item"><a href="catalog.php">Каталог</a></li>-->
					<li class="breadcrumb-item"><a href="category.php?category=Услуги">Услуги</a></li>
					<li class="breadcrumb-item active" aria-current="page">Срубы</li>
				</ol>
			</nav>
			<h1 class="blog-header-logo pb-2 border-bottom text-center test-custom col-md-12" href="#"><?php echo $good; ?></h1>
		</div><!--container-->

<?php
// Расчет характеристик сруба

if (isset($_POST['building'])) {$building = $_POST['building'];}
if (isset($_POST['material'])) {$material = $_POST['material'];}
if (isset($_POST['length'])) {$length = $_POST['length'];}
if (isset($_POST['width'])) {$width = $_POST['width'];}
if (isset($_POST['height'])) {$height = $_POST['height'];}
if (isset($_POST['partition'])) {$partition = $_POST['partition'];}

// Выборка из таблицы 'specif' всех характеристик из материала '$material'
$result6 = mysqli_query($db, "SELECT * FROM specif WHERE material='$material'");
$myrow6 = mysqli_fetch_array($result6);

if (($material == 'Строганое бревно' | $material == 'Оцилиндрованное бревно') & $building == 'дом') {
	$D = 0.26;
	$H = $D - 0.04;
	$lapa = 0.25;
	$S = pi()*pow($D/2, 2);
	$front = $lapa * 2 + $width;
	$side = $lapa * 2 + $length;
	$mess = '<h6 class="color-price">Размеры бревен:</h6>
						<p>Диаметр: <strong>' . $D .'</strong> м.</p>
						<p>Высота: <strong>'. $H .'</strong> м.</p>
						<p>Длина лапы: <strong>'. $lapa .'</strong> м.</p>';
} elseif (($material == 'Строганое бревно' | $material == 'Оцилиндрованное бревно') & $building == 'баня') {
	$D = 0.2;
	$H = $D - 0.02;
	$lapa = 0.25;
	$S = pi()*pow($D/2, 2);
	$front = $lapa * 2 + $width;
	$side = $lapa * 2 + $length;
	$mess = '<h6 class="color-price">Размеры бревен:</h6>
						<p>Диаметр: <strong>' . $D .'</strong> м.</p>
						<p>Высота: <strong>'. $H .'</strong> м.</p>
						<p>Длина лапы: <strong>'. $lapa .'</strong> м.</p>';
} else {
	$H = 0.15;
	$S = pow($H, 2);
	$front = $width;
	$side = $length;
	$mess = '<h6 class="color-price">Размеры бруса:</h6>
						<p>Толщина: <strong>' . $H .'</strong> м.</p>
						<p>Высота: <strong>'. $H .'</strong> м.</p>';
}

$weight = 540;
$price = $myrow6['price'];

$row = ceil($height / $H);
$perimeter = ($length + $width) * 2;

$length_main = ($front + $side) * 2 * $row;
$volume_main = round($length_main * $S, 2);
$length_part = $partition * $row;
$volume_part = round($length_part * $S, 2);

$length_full = $length_main + $length_part;
$volume_full = $volume_main + $volume_part;

$weight_full = ceil($weight * $volume_full);
$price_full = ceil($price * $volume_full);

if ($partition == 0) {
	$mess_part_initial = '';
	$mess_part_result = '';
} else {
	$mess_part_initial = '<p>Длина внутренних перегородок: <strong>'. $partition .'</strong> м.</p>';
	$mess_part_result = '<h6 class="color-price">Перегородки:</h6>
						<p>Длина брёвен: <strong>' . $length_part .'</strong> м.</p>
						<p>Объём: <strong>' . $volume_part .'</strong> куб.м.</p>';
}

?>

		<div id='result' class='flexBig'>
			<div id='' class='flexTitle text-center' style='text-align: center;'><h2 class=''>Расчёт материалов и стоимости деревянного сруба</h2></div><!--divTop - flexTitle -->
			<div id='' class='flexTitle'>
				<div id='' class='flexMiddle'>
					<div id='' class='flexSmall'>
						<div id='' class=''>
							<h4 class=''>Исходные данные:</h4>
							<h6 class='color-price'>Общая информация:</h6>
							<p>Строение: <strong><?php echo $building ?></strong></p>
							<p>Материал: <strong><?php echo $material ?></strong></p>
							<h6 class='color-price'>Габариты стен:</h6>
							<p>Длина стены фасада: <strong><?php echo $width ?></strong> м.</p>
							<p>Длина боковой стены: <strong><?php echo $length ?></strong> м.</p>
							<p>Высота стены сруба: <strong><?php echo $height ?></strong> м.</p>
							<?php echo $mess_part_initial ?>
							<?php echo $mess ?>
							<h6 class='color-price'>Вес и стоимость 1 куб.м.:</h6>
							<p>Вес: <strong><?php echo $weight ?></strong> кг.</p>
							<p>Стоимость: <strong><?php echo $price ?></strong> руб.</p>
						</div>
					</div><!--divTown - flexSmall-->
				</div><!--divMiddle - flexMiddle -->
				
				<div id='divMiddle' class='flexMiddle'>
					<div id='' class='flexSmall'>
						<div id='' class=''>
							<h4 class=''>Результаты:</h4>
							<h6 class='color-price'>Основной сруб:</h6>
							<p>Количество венцов: <strong><?php echo $row ?></strong> шт.</p>
							<p>Длина бревна фасада: <strong><?php echo $front ?></strong> м.</p>
							<p>Длина бревна боковой стороны: <strong><?php echo $side ?></strong> м.</p>
							<p>Периметр: <strong><?php echo $perimeter ?></strong> м.</p>
							<p>Длина брёвен: <strong><?php echo $length_main ?></strong> м.</p>
							<p>Объём: <strong><?php echo $volume_main ?></strong> куб.м.</p>
							<?php echo $mess_part_result ?>
							<h6 class='color-price'>Всего:</h6>
							<p>Общая длина брёвен: <strong><?php echo $length_full ?></strong> м.</p>
							<p>Общий объём: <strong><?php echo $volume_full ?></strong> куб.м.</p>
							<p>Вес: <strong><?php echo $weight_full ?></strong> кг.</p>
							<p>Стоимость: <strong><?php echo $price_full ?></strong> руб.</p>
						</div>
					</div><!--divTown - flexSmall-->
				</div>
			</div><!--divTop - flexTitle -->
		</div><!-- result -->
	</div><!--flex-nowrap-->
	<div class="text-center"><a onclick="javascript: history.back(); return falshe;"><button type="button" class="btn btn-primary px-4 mt-3 me-md-2 text-center">назад в онлайн калькулятор</button></a></div>
</div><!--container-->

<script>
    document.addEventListener("DOMContentLoaded", function () {
      var scrollbar = document.body.clientWidth - window.innerWidth + 'px';
      console.log(scrollbar);
      document.querySelector('[href="#openModal"]').addEventListener('click', function () {
        document.body.style.overflow = 'hidden';
        document.querySelector('#openModal').style.marginLeft = scrollbar;
      });
      document.querySelector('[href="#close"]').addEventListener('click', function () {
        document.body.style.overflow = 'visible';
        document.querySelector('#openModal').style.marginLeft = '0px';
      });
    });
</script>

<?php


// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result6->close(); // Выборка характеристик выбранного материала из спецификации

// Подключаем FOOTER
include ("blocks/footer.php");



?>
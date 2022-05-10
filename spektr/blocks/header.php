<?php
// Соединяемся с базой данных
require_once 'date_base.php';
session_start();

// Определение надписи для титула страницы и ключевых слов
if (isset($_GET['category'])) {
	$title = $_GET['category'];
	$keywords = $myrow1['keywords'];
	$description = $myrow1['description'];
	$category = $_GET['category'];
	$file = $_SESSION['file'];
		
} elseif (isset($_GET['good'])) {
	$good = $_GET['good'];
	$title = $_GET['good'];
	$keywords = $_SESSION['keywords'];
	$description = $_SESSION['description'];
	
} elseif (isset($_GET['marker'])) {
	$good = $_GET['good'];
	$title = $_GET['good'];
	$keywords = $_SESSION['keywords'];
	$description = $_SESSION['description'];
	$marker = $_GET['marker'];

} else {
	$title = $myrow1['title'];
	$keywords = $myrow1['keywords'];
	$description = $myrow1['description'];
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5VQVFCW');</script>
<!-- End Google Tag Manager -->

	<title><?php echo $title; ?></title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='keywords' content='<?php echo $keywords; ?>'>	
	<meta name='description' content='<?php echo $description; ?>'>
	<link href='css/screen.css' type='text/css' rel='stylesheet' />
	<link rel='shortcut icon' type='image/ico' href='img/favicon.ico' />

	<script src='js/jquery-3.6.0.min.js'></script>
	<script src='js/bootstrap.bundle.min.js'></script>
	<script src='https://kit.fontawesome.com/03ab4f6e6d.js' crossorigin='anonymous'></script

<!-- Yandex.Metrika counter - Спектр - спасибо -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(86501076, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/86501076" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- Yandex.Metrika counter - Спектр - спасибо -->

<!-- Yandex.Metrika counter - Спектр - активность на сайте-->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(86646610, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/86646610" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- Yandex.Metrika counter - Спектр - активность на сайте-->

</head>

<body
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5VQVFCW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!--  -->
<!-- header -->
<div id='header'  class='container'>
	<header class='nav d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom'>
		<a href='/' class='d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none'>
			<img src='img/logo.png' class='me-2' title='О нас' width='70' height='70'><!--d-block mx-lg-auto img-fluid-->
		</a>
		
		<div class='nav'>
			<ul class='topmenu col-12 col-md-auto mb-2 justify-content-center mb-md-0'><!---->
				<li><a href='/' class='nav-spektr px-2'>Главная</a></li><!--nav-spektr px-2-->
				<li>
					<a href='/#good' class='submenu-link'>Товары</a><!-- style= 'color: #6c757d;'  nav-spektr px-2-->
					<ul class='submenu'>
						<li><a href='category.php?category=Пиломатериалы' class='submenu-link'>Пиломатериалы</a>
							<ul class='submenu'>
								<li><a href='good.php?good=Брус'>Брус</a></li>
								<li><a href='good.php?good=Брусок, рейка'>Брусок, рейка</a></li>
								<li><a href='good.php?good=Вагонка'>Вагонка</a></li>
								<li><a href='good.php?good=Доска пола'>Доска пола</a></li>
								<li><a href='good.php?good=Доска строганая'>Доска строганая</a></li>
								<li><a href='good.php?good=Имитация бруса'>Имитация бруса</a></li>
								<li><a href='good.php?good=Наличник'>Наличник</a></li>
								<li><a href='good.php?good=Плинтус'>Плинтус</a></li>
								<li><a href='good.php?good=Уголок'>Уголок</a></li>
								<li><a href='good.php?good=Штакетник'>Штакетник</a></li>
							</ul>
						</li>
						<li><a href='category.php?category=Стройматериалы' class='submenu-link'>Стройматериалы</a>
							<ul class='submenu'>
								<li><a href='good.php?good=Гипсокартон'>Гипсокартон</a></li>
								<li><a href='good.php?good=Крепёж'>Крепёж</a></li>
								<li><a href='good.php?good=ОСП'>ОСП</a></li>
								<li><a href='good.php?good=Плёнка'>Плёнка</a></li>
								<li><a href='good.php?good=Рубероид'>Рубероид</a></li>
								<li><a href='good.php?good=Сетка Рабица'>Сетка Рабица</a></li>
								<li><a href='good.php?good=Стекло'>Стекло</a></li>
								<li><a href='good.php?good=Фанера'>Фанера</a></li>
							</ul>
						</li>
						<li><a href='category.php?category=Элементы лестниц' class='submenu-link'>Элементы лестниц</a>
							<ul class='submenu'>
								<li><a href='good.php?good=Балясина винтовая'>Балясина винтовая</a></li>
								<li><a href='good.php?good=Балясина плоская'>Балясина плоская</a></li>
								<li><a href='good.php?good=Колонна'>Колонна</a></li>
								<li><a href='good.php?good=Поручень'>Поручень</a></li>
								<li><a href='good.php?good=Столб винтовой'>Столб винтовой</a></li>
								<li><a href='good.php?good=Столб начальный'>Столб начальный</a></li>
								<li><a href='good.php?good=Ступень'>Ступень</a></li>
								<li><a href='good.php?good=Тетива'>Тетива</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href='/#services' class='submenu-link'>Услуги</a>
					<ul class='submenu'>
						<li><a href='service.php?good=Заборы'>Заборы</a></li>
						<li><a href='service.php?good=Кровля'>Кровля</a></li>
						<li><a href='service.php?good=Лестницы'>Лестницы</a></li>
						<li><a href='service.php?good=Резка стекла'>Резка стекла</a></li>
						<li><a href='service.php?good=Срубы'>Срубы</a></li>
						<li><a href='service.php?good=Теплицы'>Теплицы</a></li>
						<li><a href='service.php?good=Фундамент'>Фундамент</a></li>
					</ul>
				</li>
				<li><a href='/#about' class='nav-spektr px-2'>О компании</a></li>
				<li><a href='/#contact' class='nav-spektr px-2'>Контакты</a></li>
				<li><a href='admin/index.php' style='color: white;'>.</a></li>
			</ul>
		</div><!--nav-->
		
		<div class='col-md-3 text-end'>
			<a class='btn-phone' href='tel:+79210752656' ><img src='img/tel.png' width='30' height='30'/></a>
			<a class='btn-phone' href='tel:+79210752656' ><p class='phone mb-0'>+7 (921) 075-26-56</p></a>
		</div>
	</header>
</div>

<?php
// Подключаем modal_form
include ('blocks/modal.php');
?>

<!-- Кнопка Наверх страницы -->
<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
	<symbol id='arrow-up-circle-fill' viewBox='0 0 16 16'>
		<path d='M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z'/>
	</symbol>
</svg>			
<div type='button' id='top' class='top-bt'>
	<div class='text-call'>
		<a href='#header' title='Наверх страницы'><i class='fas fa-arrow-circle-up'></i></i></a>
	</div>
</div><!--<svg class='bi' width='3.5rem' height='3.5rem'><use xlink:href='#arrow-up-circle-fill'/></svg>#arrow-up-circle-fill<!---->

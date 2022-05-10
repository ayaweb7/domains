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

//список месяцев с названиями для замены
$_monthsList = array(
"1"=>"январь","2"=>"февраль","3"=>"март",
"4"=>"апрель","5"=>"май", "6"=>"июнь",
"7"=>"июль","8"=>"август","9"=>"сентябрь",
"10"=>"октябрь","11"=>"ноябрь","12"=>"декабрь");

//текущий месяц
$month = $_monthsList[date("n")];
$current_year = date('Y');
 
//echo $month;
//выведет, например, для 7 месяца "Июль"
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
					<img class='d-block mx-lg-auto img-fluid img-thumbnail' src="<?php echo 'img/objects/' . $myrow2['photo'] . '.jpg'; ?>" alt='<?php echo $myrow2['good']; ?>' width='264' height='191'>
				</div><!--col-md-6-->
				<p>
					<p><strong><?php echo $myrow2['title_g1'] ?></strong> <?php echo $myrow2['g1']; ?></p>
					<p><strong><?php echo $myrow2['title_g2'] ?></strong> <?php echo $myrow2['g2']; ?></p>
					<p><strong><?php echo $myrow2['title_g3'] ?></strong> <?php echo $myrow2['g3']; ?></p>
					<p class="color-price pb-3"><strong><?php echo $myrow2['title_price'] ?></strong> <?php echo $myrow2['price']; ?></p>
					<p>Получить консультацию по услуге Вы можете в магазине "Спектр" по адресу:<br><strong class="fst-italic"> Архангельская область, г.Коряжма, ул.Советская, д.17 (цокольный этаж со стороны ул.Архангельской).</strong></p>
					<p><?php echo $myrow2['p1']; ?></p>
					<p><?php echo $myrow2['p2']; ?></p>
					<p><?php echo $myrow2['p3']; ?></p>
					<p>Консультации доступны по телефону: <a class="" href="tel:+79115518191" > +7 (911) 551-81-91</a>, по кнопке <a class="" href="tel:+79115518191" >"Позвонить"</a><br>Вы также можете <a href="#modal">"Заказать звонок"</a> и Вам перезвонят в указанное Вами время.</p>
				</p>

<?php
// Выборка всех существующих спецификаций в каждом из товаров, отсортированных по толщине и ширине
$result3 = mysqli_query($db, "SELECT * FROM specif WHERE name='$myrow2[good]' ORDER BY material");
$myrow3 = mysqli_fetch_array($result3);

// Проверка наличия спецификаций у товара для необходимости печати таблицы
		if (!isset($myrow3['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
		else
		{
printf ("<div class='col-md-9 ms-sm-auto col-lg-12 px-md-4 absent'>
		<h2 class='pb-2 border-bottom'>Актуальные цены на %s %s</h2>
		<div class='table-responsive'>
			<table class='table table-striped table-sm text-center'>", $month, $current_year);

// Начало проверки условий для вывода информации разных товаров - СРУБЫ
			if ($myrow3['name'] == 'Срубы') {

					printf ("<thead>
					<tr class='fw-bold'>
						<th scope='col' class='text-start'>%s</th>
						<th scope='col'>%s</th>
						<th scope='col'>Стоимость за 1 %s</th>
					</tr>
				</thead>
				<tbody>", $myrow2['name_title'], $myrow2['size_title'], $myrow3['item']);
// Начало цикла печати спецификаций товара       
				do
				{
//				$cut = $myrow3['depth'] * $myrow3['width'];
//				$count = round(1000000/($cut * $myrow2['size_1']),1);
//				$price_count = round($myrow3['price']/$count);
					printf  ("<tr style='background-color:".($even?'white':'#eaeaea')."'>
								<td class='text-start'>%s</td>
								<td>%s</td>
								<td>%s руб.</td>
							</tr>
						</tbody>", $myrow3['material'], $myrow3['list'], $myrow3['price']); 
				$even=!$even;	
				}

// Окончание цикла печати товаров в категории
		while ($myrow3 = mysqli_fetch_array($result3));

printf  ("</table>
		</div><!--table-responsive-->");

// Подключаем галерею с фотографиями срубов
include ("blocks/gallery_frame.php");

// Подключаем калькулятор объёма и стоимости сруба
include ("blocks/calc_frame.php");

	printf  ("</div>");


// Продолжение проверки условий для вывода информации разных товаров - ТЕПЛИЦЫ
			} elseif ($myrow3['name'] == 'Теплицы') {

					printf ("<thead>
					<tr class='fw-bold'>
						<td style='border: 0;'></td>
						<td style='border: 0;'></td>
						<td style='border: 0;'></td>
						<td style='border: 0;' colspan='3'>Фундамент</td>
						<td style='border: 0;'></td>
						<td style='border: 0;' colspan='3'>Стоимость</td>
					</tr>
					<tr class='fw-lighter'>
						<th scope='col' class='text-start'>Длина</th>
						<th scope='col'>Каркас</th>
						<th scope='col'>Поликарбонат</th>
						<th scope='col'>100*100</th>
						<th scope='col'>/</th>
						<th scope='col'>150*150</th>
						<th scope='col'>Сборка</th>
						<th scope='col'>100*100</th>
						<th scope='col'>/</th>
						<th scope='col'>150*150</th>
					</tr>
				</thead>
				<tbody>");
				
// Выборка в цикле всех существующих моделей теплиц (поле 'material')
$result = mysqli_query($db, "SELECT * FROM specif ORDER BY material");
$myrow = mysqli_fetch_array($result);
$material='';
	do
	{
		if ($myrow['material'] != $material)
		{	
				
// Выборка теплиц в каждой из разновидностей, отсортированных по длине теплиц
$result5 = mysqli_query($db, "SELECT * FROM specif WHERE name = 'Теплицы' AND material='$myrow[material]' ORDER BY lenght");
$myrow5 = mysqli_fetch_array($result5);

// Проверка наличия товаров в группе для необходимости печати подзаголовка категории
			if (!isset($myrow5['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
			else
			{
				printf ("<tr><td class='subtitle' colspan='10'>%s</td></tr>", $myrow['material']);

	// Печать полосатых строк таблицы								
				$even=true;

	// Начало цикла печати теплиц в категории       
					do
					{
	
					$itog = $myrow5['price'] + $myrow5['carbonat'] + $myrow5['sborka'];
					$itog_100 = $itog + $myrow5['fund_100'];
					$itog_150 = $itog + $myrow5['fund_150'];
					
						printf  ("<tr style='background-color:".($even?'white':'#eaeaea')."'>
									<td>%sм.</td>
									<td>%s ₽</td>
									<td>%s</td>
									<td>%s</td>
									<td>/</td>
									<td>%s</td>
									<td>%s</td>
									<td>%s</td>
									<td>/</td>
									<td>%s</td>
								</tr>
							</tbody>", $myrow5['lenght'], $myrow5['price'], $myrow5['carbonat'], $myrow5['fund_100'], $myrow5['fund_150'], $myrow5['sborka'], $itog_100, $itog_150); 
					$even=!$even;	
					}
	// Окончание цикла печати всех разновидностей теплиц в категории
			while ($myrow5 = mysqli_fetch_array($result5));
			}

// Окончание цикла категорий
		$material = $myrow['material'];
		}
	}
	while ($myrow = mysqli_fetch_array($result));


// Окончание цикла печати товаров в категории
		while ($myrow3 = mysqli_fetch_array($result3));

// Выборка характеристик поликарбоната
$result7 = mysqli_query($db, "SELECT * FROM specif WHERE name='Теплицы_' AND depth='3'");
$myrow7 = mysqli_fetch_array($result7);

printf  ("</table>
		</div><!--table-responsive-->
		<p class='color-price pb-3'>%s - <strong>%s ₽</strong></p>", $myrow7['material'], $myrow7['price']);

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result->close(); // Все существующие модели теплиц (поле 'material') внутри общего наименования 'Теплицы' - 'name' - отсортированные по алфавиту
$result5->close(); // Категории теплиц с сортировкой по алфавиту
$result7->close(); // Характеристики поликарбоната

// Подключаем галерею с фотографиями теплиц
include ("blocks/gallery_green.php");

	printf  ("</div>");


// Окончание проверки условий для вывода информации разных товаров - максимальное количество информации - ЗАБОРЫ		
			} elseif ($myrow3['name'] == 'Заборы') {
					
					printf ("<thead>
					<tr class='fw-bold'>
						<th scope='col' class='text-start'>Материал</th>
						<th scope='col'>Высота<br>столба, м.</th>
						<th scope='col'>Пролёт,<br>м.</th>
						<th scope='col'>Цена,<br>руб./1 пог.м</th>
					</tr>
				</thead>
				<tbody>");
// Начало цикла печати спецификаций товара       
				do
				{
//				$height = round(($myrow3['depth']/100),1);
//				$width = round(($myrow3['width']/100),1);				
//				$price_count = round($myrow3['price']/$count);
					printf  ("<tr style='background-color:".($even?'white':'#eaeaea')."'>
								<td class='text-start'>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s*</td>
							</tr>
						</tbody>", $myrow3['material'], $myrow3['depth'], $myrow3['width'], $myrow3['price']); 
				$even=!$even;	
				}

// Окончание цикла печати товаров в категории
		while ($myrow3 = mysqli_fetch_array($result3));

printf  ("</table>
		<p class='fence_italic'><strong>*</strong> Цена указана за 1 погонный метр при длине забора 50 и более метров.</p>
		</div><!--table-responsive-->");

// Подключаем галерею с фотографиями заборов
include ("blocks/gallery_fence.php");

// Подключаем калькулятор стоимости забора
include ("blocks/calc_fence.php");

	printf  ("</div>");
			}
// Окончание проверок, связанных с выводом таблиц
		}
	
?>				
				<!--<p></p>-->
<?php
// Подключаем кнопки обратной связи
include ("blocks/order_call_911.php");
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
$result1->close(); // Страницы - без сортировки и лимитов
$result2->close(); // Все характеристики товара '$good' из таблицы 'goods' - без сортировки и лимитов
$result3->close(); // Все существующие специфификации товаров из таблицы 'specif' - без сортировки и лимитов
$result4->close(); // Товары внутри категории, отсортированные по алфавиту для аккордеона
$db->close(); // Закрываем базу данных

// Подключаем FOOTER
include ("blocks/footer.php");
?>
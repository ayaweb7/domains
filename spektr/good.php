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
// Выборка всех существующих спецификаций в каждом из товаров, отсортированных по толщине и ширине
$result3 = mysqli_query($db, "SELECT * FROM specif WHERE name='$myrow2[good]' ORDER BY depth, width");
$myrow3 = mysqli_fetch_array($result3);

// Проверка наличия спецификаций у товара для необходимости печати таблицы
		if (!isset($myrow3['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
		else
		{
printf ("<div class='col-md-9 ms-sm-auto col-lg-12 px-md-4 absent'>
		<h2 class='pb-2 border-bottom'>Актуальные цены на %s %s</h2>
		<div class='table-responsive'>
			<table class='table table-striped table-sm text-center'>", $month, $current_year);

// Начало проверки условий для вывода информации разных товаров - БРУС
			if ($myrow3['name'] == 'Брус') {

					printf ("<thead>
					<tr class='fw-bold'>
						<td style='border: 0;'>Сечение</td>
						<td style='border: 0;'>Количество в 1 куб.м. при длине:</td>
						<td style='border: 0;' colspan='2'>Цена</td>
					</tr>
					<tr>
						<th scope='col'></th>
						<th scope='col'>6.1 м.</th>
						<th scope='col'>1 шт.</th>
						<th scope='col'>1 куб.м.</th>
					</tr>
				</thead>
				<tbody>");
// Начало цикла печати спецификаций товара       
				do
				{
				$cut = $myrow3['depth'] * $myrow3['width'];
				$count = round(1000000/($cut * $myrow2['size_1']),1);
				$price_count = round($myrow3['price']/$count);
					printf  ("<tr style='background-color:".($even?'white':'#eaeaea')."'>
								<td>%s*%s мм.</td>
								<td>%s шт.</td>
								<td>%s ₽</td>
								<td>%s ₽</td>
							</tr>
						</tbody>", $myrow3['depth'], $myrow3['width'], $count, $price_count, $myrow3['price']); 
				$even=!$even;
				}

// Окончание цикла печати товаров в категории
		while ($myrow3 = mysqli_fetch_array($result3));

printf  ("</table>
		</div><!--table-responsive-->
	</div>");

// Продолжение проверки условий для вывода информации разных товаров - ШТАКЕТНИК
			} elseif ($myrow3['name'] == 'Штакетник') {

					printf ("<thead>
					<tr class='fw-bold'>
						<td style='border: 0;' colspan='2'>Размеры:</td>
						<td style='border: 0;'>Количество</td>
						<td style='border: 0;' colspan='2'>Цена</td>
					</tr>
					<tr>
						<th scope='col'>длина</th>
						<th scope='col'>ширина</th>
						<th scope='col'>в 1 куб.м.</th>
						<th scope='col'>1 шт.</th>
						<th scope='col'>1 куб.м.</th>
					</tr>
				</thead>
				<tbody>");
// Начало цикла печати спецификаций товара       
				do
				{
				$cut = 20 * $myrow3['width'];
				$count = round(1000000/($cut * $myrow3['depth']/1000),0);
				$price_count = round($myrow3['price'] * $count);
					printf  ("<tr style='background-color:".($even?'white':'#eaeaea')."'>
								<td>%s м.</td>
								<td>%s мм.</td>
								<td>%s шт.</td>
								<td>%s ₽/шт.</td>
								<td>%s ₽/куб.м.</td>
							</tr>
						</tbody>", $myrow3['depth']/1000, $myrow3['width'], $count, $myrow3['price'], $price_count); 
				$even=!$even;
				}

// Окончание цикла печати товаров в категории
		while ($myrow3 = mysqli_fetch_array($result3));

printf  ("</table>
		</div><!--table-responsive-->
	</div>");

// Продолжение проверки условий для вывода информации разных товаров - НАЛИЧНИК
			} elseif ($myrow3['name'] == 'Наличник') {
					
					printf ("<thead>
					<tr>
						<th scope='col'>Ширина</th>
						<th scope='col'>Длина</th>
						<th scope='col'>Цена</th>
					</tr>
				</thead>
				<tbody>");
				
// Выборка в цикле всех существующих форм (поле 'material')
$result = mysqli_query($db, "SELECT * FROM specif ORDER BY material");
$myrow = mysqli_fetch_array($result);
$material='';
	do
	{
		if ($myrow['material'] != $material)
		{	
				
// Выборка досок каждой толщины, отсортированных по ширине
$result5 = mysqli_query($db, "SELECT * FROM specif WHERE name = 'Наличник' AND material='$myrow[material]' ORDER BY width");
$myrow5 = mysqli_fetch_array($result5);

// Проверка наличия товаров в группе для необходимости печати подзаголовка категории
			if (!isset($myrow5['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
			else
			{
				printf ("<tr><td class='subtitle' colspan='3'>наличник %s</td></tr>", $myrow['material']);

	// Печать полосатых строк таблицы								
				$even=true;

	// Начало цикла печати размеров в каждой форме       
				do
				{
					printf  ("<tr style='background-color:".($even?'white':'#eaeaea')."'>
								<td>%s мм.</td>
								<td>%s м.</td>
								<td>%s ₽/шт.</td>
							</tr>
						</tbody>", $myrow5['width'], $myrow5['lenght_mat'], $myrow5['price']); 
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

printf  ("</table>
		</div><!--table-responsive-->
	</div>");

// !***************** Закрытие объектов с результатами *********************! //
$result5->close(); // Категории товаров с сортировкой по алфавиту


// Продолжение проверки условий для вывода информации разных товаров - ПЛИНТУС
			} elseif ($myrow3['name'] == 'Плинтус') {

					printf ("<thead>
					<tr>
						<th scope='col'>Сечение</th>
						<th scope='col'>Длина</th>
						<th scope='col'>Цена</th>
					</tr>
				</thead>
				<tbody>");
// Начало цикла печати спецификаций товара       
				do
				{
					printf  ("<tr style='background-color:".($even?'white':'#eaeaea')."'>
								<td>%s*%s мм.</td>
								<td>%s м.</td>
								<td>%s ₽/шт.</td>
							</tr>
						</tbody>", $myrow3['width'], $myrow3['depth'], $myrow3['lenght_mat'], $myrow3['price']); 
				$even=!$even;
				}

// Окончание цикла печати товаров в категории
		while ($myrow3 = mysqli_fetch_array($result3));

printf  ("</table>
		</div><!--table-responsive-->
	</div>");


// Продолжение проверки условий для вывода информации разных товаров - УГОЛОК
			} elseif ($myrow3['name'] == 'Уголок') {

					printf ("<thead>
					<tr>
						<th scope='col'>Сечение</th>
						<th scope='col'>Длина</th>
						<th scope='col'>Цена</th>
					</tr>
				</thead>
				<tbody>");
// Начало цикла печати спецификаций товара       
				do
				{
					printf  ("<tr style='background-color:".($even?'white':'#eaeaea')."'>
								<td>%s*%s мм.</td>
								<td>%s м.</td>
								<td>%s ₽/шт.</td>
							</tr>
						</tbody>", $myrow3['width'], $myrow3['depth'], $myrow3['lenght_mat'], $myrow3['price']); 
				$even=!$even;
				}

// Окончание цикла печати товаров в категории
		while ($myrow3 = mysqli_fetch_array($result3));

printf  ("</table>
		</div><!--table-responsive-->
	</div>");


// Продолжение проверки условий для вывода информации разных товаров - ВАГОНКА
			} elseif ($myrow3['name'] == 'Вагонка') {

					printf ("<thead>
					<tr>
						<th scope='col'>Длина</th>
						<th scope='col'>Сечение</th>
						<th scope='col'>Цена</th>
					</tr>
				</thead>
				<tbody>");
// Начало цикла печати спецификаций товара       
				do
				{
					printf  ("<tr style='background-color:".($even?'white':'#eaeaea')."'>
								<td>%s м.</td>
								<td>%s*%s мм.</td>
								<td>%s ₽/шт.</td>
							</tr>
						</tbody>", $myrow3['lenght_mat'], $myrow3['depth'], $myrow3['width'], $myrow3['price']); 
				$even=!$even;
				}

// Окончание цикла печати товаров в категории
		while ($myrow3 = mysqli_fetch_array($result3));

printf  ("</table>
		</div><!--table-responsive-->
	</div>");


// Продолжение проверки условий для вывода информации разных товаров - ДОСКА ПОЛА
			} elseif ($myrow3['name'] == 'Доска пола') {

					printf ("<thead>
					<tr>
						<th scope='col'>Длина</th>
						<th scope='col'>Сечение</th>
						<th scope='col'>Цена</th>
					</tr>
				</thead>
				<tbody>");
// Начало цикла печати спецификаций товара       
				do
				{
					printf  ("<tr style='background-color:".($even?'white':'#eaeaea')."'>
								<td>%s м.</td>
								<td>%s*%s мм.</td>
								<td>%s ₽/шт.</td>
							</tr>
						</tbody>", $myrow3['lenght_mat'], $myrow3['depth'], $myrow3['width'], $myrow3['price']); 
				$even=!$even;
				}

// Окончание цикла печати товаров в категории
		while ($myrow3 = mysqli_fetch_array($result3));

printf  ("</table>
		</div><!--table-responsive-->
	</div>");


// Продолжение проверки условий для вывода информации разных товаров - ИМИТАЦИЯ БРУСА
			} elseif ($myrow3['name'] == 'Имитация бруса') {

					printf ("<thead>
					<tr>
						<th scope='col'>Длина</th>
						<th scope='col'>Сечение</th>
						<th scope='col'>Цена</th>
					</tr>
				</thead>
				<tbody>");
// Начало цикла печати спецификаций товара       
				do
				{
					printf  ("<tr style='background-color:".($even?'white':'#eaeaea')."'>
								<td>%s м.</td>
								<td>%s*%s мм.</td>
								<td>%s ₽/шт.</td>
							</tr>
						</tbody>", $myrow3['lenght_mat'], $myrow3['depth'], $myrow3['width'], $myrow3['price']); 
				$even=!$even;
				}

// Окончание цикла печати товаров в категории
		while ($myrow3 = mysqli_fetch_array($result3));

printf  ("</table>
		</div><!--table-responsive-->
	</div>");


// Продолжение проверки условий для вывода информации разных товаров - ДОСКА СТРОГАНАЯ		
			} elseif ($myrow3['name'] == 'Доска строганая') {
					
					printf ("<thead>
					<tr>
						<th scope='col'>Ширина</th>
						<th scope='col'>Цена</th>
					</tr>
				</thead>
				<tbody>");
				
// Выборка в цикле всех существующих толщин (поле 'depth')
$result = mysqli_query($db, "SELECT * FROM specif ORDER BY depth");
$myrow = mysqli_fetch_array($result);
$depth='';
	do
	{
		if ($myrow['depth'] != $depth)
		{	
				
// Выборка досок каждой толщины, отсортированных по ширине
$result5 = mysqli_query($db, "SELECT * FROM specif WHERE name = 'Доска строганая' AND depth='$myrow[depth]' ORDER BY width");
$myrow5 = mysqli_fetch_array($result5);

// Проверка наличия товаров в группе для необходимости печати подзаголовка категории
			if (!isset($myrow5['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
			else
			{
				printf ("<tr><td class='subtitle' colspan='2'>Толщина: %s мм.</td></tr>", $myrow['depth']);

	// Печать полосатых строк таблицы								
				$even=true;

	// Начало цикла печати теплиц в категории       
				do
				{
					printf  ("<tr style='background-color:".($even?'white':'#eaeaea')."'>
								<td>%s мм.</td>
								<td>%s ₽/пог.м.</td>
							</tr>
						</tbody>", $myrow5['width'], $myrow5['price']); 
				$even=!$even;	
				}
	// Окончание цикла печати всех разновидностей теплиц в категории
			while ($myrow5 = mysqli_fetch_array($result5));
			}

// Окончание цикла категорий
		$depth = $myrow['depth'];
		}
	}
	while ($myrow = mysqli_fetch_array($result));


// Окончание цикла печати товаров в категории
		while ($myrow3 = mysqli_fetch_array($result3));

printf  ("</table>
		</div><!--table-responsive-->
	</div>");

// !***************** Закрытие объектов с результатами *********************! //
$result5->close(); // Категории товаров с сортировкой по алфавиту

// Продолжение проверки условий для вывода информации разных товаров - БРУСОК, РЕЙКА		
			} elseif ($myrow3['name'] == 'Брусок, рейка') {
					
					printf ("<thead>
					<tr>
						<th scope='col'>Ширина</th>
						<th scope='col'>Цена</th>
					</tr>
				</thead>
				<tbody>");
				
// Выборка в цикле всех существующих толщин (поле 'depth')
$result = mysqli_query($db, "SELECT * FROM specif ORDER BY depth");
$myrow = mysqli_fetch_array($result);
$depth='';
	do
	{
		if ($myrow['depth'] != $depth)
		{	
				
// Выборка досок каждой толщины, отсортированных по ширине
$result5 = mysqli_query($db, "SELECT * FROM specif WHERE name = 'Брусок, рейка' AND depth='$myrow[depth]' ORDER BY width");
$myrow5 = mysqli_fetch_array($result5);

// Проверка наличия товаров в группе для необходимости печати подзаголовка категории
			if (!isset($myrow5['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
			else
			{
				printf ("<tr><td class='subtitle' colspan='2'>Толщина: %s мм.</td></tr>", $myrow['depth']);

	// Печать полосатых строк таблицы								
				$even=true;

	// Начало цикла печати теплиц в категории       
				do
				{
					printf  ("<tr style='background-color:".($even?'white':'#eaeaea')."'>
								<td>%s мм.</td>
								<td>%s ₽/пог.м.</td>
							</tr>
						</tbody>", $myrow5['width'], $myrow5['price']); 
				$even=!$even;	
				}
	// Окончание цикла печати всех разновидностей теплиц в категории
			while ($myrow5 = mysqli_fetch_array($result5));
			}

// Окончание цикла категорий
		$depth = $myrow['depth'];
		}
	}
	while ($myrow = mysqli_fetch_array($result));


// Окончание цикла печати товаров в категории
		while ($myrow3 = mysqli_fetch_array($result3));

printf  ("</table>
		</div><!--table-responsive-->
	</div>");
	
// !***************** Закрытие объектов с результатами *********************! //
$result5->close(); // Категории товаров с сортировкой по алфавиту	
	
			}
// Окончание проверок, связанных с выводом таблиц
		}
?>				
				<!--<p></p>-->

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
$result2->close(); // Товары
$result3->close(); // Спецификации
$db->close(); // Закрываем базу данных

// Подключаем FOOTER
include ("blocks/footer.php");
?>
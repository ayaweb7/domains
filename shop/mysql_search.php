<?php 
include ("date_base.php"); /* Соединяемся с базой данных */
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='mysql_search'");
$myrow1 = mysqli_fetch_array($result1);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $myrow1['title'] ?></title>
<link href="css/screen.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/town_script_adm.js"></script>
<!-- <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" /> -->

</head>

<body>
<?php

if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['shop'])) {$shop = $_POST['shop'];}
if (isset($_POST['operation_shop'])) {$operation_shop = $_POST['operation_shop'];}
if (isset($_POST['town'])) {$town = $_POST['town'];}
if (isset($_POST['operation_town'])) {$operation_town = $_POST['operation_town'];}
if (isset($_POST['gruppa'])) {$gruppa = $_POST['gruppa'];}
if (isset($_POST['operation_gruppa'])) {$operation_gruppa = $_POST['operation_gruppa'];}
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['operation_name'])) {$operation_name = $_POST['operation_name'];}
if (isset($_POST['characteristic'])) {$characteristic = $_POST['characteristic'];}
if (isset($_POST['operation_characteristic'])) {$operation_characteristic = $_POST['operation_characteristic'];}
if (isset($_POST['price'])) {$price = $_POST['price'];}
if (isset($_POST['price_to'])) {$price_to = $_POST['price_to'];}
if (isset($_POST['operation_price'])) {$operation_price = $_POST['operation_price'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['date_to'])) {$date_to = $_POST['date_to'];}
if (isset($_POST['operation_date'])) {$operation_date = $_POST['operation_date'];}

$db = mysqli_connect("localhost","nikart","arteeva12");
mysqli_select_db($db, "agency");


		include ("header_admin.php");
?>
	<!-- Начало кода REALTIES -->

    <div id="realties">
              <table id="inventory" width="99%" class="realty">

<?php 

?> 

                  <colgroup> <!-- Задание ширины и стилей для колонок таблицы -->
                      <col id="id" /> <!-- Задание ширины и стилей для одной из колонок таблицы -->
                      <col id="shop" />
					  <col id="address" />
					  <col id="characteristic" />
                      <col id="item" />
                      <col id="trade" />
                      <col id="price" />
					  <col id="date" />
                  </colgroup>
                 
                    <tr class="alt"> <!-- Строка таблицы -->
                      <th scope="col"><?php echo sort_link_th('ID', 'id_asc', 'id_desc'); ?></th> <!-- Заголовочная ячейка таблицы -->
                      <th scope="col">Магазин</th>
					  <th scope="col">Адрес</th>
					  <th scope="col">Наименование товара</th>
                      <th scope="col">Количество</th>
                      <th scope="col">Цена, руб.</th>
                      <th scope="col">Стоимость, руб.</th>
					  <th scope="col">Дата</th>
                    </tr>
			

<?php

// SHOP = NULL
$const_start = 'SELECT * FROM shops WHERE ';
	$res_shop = 'shop ' . $operation_shop. ' ' . '\'' . $shop . '\' AND ';
	$res_town = 'town ' . $operation_town. ' ' . '\'' . $town . '\' AND ';
	$res_gruppa = 'gruppa ' . $operation_gruppa. ' ' . '\'' . $gruppa . '\' AND ';
	$res_name = 'name ' . $operation_name. ' ' . '\'' . $name . '\' AND ';
	$res_characteristic = 'characteristic LIKE ' . '\'%' . $characteristic . '%\' AND ';
	if ($operation_price != 'BETWEEN') $res_price = 'price ' . $operation_price. ' ' . '\'' . $price . '\' AND ';
	else 
		$res_price = 'price BETWEEN \'' . $price . '\' AND \'' . $price_to . '\' AND ';
	if ($operation_date != 'BETWEEN') $res_date = 'date ' . $operation_date. ' ' . '\'' . $date . '\'';
	else 
		$res_date = 'date BETWEEN \'' . $date . '\' AND \'' . $date_to . '\'';
	
$const_end = ' ORDER BY date DESC, name';


if ($shop == NULL 	
	AND $town == NULL
	AND $gruppa == NULL 
	AND $name == NULL 
	AND $characteristic == NULL 
	AND $price == NULL 
	AND $date == NULL
	)
{
	$res = 'SELECT * FROM shops';// ORDER BY date DESC, name';
}
// SHOP = NULL
if ($shop == NULL) $res_shop = NULL;
if ($town == NULL) $res_town = NULL;
if ($gruppa == NULL) $res_gruppa = NULL;
if ($name == NULL) $res_name = NULL;
if ($characteristic == NULL) $res_characteristic = NULL;
if ($price == NULL) $res_price = NULL;

	$res = $const_start . $res_shop 
						. $res_town 
						. $res_gruppa 
						. $res_name 
						. $res_characteristic
						. $res_price 
						. $res_date
			. $const_end;


echo $res;

	$result = mysqli_query($db, $res);
	$myrow = mysqli_fetch_array($result);

/* Все варианты сортировки */
$sort_list = array(
	'id_asc'   => 'id',
	'id_desc'  => 'id DESC',
	'shop_asc'  => '`shop`',
	'shop_desc' => '`shop` DESC',
	'adress_asc'   => '`adress`',
	'adress_desc'  => '`adress` DESC',
	'name_asc'   => '`name`',
	'name_desc'  => '`name` DESC',
	'price_asc'   => '`price`',
	'price_desc'  => '`price` DESC',
	'amount_asc'  => '`amount`',
	'amount_desc' => '`amount` DESC',
	'date_asc'  => '`date`',
	'date_desc' => '`date` DESC',	
);
 
/* Проверка GET-переменной */
$sort = @$_GET['sort'];
if (array_key_exists($sort, $sort_list)) {
	$sort_sql = $sort_list[$sort];
} else {
	$sort_sql = reset($sort_list);
}

/* Запрос в БД */
$dbh = new PDO('mysql:dbname=agency;host=localhost', 'nikart', 'arteeva12');
$sth = $dbh->prepare("SELECT * FROM shops ORDER BY {$sort_sql}");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);

/* Функция вывода ссылок */
function sort_link_th($title, $a, $b) {
	$sort = @$_GET['sort'];
 
	if ($sort == $a) {
		return '<a class="active" href="?sort=' . $b . '">' . $title . ' <i>▲</i></a>';
	} elseif ($sort == $b) {
		return '<a class="active" href="?sort=' . $a . '">' . $title . ' <i>▼</i></a>';  
	} else {
		return '<a href="?sort=' . $a . '">' . $title . '</a>';  
	}
}
	
	if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
		else {

		$even=true;
		$count = 0;                    
		do {
			$count = $count + 1;
		printf  ("          <tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
						  <td><a href='form.php?id=%s'>%s</a></td>
						  <td>%s</td>
						  <td>%s, %s</td>
						  <td>%s %s</td>
						  <td>%s %s</td>
						  <td>%s</td>
						  <td>%s</td>
						  <td>%s</td>
						</tr>  ",$myrow['id'],$myrow['id'],$myrow['shop'],$myrow['town'],$myrow['adress'],$myrow['name'],$myrow['characteristic'],$myrow['quantity'],$myrow['item'],$myrow['price'],$myrow['amount'],$myrow['date']); 
	$even=!$even;
		}

	while ($myrow = mysqli_fetch_array($result));
		}

?>
					
				<caption> <!-- Заголовок таблицы -->
                    <h1>Всего выбрано: <em><?php echo $count ?></em> товаров</h1>
                  </caption>
                </table> <!-- inventory -->
			
		
<!-- Подключаем FOOTER -->
		<?php// include ("footer.php"); ?>
<p align="center"><a onclick="javascript: history.back(); return falshe;"><img src="images/tovar.png" id="send"/></a></p>
</body>
</html>
<?php
//Пароль в админскую часть
include ("lock.php");  /* */
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Хостинг</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="shortcut icon" type="image/ico" href="img/favicon.ico" />
</head>

<body>



<!-- Подключаем HEADER -->
<?php
include ("blocks/header_adm.php");
?>

<!-- TABLE inventory -->
<table id="inventory" width="99%" class="realty">
                  
	<tr class="alt"> <!-- Строка таблицы -->
		<th scope="col">ID</th> <!-- Заголовочная ячейка таблицы -->
		<th scope="col">Имя клиента</th>
		<th scope="col">Телефон / Email</th>
		<th scope="col">Текст заявки / Действия / Результат<br>(дата, сумма)</th>
		<th scope="col">Дата входа, дата отправки, UNIX-time</th>
		<th scope="col">IP</th>
		<th scope="col">Город, регион </th>
		<th scope="col">Локация</th>
		<th scope="col">Браузер, версия, ОС</th>
	</tr>
                    
<?php
// Выборка в цикле всех существующих HostName
$result2 = mysqli_query($db, "SELECT * FROM application ORDER BY hostname");
$myrow2 = mysqli_fetch_array($result2);
$hostname='';
$count_host = 0;
	do
	{
		if ($myrow2['hostname'] != $hostname)
		{	
				
// Выборка ТОП-5 товаров в каждой из HostName, отсортированных по убыванию даты (показаны самые свежие) и по алфавиту наименований товаров
$result = mysqli_query($db, "SELECT * FROM application WHERE hostname='$myrow2[hostname]' ORDER BY send_time DESC LIMIT 5");
$myrow = mysqli_fetch_array($result);

// Проверка наличия товаров в группе для необходимости печати подзаголовка категории
		if (!isset($myrow['id'])) {'<script language="javascript">document.getElementsByClassName("absent").style.display="none";<script>';}                     
		else
		{
			printf ("<tr class='sub'><td colspan='9'>HostName: <em>%s</em></td></tr>", $myrow2['hostname']);

// Печать полосатых строк таблицы								
			$even=true;

// Начало цикла печати товаров в категории          
			
			do
			{
				printf  ("<tr class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
							<td class='id_bid'>%s</a></td>
							<td class='name_bid'>%s</td>
							<td class='tel_bid'>%s / %s</td>
							<td class='mess_bid'>%s.<br>%s<br>%s<br>(%s; %s руб.)</td>
							<td class='time_bid'>%s, %s, %s</td>
							<td class='host_bid'>%s</td>
							<td class='city_bid'>%s, %s</td>
							<td class='loc_bid'>%s</td>
							<td class='browser_bid'>%s, %s, %s</td>
						</tr>  ",$myrow['id'], $myrow['name'], $myrow['tel'], $myrow['email'],
								$myrow['mess'], $myrow['working'], $myrow['effect'], $myrow['work_time'], $myrow['amount'],
								$myrow['start_time'], $myrow['send_time'], $myrow['unix_time'], $myrow['ip'], $myrow['city'],
								$myrow['region'], $myrow['location'], $myrow['brauser'], $myrow['version'], $myrow['os']); 
				
				$even=!$even;
			}
// Окончание цикла печати товаров в категории
		while ($myrow = mysqli_fetch_array($result));
		}

// Выборка всех товаров в категории для подсчета сумм
$result3 = mysqli_query($db, "SELECT * FROM application WHERE hostname='$myrow2[hostname]'");
$myrow3 = mysqli_fetch_array($result3);

// Начало цикла вычисления суммы в категории
		$count = 0;
		do
		{
			$count += 1;
		}
// Окончание цикла вычисления суммы в категории
		while ($myrow3 = mysqli_fetch_array($result3));

// Печать итоговой суммы
		$count_itog += $count;
		printf  ("<tr><td colspan='7'></td><td class='itog' colspan='2'>с этого хоста %s заявок</td></tr>", $count);

		
// Окончание цикла категорий
		$hostname = $myrow2['hostname'];
		$count_host += 1;
		}
	
	}
	while ($myrow2 = mysqli_fetch_array($result2));

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
$result->close(); // Товары внутри категорий - отсортированные по дате и лимитированные
$result2->close(); // Категории, отсортированные по алфавиту
$result3->close(); // Товары внутри категорий - без сортировки и лимитов
$db->close(); // Закрываем базу данных

// Заголовок таблицы
	printf  ("<caption>
		<h1><em>%s</em> заявок, количество хостов - <em>%s</em></h1>
	</caption>
                   
</table>" , $count_itog, $count_host); // inventory

?>
<a class="thank-you-page__button" href="/">Вернуться на главную</a>

</body>

</html>
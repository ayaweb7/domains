<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/screen.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../js/ajax.js"></script>
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

<title>Пример использования AJAX</title>
</head>

	<body name="top" style='text-align:center'>
		<h1>Загрузка веб-страницы в контейнер DIV</h1>
		<div id='info'>Это предложение будет заменено</div> <!--Позже сюда будет вставлен текст, возвращенный с помощью технологии AJAX.-->


		<h1>Передача данных выбранных оператором 'SELECT'</h1>
		<div id='townHidden'>Это предложение будет заменено</div>
		<p><?php echo $townSelected ?><p>
		<div class='blockInput'>
			<form name="form" action="mysql_search.php" method="post">
				<span>Город</span>
				<select id='town' name='town' size='1' onchange='selectTown();'><!---->
					<option selected></option>
<?php
// Соединяемся с базой данных date_base.php
$hostname = 'localhost';
$database = 'agency';
$username = 'nikart';
$password = 'arteeva12';

$db = new mysqli($hostname, $username, $password, $database);
if ($db->connect_error) die($db->connect_error);

//session_start();  Important if you're not already doing it!
//if(isset($_POST['town_1'])) {
//	$townSelected = $_POST['town_1'];
//    $_SESSION['townSelected']=$townSelected;
//}
    echo ('$townName=' . $townSelected);

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
			</form>
		</div>
<div id='g'>good<?php echo $townSelected ?><div>		

		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
		
	</body>
</html>
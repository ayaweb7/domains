<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Подключаем HEADER
include ("blocks/header_admin.php");
		
echo "<h1>Hello</h1>";
printf ("<h1>Hello</h1>");

//
echo "1. ";
$input = "27-03-17";
    $date = DateTime::createFromFormat('d-m-y', $input);
    var_dump($date->format('d'));
    var_dump($date->format('m'));
    var_dump($date->format('y'));

echo"<br>";
echo "2. ";
$date = "2022-03-25";
    list($year, $month1, $day) = explode("-", $date);

    var_dump($year, $month1, $day);
	
echo"<br>";
echo "3. ";
$date1 = DateTime::createFromFormat('d-m-y', $input);
echo $date1->format('d')."\n"; // 27
echo $date1->format('m')."\n"; // 03
echo $date1->format('Y')."\n"; // 2017
echo $date1->format('Y-m-d')."\n"; // 2017-03-27


echo"<br>";
echo "4. ";
$date2 = DateTime::createFromFormat('d-m-y', $input)->format("Y-m-d");
echo"$date2";

echo"<br>";
echo "5. ";
$date3 = strftime('27-03-17');

echo strftime("d", $date3); //27
echo strftime("m", $date3); //03
echo strftime("Y", $date3); //2017

//
echo"<br><br>";
echo "6. ";
//$sql_count = mysqli_query($db, "SELECT count(*) as num_rows, DATE_FORMAT(date, '%Y-%m-%d') as month FROM shops GROUP BY month ORDER BY month") or die(mysqli_error());
$sql_count = mysqli_query($db, "SELECT count(*) as num_rows, MONTH(date) as month FROM shops GROUP BY month ORDER BY month") or die(mysqli_error());
$myrow = mysqli_fetch_array($sql_count);
echo $myrow['month'];
echo"<br>";
$month = DateTime::createFromFormat('Y-m-d', $myrow['month']); //->format('m')
echo $month;

echo"<br><br>";
echo "7. ";
$m='08';
$months = array (1=>'Январь',2=>'Февраль',3=>'Март',4=>'Апрель',5=>'Май',6=>'Июнь',7=>'Июль',8=>'Август',9=>'Сентябрь',10=>'Октябрь',11=>'Ноябрь',12=>'Декабрь');
echo $months[(int)$m];
echo"<br>";
echo $months[(int)$month];
echo"<br>";
echo $months[$myrow['month']];


echo"<br><br>";
echo "8. ";
echo"<br>";
for ($j = 0 ; $j < 3 ; ++$j)
	echo "$j: $j*$j=" . $j*$j . "<br>";

echo"<br><br>";
echo "9. ";
$names = array('Ankur', 'John', 'Joy');
$count = count($names);
for($counter=0;$counter<$count;$counter++){
print $names[$counter];
}

echo"<br><br>";
echo "10. ";
$names = array(
array('id' => 1, 'name' => 'Ankur'),
array('id' => 2, 'name' => 'Joe'),
array('id' => 3, 'name' => 'John'),
);
$count = count($names);
for ($counter = 0; $counter < $count; $counter++) {
print 'Name'.$names[$counter]['name'].' ID'.$names[$counter]['id']."n";
}

echo"<br><br>";
echo "11. ";
$metrix = array(
array(1, 2, 3),
array(2, 1, 3),
array(3, 2, 1),
);
$count = count($metrix);
for ($counter = 0; $counter < $count; $counter++) {
$c_count = count($metrix[$counter]);
for ($child = 0; $child < $c_count; $child++) {
echo $metrix[$counter][$child];
}
}

$metrix1 = array(
array(1, 2, 3),
array(4, 5, 6),
array(7, 8, 9),
);
echo"<br><br>";
echo "12. ";
echo"<br>";
for ($i = 0 ; $i < 3 ; ++$i) {
	for ($j = 0 ; $j < 3 ; ++$j) {
		echo '$i = ' . $i . ' , $j = ' . $j . ': $j*$j=' . $j*$j . '; ';
		echo '$metrix1[' . $i . '][' . $j . ']=' . $metrix1[$i][$j] . '<br>';
	}
}
?>
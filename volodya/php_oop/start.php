<title>Start OOP</title>

<?php
// Добавлять в отчёт все ошибки PHP
error_reporting(-1);

require_once 'classes/FirstClass.php';

function debug ($data) {
    echo '<pre>' .print_r($data, 1). '</pre>';
}

$object1 = new FirstClass();
var_dump($object1); // Выводит информацию о переменной
debug($object1);

$object1->wheels = array(4,6);
$object1->year = 1969;

$object2 = new FirstClass();
$object2->year = 2020;
debug($object1);
debug($object2);

echo "<h3>AVTO information</h3>
Marka: {$object1->brand['BMW']['a']}<br>
Cvet: {$object1->color[0]}<br>
Kol-vo koles: {$object1->wheels[0]}<br>
God vypuska: {$object1->year}<br>
Skorost: {$object1->speed}<br>";



include '../blocks/footer_new.php';
?>



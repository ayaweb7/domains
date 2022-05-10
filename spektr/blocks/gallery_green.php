<div id="gall">

<?php

$min = 1;
$max = 21;
$count = 8;
$numbers = array();
for ($i = 0; $i < $count; $i++) {
  $number = rand($min, $max - $i);
  sort($numbers);
  for($j = 0; $j < $i; $j++) {
    if ($numbers[$j] <= $number) {
      $number++;
    }
  }
  $numbers[] = $number;
}
/*
var_dump($numbers);
shuffle($numbers);
print_r(array_keys($number));
print_r($numbers);
print($numbers[0]);
*/

for ($i = 0 ; $i <= 7 ; ++$i)
{
	printf("<img src='img/origin/green_%s.jpg' tabindex='0' border='3'/>", $numbers[$i]);
}
	
?>
</div><!--gall-->
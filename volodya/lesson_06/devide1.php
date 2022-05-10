<?php
// Бросаем выполнение функции при выполнении проверки
function devide($a, $b)
{
	if ($b==0) throw new Exception('Вы хотите делить на ноль!');
	
	return $a/$b;
}

try
{
	$i = 8;
	$i = devide(8, 0);
	$i++;
}
catch(Exception $e)
{
	echo $e -> getMessage();
}

echo '<br/>', $i;
?>

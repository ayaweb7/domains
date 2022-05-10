<?php
// Создаем класс ошибки при делении на ноль
class ZeroDivisionException extends Exception
{
	protected $step;
	
	public function __construct($message, $step)
	{
		$this -> step = $step;
		parent:: __construct($message);
	}
	public function getStep()
	{
		return $this ->step;
	}
}

function devide($a, $b, $c)
{
	if ($b==0) throw new ZeroDivisionException('Вы хотите делить на ноль!', 1);
	if ($c==0) throw new ZeroDivisionException('Вы хотите делить на ноль!', 2);
	
	return $a/$b/$c;
}

try
{
	$i = 8;
	$i = devide(5, 3, 0);
	$i++;
}
catch(ZeroDivisionException $e)
{
	echo 'Ошибка на шаге ', $e -> getStep(), ': ', $e -> getMessage();
}

echo '<br/>', $i;
?>

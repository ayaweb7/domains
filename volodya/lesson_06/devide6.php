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

class ZeroDivisionExceptionStep1 extends ZeroDivisionException
{
	public function __construct($message)
	{
		parent:: __construct($message, 1);
	}
}

class ZeroDivisionExceptionStep2 extends ZeroDivisionException
{
	public function __construct($message)
	{
		parent:: __construct($message, 2);
	}
}

function devide($a, $b, $c)
{
	if ($b==0 && $c==0) throw new ZeroDivisionException('Вы хотите делить на ноль!', 3);
	if ($b==0) throw new ZeroDivisionExceptionStep1('Вы хотите делить на ноль!');
	if ($c==0) throw new ZeroDivisionExceptionStep2('Вы хотите делить на ноль!');
	
	return $a/$b/$c;
}

try
{
	$i = 13;
	if($i == 13) throw new Exception('Я БОЮСЬ ЧИСЛА 13');
	$i = devide(12, 1, 1);
}
catch(ZeroDivisionExceptionStep1 $e)
{
	echo 'Первое число не должно быть ноль';
	$i = 0;
}
catch(ZeroDivisionExceptionStep2 $e)
{
	echo 'ВТОРОЕ число не должно быть ноль';
	$i = 0;
}

catch(ZeroDivisionException $e)
{
	echo 'И первое и ВТОРОЕ числа не должны быть НУЛЯМИ ! ! !';
	$i = 0;
}
catch(Exception $e)
{
	echo $e -> getMessage();
	$i = 1;
}
finally
{
	$i++;
}
echo '<br/>', $i;
?>

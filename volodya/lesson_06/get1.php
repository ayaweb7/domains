<?php
// Создаем класс ошибки при делении на ноль
class MyClass
{
	
}

class MyChildClass extends MyClass
{
	
}

$parent = new MyClass();
$child = new MyChildClass();

echo 'parent - это: ', get_class($parent), '<br/>';
echo 'child - это: ', get_class($child), '<br/>';
?>

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

if(is_a($parent, 'MyClass'))
{
echo 'parent - это: ', get_class($parent), '<br/>';
}
else
{
echo 'child - это: ', get_class($child), '<br/>';
}

if(is_a($parent, 'MyChildClass'))
{
echo 'parent - это: ', get_class($parent), '<br/>';
}
else
{
echo 'child - это: ', get_class($child), '<br/>';
}
?>

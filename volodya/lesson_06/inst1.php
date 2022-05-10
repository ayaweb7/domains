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

if($parent instanceof MyClass)
{
echo 'parent - это MyClass<br/>';
}
else
{
echo 'parent - это НЕ MyClass<br/>';
}

if($parent instanceof MyChildClass)
{
echo 'parent - это MyChildClass<br/>';
}
else
{
echo 'parent - это НЕ MyChildClass<br/>';
}

if($child instanceof MyClass)
{
echo 'child - это MyClass<br/>';
}
else
{
echo 'child - это НЕ MyClass<br/>';
}

if($child instanceof MyChildClass)
{
echo 'child - это MyChildClass<br/>';
}
else
{
echo 'child - это НЕ MyChildClass<br/>';
}
?>

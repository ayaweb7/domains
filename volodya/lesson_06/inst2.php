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

if(is_subclass_of($parent, 'MyClass'))
{
echo 'parent - это дочерний от MyClass<br/>';
}
else
{
echo 'parent - это НЕ дочерний MyClass<br/>';
}

if(is_subclass_of($child, 'MyClass'))
{
echo 'child - это дочерний от MyClass<br/>';
}
else
{
echo 'child - это НЕ дочерний MyClass<br/>';
}

echo 'Все родители parent-a: ';
$pp = class_parents($parent);
$pp = implode($pp, ', ');
echo $pp, '<br/>';

echo 'Все родители child-a: ';
$cp = class_parents($child);
$cp = implode($cp, ', ');
echo $cp, '<br/>';
?>

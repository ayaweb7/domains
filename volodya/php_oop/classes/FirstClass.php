<?php
class FirstClass
{
    public $color = array('red', 'green');
    public $wheels = 4;
    public $speed = 160;
    public $brand = array (
        "BMW"  => array("a" => "orange", "b" => "banana", "c" => "apple"),
        "Nissan" => array(1, 2, 3, 4, 5, 6),
        "ZaZ"   => array("first", 5 => "second", "third")
    );

    public $path = __DIR__. '/test';
}

?>


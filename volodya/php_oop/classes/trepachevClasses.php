<?php

// Объявляем класс User, который будет описывать юзера нашего сайта
class User // классы принято называть с больших букв
{
    public $name; // свойство для имени
    public $age; // свойство для возраста

    // Создаем метод:
    public function show($str)
    {
        return $str . '!!!';
    }
}

// Сделайте класс Employee (работник), в котором будут следующие свойства:
//name (имя), age (возраст), salary (зарплата).
class Employee
{
    public $name;
    public $age;
    public $salary;

    // Создаем метод который будет возвращать имя работника:
    public function getName()
    {
        return $this->name; // вернем имя из свойства
    }

    // Создаем метод который будет возвращать возраст работника:
    public function getAge()
    {
        return $this->age; // вернем возраст работника из свойства
    }

    // Создаем метод который будет возвращать зарплату работника:
    public function getSalary()
    {
        return $this->salary; // вернем зарплату работника из свойства
    }

    // Создаем метод который будет проверять то, что работнику больше 18 лет:
    public function checkAge()
    {
        if ($this->age > 18)
        {
            return true; // вернем true
        } else {
            return false; // вернем false
        }
    }
}

// внутри метода этого класса, вместо имени объекта следует писать специальную переменную $this:
class User1
{
    public $name;
    public $age;

    // Создаем метод:
    public function show($str)
    {
        return $str . '!!!';
    }

    // Метод для проверки возраста:
    public function isAgeCorrect($age)
    {
        if ($age >= 18 and $age <= 60) {
            return true;
        } else {
            return false;
        }
    }

    // Метод для изменения возраста юзера:
    public function setAge($age)
    {
        // Проверим возраст на корректность:
        if ($this->isAgeCorrect($age)) {
            $this->age = $age;
        }
    }

    // Метод для добавления к возрасту:
    public function addAge($years)
    {
        $newAge = $this->age + $years; // вычислим новый возраст

        // Проверим возраст на корректность:
        if ($this->isAgeCorrect($newAge)) {
            $this->age = $newAge; // обновим, если новый возраст прошел проверку
        }
    }
}

// Сделайте класс Rectangle, в котором в свойствах будут записаны ширина и высота прямоугольника
class Rectangle
{
    public $width;
    public $height;

    // метод getSquare, который будет возвращать площадь этого прямоугольника
    public function getSquare()
    {
        return $this->width * $this->height;
    }

    // метод getPerimeter, который будет возвращать периметр этого прямоугольника
    public function getPerimeter()
    {
        return ($this->width + $this->height) * 2;
    }
}

// Обычно все приватные методы размещают в конце класса, давайте перенесем наш метод в самый низ
class User2
{
    public $name;
    public $age;

    // Метод для изменения возраста юзера:
    public function setAge($age)
    {
        // Проверим возраст на корректность:
        if ($this->isAgeCorrect($age)) {
            $this->age = $age;
        }
    }

    // Метод для добавления к возрасту:
    public function addAge($years)
    {
        $newAge = $this->age + $years; // вычислим новый возраст

        // Проверим возраст на корректность:
        if ($this->isAgeCorrect($newAge)) {
            $this->age = $newAge; // обновим, если новый возраст прошел проверку
        }
    }

    // Метод для проверки возраста:
    private function isAgeCorrect($age)
    {
        return $age >= 18 and $age <= 60;
    }
}

// Сделайте класс Student со свойствами $name и $course (курс студента, от 1-го до 5-го)
class Student
{
    public $name;
    public $course;

    // метод transferToNextCourse, который будет переводить студента на следующий курс
    public function transferToNextCourse($course)
    {
        $newCourse = $this->course + 1; // вычислим новый курс

        // Проверим курс на корректность:
        if ($this->isCourseCorrect($newCourse)) {
            $this->course = $newCourse; // обновим, если новый курс прошел проверку
        }
    }

    // Вынесите проверку курса в отдельный private метод isCourseCorrect
    private function isCourseCorrect($course)
    {
        if ($course < 5) {
            return true;
        } else {
            return false;
        }
    }

}

// переделаем наш код, применив конструктор:
class User4
{
    public $name;
    public $age;

    // Конструктор объекта:
    public function __construct($name, $age)
    {
        $this->name = $name; // запишем данные в свойство name
        $this->age = $age; // запишем данные в свойство age
    }
}

// Для решения проблемы сделаем еще один метод getAge,
// с помощью которого мы будем прочитывать значения свойства age:
class User5
{
    public $name;
    private $age; // объявим возраст приватным

    // Метод для чтения возраста юзера:
    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        if ($this->isAgeCorrect($age)) {
            $this->age = $age;
        }
    }

    private function isAgeCorrect($age)
    {
        return $age >= 18 and $age <= 60;
    }
}

// сделаем так, чтобы в объекте какое-то свойство было доступно только для чтения,
// но не для записи (англ. read-only)
class User6
{
    private $name;
    private $age;

    // Конструктор объекта:
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    // Геттер для имени:
    public function getName()
    {
        return $this->name;
    }

    // Геттер для возраста:
    public function getAge()
    {
        return $this->age;
    }

    // Сеттер для возраста:
    public function setAge($age)
    {
        $this->age = $age;
    }
}

// Хранение объектов в массивах
class User7
{
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

// Начальные значения свойств в конструкторе
// Пусть у нас есть класс Student с двумя свойствами - name и course (курс студента).
// Сделаем так, чтобы имя студента приходило параметром при создании объекта, а курс автоматически принимал значение 1:

// Пусть имя созданного студента будет неизменяемым и доступным только для чтения,
// а вот для курса мы сделаем метод, который будет переводить нашего студента на следующий курс:
class Student1
{
    private $name;
    private $course;

    public function __construct($name)
    {
        $this->name = $name;
        $this->course = 1;
    }

    // Геттер имени:
    public function getName()
    {
        return $this->name;
    }

    // Геттер курса:
    public function getCourse()
    {
        return $this->course;
    }

    // Перевод студента на новый курс:
    public function transferToNextCourse()
    {
        $this->course++;
    }
}

// Пусть у нас есть вот такой класс Arr,
// у которого есть метод add для добавления чисел и метод getSum для получения суммы всех добавленных чисел:
// исправим проблему, объявив наше свойство пустым массивом
class Arr
{
    private $numbers = []; // задаем начальное значение свойства как []

    public function add($num)
    {
        $this->numbers[] = $num;
    }

    public function getSum()
    {
        return array_sum($this->numbers); // функция array_sum пытается найти сумму массива из свойства numbers
    }
}

// Пусть у нас дан вот такой класс User с геттерами свойств:
class User8
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }
}

// Пусть у нас дан класс Arr, который хранит в себе массив чисел и может вычислять сумму этих чисел
// с помощью метода getSum.
// Сами числа приходят в виде массива в конструктор объекта,
// а также могут добавляться по одному с помощью метода add:
class Arr1
{
    private $numbers = []; // массив чисел

    public function __construct($numbers)
    {
        $this->numbers = $numbers; // записываем массив $numbers в свойство
    }

    // Добавляем еще одно число в наш массив:
    public function add($number)
    {
        $this->numbers[] = $number;
    }

    // Находим сумму чисел:
    public function getSum()
    {
        return array_sum($this->numbers);
    }
}

// Пусть у нас дан класс Arr, который хранит в себе массив чисел
// и может вычислять сумму этих чисел с помощью метода getSum.
// Числа могут добавляться по одному с помощью метода add, либо группой с помощью метода push:
class Arr2
{
    private $numbers = [];

    public function add($number)
    {
        $this->numbers[] = $number;
    }

    public function push($numbers)
    {
        $this->numbers = array_merge($this->numbers, $numbers);
    }

    public function getSum()
    {
        return array_sum($this->numbers);
    }
}












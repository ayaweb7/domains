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

// Для того, чтобы можно было написать такую цепочку, нужно, чтобы все методы,
// которые участвуют в цепочке возвращали $this (кроме последнего).
class Arr3
{
    private $numbers = []; // массив чисел

    public function add($number)
    {
        $this->numbers[] = $number;
        return $this; // вернем ссылку сами на себя
    }

    public function push($numbers)
    {
        $this->numbers = array_merge($this->numbers, $numbers);
        return $this; // вернем ссылку сами на себя
    }

    public function getSum()
    {
        return array_sum($this->numbers);
    }
}

// сделаем класс ArraySumHelper, который предоставит нам набор методов для работы с массивами.
// Каждый метод нашего класса будет принимать массив, что-то с ним делать и возвращать результат.
class ArraySumHelper
{
    public function getSum1($arr)
    {
        $sum = 0;

        foreach ($arr as $elem) {
            $sum += $elem; // первая степень элемента - это сам элемент
        }

        return $sum;
    }

    public function getSum2($arr)
    {
        $sum = 0;

        foreach ($arr as $elem) {
            $sum += pow($elem, 2); // возведем во вторую степень
        }

        return $sum;
    }

    public function getSum3($arr)
    {
        $sum = 0;

        foreach ($arr as $elem) {
            $sum += pow($elem, 3); // возведем в третью степень
        }

        return $sum;
    }

    public function getSum4($arr)
    {
        $sum = 0;

        foreach ($arr as $elem) {
            $sum += pow($elem, 4); // возведем в четвертую степень
        }

        return $sum;
    }
}

// Вместо того, чтобы реализовывать каждый метод заново, давайте лучше сделаем вспомогательный
// приватный метод getSum, который параметрами будет принимать массив и степень
// и возвращать сумму степеней элементов массива:
class ArraySumHelper1
{
    public function getSum1($arr)
    {
        return $this->getSum($arr, 1);
    }

    public function getSum2($arr)
    {
        return $this->getSum($arr, 2);
    }

    public function getSum3($arr)
    {
        return $this->getSum($arr, 3);
    }

    public function getSum4($arr)
    {
        return $this->getSum($arr, 4);
    }

    private function getSum($arr, $power) {
        $sum = 0;

        foreach ($arr as $elem) {
            $sum += pow($elem, $power);
        }

        return $sum;
    }
}

// код классов User и Employee практически полностью совпадает.
// Было бы намного лучше сделать так, чтобы общая часть была записана только в одном месте.
class User9
{
    private $name;
    private $age;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }
}

// Наследование реализуется с помощью ключевого слова extends (переводится как расширяет).
// Перепишем наш класс Employee так, чтобы он наследовал от User:
class Employee9 extends User9
{
    private $salary;

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

}

// мы хотели бы, чтобы некоторые методы или свойства родителя наследовались потомками,
// но при этом для всего остального мира вели себя как приватные.
class User10
{
    private $name;
    protected $age;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }
}

// Пусть теперь мы решили в классе Student сделать метод addOneYear,
// который будет добавлять 1 год к свойству age:
class Student10 extends User10
{
    private $course;

    // Реализуем этот метод:
    public function addOneYear()
    {
        $this->age++;
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($course)
    {
        $this->course = $course;
    }
}

// дан класс User с приватными свойствами name и age, а также геттерами и сеттерами этих свойств.
// При этом в сеттере возраста выполняется проверка возраста на то, что он равен или больше 18 лет:
class User11
{
    private $name;
    protected $age; // изменим модификатор доступа на protected

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if (strlen($name) >= 3) {
            $this->name = $name;
        }
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        if ($age >= 18) {
            $this->age = $age;
        }
    }
}

// метод setAge, который Student наследует от User нам чем-то не подходит, например,
// нам нужна также проверка того, что возраст студента до 25 лет
class Student11 extends User11
{
    private $course;

    // Перезаписываем метод родителя:
    public function setAge($age)
    {
//        if ($age >= 18 and $age <= 25) {
//            $this->age = $age;
//        }
        // Если возраст меньше или равен 25:
        if ($age <= 25) {
            // Вызываем метод родителя:
            parent::setAge($age); // в родителе выполняется проверка age >= 18
        }
    }

    public function setName($name)
    {
       // Если длина имени меньше или равен 10:
        if (strlen($name) <= 10) {
            // Вызываем метод родителя:
            parent::setName($name); // в родителе выполняется проверка name < 3
        }
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($course)
    {
        $this->course = $course;
    }
}

// класс User, у которого свойства name и age задаются в конструкторе и в дальнейшем доступны только для чтения
// (то есть приватные и имеют только геттеры, но не сеттеры):
class User12
{
    private $name; // объявим свойство приватным
    private $age;  // объявим свойство приватным

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age  = $age;
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

// Конструктор родителя можно вызвать внутри потомка с помощью parent.
// При этом конструктор родителя первым параметром ожидает имя, а вторым - возраст,
// и мы должны ему их передать
class Student12 extends User12
{
    private $course;

    // Конструктор объекта:
    public function __construct($name, $age, $course)
    {
        parent::__construct($name, $age); // вызываем конструктор родителя
        $this->course = $course;
    }

    public function getCourse()
    {
        return $this->course;
    }
}

//
class Employee27
{
    private $name;
    private $salary;

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}

// Давайте сделаем еще и класс EmployeesCollection, который будет хранить массив работников,
// то есть массив объектов класса Employee.
class EmployeesCollection27
{
    private $employees = [];

    // Получаем всех работников в виде массива:
    public function get()
    {
        return $this->employees;
    }

    // Подсчитываем количество хранимых работников:
    public function count()
    {
        return count($this->employees);
    }

    public function add($employee)
    {
        $this->employees[] = $employee;
    }

    public function getTotalSalary()
    {
        $sum = 0;

        foreach ($this->employees as $employee) {
            $sum += $employee->getSalary();
        }

        return $sum;
    }
}

// сделаем класс для работы с датой.
// Пусть этот класс параметром конструктора принимает дату в формате год-месяц-день
// и имеет следующие методы:
class Date30
{
    private $date;
    private $currentDate;
    public $formatStr = 'Y-m-d';
    private $timeZone = 'Europe/Kiev';
    const WEEK_DAYS = [
        'ru' => [
            'понедельник',
            'вторник',
            'среда',
            'четверг',
            'пятница',
            'суббота',
            'воскресенье'
        ],
        'uk' => [
            'Понеділок',
            'Вівторок',
            'Середа',
            'Четверг',
            'П`ятниця',
            'Субота',
            'Неділя'
        ]
    ];
    const MONTH = [
        'uk' => [
            'Січень',
            'Лютий',
            'Березень',
            'Квітень',
            'Травень',
            'Червень',
            'Липень',
            'Серпень',
            'Вересень',
            'Жовтень',
            'Листопад',
            'Грудень',
        ],
        'ru' => [
            'Январь',
            'Февраль',
            'Март',
            'Апрель',
            'Май',
            'Июнь',
            'Июль',
            'Август',
            'Сентябрь',
            'Октябрь',
            'Ноябрь',
            'Декабрь',
        ]
    ];
    public function __construct($date = null)
    {
        if (!is_null($date)) // если дата не передана - пусть берется текущая
        {
            $this->currentDate = $date;
            $this->date = new DateTime(
                $this->currentDate,
                new DateTimeZone($this->timeZone)
            );
        } else { // если дата не передана - пусть берется текущая дата в формате '$formatStr'
            $this->date = new DateTime(
                $time = 'now',
                new DateTimeZone($this->timeZone)
            );
            $this->currentDate = $this->format($this->formatStr);
        }
    }

    public function getDay()
    {
// возвращает день
        return 'Day: ' . $this->date->format('d');
    }

    public function getMonth($lang = null)
    {
// возвращает месяц
//        if(is_null($lang) || $lang == 'en') {
       if(is_null($lang)) {
            return 'Month: ' . $this->date->format('m');
        } elseif($lang == 'en')  {
            return 'Month: ' . $this->date->format('F');
        } else {
            return 'Month: ' . self::MONTH[$lang][($this->date->format('n') - 1)];
        }
    }

    public function getYear()
    {
// возвращает год
        return 'Year: ' . $this->date->format('Y');
    }

    public function getWeekDay($lang = null)
    {
// возвращает день недели
        if(is_null($lang)) {
            return 'WeekDay: ' . $this->date->format('N');
        }
        $day = '';
        if ($lang == 'en') {
            $day = $this->date->format('l');
        } else {
            $day = self::WEEK_DAYS[$lang][($this->date->format('N') - 1)];
        }

        return 'WeekDay: ' . $day;
    }

    public function addDay($value)
    {
// добавляет значение $value к дню
        $this->date->add( new DateInterval('P' . $value . 'D') );
        return $this;
    }

    public function subDay($value)
    {
// отнимает значение $value от дня
        $this->date->sub( new DateInterval('P' . $value . 'D') );
        return $this;
    }

    public function addMonth($value)
    {
// добавляет значение $value к месяцу
        $this->date->add( new DateInterval('P' . $value . 'M') );
        return $this;
    }

    public function subMonth($value)
    {
// отнимает значение $value от месяца
        $this->date->sub( new DateInterval('P' . $value . 'M') );
        return $this;
    }

    public function addYear($value)
    {
// добавляет значение $value к году
        $this->date->add( new DateInterval('P' . $value . 'Y') );
        return $this;
    }

    public function subYear($value)
    {
// отнимает значение $value от года
        $this->date->sub( new DateInterval('P' . $value . 'Y') );
        return $this;
    }

    public function format($format)
    {
// выведет дату в указанном формате
// формат пусть будет такой же, как в функции date
        return $this->date->format($format);
    }

    public function __toString()
    {
        return $this->format($this->formatStr);
    }
}
// 31. Тренировка с датами
class Date31
{
    private $date;
    private $currentDate;
    public $formatStr = 'Y-m-d';
    private $timeZone = 'Europe/Kiev';
    const WEEK_DAYS = [
        'ru' => [
            'понедельник',
            'вторник',
            'среда',
            'четверг',
            'пятница',
            'суббота',
            'воскресенье'
        ],
        'uk' => [
            'Понеділок',
            'Вівторок',
            'Середа',
            'Четверг',
            'П`ятниця',
            'Субота',
            'Неділя'
        ]
    ];
    const MONTH = [
        'uk' => [
            'Січень',
            'Лютий',
            'Березень',
            'Квітень',
            'Травень',
            'Червень',
            'Липень',
            'Серпень',
            'Вересень',
            'Жовтень',
            'Листопад',
            'Грудень',
        ],
    ];

    public function __construct($date = null)
    {
// если дата не передана - пусть берется текущая
        if (!is_null($date))
        {
            $this->currentDate = $date;
            $this->date = new DateTime(
                $this->currentDate,
                new DateTimeZone($this->timeZone)
            );
        } else {
            $this->date = new DateTime(
                $time = 'now',
                new DateTimeZone($this->timeZone)
            );
            $this->currentDate = $this->format($this->formatStr);
        }
    }

    public function getYear()
    {
        return 'Year: ' . $this->date->format('Y'); // возвращает год
//        return $this->date = new DateTime(); // если дата не передана - пусть берется текущая
//        return date_format($this->date, 'Y');
    }
}

// Класс Interval в ООП на PHP
//Давайте реализуем класс, который будет находить разницу между двумя датами.
// Пусть конструктор этого класса параметрами принимает две даты, представляющие объекты класса Date,
// созданного нами в предыдущем уроке, и находит разницу между датами в днях, месяцах и годах:
class Interval
{
    private $date1;
    private $data2;
    private $interval;
    public function __construct(Date30 $date1, Date30 $date2)
    {
        $this->date1 = new DateTime((string) $date1);
        $this->date2 = new DateTime((string) $date2);
        $this->interval = $this->date1->diff($this->date2);
    }

    public function toDays()
    {
// вернет разницу в днях
        return 'Days:' . $this->interval->format('%R%d');
    }

    public function toMonths()
    {
// вернет разницу в месяцах
        return 'Months:' . $this->interval->format('%R%m');
    }

    public function toYears()
    {
// вернет разницу в годах
        return 'Years:' . $this->interval->format('%R%y');
    }

    public function __toString()
    {
// выведет результат в виде массива
// ['years' => '', 'months' => '', 'days' => '']
        return sprintf(
            "[
'years' => %s,
'months' => %s,
'days' => %s
]"
            ,$this->toYears(),
            $this->toMonths(),
            $this->toDays());
    }
}












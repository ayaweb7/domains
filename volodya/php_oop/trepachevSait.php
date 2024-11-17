<?php
// Добавлять в отчёт все ошибки PHP
error_reporting(-1);

require_once 'classes/trepachevClasses.php';

// 1. object
// Создаем объект нашего класса
// Объекты классов принято называть маленькими буквами:
$user = new User; // создаем объект нашего класса
$user->name = 'john'; // записываем имя в свойство name
$user->age = 25; // записываем возраст в свойство age

echo 'Primer 1. object <br>';
echo $user->name; // выводим записанное имя
echo $user->age. '<br>'; // выводим записанный возраст


// 2. object
// Первый объект
$user1 = new User; // создаем первый объект
$user1->name = 'john'; // записываем имя
$user1->age = 25; // записываем возраст

// Второй объект
$user2 = new User; // создаем второй объект
$user2->name = 'eric'; // записываем имя
$user2->age = 30; // записываем возраст

// Найдем сумму возрастов:
echo '<br>Primer 2. object <br>';
echo ($user1->age + $user2->age) . '<br>'; // выведет 55


// 3. object
// Создайте объект класса Employee, затем установите его свойства в следующие значения:
// имя 'john', возраст 25, зарплата 1000.
$employee1 = new Employee;
$employee1->name = 'john';
$employee1->age = 25;
$employee1->salary = 1000;

// Создайте второй объект класса Employee, установите его свойства в следующие значения:
// имя 'eric', возраст 26, зарплата 2000.
$employee2 = new Employee;
$employee2->name = 'eric';
$employee2->age = 26;
$employee2->salary = 2000;

// Выведите на экран сумму зарплат созданных юзеров
echo '<br>Primer 3. object <br>';
echo ($employee1->salary + $employee2->salary) . '<br>'; // выведет 3000

//4. method
// Вызовем наш метод:
echo '<br>Primer 4. method <br>';
echo $user->show('') . '<br>'; // выведет '!!!'

//5. method
// Вызовем наш метод:
echo '<br>Primer 5. method <br>';
echo $user->show('Hello') . '<br>'; // выведет 'Hello!!!'

// 6. this
echo '<br>Primer 6. this <br>';
$user1 = new User1; // создаем объект класса
$user1->name = 'john'; // записываем имя
$user1->age = 25; // записываем возраст
// Вызываем наш метод:
//echo $user1->show() . '<br>'; // выведет 'john'

// 7. this
echo '<br>Primer 7. this <br>';
// Выведите на экран сумму зарплат созданных работников
// Вызываем наш метод:
echo $employee1->getSalary() + $employee2->getSalary() . '<br>'; // выведет 3000

// 8. this - Запись свойств
echo '<br>Primer 8. this - Запись свойств <br>';
// Установим новое имя:
//$user1->setName('eric');

// Проверим, что имя изменилось:
echo $user1->name . '<br>'; // выведет 'eric'

// 9. this - Запись свойств
echo '<br>Primer 9. this - Запись свойств <br>';
$user1->setAge(40);

// Проверим, что возраст изменилось:
echo $user1->age . '<br>'; // выведет 40

// 10. this - Запись свойств
echo '<br>Primer 10. this - прямоугольник <br>';
$rectangle = new Rectangle; // создаем объект класса
$rectangle->width = 2; // записываем ширину прямоугольника
$rectangle->height = 3; // записываем высоту прямоугольника
// Вызываем наш методы:
echo $rectangle->getSquare() . '<br>'; // выведет 6
echo $rectangle->getPerimeter() . '<br>'; // выведет 10

// 11. public & private
echo '<br>Primer 11. public & private <br>';
$student = new Student;
$student->course = 3;

echo $student->transferToNextCourse(3) . '<br>'; // выведет 4

// 12. __construkt
echo '<br>Primer 12. __construkt <br>';
$user = new User4('Nik', 55); // создадим объект, сразу заполнив его данными

echo $user->name . '<br>'; // выведет 'john'
echo $user->age . '<br>'; // выведет 25

// 13. Работа с геттерами и сеттерами
echo '<br>Primer 13. Работа с геттерами и сеттерами <br>';
$user = new User5;

// Установим возраст:
$user->setAge(50);

// Прочитаем новый возраст:
echo $user->getAge() . '<br>'; // выведет 50

// 14. Свойства только для чтения
echo '<br>Primer 14. Свойства только для чтения <br>';
$user = new User6('john', 25); // создаем объект с начальными данными

// Имя можно только читать, но нельзя поменять:
echo $user->getName() . '<br>'; // выведет 'john'

// Возраст можно и читать, и менять:
echo $user->getAge() . '<br>'; // выведет 25
echo $user->setAge(30); // установим возраст в значение 30
echo $user->getAge() . '<br>'; // выведет 30

// 15. Хранение объектов в массивах
echo '<br>Primer 15. Хранение объектов в массивах <br>';
// добавим элементы в массив сразу при его создании, избавится от промежуточных переменных :
$users = [
    new User7('john', 21),
    new User7('eric', 22),
    new User7('kyle', 23)
];

var_dump($users);

// Затем эти объекты можно, к примеру, перебрать циклом
// Переберем созданный массив циклом:
echo '<br>';
foreach ($users as $user) {
    echo $user->name . ' ' . $user->age . '<br>';
}

// 16. Начальные значения свойств в конструкторе
echo '<br>Primer 16. Начальные значения свойств в конструкторе <br>';
$student = new Student1('john'); // создаем объект класса

echo $student->getName() . ' ' .  $student->getCourse(). '<br>'; // выведет 1 - начальное значение
$student->transferToNextCourse(); // переведем студента на следующий курс
echo $student->getName() . ' ' . $student->getCourse(). '<br>'; // выведет 2

// 17. Начальные значения свойств при объявлении
echo '<br>Primer 17. Начальные значения свойств при объявлении <br>';
$arr = new Arr;

$arr->add(1);
$arr->add(2);
$arr->add(3);

echo $arr->getSum() . '<br>'; // выведет 6

// что будет, если сразу после создания вызвать метод getSum?
$arr = new Arr;
echo $arr->getSum() . '<br>'; // выведет 0

// 18. Переменные названия свойств объектов
echo '<br>Primer 18. Переменные названия свойств объектов <br>';
// в переменной $method хранится имя метода. Давайте вызовем метод с таким именем:
$user = new User8('john', 21);

$method = 'getName';
echo $user->$method() . '<br>'; // выведет 'john'
$methods = ['getName', 'getAge'];
// Если имя метода получается из массива, то такое обращение к методу следует брать в фигурные скобки
// вот таким образом (круглые скобки будут снаружи фигурных):
echo $user->{$methods[0]}() . '<br>'; // выведет 'john'

// 19. Вызов метода сразу после создания объекта
echo '<br>Primer 19. Вызов метода сразу после создания объекта <br>';
$arr = new Arr1([1, 2, 3]); // создаем объект, записываем в него массив [1, 2, 3]
$arr->add(4); // добавляем в конец массива число 4
$arr->add(5); // добавляем в конец массива число 5

// Находим сумму элементов массива:
echo $arr->getSum() . '<br>'; // выведет 15

// Если мы больше не планируем делать никаких манипуляций с объектом,
// то код выше можно переписать короче: можно создать объект и сразу вызвать его метод getSum:
echo (new Arr1([1, 2, 3]))->getSum() . '<br>'; // выведет 6

// Вот еще пример - найдем сумму двух массивов:
echo (new Arr1([1, 2, 3]))->getSum() + (new Arr1([4, 5, 6]))->getSum() . '<br>';

// 20. Цепочки методов
echo '<br>Primer 20. Цепочки методов <br>';
$arr = new Arr2; // создаем объект

$arr->add(1); // добавляем в массив число 1
$arr->add(2); // добавляем в массив число 2
$arr->push([3, 4]); // добавляем группу чисел

echo $arr->getSum() . '<br>'; // находим сумму элементов массива

// Пусть теперь мы хотим сделать так, чтобы методы вызывались не отдельно, а цепочкой, вот так:
$arr = new Arr3; // создаем объект
echo $arr->add(1)->add(2)->push([3, 4])->getSum() . '<br>'; // это наша цель

// Можно упростить еще больше:
echo (new Arr3)->add(1)->add(2)->push([3, 4])->getSum() . '<br>'; // выведет 10

// 21. Цепочки методов
echo '<br>Primer 21. Класс как набор методов <br>';
$arraySumHelper = new ArraySumHelper;

$arr = [1, 2, 3];
echo $arraySumHelper->getSum1($arr) . '<br>';
echo $arraySumHelper->getSum2($arr) . '<br>';
echo $arraySumHelper->getSum3($arr) . '<br>';
echo $arraySumHelper->getSum4($arr) . '<br>';

// 22. Цепочки методов
echo '<br>Primer 22. Класс как набор методов <br>';
$arraySumHelper = new ArraySumHelper1;

$arr = [1, 2, 3];
echo $arraySumHelper->getSum1($arr) . '<br>';
echo $arraySumHelper->getSum2($arr) . '<br>';
echo $arraySumHelper->getSum3($arr) . '<br>';
echo $arraySumHelper->getSum4($arr) . '<br>';

// 23. Наследование классов
echo '<br>Primer 23. Наследование классов <br>';
$employee = new Employee9;

$employee->setSalary(1000); // метод класса Employee
$employee->setName('john'); // метод унаследован от родителя
$employee->setAge(25); // метод унаследован от родителя

echo $employee->getSalary(); // метод класса Employee
echo $employee->getName(); // метод унаследован от родителя
echo $employee->getAge() . '<br>'; // метод унаследован от родителя

// 24. Модификатор доступа protected
echo '<br>Primer 24. Модификатор доступа protected <br>';
$student = new Student10();

$student->setName('john'); // установим имя
$student->setCourse(3);    // установим курс
$student->setAge(25);      // установим возраст в 25

$student->addOneYear();    // увеличим возраст на единицу
echo $student->getAge() . '<br>';   // выведет 26

echo 'Попытка обратится к свойству age снаружи класса выдаст ошибку, как нам и нужно: <br>';
//$student = new Student10();
//$student->age = 30; // выдаст ошибку

// 25. Перезапись методов родителя в классе потомке
echo '<br>Primer 25. Перезапись методов родителя в классе потомке <br>';
$student = new Student11;

$student->setAge(24);    // укажем корректный возраст
echo $student->getAge(); // выведет 24 - возраст поменялся

$student->setName('Norris');    // укажем корректное имя
echo $student->getName(); // выведет Norris - имя изменилось


$student->setAge(30);    // укажем некорректный возраст
echo $student->getAge(); // выведет 24 - возраст не поменялся

$student->setName('Nor');    // укажем корректное имя
$student->setName('NorrisNorriNor');    // укажем некорректное имя
echo $student->getName() . '<br>'; // выведет Norris - имя не изменилось

// 26. Перезапись конструктора родителя в потомке
echo '<br>Primer 26. Перезапись конструктора родителя в потомке <br>';
$student = new Student12('john', 19, 2);

echo $student->getName();   // выведет 'john'
echo $student->getAge();    // выведет 19
echo $student->getCourse() . '<br>'; // выведет 2

// 27. Передача объектов параметрами
echo '<br>Primer 27. Передача объектов параметрами <br>';
$employeesCollection = new EmployeesCollection27;

$employeesCollection->add(new Employee27('john', 100));
$employeesCollection->add(new Employee27('eric', 200));
$employeesCollection->add(new Employee27('kyle', 300));

echo $employeesCollection->getTotalSalary() . '<br>'; // выведет 600


// 30. Классы
echo '<br><br>Primer 30. Классы';
echo '<br>Primer 30. Класс Date в ООП <br>';
//$date = new Date30('2025-12-31');
$date = new Date30();
echo $date . '<br><br>';  // выведет '2025-12-31'

echo $date->getYear() . '<br><br>';  // выведет '2025'
/**/
echo $date->getMonth() . '<br>'; // выведет '12' - возвращает месяц
echo $date->getMonth('en') . '<br>'; // возвращает месяц по-английски
echo $date->getMonth('ru') . '<br>'; // возвращает месяц по-русски
echo $date->getMonth('uk') . '<br><br>'; // возвращает месяц по-украински
echo $date->getDay() . '<br><br>';   // выведет '31' - возвращает день

echo $date->getWeekDay() . '<br>';     // выведет '3'
echo $date->getWeekDay('ru') . '<br>'; // выведет 'среда'
echo $date->getWeekDay('en') . '<br>'; // выведет 'wednesday'
echo $date->getWeekDay('uk') . '<br><br>'; // выведет 'wednesday'

echo $date->addYear(1) . '<br><br>'; // '2026-12-31'

echo (new Date30('2025-12-31'))->addYear(1) . '<br>'; // '2026-12-31'
echo (new Date30('2025-12-31'))->addDay(1) . '<br>';  // '2026-01-01'

echo (new Date30('2025-12-31'))->subDay(3)->addYear(1) . '<br>'; // '2026-12-28'
echo (new Date30('2025-12-31'))->__toString() . '<br>';


// 31. Тренировка с датами
echo '<br>Primer 31. Тренировка с датами<br>';
$date = new Date31('2025-12-31');
//$date = new Date31();
echo $date->getYear() . '<br>';  // выведет '2025'
//echo $date;
//$user->name = 'john'; // записываем имя в свойство name

// 32. Класс Interval
echo '<br>Primer 32. Класс Interval<br>';
$date1 = new Date30('2025-12-31');
$date2 = new Date30('2026-11-28');

$interval = new Interval($date1, $date2);

echo $interval->toDays() . '<br>';   // выведет разницу в днях
echo $interval->toMonths() . '<br>'; // выведет разницу в месяцах
echo $interval->toYears() . '<br>';  // выведет разницу в годах
echo $interval->__toString() . '<br>';









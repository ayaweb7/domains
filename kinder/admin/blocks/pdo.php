<?php
session_start(); //Запускаем сессии
include_once "header.php"; //Подключаем header сайта

include_once "../class/Category.php"; //Подключаем класс для работы с меню на сайте

//Соеденяемся с базой данной «ox2.ru», хост «localhost», логин «root», пароль «ox2.ru»
$db = new PDO("mysql:dbname=doctor;host=localhost", "nikart", "arteeva12");

$category = new Category($db); //Создаем объект для работы с разделами меню
$category_1_id = $category->add("Новая категория 1", 1); //Добавляем новую категорию, функция возвращает id-добавленной строки
$category_2_id = $category->add("Новая категория 2", 1); //Добавляем новую категорию
$category_3_id = $category->add("Новая категория 3", 1); //Добавляем новую категорию
 
if ($category->delCategory($category_2_id)) { //Удаляем категорию
    echo "Удалена вторая категория!!<br/>";
}
if ($category->edit($category_1_id, "Старая категория", 1)) { //Редактируем категорию
    echo "Успешно изменено!<br/>";
}
echo "<p>Меню:</p>";
foreach ($category->getCategory(1) as $category_item) { //Выводим разделы меню
    echo $category_item->name . "<br/>";
}
?>

<!--
Для отправки запросов через PDO нужно сделать 4 основных шага:

Соединиться с базой данных:
?php $db = new PDO("mysql:dbname=ox2.ru;host=localhost", "root", "ox2.ru");  
Здесь имя базы данных «ox2.ru», хост «localhost», логин «root», пароль «ox2.ru»
Подготовить запрос на выполнение:
?php $query = $db->prepare("SELECT category.* FROM category WHERE language_id=:language_id"); 
:language_id - это переменная, которая будет установленна ниже
Подготовить входящие переменные:
?php $query->bindParam(":language_id", $language_id, PDO::PARAM_INT, 11); Подготовливаем переменную :language_id, устанавливаем ей тип PDO::PARAM_INT, и максимальное кол-во знаков - 11.
Чаще всего используются следующие типы:

PDO::PARAM_INT - числа
PDO::PARAM_STR - строки
PARAM_BOOL - числа от 0 до 10
Выполнить запрос: 
?php $query->execute();
Посмотреть нет ли ошибок:
?php print_r($query->errorInfo());
Вывести результат:
?php print_r($query->fetchAll(PDO::FETCH_OBJ));
Результат будет возвращен в виде массима объектов. Можно сделать в в виде числового массива, указав для функции fetchAll параметр PDO::FETCH_NUM, или в ввиде ассотивного PDO::FETCH_ASSOC
-->
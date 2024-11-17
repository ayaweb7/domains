<?php

/** 
 * Вложенные запросы MySQL
 * @author ox2.ru  
 */ 
class Request {

    private $_db = null;

    public function __construct() {
//Подключаемся к базе данных, и записываем подключение в переменную _db 
        $this->_db = new PDO("mysql:dbname=ox2.ru-test-base;host=localhost", "root", "");
    }

    /**
     * Возвращает список категорий и кол-во страниц в каждой категории
     */
    public function getCategory() {
        $query = $this->_db->prepare("SELECT 
            (SELECT COUNT(*) FROM `page` WHERE page.category_id = category.id) as `count`,  
            category.name 
            FROM category"); //Выполняем вложенные запрос к базе данных
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ); //Возвращаем выборку из базы
    }

}

$request = new Request();
$category_arr = $request->getCategory();
foreach ($category_arr as $category) { //Обходим список категорий
    echo $category->name . " [" . $category->count . "] <br/>"; //Выводим категории на экран
}
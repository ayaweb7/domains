<?php
/** 
 * Вложенные запросы MySQL
 * @author ox2.ru  
 */ 
class Request {

    private $_db = null;

    public function __construct() {
//Подключаемся к базе данных, и записываем подключение в переменную _db 
        $this->_db = new PDO("mysql:dbname=doctor;host=localhost", "nikart", "arteeva12");
    }

    /**
     * Возвращает список категорий и кол-во страниц в каждой категории
     */
    public function getCategory() {
        $query = $this->_db->prepare("SELECT 
            (SELECT COUNT(*) FROM `page_select` WHERE page_select.category_id = category_select.id) as `count`,  
            category_select.name 
            FROM category_select"); //Выполняем вложенные запрос к базе данных
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ); //Возвращаем выборку из базы
    }

}
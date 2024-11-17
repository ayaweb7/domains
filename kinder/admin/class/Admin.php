<?php
/** 
 * Вложенные запросы MySQL - Admin
 * @author ox2.ru  
 */ 
class Admin {

    private $_db = null;

    public function __construct() {
//Подключаемся к базе данных, и записываем подключение в переменную _db 
        $this->_db = new PDO("mysql:dbname=doctor;host=localhost", "nikart", "arteeva12");
    }

    /**
     * Возвращает список категорий и кол-во страниц в каждой категории
     */
    public function getMenu() {
        $query = $this->_db->prepare("SELECT * FROM menu_admin
            INNER JOIN pages ON menu_admin.page_id = pages.page_id"); //Выполняем вложенные запрос к базе данных
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ); //Возвращаем выборку из базы
    }

}
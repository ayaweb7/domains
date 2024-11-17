<?php
/** 
 * Выборка городов из базы данных - SelectTown
 * @author ox2.ru  
 */ 
class SelectTown {

    private $_db = null;

    public function __construct() {
//Подключаемся к базе данных, и записываем подключение в переменную _db 
        $this->_db = new PDO("mysql:dbname=doctor;host=localhost", "nikart", "arteeva12");
    }

    /**
     * Возвращает список городов
     */
    public function getMenu() {
        $query = $this->_db->prepare("SELECT * FROM towns WHERE town_id != 5");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ); //Возвращаем выборку из базы
    }

}
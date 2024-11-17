<?php
/** 
 * Выборка продавцов услуг и товаров из базы данных - TownSelect
 * @author ox2.ru  
 */ 
class SelectStore {

    private $_db = null;

    public function __construct() {
//Подключаемся к базе данных, и записываем подключение в переменную _db 
        $this->_db = new PDO("mysql:dbname=doctor;host=localhost", "nikart", "arteeva12");
    }

    /**
     * Возвращает список продавцов услуг и товаров
     */
    public function getMenu($store) {
        $query = $this->_db->prepare("SELECT * FROM store WHERE store_name == '$store'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ); //Возвращаем выборку из базы
    }

}
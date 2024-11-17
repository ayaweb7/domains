<?php
/** 
 * Класс для работы с меню на сайте. Класс должен читать/добавлять/изменять/удалять разделы меню на сайте.
 * @author дизайн студия ox2.ru 
 */ 
class Category {
    private $_db = null;
 
    public function __construct(PDO $db) {
        $this->_db = $db;
    }
 
    /**
     * Добавление нового раздела меню
     * @param <string> $name - название раздела меню
     * @param <integer> $language_id - язык разделов меню (русский?)
     * @return <object>
     */
    public function add($name, $language_id = 0) {
        $query = $this->_db->prepare("INSERT INTO category (created, name, language_id) VALUES (NOW(), :name, :language_id)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":language_id", $language_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $this->_db->lastInsertId(); //возвращаем id-добавленной строки
    }
 
    /**
     * Редактирование меню
     * @param <integer> $category_id - id раздела, который необходимо редактировать
     * @param <string> $name - название раздела меню
     * @param <integer> $language_id - язык разделов меню (русский?)
     * @return <boolean>
     */
    public function edit($category_id, $name, $language_id = 0) {
        $query = $this->_db->prepare("UPDATE category SET  name = :name, language_id=:language_id WHERE category_id=:category_id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":language_id", $language_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        return $query->execute();
    }
 
    /**
     *
     * @param <integer> $language_id - язык разделов меню (русский?)
     * @return <boolean>
     */
    public function getCategory($language_id = 0) {
        $query = $this->_db->prepare("SELECT category.* FROM category WHERE language_id=:language_id");
        $query->bindParam(":language_id", $language_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
 
    /**
     *
     * @param <integer> $category_id - id раздела, который необходимо удалить
     * @return <boolean>
     */
    public function delCategory($category_id) {
        $query = $this->_db->prepare("DELETE FROM category WHERE category_id = :category_id");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        return $query->execute();
    }
 
}
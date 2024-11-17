<?php

/** 
 * ��������� ������� MySQL
 * @author ox2.ru  
 */ 
class Request {

    private $_db = null;

    public function __construct() {
//������������ � ���� ������, � ���������� ����������� � ���������� _db 
        $this->_db = new PDO("mysql:dbname=ox2.ru-test-base;host=localhost", "root", "");
    }

    /**
     * ���������� ������ ��������� � ���-�� ������� � ������ ���������
     */
    public function getCategory() {
        $query = $this->_db->prepare("SELECT 
            (SELECT COUNT(*) FROM `page` WHERE page.category_id = category.id) as `count`,  
            category.name 
            FROM category"); //��������� ��������� ������ � ���� ������
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ); //���������� ������� �� ����
    }

}

$request = new Request();
$category_arr = $request->getCategory();
foreach ($category_arr as $category) { //������� ������ ���������
    echo $category->name . " [" . $category->count . "] <br/>"; //������� ��������� �� �����
}
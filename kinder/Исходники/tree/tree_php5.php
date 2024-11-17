<?php 
/** 
 * PHP5 (���)  
 * ��������� ������ (���� �������������� ����������) 
 * @author ������ ������ ox2.ru    
 */ 
class TreeOX2 { 

    private $_db = null; 
    private $_category_arr = array(); 

    public function __construct() { 
        //������������ � ���� ������, � ���������� ����������� � ���������� _db 
        $this->_db = new PDO("mysql:dbname=ox2.ru-test-base;host=localhost", "root", ""); 
        //� ���������� $_category_arr ���������� ��� ��������� (��. ����) 
        $this->_category_arr = $this->_getCategory(); 
    } 

    /** 
     * ����� ������ �� ������� category ��� ������, �  
     * ���������� ��������� ������, � ������� ������ ���� - id - ��������  
     * ��������� (parent_id) 
     * @return Array  
     */ 
    private function _getCategory() { 
        $query = $this->_db->prepare("SELECT * FROM `category`"); //������� ������ 
        $query->execute(); //��������� ������ 
        //������ ��� ������� � ���������� � ���������� $result 
        $result = $query->fetchAll(PDO::FETCH_OBJ); 
        //�������������� ������ (������ �� ����������� ������� - ���������, � �������  
        //������ ���� - parent_id) 
        $return = array(); 
        foreach ($result as $value) { //������� ������ 
            $return[$value->parent_id][] = $value; 
        } 
        return $return; 
    } 

    /** 
     * ����� ������ 
     * @param Integer $parent_id - id-�������� 
     * @param Integer $level - ������� ���������� 
     */ 
    public function outTree($parent_id, $level) { 
        if (isset($this->_category_arr[$parent_id])) { //���� ��������� � ����� parent_id ���������� 
            foreach ($this->_category_arr[$parent_id] as $value) { //������� �� 
                /** 
                 * ������� ���������  
                 *  $level * 25 - ������, $level - ������ ������� ������� ���������� (0,1,2..) 
                 */ 
                echo "<div style=\"margin-left:" . ($level * 25) . "px;\">" . $value->name . "</div>"; 
                $level++; //����������� ������� ���������� 
                //���������� �������� ���� �� �����, �� � ����� $parent_id � $level 
                $this->outTree($value->id, $level); 
                $level--; //��������� ������� ���������� 
            } 
        } 
    } 

} 

$tree = new TreeOX2(); 
$tree->outTree(0, 0); //������� ������ 
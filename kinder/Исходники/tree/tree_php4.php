<?php 
/** 
 * PHP4 
 * ��������� ������ (���� �������������� ����������) 
 * @author ������ ������ ox2.ru    
 */ 
mysql_connect("localhost", "root"); //������������ � ���� ������ 
mysql_select_db("ox2.ru-test-base"); //�������� ���� ������ 

/** 
 * ����� ������ �� ������� category ��� ������, �  
 * ���������� ��������� ������, � ������� ������ ���� - id ��������  
 * ��������� (parent_id) 
 * @return Array  
 */ 
function getCategory() { 
    $query = mysql_query("SELECT * FROM `category`"); 
    $result = array(); 
    while ($row = mysql_fetch_array($query)) { 
        $result[$row["parent_id"]][] = $row; 
    } 
    return $result; 
} 

//� ���������� $category_arr ���������� ��� ��������� 
$category_arr = getCategory(); 

/** 
 * ����� ������ 
 * @param Integer $parent_id - id-�������� 
 * @param Integer $level - ������� ���������� 
 */ 
function outTree($parent_id, $level) { 
    global $category_arr; //������ ���������� $category_arr ������� � ������� 
    if (isset($category_arr[$parent_id])) { //���� ��������� � ����� parent_id ���������� 
        foreach ($category_arr[$parent_id] as $value) { //������� 
            /** 
             * ������� ���������  
             *  $level * 25 - ������, $level - ������ ������� ������� ���������� (0,1,2..) 
             */ 
            echo "<div style=\"margin-left:" . ($level * 25) . "px;\">" . $value["name"] . "</div>"; 
            $level = $level + 1; //����������� ������� ���������� 
            //���������� �������� ��� �� �������, �� � ����� $parent_id � $level 
            outTree($value["id"], $level); 
            $level = $level - 1; //��������� ������� ���������� 
        } 
    } 
} 

outTree(0, 0);
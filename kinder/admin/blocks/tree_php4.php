<?php 
/** 
 * PHP4 
 * ��������� ������ (���� �������������� ����������) 
 * @author ������ ������ ox2.ru    
 */ 
//mysqli_connect("localhost", "nikart", "arteeva12"); //������������ � ���� ������ 
//mysqli_select_db("doctor"); //�������� ���� ������ 


require_once 'date_base.php'; // ����������� � ����� ������

/** 
 * ����� ������ �� ������� category ��� ������, �  
 * ���������� ��������� ������, � ������� ������ ���� - id ��������  
 * ��������� (parent_id) 
 * @return Array  
 */ 
function getCategory() { 
    global $db;
	$query = mysqli_query($db, "SELECT * FROM menu_admin") or die(mysqli_error($db)); 
    $result = array(); 
    while ($row = mysqli_fetch_array($query)) { 
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
            outTree($value["menu_id"], $level); 
            $level = $level - 1; //��������� ������� ���������� 
        } 
    } 
} 

outTree(0, 0);
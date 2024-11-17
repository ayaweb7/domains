<?php 
/** 
 * PHP4 
 * Постоение дерева (меню неограниченной вложености) 
 * @author дизайн студия ox2.ru    
 */ 
//mysqli_connect("localhost", "nikart", "arteeva12"); //Подключаемся к базе данных 
//mysqli_select_db("doctor"); //Выбираем базу данных 


require_once 'date_base.php'; // Соединяемся с базой данных

/** 
 * Метод читает из таблицы category все сточки, и  
 * возвращает двумерный массив, в котором первый ключ - id родителя  
 * категории (parent_id) 
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

//В переменную $category_arr записываем все категории 
$category_arr = getCategory(); 

/** 
 * Вывод дерева 
 * @param Integer $parent_id - id-родителя 
 * @param Integer $level - уровень вложености 
 */ 
function outTree($parent_id, $level) { 
    global $category_arr; //Делаем переменную $category_arr видимой в функции 
    if (isset($category_arr[$parent_id])) { //Если категория с таким parent_id существует 
        foreach ($category_arr[$parent_id] as $value) { //Обходим 
            /** 
             * Выводим категорию  
             *  $level * 25 - отступ, $level - хранит текущий уровень вложености (0,1,2..) 
             */ 
            echo "<div style=\"margin-left:" . ($level * 25) . "px;\">" . $value["name"] . "</div>"; 
            $level = $level + 1; //Увеличиваем уровень вложености 
            //Рекурсивно вызываем эту же функцию, но с новым $parent_id и $level 
            outTree($value["menu_id"], $level); 
            $level = $level - 1; //Уменьшаем уровень вложености 
        } 
    } 
} 

outTree(0, 0);
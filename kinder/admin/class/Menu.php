<?php
/** 
 * Вложенные запросы MySQL - Menu
 * @author ox2.ru  
 */ 
class Menu {
	
	//Получаем массив нашего меню из БД в виде массива
	function getCat($mysqli){
		$sql = 'SELECT * FROM menu_admin';
		$res = $mysqli->query($sql);

		//Создаем масив где ключ массива является ID меню
		$cat = array();
		while($row = $res->fetch_assoc()){
			$cat[$row['menu_id']] = $row;
		}
		return $cat;
	}

	//Функция построения дерева из массива от Tommy Lacroix
	function getTree($dataset) {
		$tree = array();

		foreach ($dataset as $id => &$node) {    
			//Если нет вложений
			if (!$node['parent_id']){
				$tree[$id] = &$node;
			}else{ 
				//Если есть потомки то перебераем массив
				$dataset[$node['parent_id']]['childs'][$id] = &$node;
			}
		}
		return $tree;
	}

	//Получаем подготовленный массив с данными
	$cat  = getCat($db);

	//Создаем древовидное меню
	$tree = getTree($cat);


	//Шаблон для вывода меню в виде дерева
	function tplMenu($category){
		$href = $category['url'];
	//	if($category['url'] != '/' or $category['url'] != '/admin') {
	//		echo $category['url'];
	//		$href = "pages/" .$category['url']. ".php";
	//	}
		
		$menu = '<li>
			<a href="'. $href. '" title="'. $category['name'] .'">'. 
			$category['name'].'</a>';
			
			if(isset($category['childs'])){
				$menu .= '<ul>'. showCat($category['childs']) .'</ul>';
			}
		$menu .= '</li>';
		
		return $menu;
	}

	/**
	* Рекурсивно считываем наш шаблон
	**/
	function showCat($data){
		$string = '';
		foreach($data as $item){
			$string .= tplMenu($item);
		}
		return $string;
	}
}
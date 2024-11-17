<?php
//Получаем массив нашего меню из БД в виде массива
	function getCat($mysqli){
		$sql = "SELECT * FROM menu_admin WHERE marker != 'service'";
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
		
		if($category['link'] == '/admin' or $category['link'] == '/') {
			$href = $category['link'];
			$hrefPart = '';
		
		} elseif($category['link'] == 'anchor') {
			$href = '#';
			$hrefPart = '';
		
		} elseif(isset($_GET['menu_id'])) {
			$href = $category['link'];
			$hrefPart = '../?page=';
		
		} elseif(isset($_GET['service_id'])) {
			$href = $category['link'];
			$hrefPart = '../?service=';
		
		}else {
			$href = $category['link']; // . '.php'
			$hrefPart = '?page='; // /admin/pages/
		}
		
		$menu = '<li>
			<a href="'. $hrefPart.$href. '" title="'. $category['titer'] .'">'. 
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
//Получаем HTML разметку
$cat_menu = showCat($tree);

//Выводим на экран
echo '<ul id="nav">'. $cat_menu .'</ul>';
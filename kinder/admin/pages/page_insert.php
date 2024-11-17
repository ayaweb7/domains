<?php
if(!empty($_SESSION['is_auth'])) {
    
	function getPage($db)
    {
        if(!isset($_POST['submit'])) {
			$name = $title = $url = $h1 = $h2 = $marker = $parent_id = $menu_date = '';
		
		} else {
			$name = $_POST['name'];
			$title = $_POST['titer'];
			$url = $_POST['link'];
			$h1 = $_POST['h1'];
			$h2 = $_POST['h2'];
			$marker = $_POST['marker'];
			$parent_id = $_POST['parent_id'];
			$menu_date = $_POST['menu_date'];
		}
		
        ob_start();
		include 'forms/form_page_insert.php';
    }

    function addPage($db)
    {
        if(isset($_POST['submit'])) {
            $fail = '';
			$name = mysqli_real_escape_string($db, $_POST['name']);
			$title = mysqli_real_escape_string($db, $_POST['titer']);
            $url = mysqli_real_escape_string($db, $_POST['link']);
			$h1 = mysqli_real_escape_string($db, $_POST['h1']);
            $h2 = mysqli_real_escape_string($db, $_POST['h2']);
            $marker = mysqli_real_escape_string($db, $_POST['marker']);
			$parent_id = mysqli_real_escape_string($db, $_POST['parent_id']);
			$menu_date = mysqli_real_escape_string($db, $_POST['menu_date']);

            $query = "SELECT COUNT(*) AS count FROM menu_admin WHERE link='$url'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            $isPage = mysqli_fetch_assoc($result)['count'];
			
			// PHP-функции
			function val_url_duble($field) {return ($field) ? "Страница с таким URL УЖЕ существует !!!<br>" : "";}
			function validate_name($field) {return ($field == "") ? "Не введено название страницы.<br>" : "";}
			function validate_title($field) {return ($field == "") ? "Не введен ярлычок.<br>" : "";}
			function validate_url($field) {return ($field == "") ? "Не введен URL.<br>" : "";}
			
			// Проверка на ошибки средствами PHP
			$fail = val_url_duble($isPage);
			$fail .= validate_name($name);
			$fail .= validate_title($title);
			$fail .= validate_url($url);
			

            if($fail != '') {
				$_SESSION['message'] = [
                    'text' => $fail,
                    'status' => 'error'
                ];
//				header('Location: /admin/header_tree.php'); die();
				
			} else {
                $query = "INSERT INTO menu_admin (name, titer, link, h1, h2, marker, parent_id, menu_date)
						VALUES ('$name', '$title', '$url', '$h1', '$h2', '$marker', '$parent_id', '$menu_date')";
                mysqli_query($db, $query) or die(mysqli_error($db));
                $_SESSION['message'] = [
                    'text' => 'Страница успешно добавлена!',
                    'status' => 'success'
                ];
			}
			if(isset($_SESSION['message'])) {
				$status = $_SESSION['message']['status'];
				$text = $_SESSION['message']['text'];
				echo "<div class=\"info\"><p class=\"$status\">$text</p></div>";

				unset($_SESSION['message']);
			}
			
        } else {
            return '';
        }
    }

    addPage($db);
    getPage($db);

} else {
	header('Location: /'); die();
}
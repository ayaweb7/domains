<?php

if(!empty($_SESSION['auth'])) {
    function getPage()
    {
//        $title = 'Add new page';

        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $title = $_POST['title'];
            $url = $_POST['url'];
			$menu = $_POST['menu'];
            $h1 = $_POST['h1'];
			$h2 = $_POST['h2'];
			$marker = $_POST['marker'];
            $photo_alt = $_POST['photo_alt'];
            $photo_name = $_POST['photo_name'];
			$page_date = $_POST['page_date'];
        } else {
            $name = $title = $url = $menu = $h1 = $h2 = $marker = $photo_alt = $photo_name = $page_date = '';
        }

        ob_start();
        include '../forms/form_page_insert.php';
//        $content = ob_get_clean();

//        include '../blocks/layout.php';
    }

    function addPage($db)
    {
        if(isset($_POST['submit'])) {
            $name = mysqli_real_escape_string($db, $_POST['name']);
			$title = mysqli_real_escape_string($db, $_POST['title']);
            $url = mysqli_real_escape_string($db, $_POST['url']);
			$menu = mysqli_real_escape_string($db, $_POST['menu']);
			$h1 = mysqli_real_escape_string($db, $_POST['h1']);
            $h2 = mysqli_real_escape_string($db, $_POST['h2']);
            $marker = mysqli_real_escape_string($db, $_POST['marker']);
			$photo_alt = mysqli_real_escape_string($db, $_POST['photo_alt']);
			$photo_name = mysqli_real_escape_string($db, $_POST['photo_name']);
            $page_date = mysqli_real_escape_string($db, $_POST['page_date']);

            $query = "SELECT COUNT(*) AS count FROM pages WHERE url='$url'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            $isPage = mysqli_fetch_assoc($result)['count'];
			
			// PHP-функции
			function val_url_duble($field) {return ($field) ? "Страница с таким URL УЖЕ существует !!!<br>" : "";}
			function validate_name($field) {return ($field == "") ? "Не введено название страницы.<br>" : "";}
			function validate_title($field) {return ($field == "") ? "Не введен ярлычок.<br>" : "";}
			function validate_url($field) {return ($field == "") ? "Не введен URL.<br>" : "";}
			function validate_menu($field) {return ($field == "") ? "Не введено наименование для меню.<br>" : "";}
			
			// Проверка на ошибки средствами PHP
			$fail = val_url_duble($isPage);
			$fail .= validate_name($name);
			$fail .= validate_title($title);
			$fail .= validate_url($url);
			$fail .= validate_menu($menu);


            if($fail != '') {
				$_SESSION['message'] = [
                    'text' => $fail,
                    'status' => 'error'
                ];
			} elseif($isPage) {
                $_SESSION['message'] = [
                    'text' => 'СТРАНИЦА с таким URL УЖЕ существует !!!',
                    'status' => 'error'
                ];
            } else {
                $query = "INSERT INTO pages (name, title, url, menu, h1, h2, marker, photo_alt, photo_name, page_date)
						VALUES ('$name', '$title', '$url', '$menu', '$h1', '$h2', '$marker', '$photo_alt', '$photo_name', '$page_date')";
                mysqli_query($db, $query) or die(mysqli_error($db));
                $_SESSION['message'] = [
                    'text' => 'Страница успешно добавлена!',
                    'status' => 'success'
                ];

//                header('Location: admin/'); die();
            }
        } else {
            return '';
        }
    }

    addPage($db);
    getPage();
} else {
 //   header('Location: admin/blocks/login.php'); die();
	header('Location: ../blocks/login.php'); die();
}



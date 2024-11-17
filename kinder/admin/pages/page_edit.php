<?php
session_start(); //Запускаем сессии
// Соединяемся с базой данных
require_once '../blocks/date_base.php';

if(!empty($_SESSION['is_auth'])) {
    function getPage($db)
    {
        

        if (isset($_GET['menu_id'])) {
            $id = $_GET['menu_id'];
			$title = 'Edit page';
			
            $query = "SELECT * FROM menu_admin WHERE menu_id='$id'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            $page = mysqli_fetch_assoc($result);

            if ($page) {
                if(isset($_POST['titer']) and isset($_POST['link']) and isset($_POST['h1']) and isset($_POST['h2']) and isset($_POST['marker'])) {
//				if(isset($_POST['submit'])) {
                    $name = mysqli_real_escape_string($db, $_POST['name']);
					$titer = mysqli_real_escape_string($db, $_POST['titer']);
                    $link = mysqli_real_escape_string($db, $_POST['link']);
                    $h1 = mysqli_real_escape_string($db, $_POST['h1']);
					$h2 = mysqli_real_escape_string($db, $_POST['h2']);
					$marker = mysqli_real_escape_string($db, $_POST['marker']);
                } else {
                    $name = mysqli_real_escape_string($db, $page['name']);
					$titer = mysqli_real_escape_string($db, $page['titer']);
                    $link = mysqli_real_escape_string($db, $page['link']);
                    $h1 = mysqli_real_escape_string($db, $page['h1']);
					$h2 = mysqli_real_escape_string($db, $page['h2']);
					$marker = mysqli_real_escape_string($db, $page['marker']);
                }

                ob_start();
				include '../header_tree.php'; // подключаем HEADER
                include '../forms/form_page_update.php';
				include '../blocks/footer.php'; // подключаем FOOTER
//                $content = ob_get_clean();

            } else {
                $content = 'Page not found - Cтраница не найдена !!!';
            }
        } else {
            $content = 'Page not selected - Cтраница не выбрана !!!';
        }

//        include 'layout.php';
    }

    function editPage($db)
    {
/**/        
//		if (isset($_POST['titer']) and isset($_POST['link']) and isset($_POST['h1']) and isset($_POST['h2']) and isset($_POST['marker'])) {
		if (isset($_POST['submit'])) {
            $name = $_POST['name'];
			$titer = $_POST['titer'];
            $link = $_POST['link'];
            $h1 = $_POST['h1'];
			$h2 = $_POST['h2'];
			$marker = $_POST['marker'];

            if (isset($_GET['menu_id'])) {
                $id = $_GET['menu_id'];
                $query = "SELECT * FROM menu_admin WHERE menu_id='$id'";
                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                $page = mysqli_fetch_assoc($result);

                if ($page['link'] != $link) {
                    $query = "SELECT COUNT(*) AS count FROM pages WHERE link='$link'";
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    $isPage = mysqli_fetch_assoc($result)['count'];

                    if ($isPage == 1) {
                        $_SESSION['message'] = [
                            'text' => 'Страница с таким URL существует !!!',
                            'status' => 'error'
                        ];
                    }
                }

                $query = "UPDATE menu_admin SET name='$name', titer='$titer', link='$link', h1='$h1', h2='$h2', marker='$marker' WHERE menu_id='$id'";
                mysqli_query($db, $query) or die(mysqli_error($db));

                $_SESSION['message'] = [
                    'text' => "Страница '{$page['titer']}' успешно изменена !",
                    'status' => 'success'
                    ];
            }
			
			if(isset($_SESSION['message'])) {
				$status = $_SESSION['message']['status'];
				$text = $_SESSION['message']['text'];
				echo "<div class=\"info\"><p class=\"$status\">$text</p></div>";

				unset($_SESSION['message']);
			}
/**/
        } else {
            return '';
        }
    }
	
    editPage($db);
    getPage($db);
} else {
    header('Location: /'); die();
}



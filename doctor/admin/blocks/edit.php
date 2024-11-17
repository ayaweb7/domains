<?php
// Соединяемся с базой данных
require_once 'date_base.php';

if(!empty($_SESSION['auth'])) {
    function getPage($db)
    {
        $title = 'Edit page';

        if (isset($_GET['page_id'])) {
            $id = $_GET['page_id'];
            $query = "SELECT * FROM pages WHERE page_id='$id'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            $page = mysqli_fetch_assoc($result);

            if ($page) {
                if(isset($_POST['title']) and isset($_POST['url']) and isset($_POST['h1']) and isset($_POST['h2']) and isset($_POST['marker'])) {
                    $title = mysqli_real_escape_string($db, $_POST['title']);
                    $url = mysqli_real_escape_string($db, $_POST['url']);
                    $h1 = mysqli_real_escape_string($db, $_POST['h1']);
					$h2 = mysqli_real_escape_string($db, $_POST['h2']);
					$marker = mysqli_real_escape_string($db, $_POST['marker']);
                } else {
                    $title = mysqli_real_escape_string($db, $page['title']);
                    $url = mysqli_real_escape_string($db, $page['url']);
                    $h1 = mysqli_real_escape_string($db, $page['h1']);
					$h2 = mysqli_real_escape_string($db, $page['h2']);
					$marker = mysqli_real_escape_string($db, $page['marker']);
                }

                ob_start();
                include 'form_admin.php';
                $content = ob_get_clean();

            } else {
                $content = 'Page not found - Cтраница не найдена !!!';
            }
        } else {
            $content = 'Page not selected - Cтраница не выбрана !!!';
        }

        include 'layout.php';
    }

    function editPage($db)
    {
        if (isset($_POST['title']) and isset($_POST['url']) and isset($_POST['h1']) and isset($_POST['h2']) and isset($_POST['marker'])) {
            $title = $_POST['title'];
            $url = $_POST['url'];
            $h1 = $_POST['h1'];
			$h2 = $_POST['h2'];
			$marker = $_POST['marker'];

            if (isset($_GET['page_id'])) {
                $id = $_GET['page_id'];
                $query = "SELECT * FROM pages WHERE page_id='$id'";
                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                $page = mysqli_fetch_assoc($result);

                if ($page['url'] != $url) {
                    $query = "SELECT COUNT(*) AS count FROM pages WHERE url='$url'";
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    $isPage = mysqli_fetch_assoc($result)['count'];

                    if ($isPage == 1) {
                        $_SESSION['message'] = [
                            'text' => 'Page with this URL exists !!!',
                            'status' => 'error'
                        ];
                    }
                }

                $query = "UPDATE pages SET title='$title', url='$url', h1='$h1', h2='$h2', marker='$marker' WHERE page_id='$id'";
                mysqli_query($db, $query) or die(mysqli_error($db));

                $_SESSION['message'] = [
                    'text' => "Page '{$page['title']}' updated successfully !",
                    'status' => 'success'
                    ];
            }
        } else {
            return '';
        }
    }

    editPage($db);
    getPage($db);
} else {
    header('Location: admin/blocks/login.php'); die();
}



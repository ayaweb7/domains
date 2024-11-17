<?php
// Соединяемся с базой данных
require_once '../../blocks/date_base.php';

if(!empty($_SESSION['auth'])) {
    function getPage($db)
    {
        $title = 'Edit page';

        if (isset($_GET['pages_id'])) {
            $id = $_GET['pages_id'];
            $query = "SELECT * FROM pages WHERE pages_id='$id'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            $page = mysqli_fetch_assoc($result);

            if ($page) {
                if(isset($_POST['title']) and isset($_POST['url']) and isset($_POST['text'])) {
                    $title = mysqli_real_escape_string($db, $_POST['title']);
                    $url = mysqli_real_escape_string($db, $_POST['url']);
                    $text = mysqli_real_escape_string($db, $_POST['text']);
                } else {
                    $title = mysqli_real_escape_string($db, $page['title']);
                    $url = mysqli_real_escape_string($db, $page['url']);
                    $text = mysqli_real_escape_string($db, $page['text']);
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
        if (isset($_POST['title']) and isset($_POST['url']) and isset($_POST['text'])) {
            $title = $_POST['title'];
            $url = $_POST['url'];
            $text = $_POST['text'];

            if (isset($_GET['pages_id'])) {
                $id = $_GET['pages_id'];
                $query = "SELECT * FROM pages WHERE pages_id='$id'";
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

                $query = "UPDATE pages SET title='$title', url='$url', text='$text' WHERE pages_id='$id'";
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
    header('Location: /template/admin/blocks/login.php'); die();
}



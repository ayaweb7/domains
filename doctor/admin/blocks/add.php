<?php
// Соединяемся с базой данных
require_once 'date_base.php';

if(!empty($_SESSION['auth'])) {
    function getPage()
    {
        $title = 'Add new page';

        if(isset($_POST['title']) and isset($_POST['url']) and isset($_POST['text'])) {
            $title = $_POST['title'];
            $url = $_POST['url'];
            $text = $_POST['text'];
        } else {
            $title = '';
            $url = '';
            $text = '';
        }

        ob_start();
        include 'form_admin.php';
        $content = ob_get_clean();

        include 'layout.php';
    }

    function addPage($db)
    {
        if(isset($_POST['title']) and isset($_POST['url']) and isset($_POST['text'])) {
            $title = mysqli_real_escape_string($db, $_POST['title']);
            $url = mysqli_real_escape_string($db, $_POST['url']);
            $text = mysqli_real_escape_string($db, $_POST['text']);

            $query = "SELECT COUNT(*) AS count FROM pages WHERE url='$url'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            $isPage = mysqli_fetch_assoc($result)['count'];
    //        var_dump($isPage);

            if($isPage) {
                $_SESSION['message'] = [
                    'text' => 'Page with this URL exists !!!',
                    'status' => 'error'
                ];
            } else {
                $query = "INSERT INTO pages (title, url, text) VALUES ('$title', '$url', '$text')";
                mysqli_query($db, $query) or die(mysqli_error($db));
                $_SESSION['message'] = [
                    'text' => 'Page added successfully!',
                    'status' => 'success'
                ];

                header('Location: admin/'); die();
            }
        } else {
            return '';
        }
    }

    addPage($db);
    getPage();
} else {
    header('Location: admin/blocks/login.php'); die();
}



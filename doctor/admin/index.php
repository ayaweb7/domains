<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

if(!empty($_SESSION['auth'])) {
    function showPageTable($db)
    {
        $query = "SELECT page_id, title, url FROM pages WHERE url != '404'";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        for ($data=[]; $row=mysqli_fetch_assoc($result); $data[] = $row);

        $content = '<table><tr>
                    <th>title</th>
                    <th>url</th>
                    <th>edit</th>
                    <th>delete</th>
                    </tr>';

        foreach ($data as $page) {
            $content .= "<tr>
                            <td>{$page['title']}</td>
                            <td>{$page['url']}</td>
                            <td><a href = \"blocks/edit.php?page_id={$page['page_id']}\">edit</a></td>
                            <!--<td><a href = \"?delete={$page['page_id']}\">delete</a></td>-->
                        </tr>";
        }
        $content .= '</table>';

        $title = 'АдминCode';
//        $title = $page['title'];

        include 'blocks/layout.php';
    }

    function deletePage($db)
    {
        if(isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $query = "DELETE FROM pages WHERE page_id=$id";
            mysqli_query($db, $query) or die(mysqli_error($db));
            //        var_dump($result);
            $_SESSION['message'] = [
                'text' => 'Page deleted succesfully!',
                'status' => 'success'
            ];

            header('Location: admin/'); die();
        }
    }

    deletePage($db);
    showPageTable($db);
} else {
    header('Location: blocks/login.php'); die();
}
<?php

// Соединяемся с базой данных
require_once 'blocks/date_base.php';


// Определение надписи для титула страницы
if (isset($_GET['page'])) {
	$url = $_GET['page'];
	// Выборка из таблицы 'pages' для подписи титулов страниц и печати заголовков
	$result = mysqli_query($db, "SELECT * FROM pages WHERE url='$url'");
} else {
	$url = 'admin';
	// Выборка из таблицы 'pages' для подписи титулов страниц и печати заголовков
	$result = mysqli_query($db, "SELECT * FROM pages WHERE url='admin'");
}
//echo $url;
$myrow = mysqli_fetch_array($result);
$title = $myrow['title'];



if(!empty($_SESSION['auth'])) {
    function showPageTable($db)
    {
        $query = "SELECT * FROM pages WHERE marker='admin'";
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

//        $title = 'АдминCode';
//        $title = $page['title'];
//		$title = $myrow['title'];

        include 'blocks/layout.php';
    }

//    showPageTable($db);
	$content = 'VERY VERY LONG CODE';
	
	include 'blocks/header.php';
	include 'blocks/main.php';
	include 'blocks/footer.php';
	
} else {
    header('Location: blocks/login.php'); die();
}
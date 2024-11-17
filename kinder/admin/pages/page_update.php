<?php
if(!empty($_SESSION['is_auth'])) {
	
	function showPageTable($db)
    {
        $query = "SELECT menu_id, name, titer, link, parent_id FROM menu_admin WHERE link != '404' ORDER BY page_id";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
		
        for ($data=[]; $row=mysqli_fetch_assoc($result); $data[] = $row);
		
		$content = "<div class='info select'>";
		$content .= "<p class='alt'>Название страницы - LINK</p>";

		$even=true;
		foreach ($data as $page) {
			
			$content .= "<p class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
					<a href=\"pages/page_edit.php?menu_id={$page['menu_id']}\">{$page['name']}</a> - {$page['link']}</p>";
			$even=!$even;
		}
		

//        include 'blocks/layout.php';
		echo $content;
		$content = "</div>";
    }

    function deletePage($db)
    {
        if(isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $query = "DELETE FROM menu_admin WHERE menu_id=$id";
            mysqli_query($db, $query) or die(mysqli_error($db));
            //        var_dump($result);
            $_SESSION['message'] = [
                'text' => 'Выбранная страница успешно удалена!',
                'status' => 'success'
            ];

            header('Location: admin/'); die();
        }
    }

//    deletePage($db);
    showPageTable($db);
	
} else {
	header('Location: /'); die();
}
<?php
if(!empty($_SESSION['is_auth'])) {
	
	function showPageTable($db)
    {
        $query = "SELECT * FROM services ORDER BY serv_date DESC";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
		
        for ($data=[]; $row=mysqli_fetch_assoc($result); $data[] = $row);
		
		$content = "<div class='info select'>";
		$content .= "<p class='alt'>Оказанные услуги - SERV_NAME</p>";

		$even=true;
		foreach ($data as $page) {
			
			$content .= "<p class='absent' style='background-color:".($even?'white':'#eaeaea')."'>
					<a href=\"pages/service_edit.php?service_id={$page['service_id']}\">{$page['serv_date']}</a> - {$page['serv_name']}</p>";
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
            $query = "DELETE FROM services WHERE service_id=$id";
            mysqli_query($db, $query) or die(mysqli_error($db));
            //        var_dump($result);
            $_SESSION['message'] = [
                'text' => 'Выбранная услуга успешно удалена!',
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
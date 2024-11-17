<?php
session_start(); //Запускаем сессии
// Соединяемся с базой данных
require_once '../blocks/date_base.php';

if(!empty($_SESSION['is_auth'])) {
    function getPage($db)
    {
        

        if (isset($_GET['service_id'])) {
            $id = $_GET['service_id'];
//			$title = 'Edit page';
			
            $query = "SELECT * FROM services WHERE service_id='$id'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            $page = mysqli_fetch_assoc($result);

            if ($page) {
                if(isset($_POST['serv_name']) and isset($_POST['performer']) and isset($_POST['serv_quantity']) and isset($_POST['serv_item']) and isset($_POST['serv_price']) and isset($_POST['serv_amount']) and isset($_POST['store_id']) and isset($_POST['town_id']) and isset($_POST['serv_date']) and isset($_POST['input_date'])) {
//				if(isset($_POST['submit'])) {
					$serv_name = mysqli_real_escape_string($db, $_POST['serv_name']);
					$performer = mysqli_real_escape_string($db, $_POST['performer']);
					$serv_quantity = mysqli_real_escape_string($db, $_POST['serv_quantity']);
					$serv_item = mysqli_real_escape_string($db, $_POST['serv_item']);
					$serv_price = mysqli_real_escape_string($db, $_POST['serv_price']);
					$serv_amount = mysqli_real_escape_string($db, $_POST['serv_amount']);
					$store_id = mysqli_real_escape_string($db, $_POST['store_id']);
					$town_id = mysqli_real_escape_string($db, $_POST['town_id']);
					$serv_date = mysqli_real_escape_string($db, $_POST['serv_date']);
					$input_date = mysqli_real_escape_string($db, $_POST['input_date']);
                } else {
                    $serv_name = mysqli_real_escape_string($db, $page['serv_name']);
					$performer = mysqli_real_escape_string($db, $page['performer']);
					$serv_quantity = mysqli_real_escape_string($db, $page['serv_quantity']);
					$serv_item = mysqli_real_escape_string($db, $page['serv_item']);
					$serv_price = mysqli_real_escape_string($db, $page['serv_price']);
					$serv_amount = mysqli_real_escape_string($db, $page['serv_amount']);
					$store_id = mysqli_real_escape_string($db, $page['store_id']);
					$town_id = mysqli_real_escape_string($db, $page['town_id']);
					$serv_date = mysqli_real_escape_string($db, $page['serv_date']);
					$input_date = mysqli_real_escape_string($db, $page['input_date']);
                }

                ob_start();
				include '../header_tree.php'; // подключаем HEADER
                include '../forms/form_service_update.php';
				include '../blocks/footer.php'; // подключаем FOOTER
//                $content = ob_get_clean();

            } else {
                $content = 'Service not found - Услуга не найдена !!!';
            }
        } else {
            $content = 'Service not selected - Услуга не выбрана !!!';
        }

//        include 'layout.php';
    }

    function editPage($db)
    {
/**/        
//		if (isset($_POST['titer']) and isset($_POST['link']) and isset($_POST['h1']) and isset($_POST['h2']) and isset($_POST['marker'])) {
		if (isset($_POST['submit'])) {
            $serv_name = $_POST['serv_name'];
			$performer = $_POST['performer'];
			$serv_quantity = $_POST['serv_quantity'];
			$serv_item = $_POST['serv_item'];
			$serv_price = $_POST['serv_price'];
			$serv_amount = $_POST['serv_amount'];
			$store_id = $_POST['store_id'];
			$town_id = $_POST['town_id'];
			$serv_date = $_POST['serv_date'];
			$input_date = $_POST['input_date'];

            if (isset($_GET['servuce_id'])) {
                $id = $_GET['service_id'];
                $query = "SELECT * FROM services WHERE service_id='$id'";
                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                $page = mysqli_fetch_assoc($result);

                $query = "UPDATE services SET serv_name='$serv_name', performer='$performer', serv_quantity='$serv_quantity', serv_item='$serv_item', serv_price='$serv_price', serv_amount='$serv_amount', serv_date='$serv_date', input_date='$input_date' WHERE service_id='$id'";
                mysqli_query($db, $query) or die(mysqli_error($db));

                $_SESSION['message'] = [
                    'text' => "Услуга от '{$page['serv_date']}' успешно изменена !",
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



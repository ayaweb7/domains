<?php
if(!empty($_SESSION['is_auth'])) {
    
	function getPage($db)
    {
        if(!isset($_POST['submit'])) {
			$serv_name = $performer = $serv_quantity = $serv_item = $serv_price = $serv_amount = $store_id = $town_id = $serv_date = $input_date = '';
		
		} else {
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
		}
		
        ob_start();
		include 'forms/form_service_insert.php';
    }

    function addPage($db)
    {
        if(isset($_POST['submit'])) {
            $fail = '';
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

			// PHP-функции
			function validate_name($field) {return ($field == "") ? "Что за услуга?<br>" : "";}
			function validate_performer($field) {return ($field == "") ? "Кто оказал услугу??<br>" : "";}
			function validate_store($field) {return ($field == "") ? "Какая организация???<br>" : "";}
			function validate_date($field) {return ($field == "") ? "Когда оказана услуга????<br>" : "";}
			
			// Проверка на ошибки средствами PHP
			$fail .= validate_name($serv_name);
			$fail .= validate_performer($performer);
			$fail .= validate_store($store_id);
			$fail .= validate_date($serv_date);
			

            if($fail != '') {
				$_SESSION['message'] = [
                    'text' => $fail,
                    'status' => 'error'
                ];
//				header('Location: /admin/header_tree.php'); die();
				
			} else {
                $query = "INSERT INTO services (serv_name, performer, serv_quantity, serv_item, serv_price, serv_amount, store_id, town_id, serv_date, input_date)
						VALUES ('$serv_name', '$performer', '$serv_quantity', '$serv_item', '$serv_price', '$serv_amount', '$store_id', '$town_id', '$serv_date', '$input_date')";
                mysqli_query($db, $query) or die(mysqli_error($db));
                $_SESSION['message'] = [
                    'text' => 'Страница успешно добавлена!',
                    'status' => 'success'
                ];
			}
			if(isset($_SESSION['message'])) {
				$status = $_SESSION['message']['status'];
				$text = $_SESSION['message']['text'];
				echo "<div class=\"info\"><p class=\"$status\">$text</p></div>";

				unset($_SESSION['message']);
			}
			
        } else {
            return '';
        }
    }

    addPage($db);
    getPage($db);

} else {
	header('Location: /'); die();
}
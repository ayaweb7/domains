<?php
    $msgs = [];
// Имя
	if (isset($_POST['name']) ) {
        if(empty($_POST['name']) && NAMEISREQUIRED) {
            $msgs['name'] = MSGSNAMEERROR;
        } else {
            if (!empty($_POST['name'])) {
                $name = "<b>Имя: </b>" . trim(strip_tags($_POST['name'])) . "<br>";
            }
            
        }
    }
// Телефон
    if (isset($_POST['tel']) ) {
        if(empty($_POST['tel']) && TELISREQUIRED) {
            $msgs['tel'] = MSGSTELERROR;
        } else {
            if (!empty($_POST['tel'])) {
                $tel = "<b>Телефон: </b> " . trim(strip_tags($_POST['tel'])) . "<br>";
            }
        }
    }
// Почта
    if (isset($_POST['email']) ) {
        if(empty($_POST['email']) && EMAILISREQUIRED) {
            $msgs['email'] = MSGSEMAILERROR;
        } else {
            if(!empty($_POST['email'])) {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $email = "<b>Почта: </b> " . trim(strip_tags($_POST['email'])) . "<br>";
                } else {
                    $msgs['email'] = MSGSEMAILINCORRECT;
                }
            }
        } 
    }
// Сообщение
    if (isset($_POST['mess']) ) {
        if(empty($_POST['mess']) && TEXTISREQUIRED) {
            $msgs['mess'] = MSGSTEXTERROR;
        } else {
            if (!empty($_POST['mess'])) {
                $mess = "<b>Сообщение: </b> " . trim(strip_tags($_POST['mess'])) . "<br>";
            }
        }
    }
// Файл
//    foreach ($_FILES["files"]["error"] as $key => $error) {
//        if (!$error == UPLOAD_ERR_OK  && FILEISREQUIRED) {
//             $msgs['file'] = MSGSFILEERROR;
 //       }
//    }
// Соглашение
    if(empty($_POST['agreement']) && AGGREMENTISREQUIRED) {
        $msgs['agreement'] = MSGSAGGREMENTERROR;
    } else {
        if (!empty($_POST['agreement'])) {
            $agreement = "<b>Соглашение: </b> пользовательское соглашение принято " . "<br>";
        }
    }

// Заполнение контактных полей
     if((empty($_POST['email']) && empty($_POST['tel'])) && (!EMAILISREQUIRED && !TELISREQUIRED)) {
         $msgs['attantion'] = 'Заполните хотя бы одно контактное поле для связи с вами';
     }
// Итог ошибок заполнения или успеха
	if ($msgs) {
	    echo json_encode($msgs);
		die;
	} else {
        $msgs['success'] = MSGSSUCCESS;
    }
	
// Дата и время вхождения в форму
if (isset($_POST['start_time']) ) {$start_time = "<b>Время вхождения в форму: </b> " . trim(strip_tags($_POST['start_time'])) . "<br>";}

// Дата и время отправки формы
if (isset($_POST['send_time']) ) {$send_time = "<b>Время отправки заявки: </b> " . trim(strip_tags($_POST['send_time'])) . "<br>";}

// Отправка формы в формате UNIX time
if (isset($_POST['unix_time']) ) {$unix_time = "<b>Отправка формы в формате UNIX time: </b> " . trim(strip_tags($_POST['unix_time'])) . "<br>";}

?>
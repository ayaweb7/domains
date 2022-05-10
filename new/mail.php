<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/mail/phpmailer/phpmailer.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/mail/php/config.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/mail/php/valid.php');
	
//    if (isset($_POST['name'])) {$name = $_POST['name'];}
//    if (isset($_POST['tel'])) {$tel = $_POST['tel'];}
//    if (isset($_POST['formData'])) {$formData = $_POST['formData'];}

    $to = "ayaweb7@gmail.com"; /*Укажите адрес, га который должно приходить письмо*/
    $sendfrom   = "ayaweb7@yandex.ru"; /*Укажите адрес, с которого будет приходить письмо, можно не настоящий, нужно для формирования заголовка письма*/
    $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $subject = "$formData";
    $message = "$formData<br> <b>Имя пославшего:</b> $name <br><b>Телефон:</b> $tel";
    $send = mail ($to, $subject, $message, $headers);
    if ($send == 'true')
    {
    echo '<center><p class="success">Спасибо за заявку!</p></center>';
    }
    else 
    {
    echo '<center><p class="fail"><b>Ошибка. Заявка не отправлена!</b></p></center>';
    }
} else {
	header ("Location: /");
    http_response_code(403);
    echo "Попробуйте еще раз";
}
?>
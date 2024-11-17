<?php
// Соединяемся с базой данных
require_once 'date_base.php';

if(isset($_POST['pass']) and $_POST['pass'] == '123') {
    $_SESSION['auth'] = true;
    $_SESSION['message'] = [
        'text' => 'You are successfully login!',
        'status' => 'success'
    ];
    header('Location: ../'); die();

} else {
    ?>
    <form method="post">
        <input type="password" name="pass" autofocus>
        <input type="submit">
    </form>
    <?php
}
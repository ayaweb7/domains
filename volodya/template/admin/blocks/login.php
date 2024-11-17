<?php
// Соединяемся с базой данных
require_once '../../blocks/date_base.php';

if(isset($_POST['pass']) and $_POST['pass'] == '123') {
    $_SESSION['auth'] = true;
    $_SESSION['message'] = [
        'text' => 'You are successfully login!',
        'status' => 'success'
    ];
    header('Location: /template/admin/'); die();

} else {
    ?>
        <form method="post">
            <input type="password" name="pass">
            <input type="submit">
        </form>
    <?php
}
<?php
error_reporting(E_ALL); //
ini_set('display_errors', 'on');

session_start();
if(!empty($_SESSION['name']) and !empty($_SESSION['surname'])) {
    echo "Cессия создана! Ваши данные:<br>";
    echo $_SESSION['name'] . '<br>';
    echo $_SESSION['surname'] . '<br>';
} else {
    echo "Cессия не создана, потому, что данные не были переданы.<br>
    <a href='session.php'>
    Вернитесь на предыдущую страницу!
    </a>";
}
<?php
error_reporting(E_ALL); //
ini_set('display_errors', 'on');

session_start();
//session_destroy();

if(isset($_REQUEST['submit'])) {
    $_SESSION['name'] = $_REQUEST['name'];
    $_SESSION['surname'] = $_REQUEST['surname'];
    var_dump($_SESSION);
}
?>

<form action="" method="get">
    <input name="name">
    <input name="surname">
    <input type="submit" name="submit">
</form>





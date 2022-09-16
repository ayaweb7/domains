<?php
// Добавлять в отчёт все ошибки PHP
error_reporting(-1);

include_once("classes/HTML.php");

class IndexPage extends HTMLPage
{
    function MainText()
    {
        echo "<p>Добро пожаловать на домашнюю страничку Васи Пупкина";
    }
}

$Page = new IndexPage("Главная страница");

$Page->Write();

?>
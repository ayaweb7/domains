<?php
/**
 * ������� ������ �� PHP
 * @author ox2.ru 
 */
include_once "class/Engine.php"; //���������� �����-������
$engine = new Engine(); //������� ������ ������ Engine

include_once "templates/header.php"; //���������� ����� �����

if ($engine->getError()) { //���� �������� ������, ������� ��������� �� �����
    echo "<div style=\"border:1px solid red;padding:10px;margin: 10px auto; 
        width: 500px;\">" . $engine->getError() . "</div>";
}
echo $engine->getContentPage(); //������� �������� �����

include_once "templates/footer.php";//���������� ������ �����
?>
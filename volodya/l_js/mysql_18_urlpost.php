<?php // urlpost.php
// В этой программе для загрузки веб-страницы, которая находится по URL-адресу, представленному в POST-переменной $_POST['url'],
// применяется PHP-функция file_get_contents. Эта функция обладает достаточной универсальностью, позволяющей ей загружать все содержимое файла
// или веб-страницы как с локального, так и с удаленного сервера — она даже учитывает перемещенные страницы и другие перенаправления.

if (isset($_POST['url'])) {echo file_get_contents('http://' . SanitizeString($_POST['url']));}
if (isset($_POST['townSelected'])) {$townSelected = $_POST['townSelected'];}

// функцию обезвреживания содержимого строки — SanitizeString, которая должна применяться ко всем отправляемым в адрес сервера данным.
// В этом случае необезвреженные данные могут привести к получению пользователем возможностей управления вашим кодом.
function SanitizeString($var)
{
$var = strip_tags($var);
$var = htmlentities($var);
return stripslashes($var);
}
?>

		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>

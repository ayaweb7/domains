<?php
abstract class HTMLPage
{
 protected $Title = "";

 function __construct($Title)
 {
 $this->Title = "[Домашняя страница Васи Пупкина] " . $Title;
 }

 function BeginHTML()
 {
 echo <<<HTML
<html>
<head>
 <title>{$this->Title}</title>
</head>
<body>
HTML;
 }

 function EndHTML()
 {
 echo <<<HTML
</body>
</html>
HTML;
 }

 function Logo()
 {
 echo "<h1>Домашняя страница Васи Пупкина</h1>";
 }

 function Menu()
 {
 echo <<<HTML
<table>
 <tr>
 <td><a href='pupkin.php'>Главная страница</a></td>
 <td><a href='bio.php'>Биография</a></td>
 <td><a href='links.php'>Ссылки</a></td>
 </tr>
</table>
HTML;
 }

 abstract function MainText();

 function Write()
 {
 $this->BeginHTML();
 $this->Logo();
 $this->Menu();
 $this->MainText();
 $this->Menu();
 $this->EndHTML();
 }
}

?>
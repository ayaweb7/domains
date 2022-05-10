<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
             <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
             <title>Галерея на jQuery в четыре строчки | pcvector.net</title>
			 <link rel="shortcut icon" href="/favicon.ico" />
			 <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
			 <style type="text/css">
			 body {background: #ffffff url(http://pcvector.net/templates/pcv/images/bg_grid.png);}
			 #page { width: 585px; margin: 30px auto; }
			 #thumbs { padding-top: 10px; overflow: hidden; }
			 #thumbs img, #largeImage { border: 1px solid gray; padding: 4px; background-color: white; cursor: pointer; }
			 #thumbs img { float: left; margin-right: 6px; }
			 #description { background: black; color: white; position: absolute; bottom: 0; padding: 10px 20px; width: 525px; margin: 5px; }
			 #panel { position: relative; }
			 </style>
	 </head>
	 
     <body>
-->

<?php
// Соединяемся с базой данных
require_once 'blocks/date_base.php';

// Выборка из таблицы 'settings' для подписи титулов страниц и печати заголовков
$result1 = mysqli_query($db, "SELECT * FROM settings WHERE page='gallery'");
$myrow1 = mysqli_fetch_array($result1);

// Подключаем HEADER
include ("blocks/header_gallery.php");
?>


<div id="page">
	 
<div id="gallery">
	<div id="panel">
		<img id="largeImage" src="images/gallery_large/house_121.jpg" /><!-- images/house_or/house_121.jpg -->
		<div id="description">Игра Rage</div>
	</div>

	<div id="thumbs">

        <img src="images/gallery_thumb/house_121.jpg" alt="Описание 1" />
        <img src="images/gallery_thumb/house_131.jpg" alt="Описание 2" />
        <img src="images/gallery_thumb/house_141.jpg" alt="Описание 3" />
        <img src="images/gallery_thumb/house_151.jpg" alt="Описание 4" />
        <img src="images/gallery_thumb/house_161.jpg" alt="Описание 5" />
	</div>
</div>

</div>

<script>
$('#thumbs').delegate('img','click', function(){
	$('#largeImage').attr('src',$(this).attr('src').replace('thumb','large')); // .replace('thumb','large'));
	$('#description').html($(this).attr('alt'));
});
</script>

</div>
	 
<!-- pcvector.net -->
<!-- <script type="text/javascript" src="/templates/pcv/js/pcvector.js"></script> -->
<!-- /pcvector.net -->
</body>

</html>	 
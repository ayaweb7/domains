<?php
?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="css/screen.css">
</head>

<body>
<div id='wrapper'></div>
<header>
    <?php include 'blocks/header.php';?>
    <a href="/template/admin/blocks/logout.php">logout</a>
    <a href="/template/admin/">admin</a>
</header>
<main>
    <?= $content ?>
</main>
<footer>
    <?php include 'blocks/footer.php';?>
</footer>
</div> <!--wrapper-->
</body>
</html>
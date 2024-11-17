<!DOCTYPE HTML>
<html>
    <head>
        <title><?= $title ?></title>
        <link rel="stylesheet" type="text/css" href="/template/admin/css/style_admin.css?v=3">
    </head>

    <body>
        <div id='wrapper'></div>
            <header>
                <?php include 'header.php'; ?>
            </header>
            <main>
                <?php include 'info.php'; ?>
                <?= $content ?>
            </main>
            <footer>
                footer
            </footer>
        </div> <!--wrapper-->
    </body>
</html>
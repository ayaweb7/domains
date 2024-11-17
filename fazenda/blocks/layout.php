<!DOCTYPE html>
<html lang='en'>
    <head>
        <title><?= $title ?></title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" type="text/css" href="css/screen.css">
        <link rel="shortcut icon" type="image/ico" href="img/favicon.ico">
    </head>

    <body>
        <div id='wrapper'>
            <div class='container'>
                <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                    </a>

                    <ul class="nav nav-pills">

                        <?php include 'header.php';?>

                    </ul>
<!--					
					<div class="col-md-2 text-end">
						<ul class="nav nav-pills">
							<li><a href="admin/" class="nav-link active">Регистрация</a></li>
							<li><a href="../admin/blocks/logout.php" class="nav-link">Выход</a></li>
						</ul>
					</div>
-->
                    <div class="col-md-3 text-end">
                        <button type="button" class="btn btn-outline-primary me-2"><a href="admin/">Login</a></button>
                        <button type="button" class="btn btn-primary"><a href="../admin/blocks/logout.php">LogOut</a></button>
                    </div>
					
                </header>
            </div> <!--container-->
            <main>
                <?= $content ?>
            </main>
            <footer>
                <?php // include 'blocks/footer.php';?>
            </footer>
        </div> <!--wrapper-->
    </body>
</html>

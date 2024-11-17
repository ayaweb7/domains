<?php
session_start(); //Запускаем сессии

include_once "class/AuthClass.php"; //Подключаем класс для авторизации
$auth = new AuthClass();

if (isset($_POST['login']) && isset($_POST['password'])) { //Если логин и пароль были отправлены
    $log = $_POST['login'];
	$pass = $_POST['password'];
	
	include 'blocks/date_base.php'; // Соединяемся с базой данных
	$result = mysqli_query($db, "SELECT * FROM users WHERE login='$log' AND pass='$pass'");
	$user = mysqli_fetch_assoc($result);
	
//	if (!$auth->auth($_POST["login"], $_POST["password"])) { //Если логин и пароль введен не правильно
	if (empty($user)) { //Если логин и пароль введен не правильно
        echo "<h2 style=\"color:red;\">Логин и пароль введен не правильно!</h2>";
    } else {
		$_SESSION["is_auth"] = true; //Делаем пользователя авторизованным
		$_SESSION["login"] = $log; //Записываем в сессию логин пользователя
		$_SESSION['message'] = [
        'text' => 'Здравствуйте ' .$auth->getLogin(). '! Вы успешно авторизованы!',
        'status' => 'success'
		];
	}
}

if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
    if ($_GET["is_exit"] == 1) {
        $auth->out(); //Выходим
//        header("Location: ?is_exit=0"); //Редирект после выхода
		header("Location: /"); //Редирект после выхода
    }
}

	if ($auth->isAuth()) { // Если пользователь авторизован, приветствуем:
//	if (!empty($user)) { // Если пользователь авторизован, приветствуем:

    include 'header_tree.php'; // подключаем HEADER
//	echo "Здравствуйте, " . $auth->getLogin() ;
	include 'blocks/main.php'; // подключаем MAIN
    echo "<br/><br/><a href=\"?is_exit=1\">Выйти</a>"; //Показываем кнопку выхода
	include 'blocks/footer.php'; // подключаем FOOTER
} 
else { //Если не авторизован, показываем форму ввода логина и пароля
?>

<form method="post" action="">
    Логин: <input type="text" name="login" value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; // Заполняем поле по умолчанию ?>" /><br/>
    Пароль: <input type="password" name="password" value="" /><br/>
    <input type="submit" value="Войти" />
</form>
<?php }
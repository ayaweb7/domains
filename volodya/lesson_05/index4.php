<?php

define('MYSITE', 1);

require_once('config.php');

session_start();

if(isset($_SESSION['login_name']))
{
?>
	<p>Вы в системе, если хотите выйти, щёлкните <a href='logout.php'>сюда</a></p>
	<p><pre><?php print_r($_SESSION); ?></pre></p>
<?php
}
else
{
?>
	<p>Вам необходимо авторизоваться для работы на этом сайте</p>
	<form action='login.php' method='post'>
		<input type='text' name='username' value='username' />
		<input type='password' name='password' value='password' />
		<button type='submit'>Отправить</button>
	</form>
<?php
}
?>
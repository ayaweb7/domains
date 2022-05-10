<?php
//require_once 'blocks/date_base.php';
include("blocks/date_base.php");
if (!isset($_SERVER['PHP_AUTH_USER']))

{
	Header ("WWW-Authenticate: Basic realm=\"ADMINISTRATOR\"");
	Header ("HTTP/1.0 401 Unauthorized");
	exit();
}

else {
		if (!get_magic_quotes_gpc()) {
			$_SERVER['PHP_AUTH_USER'] = mysqli_real_escape_string($db, $_SERVER['PHP_AUTH_USER']);
			$_SERVER['PHP_AUTH_PW'] = mysqli_real_escape_string($db, $_SERVER['PHP_AUTH_PW']);
		}

		$query = "SELECT pass FROM user WHERE login='".$_SERVER['PHP_AUTH_USER']."'";
		$lst = mysqli_query($db, $query);

		if (!$lst)
		{
			echo "Not correct login - password";
			Header ("WWW-Authenticate: Basic realm=\"ADMINISTRATOR\"");
			Header ("HTTP/1.0 401 Unauthorized");
			exit();
		}

		if (mysqli_num_rows($lst) == 0)
		{
			Header ("WWW-Authenticate: Basic realm=\"ADMINISTRATOR\"");
			Header ("HTTP/1.0 401 Unauthorized");
			exit();
		}

		$pass = mysqli_fetch_array($lst);
		if ($_SERVER['PHP_AUTH_PW']!= $pass['pass'])
		{
			Header ("WWW-Authenticate: Basic realm=\"ADMINISTRATOR\"");
			Header ("HTTP/1.0 401 Unauthorized");
			exit();
		}


}





//mysqli_real_escape_string($db, $_SERVER['PHP_AUTH_USER']);
?>
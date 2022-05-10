<html>
	<body>
		<form action='edit_02_07.php' method='GET'>
			<label>Название компьютера: <input type='text' name='computername' /></label>
			<input type='hidden' name='name' value='<?php echo filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS); ?>' />
		</form>
	</body>
</html>
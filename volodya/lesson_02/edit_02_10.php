<html>
	<body>
		<form action='edit_02_11.php' method='GET'>
			<label>Название компьютера: <input type='text' name='computername' value='<?php echo filter_input(INPUT_GET, 'computername', FILTER_SANITIZE_SPECIAL_CHARS); ?>' /></label>
			<input type='hidden' name='name' value='<?php echo filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS); ?>' />
			<input type='hidden' name='fingercount' value='<?php echo filter_input(INPUT_GET, 'fingercount', FILTER_SANITIZE_NUMBER_INT); ?>' />
		</form>
	</body>
</html>
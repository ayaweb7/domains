<html>
	<body>
		<form action='edit_02_08.php' method='GET'>
			<label>Количество пальцев: <input type='number' name='fingercount' /></label>
			<input type='hidden' name='name' value='<?php echo filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS); ?>' />
			<input type='hidden' name='computername' value='<?php echo filter_input(INPUT_GET, 'computername', FILTER_SANITIZE_SPECIAL_CHARS); ?>' />
		</form>
	</body>
</html>
<html>
	<body>
		<form action='edit_02_04.php' method='GET'>
			<label>Количество пальцев: <input type='number' name='fingercount' /></label>
			<input type='hidden' name='name' value='<?php echo $_GET['name']; ?>' />
			<input type='hidden' name='computername' value='<?php echo $_GET['computername']; ?>' />
		</form>
	</body>
</html>
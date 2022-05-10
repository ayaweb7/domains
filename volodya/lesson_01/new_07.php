<?php
	$colour=$_GET['colour']; // СуперГлобальная переменная - Можно задавать цвет прямо из строки браузера
?>

<html>
	<body bgcolor='<?php echo $colour; ?>'>
	;)
		<div>
			<form method='GET'>
				<input type='text' name='colour' value='<?php echo $colour; ?>' /> 
				<input type='submit' />
			</form>
		</div>
	</body>
</html>
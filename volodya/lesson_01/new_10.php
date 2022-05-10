<?php
	$name=$_GET['name']; // СуперГлобальная переменная - Можно задавать цвет прямо из строки браузера
	if (empty($name))
	{
		$known=false;
		$name='гость';
	}
	else
	{
		$known=true;
	}
?>

<html>
	<body>
		<div>Добрый день, <?php echo $name; ?>!</div>
		<?php
			if(!$known)
			{
		?>	
			
				<div>
					<form method='GET'>
						<input type='text' name='name' placeholder='ВАШЕ имя' /> 
						<input type='submit' value ='ОТОСЛАТЬ'/>
					</form>
				</div>
		<?php		
			}
			else
			{
		?>
				<div>
				Чтобы выйти, нажмите <a href='<?php echo $_SERVER['PHP_SELF']; ?>'>ссылку! </a>
				</div>
		<?php		
			}
		?>
	</body>
</html>
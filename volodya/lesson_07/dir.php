<?php
/*
* (c) 2015 Володя Моженков
*
* Свободно распространяется по следующим лицензиям (по вашему желанию):
* - GPL 3.0
* - GFDL 1.3
*
*/
?>

<html>
	<body>
		<ul>
			<?php
				$dir = dir('./files/'); // http://php.net/manual/ru/function.dir.php
			if (is_object($dir))
			{
				while(false != ($entry = $dir -> read()))
				{
					if ($entry != '.' && $entry != '..')
					{
						?><li><a href='/.files/<?php echo $entry; ?>'><?php echo $entry; ?>' </a></li><?php
					}
				}
				
			}
			?>
		</ul>
	</body>
</html>
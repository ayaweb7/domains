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
				$files = scandir('./files/');
			if (is_array($files))
			{
				foreach($files as $entry)
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
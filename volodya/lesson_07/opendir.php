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
			if ($handle = opendir('./files/'))
			{
				while (false !== ($entry = readdir($handle)))
				{
					if ($entry != '.' && $entry != '..')
					{
						?><li><a href='/.files/<?php echo $entry; ?>'><?php echo $entry; ?>' </a></li><?php
					}
				}
				closedir($handle);
			}
			?>
		</ul>
	</body>
</html>
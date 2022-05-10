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
		
			<?php 
			if ($handle = opendir('./files/'))
			{
				while (false !== ($entry = readdir($handle)))
				{
					if ($entry != '.' && $entry != '..')
					{
						?><div class='picture'><a href='files/<?php echo $entry; ?>'><img src='thumbs/<?php echo $entry; ?>' /></a></div><?php
					}
				}
				closedir($handle);
			}
			?>
		
	</body>
</html>
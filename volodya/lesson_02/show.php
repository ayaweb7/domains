<?php
session_start();

$name=filter_var($_SESSION['name'], FILTER_SANITIZE_SPECIAL_CHARS);
$computername=filter_var($_SESSION['computername'], FILTER_SANITIZE_SPECIAL_CHARS);
$fingercount=filter_var($_SESSION['fingercount'], FILTER_SANITIZE_NUMBER_INT);
?>

<html>
	<body>
		<table>
			<tr>
				<th>
					Название
				</th>
				<th>
					Значение
				</th>
				<th>
					Редактировать
				</th>
			</tr>
			<tr>
				<th>
					Имя
				</th>
				<td>
					<?php echo $name; ?>
				</td>
				<td>
					<form action=edit_02_13.php method='GET'>
						<input type='hidden' name='name' value='<?php echo $name; ?>' />
						<input type='hidden' name='computername' value='<?php echo $computername; ?>' />
						<input type='hidden' name='fingercount' value='<?php echo $fingercount; ?>' />
						<button type='submit'>Редактировать</button>
					</form>
				</td>
			</tr>
			<tr>
				<th>
					Имя компьютера
				</th>
				<td>
					<?php echo $computername; ?>
				</td>
				<td>
					<form action=edit_02_14.php method='GET'>
						<input type='hidden' name='name' value='<?php echo $name; ?>' />
						<input type='hidden' name='computername' value='<?php echo $computername; ?>' />
						<input type='hidden' name='fingercount' value='<?php echo $fingercount; ?>' />
						<button type='submit'>Редактировать</button>
					</form>
				</td>
			</tr>
			<tr>
				<th>
					Количество пальцев
				</th>
				<td>
					<?php echo $fingercount; ?>
				</td>
				<td>
					<form action=edit_02_15.php method='GET'>
						<input type='hidden' name='name' value='<?php echo $name; ?>' />
						<input type='hidden' name='computername' value='<?php echo $computername; ?>' />
						<input type='hidden' name='fingercount' value='<?php echo $fingercount; ?>' />
						<button type='submit'>Редактировать</button>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>
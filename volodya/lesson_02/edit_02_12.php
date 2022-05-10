<?php
$name=filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$computername=filter_input(INPUT_GET, 'computername', FILTER_SANITIZE_SPECIAL_CHARS);
$fingercount=filter_input(INPUT_GET, 'fingercount', FILTER_SANITIZE_NUMBER_INT);
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
					<form action=edit_02_09.php method='GET'>
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
					<form action=edit_02_10.php method='GET'>
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
					<form action=edit_02_11.php method='GET'>
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
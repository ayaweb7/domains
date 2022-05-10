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
			</tr>
			<tr>
				<th>
					Имя
				</th>
				<td>
					<?php echo filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS); ?>
				</td>
			</tr>
			<tr>
				<th>
					Имя компьютера
				</th>
				<td>
					<?php echo filter_input(INPUT_GET, 'computername', FILTER_SANITIZE_SPECIAL_CHARS); ?>
				</td>
			</tr>
			<tr>
				<th>
					Количество пальцев
				</th>
				<td>
					<?php echo $_GET['fingercount']; ?>
				</td>
			</tr>
		</table>
	</body>
</html>
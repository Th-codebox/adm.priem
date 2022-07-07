<html>
	<head>
		<title>Интернет Приёмная</title>
	</head>
	<body>   
		<p>На сайте задан новый вопрос</p>
		<p>
			<table>
				<tr>
					<td>Фамилия:</td>
					<td><?php echo $model->FIRSTNAME;?></td>
				</tr>
				<tr>
					<td>Имя:</td>
					<td><?php echo $model->SECONDNAME;?></td>
				</tr>
				<tr>
					<td>Отчество:</td>
					<td><?php echo $model->FIRDNAME;?></td>
				</tr>
				<tr>
					<td>Вопрос:</td>
					<td><?php echo $model->DESCRIPTION;?></td>
				</tr>
<?php
	if ($model->EMAIL) {
?>
				<tr>
					<td>E-mail:</td>
					<td><?php echo $model->EMAIL;?></td>
				</tr>
<?php
	}
?>

			</table>
		</p>
	</body>   
</html>
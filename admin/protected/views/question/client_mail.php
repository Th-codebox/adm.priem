<html>
	<head>
		<title>Интернет Приёмная</title>
	</head>
	<body>   
		<p>От интернет приёмной на ваш вопрос "<?php echo wordwrap($model->DESCRIPTION, 1050, "\r\n");;?>" поступил ответ:</p>
		<p><?php echo wordwrap($model->ANSWER_FOR_EMAIL, 1050, "\r\n");;?></p>	
	</body>   
</html>  
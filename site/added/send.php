<?php
	if(isset($_POST)) {
	
		if($_GET['act'] == "anketa") {
			$type = stripslashes(htmlspecialchars($_POST['type']));
			$raion = stripslashes(htmlspecialchars($_POST['raion']));
			$doYouKnow = stripslashes(htmlspecialchars($_POST['doYouKnow']));
			$star = stripslashes(htmlspecialchars($_POST['star']));
			$mesange = stripslashes(htmlspecialchars($_POST['mesange']));
			
          $text = "Анкета заполнена: " . date("d.m.Y в H:i"). " с ip: " . $_SERVER['REMOTE_ADDR'] . PHP_EOL . PHP_EOL;
			$text .= "Программа: '" . $type . "'" . PHP_EOL; 
			$text .= "Район: '" . $raion . "'" . PHP_EOL; 
			$text .= "Занаете ли вы о существовании программы: '" . $doYouKnow . "'" . PHP_EOL; 
			$text .= "Оценка программы: '" . $star . "'" . PHP_EOL; 
			$text .= "Предложения: '" . $mesange . "'" . PHP_EOL; 
			
			if(send_mail_plahov($_POST['email'], "Анкета по мунПрограмме", $text, "Оф. сайт АПГО", "adm@petrozavodsk-mo.ru")) {
				echo 1;
			} else {
				echo 0;
	

	}

    function send_mail_plahov($mail, $thm, $mes, $from, $from_mail) {
		$thm = "=?utf-8?b?".base64_encode($thm)."?=";
		$from = "=?utf-8?b?".base64_encode($from)."?=";
		 
		$head = "Content-Type: text/plain; charset=utf-8;\r\n";
		$head .= "FROM: $from  <$from_mail>\r\n";

		if(!mail($mail, $thm, $mes, $head)) {return false;}
		else {return true;}
	}
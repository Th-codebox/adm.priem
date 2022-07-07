<?php

class SearchController extends Controller
{
	static $errorMessages = array(
       'Синтаксическая ошибка',
       'Задан пустой поисковый запрос',
       'Задан пустой интервал близости',
       'В интервале близости первое значение должно быть не больше второго',
       'Неверно указана грамматическая характеристика',
       'Для требуемой операции не хватает памяти',
       'Ошибка при чтении с диска',
       'Зона не проиндексирована',
       'Атрибут не проиндексирован',
       'Атрибут и элемент не совместимы',
       'Внутренняя ошибка: дисбаланс зон',
       'Результат предыдущего запроса уже удален',
       'Ошибка при записи на диск',
       'Cтоп-слово не удалось исключить',
       'Искомая комбинация слов нигде не встречается',
       'Запрошенный(е) документ(ы) не найден(ы)',
       'Неизвестная ошибка' 
	);

	protected function highlight_words($node)
	{
		$stripped = preg_replace('/<\/?(title|passage)[^>]*>/', '', $node->asXML());
		return str_replace('</hlword>', '</strong>', preg_replace('/<hlword[^>]*>/', '<strong>', $stripped));
	}

	protected function print_pager($found_links, $query, $page = 0, $links_on_page = 10)
	{
	    $query = htmlspecialchars($query);
	    if ($page != 0) 
	        echo(" <a href='?page=" . ($page - 1) . "&query={$query}'>предыдущая</a> ");
		    echo(" страница " . ($page + 1)) . " ";

	    if ($found_links > ($page + 1) * $links_on_page) 
	        echo(" <a href='?page="  . ($page + 1)  . "&query=$query'>следующая</a> ");
	}

	public function actionIndex()
	{
		$query = array_key_exists('query', $_REQUEST) ? $_REQUEST['query'] : '';

		if ($_SERVER["REQUEST_METHOD"] =='GET') {
		    $page  = array_key_exists('page', $_GET) ? $_GET['page'] : 0;
		} 
		else 
			$page = 0;

		$found = 0;
		$pages = 10;

		$found_all = 0;
		$found = array();
		$error = array();		

		$server_error = 0;

		if ($query) {
		    $response = file_get_contents(Yii::app()->params['yandex_url'].urlencode($query));
		    if ( $response ) {
		        $xmldoc = new SimpleXMLElement($response);
		        $error = $xmldoc->response->error;
				if ($error) {
					$error[0] = self::$errorMessages[intval($error->attributes()->code)-1];
				}
				else {
					$error[0] = '';
				}
		        $found_all = $xmldoc->response->found[2];
		        $found = $xmldoc->xpath("response/results/grouping/group/doc");
			}
			else {
				$server_error = 1;
			}
		}

		$this->layout="search";

		$this->render('index',
			array(
				'found_all'=>$found_all,
				'found'=>$found,
				'error'=>$error,
				'page'=>$page,
				'query'=>$query,
				'server_error'=>$server_error
			)
		);
	}
}
 
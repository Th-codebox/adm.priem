<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(
	require(dirname(__FILE__).'/db.php'),
	array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Электронная приемная Администрации Петрозаводского городского округа',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		'urlManager'=>array(
			'urlFormat'=>'path',

        	'rules'=>array(
        		'post/<id:\d+>/<title:.*?>'=>'post/view',
        		'posts/<tag:.*?>'=>'post/index',
        	),

			'showScriptName' => false,
			'urlSuffix' => '.html',
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				array(
					'class'=>'CWebLogRoute',
					'levels'=> 'error, warning, debug',
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'administration@apgo',
		'EmailSubject'=>'=?UTF-8?B?'.base64_encode('Поступил новый вопрос').'?=',
		'EmailClientSubject'=>'=?UTF-8?B?'.base64_encode('Администрация города Петрозаводска').'?=',
		'yandex_url'=> 'http://217.77.48.13:17000/admpriem?xml=1&text=',
		'pageSize' => 20,
		'maxButtonCount'=>5,
		'upload_dir'=>'/assets/form',
		'user_status'=> 
			array(
				'0'=>'Проходит автоматическую обработку',
				'1'=>'Принят в рассмотрение',
				'2'=>'Готовится ответ',
				'3'=>'Отклонён',
				'4'=>'Опубликован'
   			),
		'lgota'=>
			array(
				'0'=>'',
				'1'=>'инвалид 1 и 2 группы',
				'2'=>'ветеран ВОВ',
				'3'=>'многодетная семья',
				'4'=>'пенсионер',
				'5'=>'участник боевых действий',
			),
		'menu' => array(
			'about' => array(
				array('label'=>'Главная', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'first')),
				array('label'=>'Информация', 'url'=>array('/site/info')),
			),
			'info' => array( 
				array('label'=>'Главная', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'first')),
				array('label'=>'Информация', 'url'=>array('/site/info')),
			),
			'faq' => array(
				array('label'=>'Главная', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'first')),
			),
			'contact' => array(
				array('label'=>'Главная', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'first')),
			),
			'answer' => array( 
				array('label'=>'Главная', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'first')),
			),
			'questions' => array( 
				array('label'=>'Главная', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'first')),
				array('label'=>'Архив', 'url'=>array('/site/categories')),
//				array('label'=>'Статистика', 'url'=>array('/site/statistika')),
			),
			'categories' => array( 
				array('label'=>'Главная', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'first')),
				array('label'=>'Архив', 'url'=>array('/site/categories')),
//				array('label'=>'Статистика', 'url'=>array('/site/statistika')),
			),
			'statistika' => array( 
				array('label'=>'Главная', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'first')),
				array('label'=>'Архив', 'url'=>array('/site/categories')),
//				array('label'=>'Статистика', 'url'=>array('/site/statistika')),
			),
			'viewquestion' => array( 
				array('label'=>'Главная', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'first')),
				array('label'=>'Архив', 'url'=>array('/site/categories')),
//				array('label'=>'Статистика', 'url'=>array('/site/statistika')),
			),
			'findquestions' => array( 
				array('label'=>'Главная', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'first')),
				array('label'=>'Архив', 'url'=>array('/site/categories')),
//				array('label'=>'Статистика', 'url'=>array('/site/statistika')),
			),
	   ),
	),

	'language' => 'ru',
	)
);

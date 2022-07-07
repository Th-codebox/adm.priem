<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

define('SSL_DIR', realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'CA'));

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(
	require(dirname(__FILE__).'/db.php'),
	array(
		'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
		'name'=>'Система управления Приёмной',

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
				'showScriptName' => false,
				'urlSuffix' => '.html',
			),
			'user'=>array(
				'class' => 'WebUser',
				// enable cookie-based authentication
				'allowAutoLogin'=>true,
			),
	        'authManager'=>array(
	            'class'=>'PhpAuthManager',
				'authFile'=>dirname(__FILE__).'/auth.php',
				'defaultRoles' => array('guest'),
	        ),
			'errorHandler'=>array(
				// use 'site/error' action to display errors
	            'errorAction'=>'site/error',
	        ),
			'log'=>array(
				'class'=>'CLogRouter',
				'routes'=>array(
					array(
						//'class'=>'CFileLogRoute',
						//'class' => 'CEmailLogRoute',
						//'levels'=>'error, warning, trace, profile, info',
						//'emails' => array('noreply@petrozavodsk-mo.ru'),
						//'sentFrom' => 'noreply@petrozavodsk-mo.ru',
						//'subject' => 'Error at YiiFramework.ru'
						'class'=>'CProfileLogRoute',
						'report'=>'summary',
					),
				),
			),
		),

		'language' => 'ru',
		// application-level parameters that can be accessed
		// using Yii::app()->params['paramName']
		'params'=>array(
			// this is used in contact page
			'adminEmail'=>'no-reply@petrozavodsk-mo.ru',
			'EmailAdminSubject'=>'=?UTF-8?B?'.base64_encode('Поступило новое обращение на обработку').'?=',
			'EmailClientSubject'=>'=?UTF-8?B?'.base64_encode('Администрация города Петрозаводска').'?=',
			'adminMode'=> 1,
			'pageSize'=>20,
			'upload_dir'=>'/assets/form',
			'lgota'=> array(
					'0'=>'',
					'1'=>'инвалид 1 и 2 группы',
					'2'=>'ветеран ВОВ',
					'3'=>'многодетная семья',
					'4'=>'пенсионер',
					'5'=>'участник боевых действий',
			),
			'keywords'=> array(
					'0'=>'архитектура и градостроительство',
					'1'=>'городское хозяйство',
					'2'=>'эксплуатация жилья',
					'3'=>'улучшение жилищных условий',
					'4'=>'образование',
					'5'=>'культура',
					'6'=>'спорт',
					'7'=>'здравоохранение',
					'8'=>'социальная защита',
					'9'=>'охрана правопорядка',
					'10'=>'торговля',
					'11'=>'экология',
					'12'=>'другие вопросы',
			),
			'menu' => array(
				'guest' => array(),
				'administrator' => array(
					array('label'=>'Пользователи', 'url'=>array('/user/index')),
					array('label'=>'Страницы', 'url'=>array('/page/index')),
					array('label'=>'Сертификаты', 'url'=>array('/cert/index')),
				),
				'moderator' => array(
					array('label'=>'Обращения', 'url'=>array('/question/index')),
					array('label'=>'Рубрикатор', 'url'=>array('/section/index')),
					array('label'=>'Должностные лица', 'url'=>array('/members/index')),
				),
				'operator' => array(
					array('label'=>'Обращения', 'url'=>array('/question/index')),
				),
			),
			'ssl' => array(
				'dir' => SSL_DIR,
				'openssl' => 'openssl',

				'ca_pwd' => '1234eszaq',
				'cacert_pem' => SSL_DIR . '/cacert.pem',
				'cakey' => SSL_DIR . '/cakey.pem',
				'openssl_cnf' => SSL_DIR . '/openssl.cnf',

				'index' => SSL_DIR . '/index',
				'serial' => SSL_DIR . '/serial',
				'defaults' => SSL_DIR . '/defaults',

				'new_certs_dir' => SSL_DIR . '/newcerts',
				'private_dir' => SSL_DIR . '/private',
				'cert_dir' => SSL_DIR . '/certs',
				'req_dir' => SSL_DIR . '/requests',
				'crl_dir' => SSL_DIR . '/crl',
				'cacrl_pem' => SSL_DIR . '/crl/cacrl.pem',
				'cacrl_der' => SSL_DIR . '/crl/cacrl.crl',
				'pfx_dir' => SSL_DIR . '/pfx',
				// !!! runtime_dir
				'random' => SSL_DIR . '/.rnd',
				'defValues' => array(
					'country' => 'RU',
					'province' => 'Karelia',
					'locality' => 'Petrozavodsk',
					'organization' => 'Petrozavodsk MO',
					'expiry' => 1,
					'keysize' => 1024,
				),
			),
		),
	)
);
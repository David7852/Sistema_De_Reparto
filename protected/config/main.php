<?php
//require 'C:\xampp\htdocs\yii\Sistema_De_Reparto\protected\;
//include($_SERVER["DOCUMENT_ROOT"] . "\yii\Sistema_De_Reparto\protected\components\Util.php");
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'language'=>'es',
        'sourceLanguage'=>'es',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'RUDO System',
	//'theme'=>'hebo',
        'theme'=>'designa',
        //'theme'=>'grey-stripes',
        //'theme'=>'yigum',
	// preloading 'log' component
	'preload'=>array('log','Util'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.giix-components.*', // giix components
                'application.controllers.*',
	),
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',
			'generatorPaths' => array(
			'ext.giix-core', // giix generators
             ),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
            
            
            'widgetFactory' => array(
            'widgets' => array(
                'CJuiAutoComplete' => array(
                    'themeUrl' => 'css/css/jqueryui',
                    'theme'=>'flick',
                ),
                'CJuiDialog' => array(
                    'themeUrl' => '/css/jqueryui',
                    'theme'=>'flick',
                ),
                'CJuiDatePicker' => array(
                    'themeUrl' => '/css/jqueryui',
                    'theme'=>'flick',
                ),
            ),),
            
            
            
		
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			//'urlSuffix'=>'.suffix',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		
		//uncoment for default Database conection
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/

		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=sysrdb',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),

		// uncoment the following to use postgreSQL
		/*
		'db'=>array(
		'connectionString' => 'pgsql:host=localhost;dbname=nombre_base_datos',
		'emulatePrepare' => true,
		'username' => 'usuario',
		'password' => 'clave.usuario',
		'charset' => 'utf8',
		),
		*/

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
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'dyd785265@hotmail.com',
	),
);


?>
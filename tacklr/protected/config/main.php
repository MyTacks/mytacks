<?php

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Tacklr',
	'theme'=>'bootstrap', // requires you to copy the theme under your themes directory
	// preloading 'log' component
	'preload'=>array('log', 'Yiitube'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.YiiMailer.YiiMailer',
	),

	'modules'=>array(
		 'gii'=>array(
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
	      'usr'=>array(
	       'userIdentityClass' => 'UserIdentity',
        ),
        ),
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=> false,
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'Administration',
		
	),

	// application components
	'components'=>array(
            'clientScript'=>array(
                'packages'=>array(
                    'jquery'=>array(
                       //'baseUrl'=>dirname(__FILE__)."../../../",
                       // 'js'=>array('js/tack_generator.js',)
                    ),
                ),
            ),
			'mail' => array(
					'class' => 'ext.YiiMailer.YiiMailer',
					'transportType'=>'smtp',
					'transportOptions'=>array(
							'host'=>'smtp.gmail.com',
							'encryption'=>'ssl',
							'username'=>'tacklr.info@gmail.com',
							'password'=>'webbasket',
							'port'=>'465',
					),
					'viewPath' => 'application.views.mail',
					'logging' => true,
					'dryRun' => false
				),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

        'Yiitube'=>array(
            'class'=>'ext.Yiitube.Yiitube',
        ),

		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'rules' => array(
					'/' => '/view',
					'//' => '/',
					'/' => '/',
			
			),
				
			/*
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
			*/
		),
	
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=webdb',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
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
		'adminEmail'=>'webmaster@example.com',
	),
);
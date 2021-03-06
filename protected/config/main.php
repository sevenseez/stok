<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Letta Stok Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.extensions.EExcelView',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'yucel552',
                        'generatorPaths' =>array('ext.mpgii'),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
                'widgetFactory' => array(
                    'widgets' => array(
                        'CLinkPager' => array(
                            'header' => '<div class="pagination">',
                            'footer' => '</div>',
                            'firstPageLabel'=>'<<<',
                            'nextPageLabel' => '>',
                            'prevPageLabel' => '<',
                            'lastPageLabel'=>'>>>',
                            'selectedPageCssClass' => 'active',
                            'hiddenPageCssClass' => 'disabled',
                            'maxButtonCount'=>5,
                            'htmlOptions' => array(
                                'class' => '',
                            )
                        )
                    )
                ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        'class'=>'WebUser',
		),
		// uncomment the following to enable URLs in path-format

                'urlManager'=>array(
                    'urlFormat'=>'path',
                    'showScriptName'=>false,
                    'rules'=>array(
                    'gii' => 'gii',
                        'gii/<controller:\w+>'=>'gii/<controller>',
                        'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',

                        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                    ),
                ),
            

		// database settings are configured in database.php
		//'db'=>require(dirname(__FILE__).'/database.php'),
               'db'=>array(
                'charset'=>'utf8',
                'connectionString'=>'mysql:host=localhost;dbname=db_users',
                'username'=>'root',
                'password'=>'',
                  ),
                'db_adres'=>array(
                        'charset'=>'utf8',
                        'connectionString'=>'mysql:host=localhost;dbname=db_adres',
                        'username'=>'root',
                        'password'=>'',
                        'class'=> 'CDbConnection' 
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
				
				/*array(
					'class'=>'CWebLogRoute',
				),*/
				
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
                'homeUrl'=>array('site/index'),
	),
);

<?php
/**
 *  THEMES
 *
 *  antiquarians
 *  chattitup
 *  deadrabbits
 *  duespay
 *  default
 *  nihil
 *  nurses4change
 *  shirlock
 *  taraloka
 *  uclemmer
 */
$theme = 'nihil';

$config = [
    'id' => 'nihil-framework',
	'name' => 'NIHIL Framework',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'timeZone' => 'America/New_York',
	'version' => '0.3',
	'modules' => require(__DIR__ . '/modules.php'),
    'components' => [
        'request' => [
			'enableCookieValidation' => true,
			'enableCsrfValidation' => true,
			'cookieValidationKey' => 'XaDzYlbsgURp5i2qwPxQpvScDYZz_dcT',
        ],
		'authManager' => [
			'class' => 'yii\rbac\DbManager',
			'defaultRoles' => ['guest'],
			'itemTable' => 'ac_auth_items',
			'itemChildTable' => 'ac_auth_item_children',
			'assignmentTable' => 'ac_auth_assignments',
			'ruleTable' => 'ac_auth_rules',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		//'cart' => [
		//	'class' => 'app\modules\ecom\components\Cart',
		//],
		'user' => [
			'class' => 'yii\web\User',
			'identityClass' => 'app\modules\ac\models\User',
			'enableAutoLogin' => true,
		],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mail' => require(__DIR__ . '/themes/' . $theme . '/mailer.php'),
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
		'view' => [
			'theme' => [
				'pathMap' => [
					'@app/views' => '@app/themes/' . $theme . '/views',
					'@app/modules' => '@app/themes/' . $theme . '/modules',
				],
				'baseUrl' => '@web/themes/' . $theme,
			],
		],
		'urlManager' => require(__DIR__ . '/themes/' . $theme . '/urlManager.php'),
		//'view' => [
		//	'theme' => [
		//		'pathMap' => [
		//			'@app/views' => '@app/themes/' . $theme . '/views',
		//			'@app/modules' => '@app/themes/' . $theme . '/modules',
		//			'@app/widgets' => '@app/themes/' . $theme . '/widgets',
		//		],
		//		//'baseUrl' => '@web/themes/' . $theme,
		//	],
		//],
        'db' => require(__DIR__ . '/themes/' . $theme . '/db.local.php'),
    ],
    'params' => require(__DIR__ . '/themes/' . $theme . '/params.php'),
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
		'class' => 'yii\debug\Module',
		'dataPath' => '@runtime/debug',
	];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
	
	$config['bootstrap'][] = 'gii';
	$config['modules']['gii'] = [
		'class' => 'yii\gii\Module',
		'generators' => [
			'crud'   => [
				'class'     => 'yii\gii\generators\crud\Generator',
				'templates' => ['NIHIL CRUD' => '@app/library/gii/generators/crud/IVDCUDL']
			]
		]
	];
}

return $config;

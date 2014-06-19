<?php

$config = [
    'id' => 'nihil-framework',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'modules' => require(__DIR__ . '/modules.php'),
    'components' => [
		'authManager' => [
            'class' => 'yii\rbac\DbManager',
			'defaultRoles' => ['user', 'guest'],
			'itemTable' => 'ac_auth_items',
			'itemChildTable' => 'ac_item_children',
			'assignmentTable' => 'ac_auth_assignments',
			'ruleTable' => 'ac_auth_rules',
        ],
		'user' => [
			'class' => 'app\modules\ac\models\User',
			//'identityClass' => 'app\modules\ac\models\User',
			'enableAutoLogin' => true,
		],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
			// send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'matt.clemmer@shirlock.org',
                'password' => 'NH4716iw',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
		'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
			'rules' => array(

            ),
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => require(__DIR__ . '/params.php'),
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;

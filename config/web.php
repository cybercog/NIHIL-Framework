<?php

$config = [
    'id' => 'nihil-framework',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'modules' => require(__DIR__ . '/modules.php'),
	'layout' => 'taraloka',
    'components' => [
		'request' => [
			'enableCookieValidation' => true,
			'enableCsrfValidation' => true,
			'cookieValidationKey' => 'QoPhkzY3yrJem4dW2qPaKRQbSG8P1ztwTgCalef4oEndQg2ouyFXWBUVnN7LnF07',
		],
		'authManager' => [
            'class' => 'yii\rbac\DbManager',
			'defaultRoles' => ['guest'],
			'itemTable' => 'ac_auth_items',
			'itemChildTable' => 'ac_auth_item_children',
			'assignmentTable' => 'ac_auth_assignments',
			'ruleTable' => 'ac_auth_rules',
        ],
		'cart' => [
			'class' => 'app\modules\ecom\components\Cart',
		],
		'user' => [
			'class' => 'yii\web\User',
			'identityClass' => 'app\modules\ac\models\Users',
			'enableAutoLogin' => true,
		],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
		'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
			// send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'charger.websitewelcome.com',
                'username' => 'no-reply@taraloka.org',
                'password' => 'Bayl0r!',
                'port' => '465',
                'encryption' => 'ssl',
            ],
			// 'transport' => [
                // 'class' => 'Swift_SmtpTransport',
                // 'host' => 'charger.websitewelcome.com',
                // 'username' => 'no-reply@uclemmer.com',
                // 'password' => 'Bayl0r!',
                // 'port' => '465',
                // 'encryption' => 'ssl',
            // ],
			'messageConfig' => [
				'from' => ['no-reply@uclemmer.com' => 'uclemmer'],
			],
        ],
		'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
			'rules' => array(
				'ac/users/verify/<code>' => 'ac/users/verify',
				'ac/users/change-password/<code>' => 'ac/users/change-password',
				'cms/projects/view/<slug>' => 'cms/projects/view',
				'tutorials' => 'cms/projects',
				'tutorials/<slug>' => 'cms/projects/view',
				'blog' => 'cms/posts',
				'blog/<slug>' => 'cms/posts/view',
				'contact' => 'site/contact',
				'login' => 'ac/users/login',
				'logout' => 'ac/users/logout',
				'register' => 'ac/users/register',
				'reset' => 'ac/users/reset',
				'shop' => 'ecom/products/index',
				'donate' => 'ecom/payments/donate',
				
				'cart' => 'ecom/products/cart',
				'cart/remove/<uid>' => 'ecom/products/remove-from-cart',
				'checkout' => 'ecom/orders/checkout',
				
				'products/<slug>' => 'ecom/products/view',
				'pages' => 'cms/pages/index',
				'pages/<slug>' => 'cms/pages/view',
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

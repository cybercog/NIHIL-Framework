<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

return [
    'id' => 'nihil-framework-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'components' => [
		'authManager' => [
            'class' => 'yii\rbac\DbManager',
			'defaultRoles' => ['guest'],
			'itemTable' => 'ac_auth_items',
			'itemChildTable' => 'ac_item_children',
			'assignmentTable' => 'ac_auth_assignments',
			'ruleTable' => 'ac_auth_rules',
        ],
		'user' => [
			'class' => 'yii\web\User',
			'identityClass' => 'app\modules\ac\models\Users',
			'enableAutoLogin' => true,
		],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
];

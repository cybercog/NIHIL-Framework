<?php

return [
	'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
	'rules' => [
		'contact' => 'site/contact',
		
		'login' => 'ac/users/login',
		'logout' => 'ac/users/logout',
		'signup' => 'ac/users/signup',
		'verify' => 'ac/users/verify',
		'verify/<code>' => 'ac/users/verify',
		'dashboard' => 'ac/users/index',
		'settings' => 'ac/users/settings',
		
		'blog' => 'cms/posts/index',
		
		'donate' => 'ecom/payments/donate',
		
		[
			'class' => 'app\modules\cms\components\PageUrlRule',
			'pattern' => '/',
			'route' => 'cms/pages/view',
			// ...configure other properties...
		],
	]
];
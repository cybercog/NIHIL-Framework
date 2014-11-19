<?php

return [
	'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
	'rules' => [
		'' => 'gow/default/index',
		'contact' => 'gow/default/contact',
		
		'login' => 'gow/players/login',
		'logout' => 'gow/players/logout',
		'register' => 'gow/players/register',
		
		'bank' => 'gow/banks/index',
		'bank/alliance' => 'gow/banks/alliance',
		'bank/balance' => 'gow/banks/balance',
		'bank/reconcile' => 'gow/banks/reconcile',
		'bank/create-transaction' => 'gow/bank-transactions/create',
		
		'players/manage' => 'gow/players/manage',
	]
];
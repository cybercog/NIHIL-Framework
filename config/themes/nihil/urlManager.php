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
		
		'domains/tlds-list' => 'domains/tlds/index',
		'domains/register' => 'domains/registered-domains/register',
		'domains/transfer' => 'domains/registered-domains/transfer',
		'domains/whois' => 'domains/whois/index',
		
		'hosting/shared-hosting' => 'hosting/default/shared-hosting',
		'hosting/vps-hosting' => 'hosting/default/vps-hosting',
		'hosting/dedicated-servers' => 'hosting/default/dedicated-servers',
		'hosting/ssl-certificates' => 'hosting/default/ssl-certificates',
		'hosting/private-email' => 'hosting/default/private-email',
		
		'company/blog' => 'cms/posts/index',
		
		'support/knowledge-base' => 'cms/projects',
		
		'ecom/invoices/view/<id>' => 'ecom/invoices/view',
		'ecom/invoices/print/<id>' => 'ecom/invoices/print',
		'ecom/invoices/pay/<id>' => 'ecom/invoices/pay',
		
		'gow/bank' => 'gow/banks/index',
		'gow/bank/alliance' => 'gow/banks/alliance',
		'gow/bank/balance' => 'gow/banks/balance',
		'gow/bank/create-transaction' => 'gow/bank-transactions/create',
		
		[
			'class' => 'app\modules\cms\components\PageUrlRule',
			'pattern' => '/',
			'route' => 'cms/pages/view',
			// ...configure other properties...
		],
	]
];
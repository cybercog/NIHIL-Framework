<?php

	return [
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
		'messageConfig' => [
			'from' => ['no-reply@taraloka.org' => 'No-Reply | Taraloka Foundation'],
		],
	];
<?php

	return [
		'class' => 'yii\swiftmailer\Mailer',
		// send all mails to a file by default. You have to set
		// 'useFileTransport' to false and configure a transport
		// for the mailer to send real emails.
		'useFileTransport' => false,
		'transport' => [
			'class' => 'Swift_SmtpTransport',
			'host' => 'smtp.gmail.com',
            'username' => 'matt.clemmer@shirlock.org',
            'password' => 'NH4716iw',
            'port' => '465',
            'encryption' => 'ssl',
		],
		'messageConfig' => [
			'from' => ['no-reply@nihil.co' => 'The NIHIL Corporation'],
		],
	];
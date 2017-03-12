<?php 

return [
	'settings' => [
		'displayErrorDetails' => true,
		'db' => [
			'user' => 'root',
			'pass' => 'apple',
			'host' => 'localhost',
			'name' => 'db_framework',
			'port' => '',
		],
		'view' => [
			'view_path' => __DIR__ . '/../views',
			'twig' => [
				'cache' => false,
				'debug' => true,
				'auto_reload' => true,
			]
		],
		'lang' => [
			'default' => 'id'
		]
	]
];
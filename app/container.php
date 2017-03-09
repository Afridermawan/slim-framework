<?php 

$container = new \Slim\Container;
$container = $app->getContainer();

$container['db'] = function ($c) {
	$setting = $c->get('settings')['db'];
	$config = new \Doctrine\DBAL\Configuration();
	$connnectionParams = array(
		'dbname' => $setting['name'],
		'user' => $setting['user'],
		'password' => $setting['pass'],
		'host' => $setting['host'],
		'driver' => 'pdo_mysql',
	);

	$connection = \Doctrine\DBAL\DriverManager::getConnection(
		$connnectionParams,
		$config
	);
	return $connection->createQueryBuilder();
};

$container['view'] = function ($c) {
	$settings = $c->get('settings');
	$view = new \Slim\Views\Twig($settings['view']['view_path'],
		$settings['view']['twig']);
	$view->addExtension(new Slim\Views\TwigExtension($c->router, $c->request->getUri()));

	return $view;
};



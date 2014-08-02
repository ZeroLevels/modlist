<?php
require_once __DIR__ . '/vendor/autoload.php';

$config = new Modlist\Config(__DIR__ . '/config.php');

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
	'driver'    => 'mysql',
	'host'      => $config->get('database.host'),
	'database'  => $config->get('database.database'),
	'username'  => $config->get('database.username'),
	'password'  => $config->get('database.password'),
	'charset'   => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
<?php
/*
|--------------------------------------------------------------------------
| Bootstrap
|--------------------------------------------------------------------------
|
| The boostrapping process is where the vendor file is required, utilized,
| processed, and returns the container which we can use to our liking.
|
*/

use DI\ContainerBuilder;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/config.php');
$container = $containerBuilder->build();

return $container;

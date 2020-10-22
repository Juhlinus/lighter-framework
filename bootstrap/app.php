<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Bootstrap
|--------------------------------------------------------------------------
|
| The boostrapping process is where the vendor file is required, utilized,
| processed, and returns the container which we can use to our liking.
|
*/

require_once __DIR__.'/../vendor/autoload.php';

$container = new \League\Container\Container();

$container->delegate(
    (new \League\Container\ReflectionContainer())->cacheResolutions()
);

$container
    ->add(\Jenssegers\Blade\Blade::class)
    ->addArgument(__DIR__.'/../resources/views/')
    ->addArgument(__DIR__.'/cache')
;

$container
    ->add(\App\Http\Controllers\BaseController::class)
    ->addArgument(\Jenssegers\Blade\Blade::class)
;

return $container;

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

use Twig\Environment;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once __DIR__ . '/../vendor/autoload.php';

$container = new \League\Container\Container();

$container->delegate(
    (new \League\Container\ReflectionContainer)->cacheResolutions()
);

$container
    ->add(\App\Http\Controllers\BaseController::class)
    ->addArgument(Environment::class);

$container
    ->add(Environment::class)
    ->addArgument(\Twig\Loader\FilesystemLoader::class);

$container
    ->add(\Twig\Loader\FilesystemLoader::class)
    ->addArgument(__DIR__ . '/../resources/views/' . getenv('APP_TPL') . '/');

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'itsajten',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

return $container;

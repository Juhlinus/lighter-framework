<?php

declare(strict_types=1);

$route = new League\Route\Router();

$route->get('/', \App\Http\Controllers\Home\IndexController::class);

return $route;

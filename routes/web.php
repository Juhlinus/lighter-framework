<?php

$route = new League\Route\Router();

$route->get('/', \App\Http\Controllers\Home\IndexController::class);
$route->get('/product/{product}', \App\Http\Controllers\Product\ShowController::class);

return $route;
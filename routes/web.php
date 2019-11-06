<?php

return \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $route) {
    $route->get('/', \App\Http\Controllers\Home\IndexController::class);
    $route->get('/product/{product}', \App\Http\Controllers\Product\ShowController::class);
});

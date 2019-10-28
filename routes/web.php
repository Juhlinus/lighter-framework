<?php

return \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $route) {
    $route->get('/', \App\Http\Controller\HomeController::class);
    $route->get('/product/{id}', \App\Http\Controller\Product\ShowController::class);
});

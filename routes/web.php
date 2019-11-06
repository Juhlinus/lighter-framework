<?php

return \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $route) {
    $route->get('/', \App\Http\Controller\HomeController::class);
    $route->get('/product/{product}', \App\Http\Controller\Product\ShowController::class);

    $route->get('{regular_file:.+}', \App\Http\Controller\RegularPhpFileController::class);
});

<?php

return \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $route) {
    $route->get('/', \Lighter\Controller\HomeController::class);
});

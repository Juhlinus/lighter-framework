<?php

$container = require __DIR__ . '/../bootstrap/app.php';

$request = \Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES,
);

$strategy = (new \League\Route\Strategy\ApplicationStrategy)->setContainer($container);

$router = include(__DIR__ . '/../routes/web.php');

$router->setStrategy($strategy);

$response = $router->dispatch($request);

(new \Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
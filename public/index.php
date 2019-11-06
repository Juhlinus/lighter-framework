<?php

use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Request;

$container = require __DIR__ . '/../bootstrap/app.php';

$dispatcher = require_once __DIR__ . '/../routes/web.php';

$request = Request::createFromGlobals();

$route = $dispatcher->dispatch(
    $request->getMethod(),
    $request->getPathInfo()
);

switch ($route[0]) {
    case \FastRoute\Dispatcher::NOT_FOUND:
        $response = new \Symfony\Component\HttpFoundation\Response(
            'Not found',
            404
        );
        break;

    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $response = new \Symfony\Component\HttpFoundation\Response(
            'Method not allowed',
            405
        );

        break;

    case \FastRoute\Dispatcher::FOUND:
        $controller = $route[1];
        $parameters = [
            'request' => $request,
        ];

        // Route model binding
        foreach ($route[2] as $key => $value) {
            if (file_exists(__DIR__ . '/../app/Model/' . Str::studly($key))) {
                $model = 'App\\Model\\' . Str::studly($key);

                $parameters[$key] = $model::find($value);
            }
        }

        $response = $container->call($controller, $parameters);
        break;
}

$response->prepare($request);
$response->send();

<?php

return [
    \Twig\Environment::class => function () {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../resources/views');

        return new \Twig\Environment($loader);
    },
];

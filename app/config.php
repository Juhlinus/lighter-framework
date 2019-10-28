<?php

return [
    \Twig\Environment::class => function () {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../src/Lighter/Views');

        return new \Twig\Environment($loader);
    },
];

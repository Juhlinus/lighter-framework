<?php

namespace App\Http\Controllers;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;

class BaseController
{
    protected $twig;

    public function __construct(\Twig\Environment $twig)
    {
        $this->twig = $twig;
    }

    protected function render(string $file, array $data): ResponseInterface
    {
        return $this->createResponse($this->twig->render($file, $data));
    }

    protected function renderRaw(string $raw): ResponseInterface
    {
        return $this->createResponse($raw);
    }

    private function createResponse(string $data): ResponseInterface
    {
        $response = new Response();

        $response->getBody()
            ->write($data);

        return $response;
    }
}

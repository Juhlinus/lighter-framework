<?php

declare(strict_types=1);

namespace App\Concerns;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;

trait CreatesResponse
{
    private function render(string $file, array $data = []): ResponseInterface
    {
        $response = new Response();

        $response->getBody()
            ->write(
                $this->blade->render($file, $data)
            )
        ;

        return $response;
    }
}

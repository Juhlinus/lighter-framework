<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Concerns\CreatesResponse;
use Jenssegers\Blade\Blade;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class IndexController
{
    use CreatesResponse;

    protected Blade $blade;

    public function __construct(Blade $blade)
    {
        $this->blade = $blade;
    }

    public function __invoke(RequestInterface $request): ResponseInterface
    {
        return $this->render('home');
    }
}

<?php

namespace Lighter\Controller;

use Twig_Environment;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    /**
     * @var Twig_Environment
     */
    private $twig;

    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke()
    {
        return new Response($this->twig->render('home.twig', [
            'title' => 'Home',
        ]));
    }
}

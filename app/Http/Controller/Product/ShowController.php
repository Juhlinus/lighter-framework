<?php

namespace App\Http\Controller\Product;

use Twig_Environment;
use App\Model\Product;
use Symfony\Component\HttpFoundation\Response;

class ShowController
{
    /**
     * @var Twig_Environment
     */
    private $twig;

    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(Product $product): Response
    {
        return new Response(
            $this->twig->render('product/show.twig', compact('product'))
        );
    }
}

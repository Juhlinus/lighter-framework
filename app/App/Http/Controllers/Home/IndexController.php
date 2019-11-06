<?php

namespace App\Http\Controllers\Home;

use Twig_Environment;
use Domain\Product\Models\Product;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * @var App\Model\Product
     */
    private $products;

    public function __construct(Twig_Environment $twig, Product $products)
    {
        $this->twig = $twig;
        $this->products = $products;
    }

    public function __invoke(): Response
    {
        $products = $this->products
            ->latest('id')
            ->paginate(10);

        return new Response($this->twig->render('home.twig', [
            'products' => $products,
        ]));
    }
}

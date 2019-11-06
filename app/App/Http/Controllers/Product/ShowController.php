<?php

namespace App\Http\Controllers\Product;

use Twig_Environment;
use Domain\Product\Models\Product;
use Domain\Product\DTO\ProductData;
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
        $product_data = ProductData::create($product);

        return new Response(
            $this->twig->render('product/show.twig', [
                'product' => $product_data,
            ])
        );
    }
}

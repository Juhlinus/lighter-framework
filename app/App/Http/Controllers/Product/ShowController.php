<?php

namespace App\Http\Controllers\Product;

use Domain\Product\Models\Product;
use Domain\Product\DTO\ProductData;
use App\Http\Controllers\BaseController;
use Psr\Http\Message\{
    RequestInterface, 
    ResponseInterface
};

class ShowController extends BaseController
{
    public function __invoke(RequestInterface $request, array $args): ResponseInterface
    {
        $product = Product::find($args['product']);

        $product_data = ProductData::create($product);

        return $this->render('product/show.twig', [
            'product' => $product_data,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Home;

use Domain\Product\Models\Product;
use App\Http\Controllers\BaseController;
use Psr\Http\Message\{
    RequestInterface, 
    ResponseInterface
};

class IndexController extends BaseController
{
    public function __invoke(RequestInterface $request): ResponseInterface
    {
        $products = Product::latest('id')
            ->paginate(10);

        return $this->render('home.twig', [
            'products' => $products,
        ]);
    }
}

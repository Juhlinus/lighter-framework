<?php

namespace Domain\Product\DTO;

use Domain\Product\Models\Product;

class ProductData extends \Spatie\DataTransferObject\DataTransferObject
{
    public $id;

    public $name;

    public $active;

    public $description;

    public static function create(Product $product): ProductData
    {
        $product_description_data = ProductDescriptionData::create($product->description);

        return new self([
            'id' => $product->id,
            'name' => $product_description_data->name,
            'active' => $product->active,
            'description' => $product_description_data->description,
        ]);
    }
}

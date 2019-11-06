<?php

namespace Domain\Product\DTO;

use Domain\Product\Models\ProductDescription;

class ProductDescriptionData extends \Spatie\DataTransferObject\DataTransferObject
{
    public $id;

    public $name;

    public $description;

    public static function create(ProductDescription $product_description): ProductDescriptionData
    {
        return new self([
            'id' => $product_description->id,
            'name' => $product_description->name,
            'description' => $product_description->description,
        ]);
    }
}

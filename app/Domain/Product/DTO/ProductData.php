<?php

namespace Domain\Product\DTO;

class ProductData extends \Spatie\DataTransferObject\DataTransferObject
{
    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
    }
}

<?php

namespace Domain\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $with = [
        'descriptions',
    ];

    protected $appends = [
        'description',
    ];

    public function descriptions()
    {
        return $this->hasMany(ProductDescription::class);
    }

    public function getDescriptionAttribute()
    {
        return $this->descriptions()
            ->where('language', 'sv')
            ->first();
    }
}

<?php

namespace Modules\Product\Services;

//Models
use Modules\Product\Entities\Product;

class ProductReport 
{
    /**
     * Get all products.
     *
     * @return object
     */
    public function getAllProducts()
    {
        return Product::all();
    }
}
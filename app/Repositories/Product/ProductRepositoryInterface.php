<?php

namespace App\Repositories\Product;

use App\Models\Ingredient;
use App\Models\Product;

/**
 * Interface ProductRepositoryInterface
 */
interface ProductRepositoryInterface
{
    /**
     * @param  Product  $product
     * @param  Ingredient  $ingredient
     * @param $data
     * @return void
     */
    public function addProductIngredient(Product $product, Ingredient $ingredient, $data): void;
}

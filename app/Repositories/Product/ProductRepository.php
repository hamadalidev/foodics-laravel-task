<?php

namespace App\Repositories\Product;

use App\Models\Ingredient;
use App\Models\Product;
use App\Repositories\Base\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * @param  Product  $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    /**
     * @param  Product  $product
     * @param  Ingredient  $ingredient
     * @param $data
     * @return void
     */
    public function addProductIngredient(Product $product, Ingredient $ingredient, $data): void
    {
        $product->productIngredients()->firstOrCreate(
            ['product_id' => $product->id, 'ingredient_id' => $ingredient->id],
            ['product_id' => $product->id, 'ingredient_id' => $ingredient->id, 'quantity' => $data['quantity']]);
    }
}

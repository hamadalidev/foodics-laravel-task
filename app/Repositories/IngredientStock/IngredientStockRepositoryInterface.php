<?php

namespace App\Repositories\IngredientStock;

use App\Models\IngredientStock;

/**
 * Interface IngredientStockRepositoryInterface
 */
interface IngredientStockRepositoryInterface
{
    /**
     * @param  IngredientStock  $ingredientStock
     * @param $data
     * @return void
     */
    public function updateIngredientStock(IngredientStock $ingredientStock, $data): void;
}

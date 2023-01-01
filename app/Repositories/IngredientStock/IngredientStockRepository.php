<?php

namespace App\Repositories\IngredientStock;

use App\Models\IngredientStock;
use App\Repositories\Base\BaseRepository;

class IngredientStockRepository extends BaseRepository implements IngredientStockRepositoryInterface
{
    /**
     * @param  IngredientStock  $model
     */
    public function __construct(IngredientStock $model)
    {
        parent::__construct($model);
    }

    /**
     * @param  IngredientStock  $ingredientStock
     * @param $data
     * @return void
     */
    public function updateIngredientStock(IngredientStock $ingredientStock, $data): void
    {
        $ingredientStock->total_quantity = $ingredientStock->remaining_quantity + $data['total_quantity'];
        $ingredientStock->save();
    }
}
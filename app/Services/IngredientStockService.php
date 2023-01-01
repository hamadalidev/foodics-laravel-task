<?php

namespace App\Services;

use App\Models\IngredientStock;
use App\Repositories\IngredientStock\IngredientStockRepositoryInterface;
use App\Services\Base\BaseService;

class IngredientStockService extends BaseService
{
    private IngredientStockRepositoryInterface $repositories;

    /**
     * @param IngredientStockRepositoryInterface $repositories
     */
    public function __construct(IngredientStockRepositoryInterface $repositories)
    {
        $this->repositories = $repositories;
    }

    public function updateIngredientStock(IngredientStock $ingredientStock, $data)
    {
        $ingredientStock->total_quantity = $ingredientStock->remaining_quantity + $data['total_quantity'];
        $ingredientStock->save();
    }

}

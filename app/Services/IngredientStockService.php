<?php

namespace App\Services;

use App\Models\IngredientStock;
use App\Repositories\IngredientStock\IngredientStockRepositoryInterface;
use App\Services\Base\BaseService;

class IngredientStockService extends BaseService
{
    /**
     * @param  IngredientStockRepositoryInterface  $repository
     */
    public function __construct(IngredientStockRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param  IngredientStock  $ingredientStock
     * @param $data
     * @return void
     */
    public function updateIngredientStock(IngredientStock $ingredientStock, $data): void
    {
        $this->repository->updateIngredientStock($ingredientStock, $data);
    }
}

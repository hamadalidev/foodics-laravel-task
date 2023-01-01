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

    /**
     * @param  array  $orderIngredients
     * @return bool
     */
    public function isOrderIngredientStockAvailable(array $orderIngredients): bool
    {
        $whereConditions = [];
        foreach ($orderIngredients as $key => $in) {
            $whereConditions[] = [['remaining_quantity', '<', $in], ['ingredient_id',  $key]];
        }

        return $this->repository->isOrderIngredientStockAvailable($whereConditions);
    }
}

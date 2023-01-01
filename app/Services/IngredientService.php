<?php

namespace App\Services;

use App\Models\Ingredient;
use App\Repositories\Ingredient\IngredientRepositoryInterface;
use App\Repositories\IngredientStock\IngredientStockRepository;
use App\Services\Base\BaseService;
use Illuminate\Support\Arr;

final class IngredientService extends BaseService
{
    /**
     * @param IngredientRepositoryInterface $repository
     * @param IngredientStockService $ingredientStockService
     */
    public function __construct(IngredientRepositoryInterface  $repository,
                                private IngredientStockService $ingredientStockService)
    {
        $this->repository = $repository;
    }

    public function saveIngredientWithStock($data)
    {
        $ingredient = $this->repository->firstOrCreate(Arr::except($data, 'stock'));
        if ($ingredient->ingredientStock) {
            $this->ingredientStockService->updateIngredientStock($ingredient->ingredientStock, ['total_quantity' => $data['stock']['new_stock']]);
        } else {
            $this->repository->addIngredientStock($ingredient, ['total_quantity' => $data['stock']['new_stock']]);
        }
    }

}

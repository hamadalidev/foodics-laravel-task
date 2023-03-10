<?php

namespace App\Services;

use App\Repositories\Ingredient\IngredientRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\Base\BaseService;
use Illuminate\Support\Arr;

final class ProductService extends BaseService
{
    private IngredientRepositoryInterface $ingredientRepository;

    /**
     * @param  ProductRepositoryInterface  $repository
     * @param  IngredientRepositoryInterface  $ingredientRepository
     */
    public function __construct(ProductRepositoryInterface $repository,
    IngredientRepositoryInterface $ingredientRepository)
    {
        $this->repository = $repository;
        $this->ingredientRepository = $ingredientRepository;
    }

    /**
     * @param $data
     * @return void
     */
    public function saveProductWithIngredient($data): void
    {
        $product = $this->repository->firstOrCreate(Arr::except($data, 'ingredients'));

        foreach ($data['ingredients'] as $ingredientRow) {
            $ingredient = $this->ingredientRepository->getWithName($ingredientRow['name']);
            $this->repository->addProductIngredient($product, $ingredient, $ingredientRow);
        }
    }
}

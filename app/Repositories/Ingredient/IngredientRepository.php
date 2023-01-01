<?php

namespace App\Repositories\Ingredient;

use App\Models\Ingredient;
use App\Repositories\Base\BaseRepository;

class IngredientRepository extends BaseRepository implements IngredientRepositoryInterface
{

    public function __construct(Ingredient $model)
    {
        parent::__construct($model);
    }

    public function addIngredientStock(Ingredient $ingredient, $data)
    {
        $ingredient->ingredientStock()->create($data);
    }

    public function getWithName($name)
    {
        return Ingredient::whereName($name)->firstOrFail();
    }

}

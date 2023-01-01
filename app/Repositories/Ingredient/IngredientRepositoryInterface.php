<?php

namespace App\Repositories\Ingredient;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface IngredientRepositoryInterface
 */
interface IngredientRepositoryInterface
{
    /**
     * @param  Ingredient  $ingredient
     * @param $data
     * @return void
     */
    public function addIngredientStock(Ingredient $ingredient, $data): void;

    /**
     * @param $name
     * @return Model|Builder|Ingredient
     */
    public function getWithName($name): Model|Builder|Ingredient;
}

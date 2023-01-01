<?php

namespace App\Repositories\Ingredient;

use App\Models\Ingredient;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

final class IngredientRepository extends BaseRepository implements IngredientRepositoryInterface
{
    /**
     * @param  Ingredient  $model
     */
    public function __construct(Ingredient $model)
    {
        parent::__construct($model);
    }

    /**
     * @param  Ingredient  $ingredient
     * @param $data
     * @return void
     */
    public function addIngredientStock(Ingredient $ingredient, $data): void
    {
        $ingredient->ingredientStock()->create($data);
    }

    /**
     * @param $name
     * @return Ingredient|Builder|Model
     */
    public function getWithName($name): Model|Builder|Ingredient
    {
        return Ingredient::whereName($name)->firstOrFail();
    }
}

<?php

namespace App\Repositories\IngredientStock;

use App\Models\IngredientStock;
use App\Repositories\Base\BaseRepository;

class IngredientStockRepository extends BaseRepository implements IngredientStockRepositoryInterface
{

    public function __construct(IngredientStock $model)
    {
        parent::__construct($model);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Ingredient
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\IngredientStock $ingredientStock
 *
 * @method static Builder|Ingredient missing()
 * @method static Builder|Ingredient newModelQuery()
 * @method static Builder|Ingredient newQuery()
 * @method static Builder|Ingredient query()
 * @method static Builder|Ingredient whereId($value)
 * @method static Builder|Ingredient whereName($value)
 * @method static Builder|Ingredient whereUpdatedAt($value)
 * @method static Builder|Ingredient whereCreatedAt($value)
 */
class Ingredient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function ingredientStock()
    {
        return $this->hasOne(IngredientStock::class);
    }
}

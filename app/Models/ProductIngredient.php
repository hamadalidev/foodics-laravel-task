<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ProductIngredient
 *
 * @property int $id
 * @property int $product_id
 * @property int $ingredient_id
 * @property float $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\Ingredient $ingredient
 *
 * @method static Builder|ProductIngredient missing()
 * @method static Builder|ProductIngredient newModelQuery()
 * @method static Builder|ProductIngredient newQuery()
 * @method static Builder|ProductIngredient query()
 * @method static Builder|ProductIngredient whereId($value)
 * @method static Builder|ProductIngredient whereProductId($value)
 * @method static Builder|ProductIngredient whereIngredientId($value)
 * @method static Builder|ProductIngredient whereQuantity($value)
 * @method static Builder|ProductIngredient whereUpdatedAt($value)
 * @method static Builder|ProductIngredient whereCreatedAt($value)
 */
class ProductIngredient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ingredient_id',
        'product_id',
        'quantity',
    ];

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return BelongsTo
     */
    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\IngredientStock
 *
 * @property int $id
 * @property int $ingredient_id
 * @property float $remaining_quantity
 * @property float $total_quantity
 * @property float $notification_quantity
 * @property string $notification_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Ingredient $ingredient
 *
 * @method static Builder|IngredientStock missing()
 * @method static Builder|IngredientStock newModelQuery()
 * @method static Builder|IngredientStock newQuery()
 * @method static Builder|IngredientStock query()
 * @method static Builder|IngredientStock whereId($value)
 * @method static Builder|IngredientStock whereIngredientId($value)
 * @method static Builder|IngredientStock whereRemainingQuantity($value)
 * @method static Builder|IngredientStock whereTotalQuantity($value)
 * @method static Builder|IngredientStock whereNotificationQuantity($value)
 * @method static Builder|IngredientStock whereNotificationStatus($value)
 * @method static Builder|IngredientStock whereQuantity($value)
 * @method static Builder|IngredientStock whereUpdatedAt($value)
 * @method static Builder|IngredientStock whereCreatedAt($value)
 */
class IngredientStock extends Model
{
    use HasFactory, SoftDeletes;

    const NOTIFICATION_PERSENTAGE = 50;

    protected $fillable = [
        'ingredient_id',
        'remaining_quantity',
        'total_quantity',
        'notification_quantity',
        'notification_status',
    ];

    /**
     * @return BelongsTo
     */
    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }
}

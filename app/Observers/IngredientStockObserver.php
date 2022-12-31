<?php

namespace App\Observers;

use App\Enums\IngredientStocksNotificaitonEnum;
use App\Models\IngredientStock;

class IngredientStockObserver
{
    /**
     * Handle the IngredientStock "created" event.
     *
     * @param  \App\Models\IngredientStock  $ingredientStock
     * @return void
     */
    public function creating(IngredientStock $ingredientStock)
    {
        $ingredientStock->remaining_quantity = $ingredientStock->total_quantity;
        $ingredientStock->notification_status = IngredientStocksNotificaitonEnum::NOT_SEND;
        $ingredientStock->notification_quantity = ($ingredientStock->total_quantity / 100) * IngredientStock::NOTIFICATION_PERSENTAGE;
    }

    /**
     * Handle the IngredientStock "updated" event.
     *
     * @param  \App\Models\IngredientStock  $ingredientStock
     * @return void
     */
    public function updating(IngredientStock $ingredientStock)
    {
        if ($ingredientStock->isDirty('total_quantity')) {
            $ingredientStock->remaining_quantity = $ingredientStock->total_quantity;
            $ingredientStock->notification_status = IngredientStocksNotificaitonEnum::NOT_SEND;
            $ingredientStock->notification_quantity = ($ingredientStock->total_quantity / 100) * IngredientStock::NOTIFICATION_PERSENTAGE;
        }
    }

    /**
     * Handle the IngredientStock "deleted" event.
     *
     * @param  \App\Models\IngredientStock  $ingredientStock
     * @return void
     */
    public function deleted(IngredientStock $ingredientStock)
    {
        //
    }

    /**
     * Handle the IngredientStock "restored" event.
     *
     * @param  \App\Models\IngredientStock  $ingredientStock
     * @return void
     */
    public function restored(IngredientStock $ingredientStock)
    {
        //
    }

    /**
     * Handle the IngredientStock "force deleted" event.
     *
     * @param  \App\Models\IngredientStock  $ingredientStock
     * @return void
     */
    public function forceDeleted(IngredientStock $ingredientStock)
    {
        //
    }
}

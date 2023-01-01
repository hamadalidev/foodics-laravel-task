<?php

namespace App\Observers;

use App\Enums\IngredientStocksNotificaitonEnum;
use App\Models\IngredientStock;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Event as EventFacade;

class OrderItemObserver
{
    /**
     * Handle the OrderItem "created" event.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return void
     */
    public function created(OrderItem $orderItem)
    {
        $productIngredients = $orderItem->product->productIngredients;
        foreach ($productIngredients as $productIngredient) {
            $ingredient = $productIngredient->ingredient;
            $productIngredientStock = $ingredient->ingredientStock;
            $productIngredientStock->remaining_quantity = $productIngredientStock->remaining_quantity - ($productIngredient->quantity * $orderItem->quantity);
            $productIngredientStock->save();

            if ($productIngredientStock->notification_status == IngredientStocksNotificaitonEnum::NOT_SEND() &&
                $productIngredientStock->remaining_quantity < ($productIngredientStock->total_quantity / 100) * IngredientStock::NOTIFICATION_PERSENTAGE) {
                $productIngredientStock->notification_status = IngredientStocksNotificaitonEnum::SEND;
                $productIngredientStock->save();
                EventFacade::dispatch('stock.below.alert', [$ingredient->name]);
            }
        }
    }

    /**
     * Handle the OrderItem "updated" event.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return void
     */
    public function updated(OrderItem $orderItem)
    {
        //
    }

    /**
     * Handle the OrderItem "deleted" event.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return void
     */
    public function deleted(OrderItem $orderItem)
    {
        //
    }

    /**
     * Handle the OrderItem "restored" event.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return void
     */
    public function restored(OrderItem $orderItem)
    {
        //
    }

    /**
     * Handle the OrderItem "force deleted" event.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return void
     */
    public function forceDeleted(OrderItem $orderItem)
    {
        //
    }
}

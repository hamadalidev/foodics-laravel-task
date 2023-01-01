<?php

namespace App\Repositories\Order;

use App\Models\Order;

/**
 * Interface OrderRepositoryInterface
 */
interface OrderRepositoryInterface
{
    /**
     * @param  Order  $order
     * @param  array  $item
     * @return void
     */
    public function addOrderItem(Order $order, array $item): void;
}

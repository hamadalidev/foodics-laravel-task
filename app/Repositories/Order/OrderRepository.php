<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\Base\BaseRepository;

final class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    /**
     * @param  Order  $model
     */
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    /**
     * @param  Order  $order
     * @param  array  $item
     * @return void
     */
    public function addOrderItem(Order $order, array $item): void
    {
        $order->orderItems()->create($item);
    }
}

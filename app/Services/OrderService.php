<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Services\Base\BaseService;

final class OrderService extends BaseService
{
    /**
     * @param  OrderRepositoryInterface  $repository
     */
    public function __construct(OrderRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $data
     * @return true
     */
    public function saveOrder($data): bool
    {
        $orderItem = $data['products'];
        $order = Order::create(['order_number' => time()]);
        foreach ($orderItem as $item) {
            $order->orderItems()->create($item);
        }

        return true;
    }
}

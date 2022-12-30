<?php

namespace App\Services;

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
}

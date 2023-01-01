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
}

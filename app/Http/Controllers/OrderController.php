<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\BaseController;
use App\Services\OrderService;

final class OrderController extends BaseController
{
    /**
     * @param  OrderService  $orderService
     */
    public function __construct(private OrderService $orderService)
    {
    }
}

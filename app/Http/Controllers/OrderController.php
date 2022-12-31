<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;

final class OrderController extends BaseController
{
    /**
     * @param  OrderService  $orderService
     */
    public function __construct(private OrderService $orderService)
    {
    }

    /**
     * @param  StoreOrderRequest  $request
     * @return JsonResponse
     */
    public function order(StoreOrderRequest $request): JsonResponse
    {
        $this->orderService->saveOrder($request->validated());

        return $this->successResponse('Order created successfully', []);
    }
}

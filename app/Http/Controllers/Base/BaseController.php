<?php

namespace App\Http\Controllers\Base;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

abstract class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $message
     * @param $data
     * @param $statusCode
     * @return JsonResponse
     */
    protected function successResponse($message = null, $data = null, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'status' => 'Success',
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    /**
     * @param $message
     * @param $errors
     * @param $data
     * @param $statusCode
     * @return JsonResponse
     */
    protected function errorResponse($message = null, $errors = null, $data = null, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'data' => $data,
            'errors' => $errors,
        ], $statusCode);
    }
}

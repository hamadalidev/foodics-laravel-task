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
     * @param $code
     * @param $statusCode
     * @return JsonResponse
     */
    protected function successResponse($message = null, $data = null, $code = 200, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'status' => 'Success',
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ], $statusCode);
    }

    /**
     * @param $message
     * @param $errors
     * @param $code
     * @param $data
     * @param $statusCode
     * @return JsonResponse
     */
    protected function errorResponse($message = null, $errors = null, $code = 200, $data = null, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'code' => $code,
            'data' => $data,
            'errors' => $errors,
        ], $statusCode);
    }
}

<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

trait ApiResponseTrait
{


    public function apiErrorResponse($data = [], int $code = 500): JsonResponse
    {
        return Response::json([
            'success' => false,
            'code' => $code,
            'data' => $data
        ]);
    }

    public function apiSuccessResponse($data, string $message = '', int $code = 200): JsonResponse
    {
        return Response::json([
            'success' => true,
            'message' => $message,
            'code' => $code,
            'data' => $data
        ]);
    }
}

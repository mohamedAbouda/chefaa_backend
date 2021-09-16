<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function makeResponse($data = [], bool $success = true, $message = null, int $statusCode = 200, array $errors = []): JsonResponse
    {
        return response()->json([
            'status' => $statusCode,
            'success' => $success,
            'payload' => $data,
            'errors' => $errors,
            'message' => $message
        ], $statusCode);
    }
}

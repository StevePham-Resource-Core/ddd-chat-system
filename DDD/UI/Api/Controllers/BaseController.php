<?php

namespace DDD\UI\Api\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;

abstract class BaseController extends Controller
{
    public function __construct()
    {

    }

    public function response($responseClass, $resource, $status = JsonResponse::HTTP_OK, array $headers = [])
    {
        $response = app($responseClass, compact('resource', 'status', 'headers'));

        return $resource instanceof JsonResource ? response($response, $status, $headers) : $resource;
    }

    public function responseNoContent($status = JsonResponse::HTTP_NO_CONTENT, array $headers = [])
    {
        return response()->noContent($status, $headers);
    }
}

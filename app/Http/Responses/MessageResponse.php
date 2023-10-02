<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MessageResponse implements Responsable
{
    public function __construct(
        private readonly string|array       $data,
        private readonly int|Response $status = Response::HTTP_OK,
    )
    {
    }

    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            data: $this->data,
            status: $this->status
        );
    }
}

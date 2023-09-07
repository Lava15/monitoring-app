<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\DateResource;
use App\Models\Check;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     * @property-read Check $resource
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'result' => $this->resource->result,
            'status' => $this->resource->status_code,
            'response_time' => $this->resource->response_time,
            'created' => new DateResource($this->resource->created_at),
        ];
    }
}

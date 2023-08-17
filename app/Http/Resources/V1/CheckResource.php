<?php

namespace App\Http\Resources\V1;

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
            'id' => $this->resource->getKey(),
        ];
    }
}

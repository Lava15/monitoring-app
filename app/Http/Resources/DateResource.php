<?php

namespace App\Http\Resources;

use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class DateResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     * @property-read CarbonInterface $resource
     */
    public function toArray(Request $request): array
    {
        return [
            'human' => $this->resource->diffForHumans(),
            'timestamp' => $this->resource->timestamp,
            'string' => $this->resource->toDateTimeString(),
        ];
    }
}

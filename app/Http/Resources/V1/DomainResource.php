<?php

namespace App\Http\Resources\V1;

use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DomainResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     * @property-read Domain $resource
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->getKey(),
            'name' => $this->resource->name,
            'expiration_date' => $this->resource->expiration_date
        ];
    }
}

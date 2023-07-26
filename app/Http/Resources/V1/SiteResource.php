<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\DateResource;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class SiteResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     * @property-read Site $resource
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->getKey(),
            'name' => $this->resource->name,
            'urls' => $this->resource->urls,
            'created' => new DateResource(
                resource: $this->resource->created_at
            )
        ];
    }
}

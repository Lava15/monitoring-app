<?php

namespace App\Queries;

use App\Models\Site;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\QueryBuilder;

class FetchSites
{
    public function handle(array $includes = [], array $filters = [])
    {
        return QueryBuilder::for(
            subject: Site::class
        )
            ->allowedIncludes($includes)
            ->allowedFilters($filters);
    }
}

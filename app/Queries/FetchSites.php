<?php

namespace App\Queries;

use App\Models\Site;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\QueryBuilder;

class FetchSites
{
    public function handle(array $includes = [], array $filters = []): Builder
    {
        return QueryBuilder::for(
            subject: Site::class
        )->allowedIncludes(
            includes: $includes
        )->allowedFilters($filters)
            ->getEloquentBuilder();
    }
}

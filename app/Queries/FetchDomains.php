<?php

namespace App\Queries;

use App\Exceptions\DomainException;
use App\Models\Domain;
use Spatie\QueryBuilder\QueryBuilder;

class FetchDomains
{
    public function handle(array $includes = [], array $filters = [])
    {
        return QueryBuilder::for(
            subject: Domain::class
        )
            ->allowedIncludes($includes)
            ->allowedFilters($filters);
    }

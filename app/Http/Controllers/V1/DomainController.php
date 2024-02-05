<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DomainResource;
use App\Http\Responses\V1\CollectionResponse;
use App\Queries\FetchDomains;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function __construct(
        private readonly FetchDomains $query
    )
    {
    }

    /**
     * @return Responsable
     */
    public function index(): Responsable
    {
        return new CollectionResponse(
            data: DomainResource::collection(
                $this->query->handle()->paginate(10)
            )
        );
    }

    /**
     * Check specific domain
     * @return void
     */
    public function checkDomain()
    {
        //
    }


}

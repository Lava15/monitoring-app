<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SiteResource;
use App\Http\Responses\V1\CollectionResponse;
use App\Models\Site;
use App\Queries\FetchSites;
use Illuminate\Contracts\Support\Responsable;


class SiteController extends Controller
{
    public function __construct(
        private readonly FetchSites $query,
    )
    {
    }

    public function index(): Responsable
    {
        return new CollectionResponse(
            data: SiteResource::collection(
                Site::query()
                    ->with('checks')
                    ->get()
            ),
        );
    }
}

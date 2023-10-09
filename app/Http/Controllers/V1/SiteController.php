<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\SiteRequest;
use App\Http\Resources\V1\SiteResource;
use App\Http\Responses\V1\CollectionResponse;
use App\Models\Site;
use App\Queries\FetchSites;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Site Resource
 *
 * @group Sites
 *
 * APIs to work woth sites
 *
 */
class SiteController extends Controller
{

    public function __construct(
        private readonly FetchSites $query,
    )
    {
    }

    /**
     * Retrieve a collection of sites.
     *
     * Returns response to client as json
     *
     * @return Responsable
     */
    public function index(): Responsable
    {
        return new CollectionResponse(
            data: SiteResource::collection(
                $this->query->handle(['checks'])->paginate(1)
            ),
        );
    }

    /**
     * Add a collection of sites
     *
     * Returns new created site as json
     *
     * @param SiteRequest $request
     * @return Responsable
     */
    public function store(SiteRequest $request): Responsable
    {
        $site = Site::query()->create([
            $request->validated()
        ]);

        return new CollectionResponse(
            data: SiteResource::make($site),
            status: Response::HTTP_CREATED
        );
    }
}

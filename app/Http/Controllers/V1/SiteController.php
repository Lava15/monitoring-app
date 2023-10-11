<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\SiteRequest;
use App\Http\Resources\V1\SiteResource;
use App\Http\Responses\MessageResponse;
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
     * Returns message respnse
     *
     * @param SiteRequest $request
     * @return Responsable *
     */
    public function store(SiteRequest $request): Responsable
    {
        $site = Site::query()->create(
            $request->validated()
        );

        return new MessageResponse(
            message: 'A new record created successfully',
            status: Response::HTTP_CREATED
        );
    }

    /**
     * Update record
     *
     * @param SiteRequest $request
     * @return Responsable
     */
    public function update(SiteRequest $request, Site $site): Responsable
    {
        $site->update($request->validated());

        return new MessageResponse(
            message: "Record updated successfully",
            status: Response::HTTP_ACCEPTED
        );
    }
}

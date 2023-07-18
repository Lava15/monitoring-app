<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SiteController extends Controller
{
    public function index(): JsonResponse
    {
        $sites = Site::query()->get();
        return new JsonResponse(
            data: $sites,
            status: Response::HTTP_OK
        );
    }
}

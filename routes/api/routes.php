<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->as('v1:')->group(
    base_path('routes/api/v1/api.php')
);

Route::prefix('v1')->group(
    base_path('routes/api/auth/api.php')
);

Route::prefix('webhook')->as('webhook:')->group(
    base_path('routes/webhooks/telegram.php')
);


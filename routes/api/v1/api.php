<?php

use Illuminate\Support\Facades\Route;


Route::prefix('home')->as('home:')->group(
    base_path('routes/api/v1/home.php')
);
Route::prefix('sites')->as('sites:')->group(
    base_path('routes/api/v1/sites.php')
);

Route::prefix('domains')->as('sites:')->group(
    base_path('routes/api/v1/domains.php.php')
);

<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return new JsonResponse('List of all sites for checking');
})->name('urls');

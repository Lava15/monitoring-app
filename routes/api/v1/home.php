<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return  new JsonResponse('Welcome to home route api');
});

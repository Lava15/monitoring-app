<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return  new JsonResponse('Welcome to home route api');
});

<?php

use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/register', [AuthenticationController::class, 'register']);

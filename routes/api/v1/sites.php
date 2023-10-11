<?php

use App\Http\Controllers\V1\SiteController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SiteController::class, 'index'])->name('index');
Route::post('/', [SiteController::class, 'store'])->name('store');
Route::put('/update/{site}', [SiteController::class, 'update'])->name('store');

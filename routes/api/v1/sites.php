<?php

use App\Http\Controllers\V1\SiteController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SiteController::class,'index'])->name('urls');

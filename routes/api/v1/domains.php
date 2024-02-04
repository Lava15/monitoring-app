<?php


use App\Http\Controllers\V1\DomainController;
use Illuminate\Support\Facades\Route;

Route::post('/domain/check/{domain}', [DomainController::class, 'checkDomain'])->name('check-domain');

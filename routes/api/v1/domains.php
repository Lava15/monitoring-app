<?php


use App\Http\Controllers\V1\DomainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DomainController::class, 'index'])->name('index');
Route::post('/check/{domain}', [DomainController::class, 'checkDomain'])->name('check-domain');

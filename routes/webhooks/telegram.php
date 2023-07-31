<?php


use App\Http\Controllers\Webhooks\TelegramWebhhokController;
use Illuminate\Support\Facades\Route;


Route::prefix('telegram')->as('telegram:')->group(function () {
    Route::post('/', [TelegramWebhhokController::class, 'handleMessage']);
});

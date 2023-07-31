<?php

namespace App\Providers;

use App\Interfaces\TelegramServiceInterface;
use App\Services\Webhooks\TelegramService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TelegramServiceInterface::class, TelegramService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict(
            app()->isLocal()
        );
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\JsonPlaceholderService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(JsonPlaceholderService::class, function ($app) {
            return new JsonPlaceholderService();
        });
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

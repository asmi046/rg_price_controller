<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ParserProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind("Parser", 'App\Services\ParserService');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

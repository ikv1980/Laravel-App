<?php

namespace App\Providers;

use App\Services\Test;
use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('test', function ($app) {
           return new Test(config('test'));
        });
        // bind - каждый раз создается новый объект
        // singleton - объект создается только один раз
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

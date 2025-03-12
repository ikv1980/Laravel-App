<?php

namespace App\Providers;

use App\Facades\TestFacade;
use App\Services\Test;
use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('test', function () {
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
        // Регистрация фасада (закомментировать при использовании `php artisan route:cache`
        class_alias(TestFacade::class, 'CustomTestService');
        // Альтернативный подход
        // use App\Facades\TestFacade;
        // Test::config('name');
    }
}

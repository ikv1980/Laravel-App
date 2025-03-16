<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // глобальные переменные
        View::share ('global_date', date('Y'));

        // переменные для определенных маршрутов
        View::composer('user*', function ($view) {
            $view->with('balance', 12345);
        });
    }
}

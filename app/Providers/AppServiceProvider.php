<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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

        // Настройки для пагинации
        // https://laravel.su/docs/11.x/pagination#ispolzovanie-bootstrap
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}

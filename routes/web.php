<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'name' => 'Главная',
]);

Route::view('/', 'welcome')->name('home');

// Редирект (перенаправление)
Route::redirect('/back', '/')->name('redirect');











// Используется, если никакой маршрут не подошел. Размещать в самом низу
Route::fallback(function () {
    return 'Страницы не существует';
});


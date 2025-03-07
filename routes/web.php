<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'name' => 'Главная',
]);

Route::view('/', 'welcome')->name('home');

// Редирект (перенаправление)
Route::redirect('/back', '/')->name('redirect');

//Route::get('/test', [TestController::class,'index'])->name('test');

Route::get('/test', TestController::class);

// Определение маршрутов для BlogController (содержит все стандартные)
Route::resource('photos', BlogController::class);






// Используется, если никакой маршрут не подошел. Размещать в самом низу
Route::fallback(function () {
    return 'Страницы не существует';
});


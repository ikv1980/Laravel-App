<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'name' => 'Главная',
]);

Route::view('/', 'welcome')->name('home');

// Редирект (перенаправление)
Route::redirect('/back', '/')->name('redirect');

Route::get('/test', [TestController::class,'index'])->name('test');

Route::middleware('guest')->group(function () {
    // Регистрация пользователя
    Route::get('register', [RegisterController::class,'index'])->name('register.index');    // страница регистрации
    Route::post('register', [RegisterController::class,'store'])->name('register.store');   // страница обработки
    // Авторизация пользователя
    Route::get('login', [LoginController::class,'index'])->name('login.index') ;    // страница входа
    Route::post('login', [LoginController::class,'store'])->name('login.store');    // страница обработки
    // Страница подтверждения
    Route::get('login/{user}/confirm', [LoginController::class,'confirm'])->name('login.confirm');  // страница подтверждения входа
    Route::post('login/{user}/confirm', [LoginController::class,'confirm'])->name('login.confirm'); // страница обработки
});






// Используется, если никакой маршрут не подошел. Размещать в самом низу
Route::fallback(function () {
    return 'Страницы не существует';
});


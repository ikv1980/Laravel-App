<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Posts\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Главная страница
Route::view('/', 'welcome')->name('home');

// Редирект (перенаправление)
Route::redirect('/back', '/')->name('redirect');

// Регистрация и авторизация пользователей
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register.index');    // страница регистрации
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');   // страница обработки
    Route::get('login', [LoginController::class, 'index'])->name('login.index');    // страница входа
    Route::post('login', [LoginController::class, 'store'])->name('login.store');    // страница обработки
});

// Тестовый контроллер для Блога - удалить потом
Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::put('blog/{blog}/like', [BlogController::class, 'like'])->name('blog.like');

// Комментарии для постов
Route::resource('/posts/{post}/comments', CommentController::class)->only(['index', 'edit', 'show']);

// Тестовый контроллер - удалить
Route::get('/test', [TestController::class, 'index'])->name('test');

// Используется, если никакой маршрут не подошел. Размещать в самом низу
Route::fallback(function () {
    return 'Страницы не существует';
});

<?php

use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;


// Контроллер для ПОСТОВ пользователя
//Route::prefix('user')->middleware(['auth', 'active_user'])->group(function () {
Route::prefix('user')->group(function () {
    Route::redirect('/', '/user/posts')->name('user');
    // CRUD (Create, Read, Update, Delete
    Route::get('/posts', [PostController::class, 'index'])->name('user.posts');
    Route::get('/posts/create', [PostController::class, 'create'])->name('user.posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('user.posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('user.posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('user.posts.edit');
    Route::patch('/posts/{post}', [PostController::class, 'update'])->name('user.posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('user.posts.destroy');
    Route::put('/posts/{post}/like', [PostController::class, 'like'])->name('user.posts.like');
});

// Можно прописать более кратко.
// Но такая запись менее информативна
//Route::prefix('user')->as('user.')->group(function () {
//    // CRUD (Create, Read, Update, Delete
//    Route::resource('posts', PostController::class);
//});

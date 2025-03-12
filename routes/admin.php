<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;


// Контроллер для ПОСТОВ пользователя
Route::prefix('admin')->group(function () {
    // CRUD (Create, Read, Update, Delete
    Route::get('/posts', [PostController::class,'index'])->name('admin.posts.index');
    Route::get('/posts/create', [PostController::class,'create'])->name('admin.posts.create');
    Route::post('/posts', [PostController::class,'store'])->name('admin.posts.store');
    Route::get('/posts/{post}', [PostController::class,'show'])->name('admin.posts.show');
    Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('admin.posts.edit');
    Route::patch('/posts/{post}', [PostController::class,'update'])->name('admin.posts.update');
    Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('admin.posts.destroy');
    Route::put('/posts/{post}/like', [PostController::class,'like'])->name('admin.posts.like');
});

// Можно прописать более кратко.
// Но такая запись менее информативна
//Route::prefix('admin')->as('admin.')->group(function () {
//    // CRUD (Create, Read, Update, Delete
//    Route::resource('posts', PostController::class);
//});

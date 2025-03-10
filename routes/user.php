<?php

use App\Http\Controllers\Posts\CommentController;
use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;


// Контроллер для ПОСТОВ пользователя
Route::prefix('user')->group(function () {
    // CRUD (Create, Read, Update, Delete
    Route::resource('posts', PostController::class);
    // Комментарии для постов
    Route::get('/posts/{post}/comments/{comment}/edit', [CommentController::class,'edit'])->name('user.posts.comments.edit');
});

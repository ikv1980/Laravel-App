<?php

use App\Http\Controllers\Api\PostController;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('posts', [PostController::class,'index'])->name('api.posts.index');
Route::get('posts/{post}', [PostController::class,'show'])->name('api.posts.show');
Route::post('posts/{post}/like', [PostController::class,'like'])->name('api.posts.like');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('currency', function () {
   return Currency::all();
});

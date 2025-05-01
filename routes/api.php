<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\api\TestController;
use App\Models\Currency;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('posts', [PostController::class,'index'])->name('api.posts.index');
Route::get('posts/{post}', [PostController::class,'show'])->name('api.posts.show');
Route::post('posts/{post}/like', [PostController::class,'like'])->name('api.posts.like');


// Не используется контроллер. Пока без него
Route::prefix('user')->group(function () {
    Route::get('/', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
    Route::get('/posts/{id_post}', function ($id_post){
        $post = Post::query()->findOrFail($id_post);
        return $post;
    });
    Route::get('{id_user}/posts', function ($id_user){
        $posts = Post::query()
            ->where('user_id', $id_user)->get();
        return $posts;
    });
});


Route::get('currency', function () {
   return Currency::all();
});

// TestController
Route::get('/tests', [TestController::class, 'index'])->name('api.test.index');
Route::get('/tests/{id}', [TestController::class, 'show'])->name('api.test.show');
Route::post('/tests', [TestController::class, 'store'])->name('api.test.store');
Route::put('/tests/{id}', [TestController::class, 'update'])->name('api.test.update');
Route::delete('/tests/{id}', [TestController::class, 'destroy'])->name('api.test.destroy');


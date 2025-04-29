<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::query()
            ->with('user:id,name')
            ->get(['id', 'title', 'content', 'published', 'published_at', 'user_id']);
    }

    public function show(string $id_post)
    {
        return Post::with('user:id,name')->findOrFail($id_post);
    }

    public function like(string $id_post)
    {
        return "API. Получение лайков поста №{$id_post}";
    }
}

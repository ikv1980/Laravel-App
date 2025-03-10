<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return 'API. Страница списка постов';
    }

    public function show(string $id_post)
    {
        return "API. Страница поста №{$id_post}";
    }

    public function like(string $id_post)
    {
        return "API. Получение лайков поста №{$id_post}";
    }
}

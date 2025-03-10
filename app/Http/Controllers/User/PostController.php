<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class    PostController extends Controller
{
    public function index()
    {
        return 'User. Страница списка постов';
    }

    public function create()
    {
        return 'User. Страница создания поста';
    }

    public function store(Request $request)
    {
        return 'User. Запрос создания поста';
    }

    public function show(string $id_post)
    {
        return "User. Страница поста №{$id_post}";
    }

    public function edit(string $id_post)
    {
        return "User. Страница редактирования поста №{$id_post}.";
    }

    public function update(Request $request, string $id_post)
    {
        return "User. Страница обновления поста №{$id_post}.";
    }

    public function destroy(string $id_post)
    {
        return "User. Страница удаления поста {$id_post}";
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class    PostController extends Controller
{
    public function index()
    {
        return 'Страница списка постов';
    }

    public function create()
    {
        return 'Страница создания поста';
    }

    public function store(Request $request)
    {
        return 'Запрос создания поста';
    }

    public function show(string $id_post)
    {
        return "Страница поста №{$id_post}";
    }

    public function edit(string $id_post)
    {
        return "Страница редактирования поста №{$id_post}.";
    }

    public function update(Request $request, string $id_post)
    {
        return "Страница обновления поста №{$id_post}.";
    }

    public function destroy(string $id_post)
    {
        return "Страница удаления поста {$id_post}";
    }
}

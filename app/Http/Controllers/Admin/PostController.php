<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class    PostController extends Controller
{
    public function index()
    {
        return 'Admin. Страница списка постов';
    }

    public function create()
    {
        return 'Admin. Страница создания поста';
    }

    public function store(Request $request)
    {
        return 'Admin. Запрос создания поста';
    }

    public function show(string $id_post)
    {
        return "Admin. Страница поста №{$id_post}";
    }

    public function edit(string $id_post)
    {
        return "Admin. Страница редактирования поста №{$id_post}.";
    }

    public function update(Request $request, string $id_post)
    {
        return "Admin. Страница обновления поста №{$id_post}.";
    }

    public function destroy(string $id_post)
    {
        return "Admin. Страница удаления поста {$id_post}";
    }

    public function like(): string
    {
        return 'Admin. Лайк поста + 1';
    }
}

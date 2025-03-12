<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id_post)
    {
        //
    }

    public function edit(string $id_post, $id_comment)
    {
        return "Пост  №{$id_post}. Редактирование комментария \"{$id_comment}\"";
    }

    public function update(Request $request, string $id_post)
    {
        //
    }

    public function destroy(string $id_post)
    {
        //
    }
}

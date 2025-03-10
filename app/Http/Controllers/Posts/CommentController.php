<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        return 'Страница INDEX';
    }
    public function edit(string $id_post, $id_comment){
        return "Пост  №{$id_post}. Редактирование комментария {$id_comment}";
    }
}

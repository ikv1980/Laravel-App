<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class TestController extends Controller
{
    public function index(){
        $token = csrf_token();
        $answer = Route::is('test') ? 'YES' : 'NO';
        return "Главная страница - TEST: $answer\nCSRF: $token";
    }

    // Метод, который вызывается по умолчанию, если метод не существует
    public function __invoke(){
        return "Метод по умолчанию";
    }
}

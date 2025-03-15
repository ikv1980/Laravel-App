<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

class TestController extends Controller
{
    public function index(): string
    {
        $token = csrf_token();
        $answer = Route::is('test') ? 'YES' : 'NO';
        return "Главная страница - TEST: $answer <br> <b>CSRF</b>: $token";
    }

    // Метод, который вызывается по умолчанию, если метод не существует
    //public function __invoke(){
    //    return "Метод по умолчанию";
    //}
}

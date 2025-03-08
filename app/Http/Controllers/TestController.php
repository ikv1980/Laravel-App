<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return "Главная страница  TEST";
    }

    // Метод, который вызывается по умолчанию, если метод не существует
    public function __invoke(){
        return "Метод по умолчанию";
    }
}

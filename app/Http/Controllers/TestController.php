<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    // Метод, который вызывается по умолчанию, если метод не существует
    public function __invoke(Request $request){

        //dd(response());
        //return "Метод по умолчанию";
        //return response('test', 200, ['foo' => 'bar']);
        return response()->json(['foo' => 'bar'],200);
    }
}

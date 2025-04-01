<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        //$data = session('lastname');
        //Получение всех данных сессии
        dd(session()->all());

        //Проверка на наличие данных в сессии
        //dd(session()->has('lastname'));
        if($test = session('firstname')){
            dd($test);
        }

        return view('login.index');
    }

    public function store(Request $request)
    {
//        $ip = $request->ip();
//        $path = $request->path();
//        $url = $request->url();
//        dd($ip, $path, $url);

//        $email = $request->input('email');
//        $password = $request->input('password');
//        $remember = $request->boolean('remember');
//
//        dd($email,$password,$remember);

        // Работа с сессиями
        session([
            'firstname'=> 'Konstantin',
            'lastname'=> 'Ivanov',
        ]);

        //Удаление данных сессии по ключу
        session()->forget('value');
        session()->flush();



        // Валидация данных
        if(true){
            return redirect()->back()->withInput();
        }
        // Редирект на страницу пользователя
        return redirect()->route('user');
    }
}

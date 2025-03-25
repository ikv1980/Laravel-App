<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
//        $ip = $request->ip();
//        $path = $request->path();
//        $url = $request->url();
//        dd($ip, $path, $url);

        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->boolean('remember');

        dd($email,$password,$remember);

//        return 'Пользователь вошел в систему';
    }
}

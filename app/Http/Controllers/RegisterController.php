<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        // Правила валидации данных
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:50', 'confirmed'],
            'agreement' => ['required', 'accepted'],
        ]);

        // Валидация Email на уникальность
        if (User::where('email', $validatedData['email'])->exists()) {
            return back()->withErrors(['email' => 'Пользователь с таким Email уже зарегистрирован.']);
        }

        $user = User::query()->firstOrCreate(
            [
                'email' => $validatedData['email'],
            ],[
                'name' => $validatedData['name'],
                'password' => $validatedData['password'],
            ]
        );

        // Редирект на страницу входа.
        return redirect('login');
    }
}

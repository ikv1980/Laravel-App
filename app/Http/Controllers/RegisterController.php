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

        // ПЕРВЫЙ СПОСОБ. Создаем объект, вносим данные и сохраняем
        $user = new User;
        //$user->name = $validatedData['name'];
        //$user->email = $validatedData['email'];
        //$user->password = $validatedData['password'];
        ////$user->password = bcrypt($validatedData['password']);
        ////$user->password = Hash::make($validatedData['password']);
        //$user->save();

        // ВТОРОЙ СПОСОБ - если email есть, то запись не создастся
        //$user = User::query()->create([
        $user = User::query()->firstOrCreate(
            [
                'email' => $validatedData['email'],
            ],[
                'name' => $validatedData['name'],
                'password' => $validatedData['password'],
            ]
        );

        // Получение всех данных
        //$data = $request->all();
        // Получение данных по списку
        //$data = $request->only('name', 'email', 'password');
        // Получение всех, кроме
        // $data = $request->except('_token');
        // Получение значения поля
        //$name = $request->input('name');
        //$email = $request->input('email');
        //$password = $request->input('password');
        //$agreement = $request->boolean('agreement');

        //$file = $request->file('file');
        // Проверка существования поля
        //dd($request->has('name'));

        // Проверка заполнения данными поля
        //dd($request->filled('name'));
        /*
        if($name = $request->input('name')){
            $name = strtoupper($name);
            dd($name);
        }
        */
        //dd($name,$email,$password,$agreement);

        // Валидация данных
        if(true){
            return redirect()->back()->withInput();
        }
        // Редирект на страницу входа.
        return redirect('login');
    }
}

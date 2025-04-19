<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Указание какое соединение используем
    protected $connection = 'my_database';

    // Описание свойств модели. Удобно видеть поля в БД -> будет пропускать только эти поля то что нужно вносить)
    protected $fillable = [
        'name', 'email', 'avatar',
        'active', 'admin', 'password',
    ];

    // Данные, которые не будут пропускаться в БД
    protected $guarded = [];

    // поля что должны быть скрыты (см. маршрут в API)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // приведение данных к нужным типам (пароль будет хешироваться)
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Описание свойств класса
 * @property string $name
 * @property string $email
 * @property string $avatar
 * @property bool $admin
 * @property bool $active
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ОПЦИОНАЛЬНО
    // Указание какое соединение используем, так как данные могут лежать в разных БД
    protected $connection = 'my_database';

    // ОПЦИОНАЛЬНО
    // Указание таблицы в БД. Может например таблица называться как-то иначе
    protected $table = 'users';

    // ОПЦИОНАЛЬНО
    // Задаем значения по умолчанию, при необходимости
    protected $attributes = [
        'active' => true,
        'admin' => false,
    ];

    // ОПЦИОНАЛЬНО
    //Описание свойств модели.
    // Удобно видеть поля в БД -> будет пропускать только эти поля то что нужно вносить
    protected $fillable = [
        'name', 'email', 'avatar',
        'active', 'admin', 'password',
    ];

    // Данные, которые не будут пропускаться в БД
    protected $guarded = [];

    // Поля что должны быть скрыты (см. Маршрут в API)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // приведение данных к нужным типам (пароль будет хэшироваться)
    protected function casts(): array
    {
        return [
            'name' => 'string',
            'email' => 'string',
            'avatar' => 'string',
            'active' => 'boolean',
            'admin' => 'boolean',
            'password' => 'hashed',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    // Отношение с постами (один ко многим)
    public function posts(){
        return $this->hasMany(Post::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    //protected $table = 'currency';
    //protected $primaryKey = 'id';
    public $incrementing = false;

    // Указание какое соединение используем
    protected $connection = 'my_database';

    // Описание свойств модели. Удобно видеть поля в БД -> будет пропускать только эти поля то что нужно вносить)
    protected $fillable = [
        'id', 'name', 'price',
        'active', 'active_at', 'sort',
    ];

    // поля которые нельзя пропускать в модель
    //protected $guarded = []

    // поля что должны быть скрыты (см. маршрут в API)
    protected $hidden = [
        'id', 'created_at', 'updated_at',
    ];

    // приведение данных к нужным типам
    protected $casts = [
        'price' => 'float',
        'active' => 'boolean',
        'active_at' => 'datetime',
        'sort' => 'integer',
    ];

}

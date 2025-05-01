<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $title
 * @property string $content
 * @property Carbon $published_at
 * @property bool $published
 * @property string $user_name Виртуальное поле
 */
class Post extends Model
{
    use HasFactory;

    protected $connection = 'my_database';

    protected $fillable = [
        'user_id',
        'title', 'content',
        'published_at', 'published',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $appends = ['user_name']; // Добавляем виртуальное поле

    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function isPublished(): bool
    {
        return $this->published && $this->published_at;
    }

    public function fillAttributes(array $attributes): static
    {
        return $this->fill([
            'title' => $attributes['title'],
            'content' => $attributes['content'],
            'published_at' => new Carbon($attributes['published_at']) ?? null,
            'published' => $attributes['published'] ?? false,
        ]);
    }

    // Отношение с пользователем (один ко многим)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Accessor для имени пользователя
    public function getUserNameAttribute()
    {
        return optional($this->user)->name; // Возвращаем имя пользователя или null
    }
}

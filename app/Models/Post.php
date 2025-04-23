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

    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public static function getRules(): array{
        return  [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
            'published_at' => ['nullable', 'string', 'date'],
            'published' => ['nullable', 'boolean'],
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
}

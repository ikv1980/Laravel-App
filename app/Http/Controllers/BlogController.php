<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        /** @var Post $post */

        // Валидация данных из запроса
        $validated = $request->validate([
            'search' => ['nullable', 'string', 'min:3', 'max:50'],
            'from_date' => ['nullable', 'date'],
            'to_date' => ['nullable', 'date', 'after_or_equal:from_date'],
        ]);

        // ПЕРВЫЙ ВАРИАНТ ----------------------------------------------------------
//        $search = $request->input($validated['search']);
//        $posts = Post::query()
//            ->where('content', 'LIKE', "%{$search}%")
//            ->latest('published_at')
//            ->paginate(12);

        // ВТОРОЙ ВАРИАНТ ----------------------------------------------------------
//        $posts = Post::query()
//            ->when($validated['search'] ?? null,
//                function (Builder $query, $search) {
//                $query->where('title', 'LIKE', "%{$search}%")
//                    ->orWhere('content', 'LIKE', "%{$search}%");
//            })
//            ->latest('published_at')
//            ->paginate(12);

        // ТРЕТИЙ ВАРИАНТ
        $query = Post::query();

        if ($search = $validated['search'] ?? null) {
            $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%");
        }

        if($fromDate = $validated['from_date'] ?? null) {
            $query->whereDate('published_at', '>=', $fromDate);
        }

        if($toDate = $validated['to_date'] ?? null) {
            $query->whereDate('published_at', '<=', $toDate);
        }

        $posts = $query
            ->latest('published_at')
            ->paginate(12);

        $title = 'Блог. Посты';

        return view('blog.index', compact('posts', 'title'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $post_id)
    {
        // Работа с кэшем. Данные будут браться из кэша
        // Запись 1 вариант
        $post = cache()->remember("posts.{$post_id}", now()->addHours(), function () use ($post_id) {
            info("Сохранение в КЭШ {$post_id}");
            return Post::query()->findOrFail($post_id);
        });
        // Запись 2 вариант
//        $post = cache()->remember(
//            key: "posts.{$post_id}",
//            ttl: now()->addHours(),
//            callback: function () use ($post_id) {
//                return Post::query()->findOrFail($post_id);
//            });
//
//
//        $post = Post::query()
//            ->where('id', $post_id)
//            ->firstOrFail(['title', 'content', 'published_at', 'published']);
//
//        $post = Post::query()
//            ->findOrFail($post_id, ['title', 'content', 'published_at', 'published']);

        return view('blog.show', compact('post'));
    }

    public function edit(string $post_id)
    {
        //
    }

    public function update(Request $request, string $post_id)
    {
        //
    }

    public function destroy(string $post_id)
    {
        //
    }

    public function like(): string
    {
        return 'Лайк блога + 1';
    }
}

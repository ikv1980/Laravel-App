<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        /** @var Post $post */

        // Валидация
        $validation = $request->validate([
            'limit' => 'nullable|integer|min:1|max:100',
            'page' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        // Значения по умолчанию
        $limit = $validation['limit'] ?? 12;
        $page = $validation['page'] ?? 1;
        $offset = $limit * ($page - 1);

        // Получаем посты (пагинация)
        $posts = Post::query()
            ->limit($limit)
            ->offset($offset)
            ->get(['id', 'title', 'published_at', 'published']);

        $posts = Post::query()
            ->paginate($limit, ['id', 'title', 'content', 'published_at', 'published']);

        $posts = Post::query()
            //->orderBy('published_at', 'desc')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->latest('published_at')
            ->paginate($limit, ['posts.id', 'title','users.name', 'content', 'published_at', 'published']);

//        // Добавляем фильтр. Добавили Request
//        $search = $request->input('search');
//        $category_id = $request->input('category_id');
//
//        // Фильтруем посты, с учетом GET запроса
//        $posts = array_filter($posts, callback: function ($post) use ($search, $category_id) {
//            // Проверка по тексту в посте (тема или содержание)
//            if ($search && mb_stripos($post->title, $search) === false) {
//                return false;
//            }
//            // Проверка по id поста
//            if ($category_id && $post->id != $category_id) {
//                return false;
//            }
//            return true;
//        });

        // Фильтры для категорий с бека
        $categories = [
            null => __('Все категории'),
            '1' => __('Категория 1'),
            '2' => __('Категория 2'),
            '3' => __('Категория 3'),
        ];

        $title = 'Блог. Посты';

        return view('blog.index', compact('posts', 'title', 'categories'));

//        return view('blog.index')
//            ->with('posts', $posts)
//            ->with('title', 'blog');

//        return view('blog.index', [
//            'posts' => $posts,
//            'title' => 'blog'
//        ]);
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

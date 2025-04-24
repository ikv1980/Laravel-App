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
            ->paginate($limit,['id', 'title', 'published_at', 'published']);

        $posts = Post::query()
            //->orderBy('published_at', 'desc')
            ->latest('published_at')
            ->paginate($limit,['id', 'title', 'published_at', 'published']);

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
//            ->with('title', 'Blog');

//        return view('blog.index', [
//            'posts' => $posts,
//            'title' => 'Blog'
//        ]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(string $id_blog)
    {
        $post = (object)[
            'id' => 1,
            'title' => 'Смысл жизни',
            'content' => "
            О, внемлите, сударь!
            <br/><br/>
            Жизнь - сие дивное мгновение меж двух вечностей, дарованное нам для творения добра, познания красоты мироздания и дарования любви ближним. В сей краткий миг надлежит нам оставить след светлый, подобно звезде, что сияет во тьме!
            <br/><br/>
            Позвольте выразить сию мысль в стихах:<br/><br/>

            В круговороте дней земных<br/>
            Есть высший смысл, незримый глазу:<br/>
            Творить, любить, дарить другим<br/>
            Души божественную фразу!"
        ];

        return view('blog.show', compact('post'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function like(): string
    {
        return 'Лайк блога + 1';
    }
}

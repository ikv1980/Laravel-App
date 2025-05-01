<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Random\RandomException;

class    PostController extends Controller
{
    // Просмотр списка постов (GET)
    public function index()
    {
        // -------------------------------------------------------------------------------
        // Работа с чанками (chunk). Для пакетной обработки данных.
        // Применяется, когда у нас в БД очень много записей
        $posts = Post::query()
            ->latest('published_at')
            ->chunk(10, function (Collection $posts) {
                info('часть запроса chunk');
                foreach ($posts as $post) {
                    info("Обработка элемента {$post->id}");
                }
            });
        // -------------------------------------------------------------------------------

        $user_id = random_int(1001, 1018);
        $user = User::query()
            ->where('id', $user_id)
            ->first(['id', 'name']);

        $posts = Post::query()
            //->orderBy('published_at', 'desc')
            ->latest('published_at')
            //->where('user_id', auth()->id())
            ->where('user_id', $user->id)
            ->paginate(5,['id', 'user_id', 'title', 'published_at', 'published']);

        $title = 'Посты пользователя: ';

        return view('user.posts.index', compact('posts', 'user', 'title'));
    }

    // Форма для создания поста (GET)
    public function create()
    {
        return view('user.posts.create');
    }

    // Страница метода создание поста (POST)

    /**
     * @throws RandomException
     */
    public function store(StorePostRequest $request)
    {
        //$title = $request->input('title');
        //$content = $request->input('content');
        //dd($title,$content);

        // Валидация данных сразу через request
        //$validatedData = validatedData($request->all(),[
        //    'title' => ['required','string','max:100'],
        //    'content' => ['required', 'string']
        //])->validate();

        // сокращение кода через хелпер-валидатор
        //$validatedData = validate($request->all(), [
        //    'title' => ['required', 'string', 'max:100'],
        //    'content' => ['required', 'string'],
        //    'published_at' => ['nullable', 'string', 'date'],
        //    'published' => ['nullable', 'boolean'],
        //]);

        $validatedData = $request->validated();

        $post = Post::query()->firstOrCreate([
            //'user_id' => Auth::id(),
            'user_id' => User::query()->value('id'),
            'title' => $validatedData['title'],
        ], [
            'content' => $validatedData['content'],
            'published_at' => new Carbon($validatedData['published_at'] ?? null),
            'published' => $validatedData['published'] ?? false,

        ]);

        // Фейковые рандомные данные для таблицы
        //for ($i = 0; $i < 99; $i++) {
        //    $post = Post::query()->create([
        //        'user_id' => random_int(1001, 1018),
        //        'title' => fake()->sentence(),
        //        'content' => fake()->paragraph(),
        //        'published_at' => new Carbon(fake()->dateTimeBetween(now()->subYear(), now())),
        //        'published' => boolval(random_int(0, 1)),
        //    ]);
        //};

        // Кастомное сообщение об ошибке
        //if(false){
        //    throw ValidationException::withMessages([
        //        'account' =>__('Какое-то информационное сообщение'),
        //    ]);
        //}

        // Проверяем, был ли создан новый пост
        if ($post->wasRecentlyCreated) {
            // Новый пост был создан
            message(__('Новый пост успешно создан'), 'alert-success');
        } else {
            // Пост уже существовал
            message(__('Пост с таким названием существует'), 'alert-warning');
        }
        return redirect()->route('user.posts.show', $post->id);
    }

    // Форма для отображения поста № (GET)
    public function show(Post $post)
    {
        return view('user.posts.show', compact('post'));
    }

    // Форма для редактирования поста № (GET)
    public function edit(Post $post)
    {
        return view('user.posts.edit', compact('post'));
    }

    // Страница метода обновления (редактирования) поста (PATCH)
    public function update(StorePostRequest $request, Post $post)
    {
        //$title = $request->input('title');
        //$content = $request->input('content');
        //dd($title,$content);
        //$validatedData = validate($request->all(), Post::getRules());

        $validatedData = $request->validated();
        // Обновляем пост, если он существует
        //$post->update([
        //    'title' => $validatedData['title'],
        //    'content' => $validatedData['content'],
        //    'published_at' => new Carbon($validatedData['published_at'] ?? null),
        //    'published' => $validatedData['published'] ?? false,
        //]);

        $post->update($validatedData);

        cache()->forget("posts.{$post->id}");

        message(__('Пост успешно изменен'), 'alert-info');

        return redirect()->route('user.posts.show', $post);
        // аналог
        //return redirect()->back();
    }

    // Страница метода удаления поста (DELETE)
    public function destroy(string $id_post)
    {
        return redirect()->route('user.posts');
        //return "User. Страница удаления поста {$id_post}";
    }

    // Страница метода добавления лайка (PUT)
    public function like(): string
    {
        return 'User. Лайк поста + 1';
    }
}

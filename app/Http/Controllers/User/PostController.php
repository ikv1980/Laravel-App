<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Random\RandomException;

class    PostController extends Controller
{
    // Просмотр списка постов (GET)
    public function index()
    {
        $post = (object)[
            'id' => 1,
            'title' => 'Пост пользователя',
            'content' => 'Контент поста для того, чтобы почитать'
        ];

        $posts = array_fill(0, 10, $post);

        $title = 'Мои посты';

        return view('user.posts.index', compact('posts', 'title'));
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
    public function store(Request $request)
    {
        //$title = $request->input('title');
        //$content = $request->input('content');
        //dd($title,$content);

        // Валидация данных сразу через request
        //$validator = validator($request->all(),[
        //    'title' => ['required','string','max:100'],
        //    'content' => ['required', 'string']
        //])->validate();

        // сокращение кода через хелпер-валидатор
        $validator = validate($request->all(), [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string'],
            'published_at' => ['nullable', 'string', 'date'],
            'published' => ['nullable', 'boolean'],
        ]);

        $post = Post::query()->firstOrCreate([
            //'user_id' => Auth::id(),
            'user_id' => User::query()->value('id'),
            'title' => $request->get('title'),
        ], [
            'content' => $validator['content'],
            'published_at' => new Carbon($validator['published_at'] ?? null),
            'published' => $validator['published'] ?? false,

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
    public function show($post)
    {
        $post = (object)[
            'id' => 1,
            'title' => 'Пользователь. Смысл жизни',
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

        return view('user.posts.show', compact('post'));
    }

    // Форма для редактирования поста № (GET)
    public function edit($post)
    {
        $post = (object)[
            'id' => 1,
            'title' => 'Пользователь. Смысл жизни',
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

        return view('user.posts.edit', compact('post'));
    }

    // Страница метода обновления (редактирования) поста (PATCH)
    public function update(Request $request, $post)
    {
        //$title = $request->input('title');
        //$content = $request->input('content');
        //dd($title,$content);
        $validator = validate($request->all(), Post::getRules());
        message(__('Пост успешно изменен'), 'alert-info');

        //return redirect()->route('user.posts.show', $post);
        // аналог
        return redirect()->back();
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

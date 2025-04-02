<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        return view('user.posts.index',compact('posts','title'));
    }

    // Форма для создания поста (GET)
    public function create()
    {
        return view('user.posts.create');
    }

    // Страница метода создание поста (POST)
    public function store(Request $request)
    {
        //$title = $request->input('title');
        //$content = $request->input('content');
        //dd($title,$content);
        message(__('Пост успешно создан'), 'alert-primary');
        return redirect()->route('user.posts.show', 111);
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

        //return redirect()->route('user.posts.show', $post);
        // аналог
        message(__('Пост успешно изменен'), 'alert-info');
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

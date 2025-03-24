<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class    PostController extends Controller
{
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

    public function create()
    {
        return view('user.posts.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

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

    public function edit($post)
    {
        return view('user.posts.edit');
//        return view('user.posts.edit', compact('post'));
    }

    public function update(Request $request, string $id_post)
    {
        return "User. Страница обновления поста №{$id_post}.";
    }

    public function destroy(string $id_post)
    {
        return "User. Страница удаления поста {$id_post}";
    }

    public function like(): string
    {
        return 'User. Лайк поста + 1';
    }
}

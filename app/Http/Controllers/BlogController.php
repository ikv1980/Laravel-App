<?php

namespace App\Http\Controllers;

use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $post = (object)[
            'id' => 1,
            'title' => 'Post 1',
            'content' => 'Контент поста для того, чтобы почитать'
        ];

        $posts = array_fill(0, 10, $post);
        //dd($posts);


        $title = 'Blog';

        return view('blog.index', compact('posts', 'title'));

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
        return view('blog.show', compact('id_blog'));
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

@extends('layouts.base')

@section('page.title', )

@section('content')

    <h1>Список постов</h1>

    @if(empty($posts))
        В блоге нет постов
    @else
        @foreach($posts as $post)
            <div>
{{--                <a href="{{route('blog.show', $post->id)}}">Пост №{{$post->id}}</a>--}}
                <a href="{{route('blog.show', $loop->iteration)}}">Пост №{{$loop->iteration}}</a>
                <h5>{{$post->title}}</h5>
                <p>{{$post->content}}</p>
            </div>
        @endforeach
    @endif

@endsection

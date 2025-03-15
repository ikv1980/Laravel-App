@extends('layouts.base')

@section('page.title', )

@section('content')

    <h1>Список постов</h1>

    @foreach($posts as $post)

        <div>
            Пост №{{$post}}
        </div>

    @endforeach

@endsection

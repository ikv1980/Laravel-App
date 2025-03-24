@extends('layouts.main')

@section('page.title', 'Изменение поста' )

@section('main.content')

    <x-page-title>
        {{'Изменение поста'}}
        <x-slot name="link">
            <a href="{{route('user.posts.show', $post->id)}}" class="href">
                {{__('Назад')}}
            </a>
        </x-slot>
    </x-page-title>

    {{--Форма редактирования поста--}}
    <x-post.form action="{{route('user.posts.update', $post->id)}}" method="put" :post="$post" />

@endsection

@extends('layouts.main')

@section('page.title', 'Создание поста' )

@section('main.content')

    <x-page-title>
        {{'Создание поста'}}
        <x-slot name="link">
            <a href="{{route('user.posts')}}" class="href">
                {{__('Назад')}}
            </a>
        </x-slot>
    </x-page-title>

    {{--Форма создания поста--}}
    <x-post.form action="{{route('user.posts.store')}}"/>

@endsection

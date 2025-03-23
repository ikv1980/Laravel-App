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

    <x-form action="{{route('user.posts.store')}}" method="POST">
        <x-card-item>
            <x-label required>{{__('Название поста')}}</x-label>
            <x-input type="text" name="email" autofocus/>
        </x-card-item>
        <x-card-item>
            <x-label required>{{__('Содержание поста')}}</x-label>
            <x-textarea name="content" rows="10"/>
        </x-card-item>
        <x-button type="submit">{{__('Создать')}}</x-button>
    </x-form>

@endsection

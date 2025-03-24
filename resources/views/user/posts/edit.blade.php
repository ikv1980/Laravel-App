@extends('layouts.main')

@section('page.title', 'Создание поста' )

@section('main.content')

    <x-page-title>
        {{'Создание поста'}}
        <x-slot name="link">
            <a href="{{route('user.posts.show', $post->id)}}" class="href">
                {{__('Назад')}}
            </a>
        </x-slot>
    </x-page-title>

    <x-form action="{{route('user.posts.store')}}" method="POST">
        <x-card-item>
            <x-label required>{{__('Название поста')}}</x-label>
            <x-input type="text" name="title" autofocus/>
        </x-card-item>
        <x-card-item>
            <x-label required>{{__('Содержание поста')}}</x-label>
            <input id="content" type="hidden" name="content">
            <trix-editor input="content" style="min-height: 300px;"></trix-editor>
        </x-card-item>
        <x-button type="submit">{{__('Создать')}}</x-button>
    </x-form>

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
@endpush
@push('js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush

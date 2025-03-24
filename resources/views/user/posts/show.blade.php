@extends('layouts.main')

@section('page.title', $post->title)

@section('main.content')

    <x-page-title>
        {{$post->title}}

        <x-slot name="link">
            <a href="{{route('user.posts')}}" class="href">
                {{__('Назад')}}
            </a>
        </x-slot>

        <x-slot name="right">
            <x-button-link href="{{ route('user.posts.edit', $post->id) }}">
                {{__('Изменить пост')}}
            </x-button-link>
        </x-slot>

    </x-page-title>

    <p class="small text-muted">
        ({{ now()->format('d.m.Y H:i:s')}})
    </p>
    <p>
        {!! $post->content !!}
    </p>

@endsection

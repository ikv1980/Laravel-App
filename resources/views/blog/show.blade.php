@extends('layouts.main')

@section('page.title', $post->title)

@section('main.content')

    <x-page-title>
        {{$post->title}}

        <x-slot name="link">
            <a href="{{route('blog')}}" class="href">
                {{__('Назад')}}
            </a>
        </x-slot>

    </x-page-title>

    <p class="small text-muted">
        <b>Опубликовано:</b> {{ $post->published_at->format('d.m.Y H:i:s')}}
    </p>
    <p>
        {!! $post->content !!}
    </p>

@endsection

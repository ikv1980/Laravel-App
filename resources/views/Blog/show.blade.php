@extends('layouts.main')

@section('page.title', $post->title)

@section('main.content')

    <x-page-title>
        {{$post->title}}

        <x-slot name="link">
            <a href="{{route('blog.index')}}" class="href">
                {{__('Назад')}}
            </a>
        </x-slot>

    </x-page-title>

    <p class="small text-muted">
        ({{ now()->format('d.m.Y H:i:s')}})
    </p>
    <p>
        {!! $post->content !!}
    </p>

@endsection

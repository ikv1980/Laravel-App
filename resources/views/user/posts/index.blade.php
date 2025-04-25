@extends('layouts.main')

@section('page.title', $title )

@section('main.content')

    <x-page-title>
        {{$title}}{{$user->name}}
        <x-slot name="right">
            <x-button-link href="{{ route('user.posts.create') }}">
                {{__('Создать пост')}}
            </x-button-link>
        </x-slot>
    </x-page-title>

    @if(empty($posts))
        {{__('У пользователя нет постов')}}
    @else
        <div class="row row-gap-3">
            @foreach($posts as $post)
                <div>
                    <h2 class="h6">
                        <a href="{{route('user.posts.show', $post->id)}}">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="small text-muted">
                        ({{ now()->format('d.m.Y H:i:s')}})
                    </p>
                </div>
            @endforeach
        </div>
        <div class="pt-3">
            {{ $posts->onEachSide(3)->links() }}
        </div>
    @endif

@endsection

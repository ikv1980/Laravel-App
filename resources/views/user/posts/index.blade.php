@extends('layouts.main')

@section('page.title', $title )

@section('main.content')

    <x-page-title>
        {{$title}}
        <x-slot name="right">
            <x-button-link href="{{ route('user.posts.create') }}">
                {{__('Создать пост')}}
            </x-button-link>
        </x-slot>
    </x-page-title>

    @if(empty($posts))
        {{__('У пользователя  нет постов')}}
    @else
        <div class="row row-gap-3">
            @foreach($posts as $post)

                <div class="col-12 col-md-3">
                    <x-blog.card :post="$post"/>
                </div>

            @endforeach
        </div>
    @endif

@endsection

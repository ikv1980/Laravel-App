@extends('layouts.main')

@section('page.title', $title )

@section('main.content')

    <x-page-title>
        {{$title}}
    </x-page-title>

    @if(empty($posts))
        {{__('Нет постов')}}
    @else
        <div class="row row-gap-3">
            @foreach($posts as $post)
                <div class="col-12 col-md-3">
                    <x-post.card :post="$post"/>
                </div>
            @endforeach
        </div>
    @endif

@endsection

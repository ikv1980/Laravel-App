@extends('layouts.main')

@section('page.title', 'Страница постов' )

@section('main.content')

    <x-page-title>
        {{__('Список постов')}}
    </x-page-title>

    @if(empty($posts))
        {{__('В блоге нет постов')}}
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

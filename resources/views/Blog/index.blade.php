@extends('layouts.base')

@section('page.title', )

@section('base.content')

    <section>
        <x-container>
            <x-page-title>
                {{__('Список постов')}}
            </x-page-title>

            @if(empty($posts))
                {{__('В блоге нет постов')}}
            @else
                <div class="row">
                    @foreach($posts as $post)
                        <x-card-frame>
                            <div>
                                <a href="{{route('blog.show', $post->id)}}">Пост №{{$post->id}}</a>
                                <h5>{{$post->title}}</h5>
                                <p>{{$post->content}}</p>
                            </div>
                        </x-card-frame>
                    @endforeach
                </div>
            @endif
        </x-container>
    </section>






@endsection

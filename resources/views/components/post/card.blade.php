<x-card-frame>
    <x-card-body>
        <h5>
            <a href="{{ route('blog.show', $post->id) }}">
                {{ \Illuminate\Support\Str::limit($post->title, 25) }}
            </a>
        </h5>
        <p>
            {{ \Illuminate\Support\Str::limit($post->content, 60) }}
            {{--{!! $post->content !!}--}}
        </p>
        <p class="small text-muted">
            {{ $post->published_at->format('d.m.Y H:i:s')}}
            ({{ $post->published_at->diffForHumans()}})
        </p>
        <p>{{$post->id}}</p>
    </x-card-body>
</x-card-frame>

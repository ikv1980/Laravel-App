<x-card-frame>
    <x-card-body>
        <h5>
            <a href="{{ route('blog.show', $post->id) }}">
                {{ \Illuminate\Support\Str::limit($post->title, 25) }}
            </a>
        </h5>
        <p>
            {{ \Illuminate\Support\Str::limit(strip_tags($post->content), 60) }}
            {{--{!! $post->content !!}--}}
        </p>
        <div class="small text-muted">
            <p class="mb-0">
                {{ $post->published_at->format('d.m.Y H:i:s')}}
                ({{ $post->published_at->diffForHumans()}})
            </p>
            <p>
                <b>Автор: </b>{{ $post->user_name }}
            </p>
        </div>
    </x-card-body>
</x-card-frame>

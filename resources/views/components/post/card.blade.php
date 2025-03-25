<x-card-frame>
    <x-card-body>
        <h5>
            <a href="{{route('blog.show', $post->id)}}">
                {{$post->title}}
            </a>
        </h5>
        <p>
            {!! $post->content !!}
        </p>
        <p class="small text-muted">
            ({{ now()->format('d.m.Y H:i:s')}})
        </p>
    </x-card-body>
</x-card-frame>

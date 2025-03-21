<div>
    @isset($link)
        <div>
            {{ $link }}
        </div>
    @endisset
    <h1 class="mb-5 h2">
        {{ $slot }}
    </h1>
</div>




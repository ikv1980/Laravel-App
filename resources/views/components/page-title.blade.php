<div class="border-bottom pb-3 mb-4">
    @isset($link)
        <div class="mb-3">
            {{ $link }}
        </div>
    @endisset

    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0 h2">
            {{ $slot }}
        </h1>

        @isset($right)
            <div>
                {{ $right }}
            </div>
        @endisset
    </div>
</div>

<x-errors/>


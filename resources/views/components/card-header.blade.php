<div class="card-body">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            {{ $slot }}
        </div>
        @isset($right)
            <div>
                {{ $right }}
            </div>
        @endisset
    </div>
</div>

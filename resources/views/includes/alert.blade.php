@if(session()->has('alert') && session()->has('alert_style'))
    @php
        $text = session()->pull('alert');
        $style = session()->pull('alert_style');
    @endphp
    <div class="alert {{ $style }} my-0 py-2 text-center">
        {{ $text }}
    </div>
@endif

@props(['method'=>'GET'])

{{--Проверка полученного метода--}}
@php
    $method = strtoupper($method);
    $_method = in_array($method, ['GET', 'POST'])
@endphp

<form {{ $attributes }} method="{{ $_method ? $method : 'POST' }}">
    @if($method !== 'GET')
        @csrf
    @endif
    @if(!$_method)
        @method($method)
    @endif
    {{ $slot }}
</form>

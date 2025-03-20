{{--@props([]) - массив параметров--}}
@props(['required' => false,])

{{--$attributes - передаем атрибуты в компонент--}}
<label {{$attributes->class([
    $required? 'required':'',
])}}>
    {{ $slot }}
</label>

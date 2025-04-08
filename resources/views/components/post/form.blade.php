@props(['post'=>null])
<x-form {{$attributes}}>
    <x-card-item>
        <x-label required>{{__('Название поста')}}</x-label>
        <x-input type="text" value="{{$post->title ?? ''}}" name="title" autofocus/>
        {{--Сообщение об ошибке вывел в компонент--}}
    </x-card-item>
    <x-card-item>
        <x-label required>{{__('Содержание поста')}}</x-label>
        {{--Поле ввода текст а с редактором Trix--}}
        <x-trix name="content" value="{{$post->content ?? ''}}"/>
        <x-error name="content"/>
    </x-card-item>
    {{--Вывод кастомного сообщения--}}
    <x-error name="account"/>
    {{ $slot }}
</x-form>

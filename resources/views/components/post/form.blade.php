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
    <x-card-item>
        <x-label required>{{__('Дата публикации')}}</x-label>
        {{--Поле ввода текст а с редактором Trix--}}
        <x-input
            type="date"
            value="{{ $post?->published_at?->format('Y-m-d') ?? '' }}"
            name="published_at"/>
    </x-card-item>
    <x-card-item>
        <x-checkbox name="published" value="1">
            {{__('Опубликовано')}}
        </x-checkbox>
    </x-card-item>
    {{--Вывод кастомного сообщения--}}
    <x-error name="account"/>
    {{ $slot }}
</x-form>

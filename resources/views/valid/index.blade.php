@extends('layouts.main')

@section('page.title', 'Тестируем валидацию' )

@section('main.content')

    <x-page-title>
        {{'Тестируем валидацию'}}
    </x-page-title>

    {{--Форма создания поста--}}

    <x-form action="{{route('valid.store')}}" method="post">
        <x-card-item>
            <x-label required>{{__('first_name')}}</x-label>
            <x-input type="text" name="first_name" autofocus/>

{{--            <x-label required>{{__('last_name')}}</x-label>--}}
{{--            <x-input type="text" name="last_name" autofocus/>--}}

            <x-label required>{{__('age')}}</x-label>
            <x-input type="text" name="age" autofocus/>

            <x-label required>{{__('amount')}}</x-label>
            <x-input type="text" name="amount" autofocus/>

{{--            <x-label required>{{__('gender')}}</x-label>--}}
{{--            <x-input type="text" name="gender" autofocus/>--}}

            <x-label required>{{__('zip')}}</x-label>
            <x-input type="text" name="zip" autofocus/>

{{--            <x-label required>{{__('subscription')}}</x-label>--}}
{{--            <x-input type="text" name="subscription" autofocus/>--}}

{{--            <x-label required>{{__('agreement')}}</x-label>--}}
{{--            <x-input type="text" name="agreement" autofocus/>--}}

{{--            <x-label required>{{__('password')}}</x-label>--}}
{{--            <x-input type="password" name="password" autofocus/>--}}
{{--            <x-label required>{{__('password_confirmation')}}</x-label>--}}
{{--            <x-input type="password" name="password_confirmation" autofocus/>--}}

{{--            <x-label required>{{__('current_password')}}</x-label>--}}
{{--            <x-input type="text" name="current_password" autofocus/>--}}

            <x-label required>{{__('email')}}</x-label>
            <x-input type="text" name="email" autofocus/>

            <x-label required>{{__('website')}}</x-label>
            <x-input type="text" name="website" autofocus/>

            <x-label required>{{__('ip')}}</x-label>
            <x-input type="text" name="ip" autofocus/>

            <x-label required>{{__('start_date')}}</x-label>
            <x-input type="date" name="start_date" autofocus/>

            <x-label required>{{__('finish_date')}}</x-label>
            <x-input type="date" name="finish_date" autofocus/>















        </x-card-item>
        <x-button type="submit">{{__('Создать пост')}}</x-button>
    </x-form>
@endsection

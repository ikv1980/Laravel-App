@extends('layouts.auth')

@section('page.title', 'Страница входа')

@section('auth.content')

    <x-card-frame>
        <x-card-header>
            <x-card-title>
                {{__('Вход')}}
            </x-card-title>
            <x-slot name="right">
                <a href="{{ route('register.index') }}">{{__('Регистрация')}}</a>
            </x-slot>
        </x-card-header>
        <x-card-body>
            <x-form action="{{route('login.store')}}" method="POST">
                <x-card-item>
                    <x-label required>{{__('Email')}}</x-label>
                    <x-input type="email" name="email" autofocus/>
                </x-card-item>
                <x-card-item>
                    <x-label required> {{__('Пароль')}}</x-label>
                    <x-input type="password" name="password"/>
                </x-card-item>
                <x-card-item>
                    <x-checkbox>
                        {{__('Запомнить меня')}}
                    </x-checkbox>
                </x-card-item>
                <x-button type="submit">{{__('Войти')}}</x-button>
            </x-form>
        </x-card-body>
    </x-card-frame>

@endsection

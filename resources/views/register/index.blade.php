@extends('layouts.auth')

@section('page.title', 'Регистрация')

@section('auth.content')

    <x-card-frame>
        <x-card-header>
            <x-card-title>
                {{__('Регистрация')}}
            </x-card-title>
            <x-slot name="right">
                <a href="{{ route('login.index') }}">{{__('Вход')}}</a>
            </x-slot>
        </x-card-header>
        <x-card-body>
            <x-form action="{{route('register.store')}}" method="POST">
                <x-card-item>
                    <x-label required>{{__('Имя')}}</x-label>
                    <x-input type="name" name="name" autofocus/>
                </x-card-item>
                <x-card-item>
                    <x-label required>{{__('Email')}}</x-label>
                    <x-input type="email" name="email" autofocus/>
                </x-card-item>
                <x-card-item>
                    <x-label required> {{__('Пароль')}}</x-label>
                    <x-input type="password" name="password"/>
                </x-card-item>
                <x-card-item>
                    <x-label required> {{__('Подтверждение пароля')}}</x-label>
                    <x-input type="password" name="password_confirmation"/>
                </x-card-item>
                <x-card-item>
                    <x-checkbox>
                        {{__('Согласие на обработку пользовательских данных')}}
                    </x-checkbox>
                </x-card-item>
                <x-button type="submit">{{__('Регистрация')}}</x-button>
            </x-form>
        </x-card-body>
    </x-card-frame>

@endsection

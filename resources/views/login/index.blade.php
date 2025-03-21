@extends('layouts.auth')

@section('page.title', 'Страница входа')

@section('auth.content')

    <x-page-title>
        {{__('Страница авторизации')}}
    </x-page-title>

    <x-auth.card/>

@endsection

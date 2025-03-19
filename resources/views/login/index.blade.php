@extends('layouts.base')

@section('page.title', 'Страница входа')

@section('content')

    <section>
        <x-container>
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <x-card-frame>
                        <x-card-header>
                            <x-card-title>
                                {{__('Вход')}}
                            </x-card-title>
                        </x-card-header>
                        <x-card-body>
                            <x-form action="{{route('login.store')}}" method="POST">
                                <div class="mb-3">
                                    <label class="required">{{__('Email')}}</label>
                                    <input type="email" name="email" class="form-control" autofocus/>
                                </div>
                                <div class="mb-3">
                                    <label class="required">{{__('Password')}}</label>
                                    <input type="password" name="password" class="form-control"/>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" value="1" class="form-check-input"
                                               id="remember">
                                        <label class="form-check-label" for="remember">
                                            {{__('Запомнить меня')}}
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">{{__('Войти')}}</button>
                            </x-form>
                        </x-card-body>
                    </x-card-frame>
                </div>
            </div>
        </x-container>
    </section>

@endsection

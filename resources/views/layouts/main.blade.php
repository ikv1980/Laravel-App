@extends('layouts.base')

@section('base.content')

    <section>
        <x-container>
            <div class="row">
                @yield('main.content')
            </div>
        </x-container>
    </section>

@endsection

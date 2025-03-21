@extends('layouts.main')

@section('main.content')

    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            @yield('auth.content')
        </div>
    </div>

@endsection

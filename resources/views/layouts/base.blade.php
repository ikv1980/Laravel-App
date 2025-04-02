<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{--Подключение секции с названием страницы--}}
        <title>@yield('page.title', config('app.name'))</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
        @stack('css')
        <style>
            .required:after{content: '*'; color: red}
        </style>
    </head>

    <body>
        <div class="d-flex flex-column justify-content-between min-vh-100">
            @include('includes.alert')
            @include('includes.header')
            <main class="flex-grow-1 py-3">

                {{--Подключение секции с контентом--}}
                @yield('base.content')

            </main>

            @include('includes.footer')

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.min.js"></script>
        @stack('js')
    </body>
</html>

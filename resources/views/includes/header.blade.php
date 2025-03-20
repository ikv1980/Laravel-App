<nav class="navbar navbar-expand-md bg-body-tertiary">
    <div class="container-lg">
        <a href="{{route('home')}}" class="navbar-brand">
            {{config('app.name')}}
        </a>

        {{--Мобильное меню--}}
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            {{--Левое меню--}}
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link {{active_link('home')}}" aria-current="page">
                        {{__('Главная')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('blog.index')}}" class="nav-link {{active_link('blog.index')}}" aria-current="page">
                        {{__('Блог')}}
                    </a>
                </li>
            </ul>
            {{--Правое меню--}}
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{route('register.index')}}" class="nav-link {{active_link('register.index')}}"
                       aria-current="page">{{__('Регистрация')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('login.index')}}" class="nav-link {{active_link('login.index')}}" aria-current="page">
                        {{__('Вход')}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

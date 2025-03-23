<nav class="navbar navbar-expand-md bg-body-secondary">
    <div class="container-lg">
        <a class="navbar-brand" href="#">
            <img src="https://ikv1980.ru/media/logo.svg" width="30" height="30" alt="">
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
                    <a href="{{route('blog')}}" class="nav-link {{active_link('blog*')}}" aria-current="page">
                        {{__('Блог')}}
                    </a>
                </li>
            </ul>
            {{--Правое меню--}}
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{route('register')}}" class="nav-link {{active_link('register')}}"
                       aria-current="page">{{__('Регистрация')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('login')}}" class="nav-link {{active_link('login')}}" aria-current="page">
                        {{__('Вход')}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

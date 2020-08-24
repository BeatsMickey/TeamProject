<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
</head>
<body>
    <div id="app">
    @section('header')
        <section class="section_marginBottom">
            <div class="section__container">
                <div class="section__container__text">
                    <h6>Workout table</h6>
                    <p>онлайн дневник для тренировок</p>
                </div>

                <div class="hr"></div>
            </div>
        </section>
        @guest
            <li><a class="menu_link" href="{{ route('login') }}">Войти</a></li>
            @if (Route::has('register'))
                <li><a class="menu_link" href="{{ route('register') }}">Зарегестрироваться</a></li>
            @endif
        @else
            <li>
                <a class="menu_link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Выйти
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest
    @show
    @yield('content')



    </div>
    <script src="{{ asset('./js/app.js') }}"></script>
    <script src="/js/script.js"></script>
</body>
</html>

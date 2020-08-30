<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
                    <a href="/"><h6>Workout table</h6></a>
                    <p>онлайн дневник для тренировок</p>
                </div>
                <ul class="section__container menu">
                    @if($admin)
                        <li><a class="menu__link" href="{{ route('admin.main') }}">Редактирование данных</a></li>
                    @else
                        <li><a class="menu__link" href="{{ route('exercises.index') }}">База упражнений</a></li>
                    @endif

                    @guest
                        <li><a class="menu__link" href="{{ route('login') }}">Войти</a></li>
                        @if (Route::has('register'))
                            <li><a class="menu__link" href="{{ route('register') }}">Зарегестрироваться</a></li>
                        @endif
                    @else
                        <li><a class="menu__link" href="{{ route('program.index') }}">Мои упражнения</a></li>
                        <li><a class="menu__link" href="{{ route('personal.area') }}">Личный кабинет</a></li>
                        <li>
                            <a class="menu__link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Выйти
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
                <div class="hr"></div>
            </div>
        </section>

    @show
    @yield('content')

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
{{--    <script src="{{ asset('js/script.js') }}"></script>--}}
</body>
</html>

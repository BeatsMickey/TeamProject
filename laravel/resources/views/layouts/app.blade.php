<?php
    if (Illuminate\Support\Facades\Auth::user())
        $user = Illuminate\Support\Facades\Auth::user()->name;
?>
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
                <header class="header">
                    <logo></logo>
                    <login-text csrf="{{ csrf_token() }}" url="{{ route('login') }}" logouturl="{{ route('logout') }}" redirect="{{ route('home') }}" admin="{{ $admin }}" @guest user="guest" @else user="user" user_name="{{ $user }}" @endguest></login-text>
                </header>

                <ul class="section__container menu">
                    <li><a class="menu__link" href="{{ route('exercises.index') }}">База упражнений</a></li>
                    <li><a class="menu__link" href="{{ route('home') }}">О программе</a></li>
                </ul>
                <div class="hr"></div>
            </div>
        </section>

    @show
    @yield('content')

    </div>
    <script src="https://use.fontawesome.com/6b99932d68.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
{{--    <script src="{{ asset('js/script.js') }}"></script>--}}
</body>
</html>

@extends('layouts.app')


@section('content')
    <div class="section__container">
        <div class="reg__header">Войти</div>
        <login csrf="{{ csrf_token() }}" url="{{ route('login') }}" redirect="{{ route('home') }}"></login>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Напомнить пароль') }}
            </a>
        @endif
    </div>
@endsection

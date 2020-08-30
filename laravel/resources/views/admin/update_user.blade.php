@extends('layouts.app')
@section('title', 'Редактирование пользователя')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.users.save', ['id' => $user->id]) }}">
            @csrf
            <label>Имя:
                <input id="name" type="text" name="name" value="{{ $user->name ?? old('name') }}" autofocus></label><br>
            <label>E-mail:
                <input id="email" type="email" name="email" value="{{ $user->email ?? old('email') }}"></label><br>
            <label>Пароль:
                <input id="password" type="password" name="password"></label><br>
            <label>Администратор:
                <input type="checkbox" name="is_admin" value="1" class="content_form"
                       @if ($user->is_admin ?? old('is_admin'))
                       checked
                    @endif
                ></label><br>
            <input type="submit">
        </form>
    </div>
@endsection

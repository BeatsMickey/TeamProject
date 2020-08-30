@extends('layouts.app')
@section('title', 'Личный кабинет')

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
        <form action="{{ route('personal.change') }}" method="post">
            @csrf
            <input type="email" name="email" placeholder="Email" value="{{ $user->email ?? null }}"><br>
            <input type="text" name="name" placeholder="Имя" value="{{ $user->name ?? null }}"><br>
            <input type="text" name="lastname" placeholder="Фамилия" value="{{ $details->lastname ?? null }}"><br>
            <input type="password" name="prev_password" placeholder="Предыдущий пароль"><br>
            <input type="password" name="password" placeholder="Новый пароль"><br>
            <input type="password" name="password_confirmation" placeholder="Подтвердить пароль"><br>
            <input type="text" name="age" placeholder="Возвраст" value="{{ $details->age ?? null }}"><br>
            <div>
                <input type="radio" id="male" name="gender" value="male"
                                @if($details->gender === 'male')
                                    checked
                                @endif>
                <label for="male">М</label>

                <input type="radio" id="female" name="gender" value="female"
                                @if($details->gender === 'female')
                                    checked
                                @endif>
                <label for="female">Ж</label>
            </div>

            <input type="submit" value="Изменить">
        </form>
    </div>
@endsection

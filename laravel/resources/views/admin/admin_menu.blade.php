@extends('layouts.app')
@section('title', 'Редактирование данных')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        <ul class="section__container menu">
            <li><a href="{{ route('admin.users.all') }}" class="menu__link">Редактирование пользователей</a></li>
            <li><a href="{{ route('admin.exercises.index') }}" class="menu__link">Редактирование упражнений</a></li>
            <li><a href="{{ route('admin.program.all') }}" class="menu__link">Редактирование программ</a></li>
        </ul>
    </div>
@endsection

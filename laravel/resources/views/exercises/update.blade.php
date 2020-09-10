@extends('layouts.app')
@section('title', 'Страница программы')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        <a href="{{ route('exercises.all') }}">Вернуться на страницу упражнений</a>
        @if(session('message'))
            <h3>{{ session('message') }}</h3>
        @endif
        <form action="{{ route('exercises.update', $exercise) }}" method="post">
            @csrf
            <div>
                <input type="text" name="name" value="{{ $exercise->name }}" placeholder="Имя упражнения">
            </div>
            <div>
                <textarea name="description" cols="30" rows="10" placeholder="Описание упражнения">{{ $exercise->description }}</textarea>
            </div>
            <button>Сохранить</button>
        </form>
    </div>
@endsection







@extends('layouts.app')
@section('title', 'Страница программы')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        <a href="{{ route('set.index') }}">Вернуться на страницу наборов упражнений</a>
        @if(session('message'))
            <h3 class="my-program_message">{{ session('message') }}</h3>
        @endif
        <form action="{{ route('set.update', $set->id) }}" method="post">
            @csrf
            <div>
                <label>
                    <input class="my-program_input" type="text" name="name" value="{{ $set->name }}">
                </label>
                <button class="my-program_btn">Сохранить новое имя</button>
            </div>
        </form>
        <h3> Список упражнений набора </h3>
        <ul>
            @foreach($set_exercises as $exercise)
                <li class="my-program_list-item">
                    <a href="{{ route('exercises.update', $exercise) }}">{{ $exercise->name }}</a>
                    <a href="{{ route('set.delete_exercise', [$set, $exercise->id]) }}">[ X ]</a>
                </li>
            @endforeach
        </ul>

        <h3>Добавить упражнение</h3>
        <form action="{{ route('set.update', $set->id) }}" method="post">
            @csrf
            <div>
                <label>
                    <select class="my-program_input" name="exercise_id" id="exercise_id">
                        @foreach($all_exercises as $exercise)
                            <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                        @endforeach
                    </select>
                </label>
                <button class="my-program_btn">Добавить упражнение в набор</button>
            </div>
        </form>
    </div>
@endsection







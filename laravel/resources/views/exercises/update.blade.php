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
        <form action="{{ route('set.update', $set->id) }}" method="post">
            @csrf
            <div>
                <label>
                    Название набора упражнений
                    <input type="text" name="name" value="{{ $set->name }}">
                </label>
            </div>
            <button>Сохранить новое имя</button>
        </form>
        <h3> Список упражнений набора </h3>
        <ul>
            @foreach($set_exercises as $exercise)
                <li>{{ $exercise->name }} <a href="{{ route('set.delete_exercise', [$set, $exercise->id]) }}">[ X ]</a>
                </li>
            @endforeach
        </ul>

        <h3>Добавить упражнение</h3>
        <form action="{{ route('set.update', $set->id) }}" method="post">
            @csrf
            <div>
                <label>
                    <select name="exercise_id" id="exercise_id">
                        @foreach($all_exercises as $exercise)
                            <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <button>Добавить упражнение</button>
        </form>

        <h3>Удалить упражнение</h3>
        <form action="{{ route('exercises.destroy') }}" method="post">
            @csrf
            <div>
                <label>
                    <select name="exercise_id" id="exercise_id">
                        @foreach($all_exercises as $exercise)
                            <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <button>Стереть упражнение из базы упражнений</button>
        </form>
    </div>
@endsection







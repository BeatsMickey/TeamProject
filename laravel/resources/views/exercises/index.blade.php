@extends('layouts.app')
@section('title', 'Все упражнения')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        @if(session('message'))
            <h3>{{ session('message') }}</h3>
        @endif
        <h2>Старница упражнений</h2>
        <div>
            <h3>Cписок всех упражнений</h3>
            @foreach($exercises as $exercise)
                <div>
                    <ul>
                        <li>
                            <a href="{{ route('exercises.update', $exercise) }}">{{ $exercise->name }} </a>
                            <a href="{{ route('exercises.destroy', $exercise) }}" >( удалить )</a>
                        </li>
                    </ul>
                </div>
            @endforeach

        </div>
        <div class="hr"></div>
        <div><a href="{{ route('exercises.create') }}">Создать новое упражнение</a></div>
        <div><a href="{{ route('program.index') }}">Перейти на страницу программ упражнений</a></div>
        <div><a href="{{ route('set.index') }}">Перейти на страницу наборов упражнений</a></div>
    </div>
@endsection

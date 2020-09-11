@extends('layouts.app')
@section('title', 'Все упражнения')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        @if(session('message'))
            <h3 class="my-program_message">{{ session('message') }}</h3>
        @endif
        <h2>Страница упражнений</h2>
        <div>
            @foreach($exercises as $exercise)
                <div>
                    <ul>
                        <li class="my-program_list-item">
                            <a href="{{ route('exercises.update', $exercise) }}">{{ $exercise->name }} </a>
                            <a href="{{ route('exercises.destroy', $exercise) }}" >( удалить )</a>
                        </li>
                    </ul>
                </div>
            @endforeach

        </div>
        <div class="hr"></div>
        <div><a class="my-program_btn" href="{{ route('exercises.create') }}">Создать новое упражнение</a></div>
        <div><a href="{{ route('program.index') }}">Перейти на страницу программ упражнений</a></div>
        <div><a href="{{ route('set.index') }}">Перейти на страницу наборов упражнений</a></div>
    </div>
@endsection

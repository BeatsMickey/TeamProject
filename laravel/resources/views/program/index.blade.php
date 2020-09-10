@extends('layouts.app')
@section('title', 'Программы упражнений')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        @if(session('message'))
            <h3 class="my-program_message">{{ session('message') }}</h3>
        @endif

        <div>
            <h3>Выберете программу занятий:</h3>
            <ul>
                @foreach($programs as $program)
                    <li class="my-program_list-item">
                        @if($current_program && $current_program->id === $program->id)
                            <a class="my-program_link" href="#">{{ $program['name'] }}</a>
                            <a class="my-program_link" href="{{ route('program.show', $program['id']) }}">[Просмотреть]</a>
                            <a class="my-program_link" href="{{ route('program.update', $program->id) }}">[Редактировать]</a>
                            <a class="my-program_link" href="{{ route('program.reset', $current_program->id) }}">[Сбросить]</a>
                            <small class="my-program_selected-item" >(Активная программа)</small>
                        @else
                            <a class="my-program_link" href="{{ route('program.choose', $program['id']) }}">{{ $program['name'] }}</a>
                            <a class="my-program_link" href="{{ route('program.show', $program['id']) }}">[Просмотреть]</a>
                            <a class="my-program_link" href="{{ route('program.update', $program->id) }}">[Редактировать]</a>
                            <a class="my-program_link" href="{{ route('program.destroy', $program) }}"> [X]</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <a class="my-program_btn" href="{{ route('program.create') }}">Создать новую программу</a>
        <div class="hr"></div>
        <div class="my-program_link"><a href="{{ route('set.index') }}">Перейти на страницу наборов упражнений</a></div>
        <div class="my-program_link"><a href="{{ route('exercises.all') }}">Перейти на страницу упражнений</a></div>
    </div>

@endsection

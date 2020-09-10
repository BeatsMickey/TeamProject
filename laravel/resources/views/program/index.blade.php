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
{{--        <h2 class="my-program_header">Страница программы занятий</h2>--}}
{{--        <div class="hr"></div>--}}
{{--        @if($current_program)--}}
{{--            <div class="my-program_section">--}}
{{--            --}}{{--                <h3 class="my-program_header">Активная программа</h3>--}}
{{--                <a href="{{ route('program.show', $current_program['id']) }}">{{ $current_program['name'] }}</a><br>--}}
{{--                <a href="{{ route('program.reset', $current_program->id) }}">Сбросить программу</a>--}}
{{--            </div>--}}

{{--        @endif--}}

        <div>
            <h3>Выберете программу занятий:</h3>
            <ul>
                @foreach($programs as $program)
                    <li class="my-program_list-item">
                        @if($current_program && $current_program->id === $program->id)
                            <a class="my-program_list-link" href="{{ route('program.show', $program['id']) }}">{{ $program['name'] }}
                                <span class="my-program_selected-item" >(Активная программа)</span>
                            </a>
                            <a class="my-program_list-link" href="{{ route('program.reset', $current_program->id) }}">Сбросить программу</a>
                        @else
                            <a class="my-program_list-link" href="{{ route('program.show', $program['id']) }}">{{ $program['name'] }}</a>
                            <a class="my-program_list-link" href="{{ route('program.choose', $program->id) }}">(Выбрать эту программу)</a>
                            <a class="my-program_list-link" href="{{ route('program.destroy', $program) }}"> [X]</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <a class="my-program_btn" href="{{ route('program.create') }}">Создать новую программу</a>
        <div class="hr"></div>
        <div><a class="" href="{{ route('set.index') }}">Перейти на страницу наборов упражнений</a></div>
        <div><a class="" href="{{ route('exercises.all') }}">Перейти на страницу упражнений</a></div>
    </div>

@endsection

@extends('layouts.app')
@section('title', 'Страница программы')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        <a href="{{ route('program.index') }}">Вернуться на страницу программ</a>
        <h3>{{ $program->name }}</h3>
        @foreach($sets as $key => $set)
            <h2>День {{ $set->pivot->day_of_program }} - {{ $set->name }}</h2>
            @foreach($set->exercises as $exercise)
                <p>{{ $exercise->name }}</p>
            @endforeach
        @endforeach
        <a href="{{ route('program.choose', $program->id) }}">Выбрать эту программу</a>
        <a href="{{ route('program.update', $program->id) }}">Изменить эту программу</a>
    </div>
@endsection

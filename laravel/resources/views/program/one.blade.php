@extends('layouts.app')
@section('title', 'Страница программы')

@section('header')
    @parent
@endsection

@section('content')
    <h3>{{ $program->name }}</h3>
    @foreach($sets as $key => $set)
        <h2>День {{ $set->pivot->day_of_program }} - {{ $set->name }}</h2>
        @foreach($set->exercises as $exercise)
            <p>{{ $exercise->name }}: повторений - {{ $exercise->pivot->repetitions }}</p>
        @endforeach
    @endforeach
    <a href="{{ route('program.choose', $program->id) }}">Выбрать эту программу</a>
    <a href="{{ route('program.update', [ 'id' => $program->id, 'program' => $program]) }}">Изменить эту программу</a>
@endsection







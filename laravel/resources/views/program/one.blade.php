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
            <p>{{ $exercise->name }}: вес {{ $exercise->pivot->weight }} кг, {{ $exercise->pivot->repetitions }} повторений</p>
        @endforeach
    @endforeach
    <a href="{{ route('program.choose', $program->id) }}">Выбрать эту программу</a>
@endsection







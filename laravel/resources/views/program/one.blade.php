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
                <p><a href="{{ route('set.update', $set->id) }}">{{ $exercise->name }}</a></p>
            @endforeach
        @endforeach
    </div>
@endsection

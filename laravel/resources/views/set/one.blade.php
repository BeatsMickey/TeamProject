@extends('layouts.app')
@section('title', 'Страница программы')

@section('header')
    @parent
@endsection

@section('content')
    <h3>{{ $set->name }}</h3>
    @foreach($set->exercises as $exercise)
            <p>{{ $exercise->name }}</p>
    @endforeach
{{--    <a href="{{ route('sets.update', $set->id) }}">Изменить эту программу</a>--}}
@endsection







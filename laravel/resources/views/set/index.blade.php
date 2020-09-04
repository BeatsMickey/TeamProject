@extends('layouts.app')
@section('title', 'Наборы упражнений')

@section('header')
    @parent
@endsection

@section('content')
    @if(session('message'))
        <h3>{{ session('message') }}</h3>
    @endif
    <h2>Старница наборов упражнений</h2>
    <div>
        <h3>Наборы упражнений</h3>
        @foreach($sets as $set)
            <div>
                <h3><a href="{{ route('set.update', $set['id']) }}">{{ $set['name'] }}</a><a href="{{ route('set.destroy', $set) }}"> (удалить)</a></h3>
                <ul>
                    @foreach($set->exercises as $exercise)
                        <li>{{ $exercise->name }}</li>
                    @endforeach
                </ul>
            </div>
            <p>
            </p>
        @endforeach
    </div>
    <div class="hr"></div>
    <div><a href="{{ route('set.create') }}">Создать новый набор упражнений</a></div>
    <div><a href="{{ route('program.index') }}">Перейти на страницу программ упражнений</a></div>
@endsection

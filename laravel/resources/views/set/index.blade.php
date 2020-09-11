@extends('layouts.app')
@section('title', 'Наборы упражнений')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        @if(session('message'))
            <h3 class="my-program_message">{{ session('message') }}</h3>
        @endif
        <h2>Старница наборов упражнений</h2>
        <div>
            <h3>Наборы упражнений</h3>
            <ul>
                @foreach($sets as $set)
                    <li class="my-program_list-item">
                        <a class="my-program_link" href="{{ route('set.update', $set['id']) }}">{{ $set['name'] }}</a>
{{--                        <a class="my-program_link" href="{{ route('set.update', $set['id']) }}">[Просмотреть/Редактировать]</a>--}}
                        <a class="my-program_link" href="{{ route('set.destroy', $set) }}"> [X]</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="hr"></div>
        <div class="my-program_btn"><a href="{{ route('set.create') }}">Создать новый набор упражнений</a></div>
        <div><a href="{{ route('program.index') }}">Перейти на страницу программ упражнений</a></div>
        <div><a href="{{ route('exercises.all') }}">Перейти на страницу упражнений</a></div>
    </div>
@endsection

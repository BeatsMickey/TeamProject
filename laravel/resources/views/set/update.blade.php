@extends('layouts.app')
@section('title', 'Страница программы')

@section('header')
    @parent
@endsection

@section('content')
{{--    <h3>{{ $set->name }}</h3>--}}
{{--    @foreach($set->exercises as $exercise)--}}
{{--            <p>{{ $exercise->name }}</p>--}}
{{--    @endforeach--}}
{{--    <a href="{{ route('sets.update', $set->id) }}">Изменить эту программу</a>--}}


{{--    @dd(1)--}}
    <form action="{{ route('set.update', $set->id) }}" method="post">
        @csrf
        <div>
            <label>
                Название набора упражнений
                <input type="text" name="name" value="{{ $set->name }}">
            </label>
        </div>
        <button>Сохранить новое имя</button>
    </form>
    <h3> Список упражнений набора </h3>
        <ul>
           @foreach($exercises as $exercise)
               <li>{{ $exercise->name }} <a href="">[ X ]</a></li>
           @endforeach
        </ul>



@endsection







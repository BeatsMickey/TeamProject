@extends('layouts.app')
@section('title', 'Страница программы')

@section('header')
    @parent
@endsection

@section('content')
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
               <li>{{ $exercise->name }} <a href="{{ route('set.delete_exercise', [$set, $exercise->id]) }}">[ X ]</a></li>
           @endforeach
        </ul>



@endsection







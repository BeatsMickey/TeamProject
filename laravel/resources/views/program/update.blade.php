@extends('layouts.app')
@section('title', 'Новая программа')

@section('header')
    @parent
@endsection
@dd(1)
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h3>Создать новую программу</h3>
    <form action="{{ route('program.update') }}" method="post">
        @csrf
        <div>
            <input type="text" name="name" value="{{ $program->name }}">
        </div>

        @for ($weekday = 1; $weekday <= 7; $weekday++)
            <div>
                <label for="day_one">Набор упражнений для {{ $weekday }}-го дня тренировки</label>
                <select name="day_{{ $weekday }}" id="day_one">
                    <option value=""></option>
                    @foreach($sets as $key => $set)
                        <option value="{{ $set->id }}"
                            @if($set->pivot->day_of_program === $weekday)
                                selected
                            @endif
                        >{{ $set->name }}</option>
                    @endforeach
                </select>
            </div>
        @endfor



        <button>Сохранить изменения</button>
    </form>

@endsection




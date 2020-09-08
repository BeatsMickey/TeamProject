@extends('layouts.app')
@section('title', 'Новая программа')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
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
        <form action="{{ route('program.create') }}" method="post">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Название программы">
            </div>

            @for ($i = 1; $i <= 7; $i++)
                <div>
                    <label for="day_{{ $i }}">Набор упражнений для {{ $i }}-го дня тренировки</label>
                    <select name="day_{{ $i }}" id="day_{{ $i }}">
                        <option value=""></option>
                        @foreach($sets as $key => $set)
                            <option value="{{ $set->id }}">{{ $set->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endfor


            <button>Создать программу</button>
        </form>
    </div>
@endsection




@extends('layouts.app')
@section('title', 'Новый набор упражнений')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        <a href="{{ route('set.index') }}">Вернуться на страницу наборов упражнений</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="my-program_message">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h3>Создать новый набор упражнений</h3>
        <form action="{{ route('set.create') }}" method="post">
            @csrf
            <div>
                <input class="my-program_input" type="text" name="name" placeholder="Название набора">
            </div>

            @for ($i = 1; $i <= 4; $i++)
                <div>
                    <select class="my-program_input" name="exercise_{{ $i }}" id="day_one">
                        <option value=""></option>
                        @foreach($exercises as $exercise)
                            <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endfor


            <button class="my-program_btn">Создать набор упражнений</button>
        </form>
    </div>
@endsection




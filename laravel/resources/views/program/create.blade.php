@extends('layouts.app')
@section('title', 'Новая программа')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        <a href="{{ route('program.index') }}">Вернуться на страницу программ</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="my-program_message">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h3>Создать новую программу</h3>
        <form action="{{ route('program.create') }}" method="post">
            @csrf
            <div>
                <input class="my-program_input" type="text" name="name" placeholder="Название программы">
            </div>

            <ul>
                @for ($i = 1; $i <= 7; $i++)
                    <li class="my-program_list-item">
                        <label for="day_{{ $i }}">{{ $i }}-й день тренировки</label>
                        <select class="my-program_input" name="day_{{ $i }}" id="day_{{ $i }}">
                            <option value=""></option>
                            @foreach($sets as $key => $set)
                                <option value="{{ $set->id }}">{{ $set->name }}</option>
                            @endforeach
                        </select>
                    </li>
                @endfor
            </ul>


            <button class="my-program_btn">Создать программу</button>
        </form>
    </div>
@endsection




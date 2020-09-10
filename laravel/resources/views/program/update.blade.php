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

        <h3>Редактировать программу</h3>
        <form action="{{ route('program.update', $program->id) }}" method="post">
            @csrf
            <ul>
                <li class="my-program_list-item">
                    <input class="my-program_input" type="text" name="name" value="{{ $program->name }}">
                </li>
                @for ($weekday = 1; $weekday <= 7; $weekday++)
                    <li class="my-program_list-item">
                        <label for="day_one">{{ $weekday }}-й день тренировки</label>
                        <select class="my-program_input" name="day_{{ $weekday }}" id="day_one">
                            <option value=""></option>
                            @foreach($sets as $key => $set)
                                <option value="{{ $set->id }}"
                                        @if(isset($program_sets[$weekday]->id) && $program_sets[$weekday]->id === $set->id)
                                        selected
                                    @endif
                                >{{ $set->name }}
                                </option>
                            @endforeach
                        </select>
                    </li>
                @endfor
            </ul>


            <button class="my-program_btn">Сохранить изменения</button>
        </form>
    </div>
@endsection




@extends('layouts.app')
@section('title', 'Новый набор упражнений')

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

        <h3>Создать новый набор упражнений</h3>
        <form action="{{ route('set.create') }}" method="post">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Название набора">
            </div>

            @for ($i = 1; $i <= 4; $i++)
                <div>
                    <select name="exercise_{{ $i }}" id="day_one">
                        <option value=""></option>
                        @foreach($exercises as $exercise)
                            <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endfor


            <button>Создать набор упражнений</button>
        </form>
    </div>
@endsection




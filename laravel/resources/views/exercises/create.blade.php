@extends('layouts.app')
@section('title', 'Новое упражнение')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        <a href="{{ route('exercises.all') }}">Вернуться на страницу упражнений</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h3>Создать новое упражнение</h3>
        <form action="{{ route('exercises.create') }}" method="post">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Название упражнения">
            </div>

            <div>
                <textarea name="description" id="" cols="30" rows="10" placeholder="Описание упражнения"></textarea>
            </div>


            <button>Создать упражнение</button>
        </form>
    </div>
@endsection




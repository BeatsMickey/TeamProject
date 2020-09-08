@extends('layouts.app')
@section('title', 'Замеры')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        <h2>Ваши замеры:</h2>
        @forelse($measurements as $measurement)
            <div class="content_block">
                <p>Вес: {{ $measurement->weight ?? "Не определено"}}</p>
                <p>Плечи: {{ $measurement->shoulders ?? "Не определено"}}</p>
                <p>Бицепс: {{ $measurement->biceps ?? "Не определено"}}</p>
                <p>Предплечья: {{ $measurement->forearms ?? "Не определено"}}</p>
                <p>Грудь: {{ $measurement->chest ?? "Не определено"}}</p>
                <p>Талия: {{ $measurement->waist ?? "Не определено"}}</p>
                <p>Бедро: {{ $measurement->thigh ?? "Не определено"}}</p>
                <p>Икроножная: {{ $measurement->calf ?? "Не определено"}}</p>
                <p>Дата: {{ $measurement->created_at ?? "Не определено"}}</p>
                <a href=""
                   onclick="event.preventDefault();
                                                     document.getElementById('del').submit();"
                >Удалить запись</a><br>
                <form id="del" action="{{ route('measurements.del', ['id' => $measurement->id]) }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <br>
        @empty
            <p>Информации нет</p>
        @endforelse
        <br>
        <p>Добавить данные:</p>
        <form method="post" action="{{ route('measurements.add') }}">
            @csrf
            <input type="text" name="weight" placeholder="Вес"><br>
            <input type="text" name="shoulders" placeholder="Плечи"><br>
            <input type="text" name="biceps" placeholder="Бицепс"><br>
            <input type="text" name="forearms" placeholder="Предплечья"><br>
            <input type="text" name="chest" placeholder="Грудь"><br>
            <input type="text" name="waist" placeholder="Талия"><br>
            <input type="text" name="thigh" placeholder="Бедро"><br>
            <input type="text" name="calf" placeholder="Икроножная"><br>
            <input type="submit">
        </form>
    </div>
@endsection

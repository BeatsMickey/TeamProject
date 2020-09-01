@extends('layouts.app')
@section('title', 'Упражнения категории')

@section('header')
@parent
@endsection

@section('content')
<div class="section__container">
    <h2>Упражнения категории {{ $category->name }}:</h2>
    @forelse($exercises as $exercise)
    <div class="content_block">
        <a href="{{ route('admin.exercises.update.card', $exercise->id) }}">{{ $exercise->name }}</a>
        <p>
            @if($exercise->is_active)
                Активно
            @else
                Не активно
            @endif
        </p>
        <a href=""
           onclick="event.preventDefault();
                                                     document.getElementById('del').submit();"
        >
            @if($exercise->is_active)
                Сделать не активным
            @else
                Сделать активынм
            @endif
        </a><br>
        <form id="del" action="{{ route('admin.exercises.del.exercises', ['id' => $exercise->id, 'category_id' => $category->id]) }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    @empty
    <p>Информации нет</p>
    @endforelse
    <br>
    <a href="{{ route('admin.exercises.card') }}">Создать упражнение</a>
</div>
@endsection

@extends('layouts.app')
@section('title', 'Категории упражнений')

@section('header')
    @parent
@endsection

@section('content')
        <div class="section__container">
            <h2>Категории:</h2>
            @forelse($categories as $category)
                <div class="content_block">
                    <a href="{{ route('admin.exercises.exercises', $category->id) }}">{{ $category->name }}</a>
                    <p>
                        @if($category->is_active)
                            Активна
                        @else
                            Не активна
                        @endif
                    </p>
                    <a href=""
                       onclick="event.preventDefault(); document.getElementById('del').submit();"
                    >
                        @if($category->is_active)
                            Сделать не аквтиной
                        @else
                            Сделать авктивной
                        @endif
                    </a>
                    <form id="del" action="{{ route('admin.exercises.change.categories', $category->id) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @empty
                <p>Информации нет</p>
            @endforelse
            <br>
            <p>Добавить категорию:</p>
            <form method="post" action="{{ route('admin.exercises.add.categories') }}">
                @csrf
                <input type="text" name="name" placeholder="Имя категории"><br>
                <input type="checkbox" name="is_active" value="1" class="content_form"><br>
                <input type="submit">
            </form>

        </div>
@endsection

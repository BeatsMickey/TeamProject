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
                    <a href="{{ route('exercises.categories', $category->id) }}">{{ $category->name }}</a>
                </div>
            @empty
                <p>Информации нет</p>
            @endforelse
        </div>
@endsection

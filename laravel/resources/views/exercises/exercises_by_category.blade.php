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
        <a href="{{ route('exercises.card', $exercise->id) }}">{{ $exercise->name }}</a>
    </div>
    @empty
    <p>Информации нет</p>
    @endforelse
</div>
@endsection

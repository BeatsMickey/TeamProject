@extends('layouts.app')
@section('title', 'Карточка упражнений')

@section('header')
    @parent
@endsection

@section('content')
        <div class="section__container">
            <div style="padding-top:53.267%;position:relative;"><iframe src="{{ $exercise->gif_path }}" width="100%" height="100%" style='position:absolute;top:0;left:0;' frameBorder="0" allowFullScreen></iframe></div>
            <p>Название: {{ $exercise->name }}</p>
            <p>Описание: {{ $exercise->desription }}</p>
        </div>
@endsection

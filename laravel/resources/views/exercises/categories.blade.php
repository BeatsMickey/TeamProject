@extends('layouts.app')
@section('title', 'Категории упражнений')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        @if($categories)
            <categories :urldata="{{json_encode($categories)}}"></categories>
        @else
            <p>Информации нет</p>
        @endif
    </div>
@endsection

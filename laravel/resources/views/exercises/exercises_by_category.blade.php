@extends('layouts.app')
@section('title', 'Упражнения категории')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        @if($exercises)
            <div class="content_block">
                <exercise-categories :cat="{{ json_encode($category) }}"
                                     :urldata="{{ json_encode($exercises) }}"></exercise-categories>
            </div>
        @else
            <p>Информации нет</p>
        @endif
    </div>
@endsection

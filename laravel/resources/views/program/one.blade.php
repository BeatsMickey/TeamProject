@extends('layouts.app')
@section('title', 'Страница программы')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        <my-programs-one :program="{{ json_encode($program) }}" :sets="{{ json_encode($sets) }}"></my-programs-one>
    </div>
@endsection
